<?php

namespace App\Repositories;

use App\Enums\TransactionTypeEnum;
use App\Enums\TransRequestStatusEnum;
use App\Interfaces\ITransactionRepository;
use App\Models\Investment;
use App\Models\Transaction;
use App\Models\TransactionRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TransactionRepository implements ITransactionRepository
{
    public function __construct(
        protected Transaction $transaction, 
        protected TransactionRequest $transRequest
    )
    {
    }

    public function bonus(array $attributes)
    {
        return DB::transaction(function() use($attributes) {
            $amount = data_get($attributes, 'amount');
            
            $recipient = User::where('uuid', data_get($attributes, 'uuid'))->first();
            $recipient->wallet->balance += $amount;
            $recipient->wallet->save();
            
            $details = [
                'narration' => data_get($attributes, 'narration', ''), 
                'type' => 'BONUS',
                'sender_type' => 'ADMIN',
                'sender' => auth()->guard('admin')->user()->email
            ];
            
            Transaction::create(
                [
                    'user_id' => $recipient->id,
                    'type' => TransactionTypeEnum::CREDIT,
                    'amount' => $amount,
                    'details' => $details,
                    'status' => 'COMPLETED',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            );

            return true;
        });
        return false;
    }

    public function penalty(array $attributes)
    {
        return DB::transaction(function() use($attributes) {
            $amount = data_get($attributes, 'amount');
            
            $recipient = User::where('uuid', data_get($attributes, 'uuid'))->first();
            $recipient->wallet->balance -= $amount;
            $recipient->wallet->save();
            
            $details = [
                'narration' => data_get($attributes, 'narration', ''), 
                'type' => 'PENALTY',
                'sender_type' => 'ADMIN',
                'sender' => auth()->guard('admin')->user()->email
            ];
            
            Transaction::create(
                [
                    'user_id' => $recipient->id,
                    'type' => TransactionTypeEnum::DEBIT,
                    'amount' => $amount,
                    'details' => $details,
                    'status' => 'COMPLETED',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            );

            return true;
        });
        return false;
    }

    public function validateDeposit(array $attributes, TransactionRequest $deposit)
    {
        return DB::transaction(function() use($attributes, $deposit) {
            $amount = $deposit->amount;
            $user = $deposit->user;
            $action = data_get($attributes, 'action');

            if ($action == '1' && $deposit->request == 'DEPOSIT' && $deposit->status == TransRequestStatusEnum::PENDING) {
                $user->wallet->balance += $amount;
                $user->wallet->save();
                
                $details = [
                    'narration' => 'Deposit Verified', 
                    'type' => 'Deposit',
                    'sender_type' => 'Admin',
                    'sender' => auth()->guard('admin')->user()->email
                ];
                
                Transaction::create(
                    [
                        'user_id' => $user->id,
                        'type' => TransactionTypeEnum::CREDIT,
                        'amount' => $amount,
                        'details' => $details,
                        'status' => 'COMPLETED',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                );
            }
            
            $status =  $action == '1' ? TransRequestStatusEnum::COMPLETED : TransRequestStatusEnum::REJECTED;

            $deposit->status = $status;
            $deposit->save();

            return true;
        });
        return false;
    }

    public function validateWithdraw(array $attributes, TransactionRequest $withdraw)
    {
        return DB::transaction(function() use($attributes, $withdraw) {
            $amount = $withdraw->amount;
            $user = $withdraw->user;
            $action = data_get($attributes, 'action');

            if ($action == '1' && $withdraw->request == 'WITHDRAW' && $withdraw->status == TransRequestStatusEnum::PENDING) {
                $user->wallet->ledger_balance -= $amount;
                $user->wallet->save();
                
                $details = [
                    'narration' => 'Withdraw Verified', 
                    'type' => 'Withdraw',
                    'sender_type' => 'Admin',
                    'sender' => auth()->guard('admin')->user()->email
                ];
                
                Transaction::create(
                    [
                        'user_id' => $user->id,
                        'type' => TransactionTypeEnum::DEBIT,
                        'amount' => $amount,
                        'details' => $details,
                        'status' => 'COMPLETED',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                );
            } elseif ($action == '2' && $withdraw->request == 'WITHDRAW' && $withdraw->status == TransRequestStatusEnum::PENDING) {
                // rejected
                $user->wallet->balance += $amount;
                $user->wallet->ledger_balance -= $amount;
                $user->wallet->save();
            }
            
            // update transaction request status
            $status =  $action == '1' ? TransRequestStatusEnum::COMPLETED : TransRequestStatusEnum::REJECTED;

            $withdraw->status = $status;
            $withdraw->save();

            return true;
        });
        return false;
    }

    public function fetchTransactions()
    {
        $transactionCollection = $this->transaction->query()->orderBy('id', 'DESC')->get();
        $transactions = $transactionCollection->map(function($item, $key) {
            $user = $item->user;
            $data['id'] = $item->id;
            $data['uuid'] = $item->uuid;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['type'] = $item->type;
            $data['amount'] = $item->amount;
            $data['details'] = $item->details;
            $data['status'] = $item->status;
            $data['created_at'] = $item->created_at;

            return $data;
        });

        return $transactions;
    }

    public function fetchTransactionsRequest()
    {
        $transactionCollection = $this->transRequest->query()->where('status', TransRequestStatusEnum::PENDING)->orderBy('id', 'DESC')->get();
        $transactions = $transactionCollection->map(function($item, $key) {
            $user = $item->user;
            $data['id'] = $item->id;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['request'] = $item->request;
            $data['amount'] = $item->amount;
            $data['details'] = $item->details;
            $data['created_at'] = $item->created_at;

            return $data;
        });

        return $transactions;
    }

    public function fetchTransactionsTreatedRequest()
    {
        $transactionCollection = $this->transRequest->query()->whereNot('status', TransRequestStatusEnum::PENDING)->orderBy('id', 'DESC')->get();
        $transactions = $transactionCollection->map(function($item, $key) {
            $user = $item->user;
            $data['id'] = $item->id;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['request'] = $item->request;
            $data['amount'] = $item->amount;
            $data['details'] = $item->details;
            $data['status'] = $item->status;
            $data['created_at'] = $item->created_at;

            return $data;
        });

        return $transactions;
    }

    public function fetchInvestments()
    {
        $investmentCollection = Investment::query()->orderBy('id', 'DESC')->get();
        $investments = $investmentCollection->map(function($item, $key) {
            $user = $item->user;
            $data['id'] = $item->id;
            $data['transaction'] = $item->transaction->uuid;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['amount'] = $item->amount;
            $data['plan'] = $item->plan->get('name');
            $data['profit'] = $item->profit;
            $data['details'] = $item->plan;
            $data['status'] = $item->status;
            $data['created_at'] = $item->created_at;
            $data['due_at'] = $item->due_at;

            return $data;
        });

        return $investments;
    }

}

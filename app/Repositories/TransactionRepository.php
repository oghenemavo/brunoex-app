<?php

namespace App\Repositories;

use App\Enums\TransactionTypeEnum;
use App\Enums\TransRequestStatusEnum;
use App\Interfaces\ITransactionRepository;
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
                    'details' => json_encode($details),
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
                    'details' => json_encode($details),
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
        DB::transaction(function() use($attributes, $deposit) {
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
                        'details' => json_encode($details),
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
        DB::transaction(function() use($attributes, $withdraw) {
            $amount = $withdraw->amount;
            $user = $withdraw->user;
            $action = data_get($attributes, 'action');

            if ($action == '1' && $withdraw->request == 'WITHDRAW' && $withdraw->status == TransRequestStatusEnum::PENDING) {
                $user->wallet->balance -= $amount;
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
                        'details' => json_encode($details),
                        'status' => 'COMPLETED',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                );
            }
            
            $status =  $action == '1' ? TransRequestStatusEnum::COMPLETED : TransRequestStatusEnum::REJECTED;

            $withdraw->status = $status;
            $withdraw->save();

            return true;
        });
        return false;
    }

}

<?php

namespace App\Repositories;

use App\Enums\TransactionTypeEnum;
use App\Enums\TransRequestStatusEnum;
use App\Interfaces\IUserTransactionRepository;
use App\Models\Transaction;
use App\Models\TransactionRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserTransactionRepository implements IUserTransactionRepository
{
    public function __construct(
        protected Transaction $transaction, 
        protected TransactionRequest $transRequest
    )
    {
    }

    public function depositRequest(array $attributes)
    {
        return $this->transRequest->create([
            'user_id' => auth()->user()->id,
            'request' => 'DEPOSIT',
            'status' => TransRequestStatusEnum::PENDING,
            'details' => [
                'narration' => data_get($attributes, 'narration')
            ],
            'amount' => data_get($attributes, 'amount'),
        ]);
    }

    public function withdrawRequest(array $attributes)
    {
        return $this->transRequest->create([
            'user_id' => auth()->user()->id,
            'request' => 'WITHDRAW',
            'status' => TransRequestStatusEnum::PENDING,
            'details' => [
                'narration' => data_get($attributes, 'narration')
            ],
            'amount' => data_get($attributes, 'amount'),
        ]);
    }

    public function transfer(array $attributes)
    {
        $user = auth()->user();
        $amount = data_get($attributes, 'amount');

        if (validBalance($user, $amount)) {
            return DB::transaction(function() use($user, $amount, $attributes) {
                $user->wallet->balance -= $amount;
                $user->wallet->save();
                
                $recipient = User::where('email', data_get($attributes, 'email'))->first();
                $recipient->wallet->balance += $amount;
                $recipient->wallet->save();

                $detailsOut = [
                    'narration' => data_get($attributes, 'narration', ''), 
                    'type' => 'Transfer',
                    'recipient' => data_get($attributes, 'email')
                ];
                $detailsIn = [
                    'narration' => data_get($attributes, 'narration', ''), 
                    'type' => 'Transfer',
                    'sender' => $user->email
                ];

                $uuid = Str::uuid()->toString();
                Transaction::insert([
                    [
                        'uuid' => $uuid,
                        'user_id' => $user->id,
                        'type' => TransactionTypeEnum::DEBIT,
                        'amount' => $amount,
                        'details' => json_encode($detailsOut),
                        'status' => 'COMPLETED',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'uuid' => $uuid,
                        'user_id' => $recipient->id,
                        'type' => TransactionTypeEnum::CREDIT,
                        'amount' => $amount,
                        'details' => json_encode($detailsIn),
                        'status' => 'COMPLETED',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]);
            });
            return true;
        }
        return false;
    }

    
    public function fetchUserTransactions($userId)
    {
        $transactionCollection = $this->transaction->query()->where('user_id', $userId)->orderBy('id', 'DESC')->get();
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

    public function fetchUserTransactionsRequest($userId)
    {
        $transactionCollection = $this->transRequest->query()
        ->where('user_id', $userId)
        ->where('status', TransRequestStatusEnum::PENDING)
        ->orderBy('id', 'DESC')->get();
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

    public function fetchTransactionsTreatedRequest($userId)
    {
        $transactionCollection = $this->transRequest->query()->where('user_id', $userId)->whereNot('status', TransRequestStatusEnum::PENDING)->orderBy('id', 'DESC')->get();
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

}

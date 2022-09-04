<?php

namespace App\Repositories;

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
            'status' => 'PENDING',
            'details' => json_encode([]),
            'amount' => data_get($attributes, 'amount'),
        ]);
    }

    public function withdrawRequest(array $attributes)
    {
        return $this->transRequest->create([
            'user_id' => auth()->user()->id,
            'request' => 'WITHDRAW',
            'status' => 'PENDING',
            'details' => json_encode([]),
            'amount' => data_get($attributes, 'amount'),
        ]);
    }

    public function transfer(array $attributes)
    {
        $isValid = false;
        $user = auth()->user();
        $amount = data_get($attributes, 'amount');

        if ($this->validBalance($user, $amount)) {
            DB::transaction(function() use($user, $amount, $attributes) {
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
                        'type' => 'Debit',
                        'amount' => $amount,
                        'details' => json_encode($detailsOut),
                        'status' => 'COMPLETED',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'uuid' => $uuid,
                        'user_id' => $recipient->id,
                        'type' => 'Credit',
                        'amount' => $amount,
                        'details' => json_encode($detailsIn),
                        'status' => 'COMPLETED',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]);
            });
            $isValid = true;
        }
        return $isValid;
    }

    public function validBalance(User $user, $amount): bool
    {
        return $user->wallet->balance >= $amount;
    }

}

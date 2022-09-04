<?php

namespace App\Repositories;

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

    // public function depositRequest(array $attributes)
    // {
    //     return $this->transRequest->create([
    //         'user_id' => auth()->user()->id,
    //         'request' => 'DEPOSIT',
    //         'status' => 'PENDING',
    //         'details' => json_encode([]),
    //         'amount' => data_get($attributes, 'amount'),
    //     ]);
    // }

    // public function withdrawRequest(array $attributes)
    // {
    //     return $this->transRequest->create([
    //         'user_id' => auth()->user()->id,
    //         'request' => 'WITHDRAW',
    //         'status' => 'PENDING',
    //         'details' => json_encode([]),
    //         'amount' => data_get($attributes, 'amount'),
    //     ]);
    // }

    public function bonus(array $attributes)
    {
        DB::transaction(function() use($attributes) {
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
                    'type' => 'Credit',
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

}

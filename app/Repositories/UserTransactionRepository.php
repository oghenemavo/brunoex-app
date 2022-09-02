<?php

namespace App\Repositories;

use App\Interfaces\IUserTransactionRepository;
use App\Models\Transaction;
use App\Models\TransactionRequest;

class UserTransactionRepository implements IUserTransactionRepository
{
    public function __construct(protected Transaction $transaction, protected TransactionRequest $transRequest)
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

}

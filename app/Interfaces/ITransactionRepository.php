<?php

namespace App\Interfaces;

use App\Models\TransactionRequest;

interface ITransactionRepository
{
    public function bonus(array $body);
    public function penalty(array $body);
    public function validateDeposit(array $body, TransactionRequest $transaction);
    public function validateWithdraw(array $body, TransactionRequest $transaction);
}

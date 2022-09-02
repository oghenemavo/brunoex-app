<?php

namespace App\Interfaces;

interface IUserTransactionRepository
{
    public function depositRequest(array $body);
    public function withdrawRequest(array $body);
}

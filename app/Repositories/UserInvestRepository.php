<?php

namespace App\Repositories;

use App\Interfaces\IUserInvestRepository;
use App\Models\Investment;
use Carbon\Carbon;

class UserInvestRepository implements IUserInvestRepository
{
    public function __construct(protected Investment $investment)
    {
    }

    public function invest(array $attributes)
    {
        return $this->investment->create([
            'user_id' => auth()->user()->id,
            'transaction_id' => 1,
            'plan' => '10',
            'amount' => data_get($attributes, 'amount'),
            'profit' => '10.45',
            'details' => json_encode([]),
            'status' => 'PENDING',
            'due_at' => Carbon::now()->addDays(1),
        ]);
    }

}

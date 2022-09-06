<?php

namespace App\Repositories;

use App\Enums\TransactionTypeEnum;
use App\Interfaces\IUserInvestRepository;
use App\Models\Investment;
use App\Models\Plan;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserInvestRepository implements IUserInvestRepository
{
    public function __construct(protected Investment $investment)
    {
    }

    public function invest(array $attributes)
    {
        $amount = data_get($attributes, 'amount');
        $user = auth()->user();
        
        if (validBalance($user, $amount)) {
            return DB::transaction(function() use($attributes, $user, $amount) {
                // get plan
                $plan = Plan::find(data_get($attributes, 'plan'));
                $settings = [
                    'name' => $plan->name,
                    'profit_type' => $plan->meta->get('profit_type'),
                    'profit' => $plan->meta->get('profit'),
                    'duration_unit' => $plan->meta->get('duration_unit'),
                    'duration' => $plan->meta->get('duration'),
                ];

                // debit customer
                $user->wallet->balance -= $amount;
                $user->wallet->ledger_balance += $amount;

                // transaction log
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'type' => TransactionTypeEnum::DEBIT,
                    'amount' => $amount,
                    'details' => [
                        'narration' => 'Investment Transaction', 
                        'type' => 'Investment',
                    ],
                    'status' => 'COMPLETED',
                ]);
        
                // invest
                $this->investment->create([
                    'user_id' => auth()->user()->id,
                    'transaction_id' => $transaction->id,
                    'plan' => $settings,
                    'amount' => $amount,
                    'profit' => getProfit($settings['profit_type'], $settings['profit'], $amount),
                    'details' => $settings,
                    'status' => 'PENDING',
                    'due_at' => setDuration($settings['duration_unit'], $settings['duration']),
                ]);
                
                return true;
            });
        }
        return false;
    }

}

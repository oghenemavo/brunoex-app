<?php

use App\Enums\DurationUnitEnum;
use App\Enums\ProfitTypeEnum;
use App\Models\Investment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

if (! function_exists('orders')) {
    function orders()
    {
        return Investment::query()->where('status', 'PENDING')->sum('amount');
    }
}

if (! function_exists('profit7days')) {
    function profit7days()
    {
        return Investment::query()->where('status', 'COMPLETED')
        ->whereDate('due_at', Carbon::now()->subDays(7))->sum('profit');
    }
}

if (! function_exists('percentprofit7days')) {
    function percentprofit7days()
    {
        $days7 = Investment::query()->where('status', 'COMPLETED')
        ->whereDate('due_at', Carbon::now()->subDays(7))->sum('profit');

        $days14 = Investment::query()->where('status', 'COMPLETED')
        ->whereDate('due_at', Carbon::now()->subDays(14))->sum('profit');

        $p = 0;
        if ($days14 > 0) {
            $p = number_format((($days7-$days14/$days14) * 100), 2,'.');
        } else {
            $p = $days7-$days14;
        }

        return $p;
    }
}

if (! function_exists('profit')) {
    function profit($amount, $plan)
    {
        return $amount * $plan;
    }
}

if (! function_exists('validBalance')) {
    function validBalance(User $user, $amount)
    {
        return $user->wallet->balance >= $amount;
    }
}

if (! function_exists('setDurationName')) {
    function setDurationName($unit, $period)
    {
        $name = '';
        switch (DurationUnitEnum::tryFrom($unit)) {
            case DurationUnitEnum::DAILY:
                $word = 'day';
                $name .= $period > 1 ? Str::plural($word) : $word;
                break;

            case DurationUnitEnum::WEEKLY:
                $word = 'week';
                $name .= $period > 1 ? Str::plural($word) : $word;
                break;

            case DurationUnitEnum::MONTHLY:
                $word = 'month';
                $name .= $period > 1 ? Str::plural($word) : $word;
                break;

            case DurationUnitEnum::ANNUALLY:
                $word = 'year';
                $name .= $period > 1 ? Str::plural($word) : $word;
                break;
        }
        return $name;
    }
}

if (! function_exists('setDuration')) {
    function setDuration($unit, $period)
    {
        $duration = 0;
        switch (DurationUnitEnum::tryFrom($unit)) {
            case DurationUnitEnum::DAILY:
                $duration = Carbon::now()->addDays($period);
                break;

            case DurationUnitEnum::WEEKLY:
                $duration = Carbon::now()->addWeeks($period);
                break;

            case DurationUnitEnum::MONTHLY:
                $duration = Carbon::now()->addMonths($period);
                break;

            case DurationUnitEnum::ANNUALLY:
                $duration = Carbon::now()->addYears($period);
                break;
        }
        return $duration;
    }
}

if (! function_exists('getProfit')) {
    function getProfit($type, $value, $amount = null)
    {
        $profit = (float) 0;
        switch (ProfitTypeEnum::tryFrom($type)) {
            case ProfitTypeEnum::FIXED:
                $profit = $value;
                break;

            case ProfitTypeEnum::PERCENTAGE:
                $profit = ($value/100) * $amount;
                break;
        }
        return $profit;
    }
}
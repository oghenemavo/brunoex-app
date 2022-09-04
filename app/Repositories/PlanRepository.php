<?php

namespace App\Repositories;

use App\Interfaces\IPlanRepository;
use App\Models\Plan;

class PlanRepository implements IPlanRepository
{
    public function __construct(protected Plan $plan)
    {
    }

    public function createPlan(array $attributes)
    {
        $meta = [
            'profit_type' => data_get($attributes, 'profit_type'),
            'profit' => data_get($attributes, 'profit'),
            'min_deposit' => data_get($attributes, 'min_deposit'),
            'max_deposit' => data_get($attributes, 'max_deposit'),
            'duration_unit' => data_get($attributes, 'duration_unit'),
            'duration' => data_get($attributes, 'duration'),
            'description' => data_get($attributes, 'description'),
        ];

        return $this->plan->create([
            'user_id' => auth()->guard('admin')->user()->id,
            'name' => data_get($attributes, 'plan_name'),
            'meta' => json_encode($meta),
            'status' => 'active',
        ]);
    }

    public function updatePlan(array $attributes, Plan $plan)
    {
        $meta = [
            'profit_type' => data_get($attributes, 'profit_type'),
            'profit' => data_get($attributes, 'profit'),
            'min_deposit' => data_get($attributes, 'min_deposit'),
            'max_deposit' => data_get($attributes, 'max_deposit'),
            'duration_unit' => data_get($attributes, 'duration_unit'),
            'duration' => data_get($attributes, 'duration'),
            'description' => data_get($attributes, 'description'),
        ];

        return $plan->update([
            'user_id' => auth()->guard('admin')->user()->id,
            'name' => data_get($attributes, 'plan_name'),
            'meta' => json_encode($meta),
            'status' => 'active',
        ]);
    }

    public function deletePlan(Plan $plan)
    {
        return $plan->delete();
    }

}

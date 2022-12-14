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
        $options = [
            's1' => 'assets/images/icons/plan-s1.svg',
            's2' => 'assets/images/icons/plan-s2.svg',
            's3' => 'assets/images/icons/plan-s3.svg',
        ];

        $media = !empty(data_get($attributes, 'media')) ? $options[data_get($attributes, 'media')] : '';

        $meta = [
            'profit_type' => data_get($attributes, 'profit_type'),
            'profit' => data_get($attributes, 'profit'),
            'min_deposit' => data_get($attributes, 'min_deposit'),
            'max_deposit' => data_get($attributes, 'max_deposit'),
            'duration_unit' => data_get($attributes, 'duration_unit'),
            'duration' => data_get($attributes, 'duration'),
            'media' => $media,
            'recommended' => data_get($attributes, 'recommended'),
            'description' => data_get($attributes, 'description'),
        ];

        return $this->plan->create([
            'user_id' => auth()->guard('admin')->user()->id,
            'name' => data_get($attributes, 'plan_name'),
            'meta' => $meta,
            'status' => 'active',
        ]);
    }

    public function updatePlan(array $attributes, Plan $plan)
    {
        $options = [
            's1' => 'assets/images/icons/plan-s1.svg',
            's2' => 'assets/images/icons/plan-s2.svg',
            's3' => 'assets/images/icons/plan-s3.svg',
        ];

        $media = !empty(data_get($attributes, 'media')) ? $options[data_get($attributes, 'media', $plan->meta->get('media'))] : '';

        $meta = [
            'profit_type' => data_get($attributes, 'profit_type', $plan->meta->get('profit_type')),
            'profit' => data_get($attributes, 'profit', $plan->meta->get('profit')),
            'min_deposit' => data_get($attributes, 'min_deposit', $plan->meta->get('min_deposit')),
            'max_deposit' => data_get($attributes, 'max_deposit', $plan->meta->get('max_deposit')),
            'duration_unit' => data_get($attributes, 'duration_unit', $plan->meta->get('duration_unit')),
            'duration' => data_get($attributes, 'duration', $plan->meta->get('duration')),
            'media' => $media,
            'recommended' => data_get($attributes, 'recommended', $plan->meta->get('recommended')),
            'description' => data_get($attributes, 'description', $plan->meta->get('description')),
        ];

        return $plan->update([
            'user_id' => auth()->guard('admin')->user()->id,
            'name' => data_get($attributes, 'plan_name', $plan->name),
            'meta' => json_encode($meta),
            'status' => 'active',
        ]);
    }

    public function deletePlan(Plan $plan)
    {
        return $plan->delete();
    }

}

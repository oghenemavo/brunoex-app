<?php

namespace App\Interfaces;

use App\Models\Plan;
use App\Models\User;

interface IPlanRepository
{
    public function createPlan(array $attributes);
    public function updatePlan(array $attributes, Plan $plan);
    public function deletePlan(Plan $plan);
}

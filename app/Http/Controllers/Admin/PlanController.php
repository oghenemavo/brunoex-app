<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use App\Repositories\PlanRepository;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct(protected PlanRepository $planRepository)
    {

    }
    
    public function index()
    {
        return view('admin.settings.plan');
    }
    
    public function create(PlanRequest $request)
    {
        return view('admin.settings.plan');
    }

    public function store(PlanRequest $request)
    {
        $data = $request->validated();
        $this->planRepository->createPlan($data);
        if ($this->planRepository->createPlan($data)) {
            return response()->json(['status' => true, 'message' => 'Plan Created Successfully']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to Create Plan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     */
    public function show(Plan $plan)
    {
        return view('admin.settings.plan', ['plan' => $plan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     */
    public function edit(Plan $plan)
    {
        return view('admin.settings.plans-edit', ['plan' => $plan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(PlanRequest $request, Plan $plan)
    {
        $data = $request->validated();
        if ($this->planRepository->updatePlan($data, $plan)) {
            return response()->json(['status' => true, 'message' => 'Plan updated Successfully']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to updated Plan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     */
    public function destroy(Plan $plan)
    {
        if ($this->planRepository->deletePlan($plan)) {
            return response()->json(['status' => true, 'message' => 'Plan deleted Successfully']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to delete Plan']);
    }
}

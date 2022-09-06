<x-layouts.dashboard.user>
        
    <x-slot name="header">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Investment Plans</h3>
                <div class="nk-block-des text-soft">
                    <p>A full overview of our investment plans.</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="nk-block">
        <div class="row g-gs">
            @foreach($plans as $plan)
                <div class="col-md-4 col-xxl-3">
                    <div class="card card-bordered pricing recommend">
                        @if($plan->meta->get('recommended'))
                            <span class="pricing-badge badge bg-primary">Recommend</span>
                        @endif

                        <div class="pricing-head">
                            @if($plan->meta->get('media'))
                                <div class="pricing-media">
                                    <img src="{{ asset($plan->meta->get('media')) }}" alt="">
                                </div>
                            @endif
                            <div class="pricing-title">
                                <h4 class="card-title title">{{ ucfirst($plan->name) }}</h4>
                                <p class="sub-text">{{ $plan->description }}</p>
                            </div>
                            <div class="card-text">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="h4 fw-500">{{ $plan->meta->get('profit') }}{{ $plan->meta->get('profit_type') ? '%' : ' USD' }}</span>
                                        <span class="sub-text">Interest</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="h4 fw-500">{{ $plan->meta->get('duration') }}</span>
                                        <span class="sub-text">{{ ucfirst(substr($plan->meta->get('duration_unit'), 0, -2)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="pricing-features">
                                <li><span class="w-50">Min Deposit</span> - <span class="ms-auto">${{ $plan->meta->get('min_deposit') }}</span></li>
                                <li><span class="w-50">Max Deposit</span> - <span class="ms-auto">${{ $plan->meta->get('max_deposit') }}</span></li>
                                <li><span class="w-50">Deposit Return</span> - <span class="ms-auto">Yes</span></li>
                                <!-- <li><span class="w-50">Total Return</span> - <span class="ms-auto">300%</span></li> -->
                            </ul>
                            <div class="pricing-action">
                                <button class="btn btn-outline-light">Choose this plan</button>
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
            @endforeach

        </div>
    </div><!-- .nk-block -->

</x-layouts.dashboard.user>

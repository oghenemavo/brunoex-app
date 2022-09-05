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

            <div class="col-md-4 col-xxl-3">
                <div class="card card-bordered pricing recommend">
                    <span class="pricing-badge badge bg-primary">Recommend</span>
                    <div class="pricing-head">
                        <div class="pricing-media">
                            <img src="{{ asset('assets/images/icons/plan-s1.svg') }}" alt="">
                        </div>
                        <div class="pricing-title">
                            <h4 class="card-title title">Dimond</h4>
                            <p class="sub-text">Advance level of invest &amp; earn.</p>
                        </div>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-6">
                                    <span class="h4 fw-500">14.29%</span>
                                    <span class="sub-text">Daily Interest</span>
                                </div>
                                <div class="col-6">
                                    <span class="h4 fw-500">14</span>
                                    <span class="sub-text">Term Days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-body">
                        <ul class="pricing-features">
                            <li><span class="w-50">Min Deposit</span> - <span class="ms-auto">$5,000</span></li>
                            <li><span class="w-50">Max Deposit</span> - <span class="ms-auto">$20,000</span></li>
                            <li><span class="w-50">Deposit Return</span> - <span class="ms-auto">Yes</span></li>
                            <li><span class="w-50">Total Return</span> - <span class="ms-auto">300%</span></li>
                        </ul>
                        <div class="pricing-action">
                            <button class="btn btn-outline-light">Choose this plan</button>
                        </div>
                    </div>
                </div>
            </div><!-- .col -->

        </div>
    </div><!-- .nk-block -->

</x-layouts.dashboard.user>

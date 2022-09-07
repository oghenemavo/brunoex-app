<x-layouts.dashboard.user>

    <x-slot name="header">
        <div class="nk-block-head-sub"><span>Welcome!</span>
        </div>
        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h2 class="nk-block-title fw-normal">{{ auth()->user()->name }}</h2>
                <div class="nk-block-des">
                    <p>At a glance summary of your account. Have fun!</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <ul class="nk-block-tools gx-3">
                    <li><a href="#" class="btn btn-primary"><span>Deposit</span> <em class="icon ni ni-arrow-long-right"></em></a></li>
                    <li><a href="#" class="btn btn-white btn-light"><span>Buy / Sell</span> <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></a></li>
                    
                </ul>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </x-slot>

    <div class="nk-block">
        <div class="row gy-gs">
            <div class="col-lg-5 col-xl-4">
                <div class="nk-block">
                    <div class="nk-block-head-xs">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title title">Overview</h5>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered text-light is-dark h-100">
                            



                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div><!-- .nk-block -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .nk-block -->
    
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="nk-refwg">
                <div class="nk-refwg-invite card-inner">
                    <div class="nk-refwg-head g-3">
                        <div class="nk-refwg-title">
                            <h5 class="title">Refer Us & Earn</h5>
                            <div class="title-sub">Use the bellow link to invite your friends.</div>
                        </div>
                        <div class="nk-refwg-action">
                            <a href="#" class="btn btn-primary">Invite</a>
                        </div>
                    </div>
                    <div class="nk-refwg-url">
                        <div class="form-control-wrap">
                            <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span></div>
                            <div class="form-icon">
                                <em class="icon ni ni-link-alt"></em>
                            </div>
                            <input type="text" class="form-control copy-text" id="refUrl" value="https://dashlite.net/?ref=4945KD48">
                        </div>
                    </div>
                </div><!-- .nk-refwg-invite -->
                <div class="nk-refwg-stats card-inner bg-lighter">
                    <div class="nk-refwg-group g-3">
                        <div class="nk-refwg-name">
                            <h6 class="title">My Referral <em class="icon ni ni-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Referral Informations"></em></h6>
                        </div>
                        <div class="nk-refwg-info g-3">
                            <div class="nk-refwg-sub">
                                <div class="title">394</div>
                                <div class="sub-text">Total Joined</div>
                            </div>
                            <div class="nk-refwg-sub">
                                <div class="title">548.49</div>
                                <div class="sub-text">Referral Earn</div>
                            </div>
                        </div>
                        <div class="nk-refwg-more dropdown mt-n1 me-n1">
                            <a href="#" class="btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                <ul class="link-list-plain sm">
                                    <li><a href="#">7 days</a></li>
                                    <li><a href="#">15 Days</a></li>
                                    <li><a href="#">30 Days</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="nk-refwg-ck">
                        <canvas class="chart-refer-stats" id="refBarChart"></canvas>
                    </div>
                </div><!-- .nk-refwg-stats -->
            </div><!-- .nk-refwg -->
        </div><!-- .card -->
    </div><!-- .nk-block -->


    @push('scripts')
        <script src="{{ asset('assets/js/charts/chart-crypto.js?ver=3.0.3') }}"></script>
    @endpush

</x-layouts.dashboard.user>
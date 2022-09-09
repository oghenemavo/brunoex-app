<x-layouts.dashboard.admin>
    
    <x-slot name="header">
        <h3 class="nk-block-title page-title">KYCs / <strong class="text-primary small">{{ $user->name }}</strong></h3>
        <div class="nk-block-des text-soft">
            <ul class="list-inline">
                <li>Application ID: <span class="text-base">{{ md5($user->uuid) }}</span></li>
                <li>Submited At: <span class="text-base">18 Dec, 2019 01:02 PM</span></li>
            </ul>
        </div>
    </x-slot>

    <div class="nk-block">
        <div class="row gy-5">
            <div class="col-lg-5">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title title">Application Info</h5>
                        <p>Submission date, approve date, status etc.</p>
                    </div>
                </div><!-- .nk-block-head -->

                <div class="card card-bordered">
                    <ul class="data-list is-compact">
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Submitted By</div>
                                <div class="data-value">UD01489</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Submitted At</div>
                                <div class="data-value">18 Dec, 2019 01:02 PM</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Status</div>
                                <div class="data-value"><span class="badge badge-dim badge-sm bg-outline-success">Approved</span></div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Last Checked</div>
                                <div class="data-value">
                                    <div class="user-card">
                                        <div class="user-avatar user-avatar-xs bg-orange-dim">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-name">
                                            <span class="tb-lead">Saiful Islam</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Last Checked At</div>
                                <div class="data-value">19 Dec, 2019 05:26 AM</div>
                            </div>
                        </li>
                    </ul>
                </div><!-- .card -->

                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title title">Uploaded Documents</h5>
                        <p>Here is user uploaded documents.</p>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="card card-bordered">
                    <ul class="data-list is-compact">
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Document Type</div>
                                <div class="data-value">{{ $user->kyc->get('document_type') }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Front Side</div>
                                <div class="data-value"><a href="{{ asset($user->kyc->get('document_front')) }}" download="front" class="download">{{ $user->kyc->get('document_type') }}</a></div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Back Side</div>
                                <div class="data-value"><a href="{{ asset($user->kyc->get('document_back')) }}" download="back">{{ $user->kyc->get('document_type') }}</a></div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Proof/Selfie</div>
                                <div class="data-value"><a href="{{ asset($user->kyc->get('selfie')) }}" download="selfie">Selfie</a></div>
                            </div>
                        </li>
                    </ul>
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-lg-7">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title title">Applicant Information</h5>
                        <p>Basic info, like name, phone, address, country etc.</p>
                    </div>
                </div>
                <div class="card card-bordered">
                    <ul class="data-list is-compact">
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">First Name</div>
                                <div class="data-value">{{ $user->kyc->get('first_name') }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Last Name</div>
                                <div class="data-value">{{ $user->kyc->get('last_name') }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Email Address</div>
                                <div class="data-value">{{ $user->kyc->get('email') }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Phone Number</div>
                                <div class="data-value text-soft">{{ $user->kyc->get('phone') }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Date of Birth</div>
                                <div class="data-value">{{ date('d M, Y', strtotime($user->kyc->get('dob')) ) }}</div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Full Address</div>
                                <div class="data-value">
                                    {{ $user->kyc->get('address') }}, 
                                    {{ $user->kyc->get('city') }}, 
                                    {{ $user->kyc->get('state') }}
                                </div>
                            </div>
                        </li>
                        <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Country of Residence</div>
                                <div class="data-value">{{ $user->kyc->get('nationality') }}</div>
                            </div>
                        </li>
                        <!-- <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Full Address</div>
                                <div class="data-value">6516, Eldoret, Uasin Gishu, 30100</div>
                            </div>
                        </li> -->
                        <!-- <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Wallet Type</div>
                                <div class="data-value">Bitcoin</div>
                            </div>
                        </li> -->
                        <!-- <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Wallet Address</div>
                                <div class="data-value text-break">1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX</div>
                            </div>
                        </li> -->
                        <!-- <li class="data-item">
                            <div class="data-col">
                                <div class="data-label">Telegram</div>
                                <div class="data-value">
                                    <span>@tokenlite</span> <a href="https://t.me/tokenlite" target="_blank"><em class="icon ni ni-telegram"></em></a>
                                </div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .nk-block -->


    @push('scripts')
    <script>
        $(function() {
            $('.download').click(function() {
                // console.log(this)
                const file = $(this).attr('data-file');
                $.ajax({
                    url: `{{ route('admin.dl.kyc') }}`,
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        '_token': `{{ csrf_token() }}`,
                        file 
                    },
                    success: function() {

                    }
                });
            });
        });
    </script>
    @endpush
</x-layouts.dashboard.admin>
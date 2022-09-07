<x-layouts.dashboard.admin>
    
    <x-slot name="header">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">My Profile</h3>
            <div class="nk-block-des">
                <p>Here is your basic info, personalized settings etc.</p>
            </div>
        </div>
    </x-slot>

    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-aside-wrap">
                <div class="card-content">
                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.profile') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.profile.settings') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Setting</span></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.profile') }}"><em class="icon ni ni-activity-round-fill"></em><span>Activity</span></a>
                        </li> -->
                        <li class="nav-item nav-item-trigger d-xxl-none">
                            <a class="btn btn-icon btn-trigger" data-toggle="modal" data-target="#profile-edit"><em class="icon ni ni-edit-fill"></em></a>
                        </li>
                    </ul>
                    <div class="card-inner card-inner-lg">
                        <div class="nk-block-head">
                            <h4 class="nk-block-title">Personal Information</h4>
                            <div class="nk-block-des">
                                <p>Basic info, like your name and address.</p>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="nk-data data-list data-list-s2 mt-n4">
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Full Name</span>
                                        <span class="data-value">{{ $user->name }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Display Name</span>
                                        <span class="data-value">{{ $user->name }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Email</span>
                                        <span class="data-value">{{ $user->email }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Phone Number</span>
                                        <span class="data-value  text-soft ">Not add yet</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                            </div>
                            <div class="divider mt-2"></div>
                            <h6 class="overline-title-alt mb-2">Additional</h6>
                            <div class="row g-3">
                                <div class="col-6 col-md-3">
                                    <span class="sub-text">User ID:</span>
                                    <span>{{ $user->id }}</span>
                                </div>
                                <div class="col-6 col-md-3">
                                    <span class="sub-text">Last Login:</span>
                                    <span>7 September 2022</span>
                                </div>
                                <div class="col-6 col-md-3">
                                    <span class="sub-text">Registered At:</span>
                                    <span>{{ date('d M, Y', strtotime($user->created_at)) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-aside card-aside-left user-aside d-none d-lg-block">
                    <div class="card-inner-group" data-simplebar>
                        <div class="card-inner">
                            <div class="user-card user-card-s2">
                                <div class="user-avatar bg-gray xl"><span>{{ strtoupper(substr($user->name, 0,2)) }}</span></div>
                                <div class="user-info">
                                    <div class="badge rounded-pill bg-outline-primary">admin Account</div>
                                    <h5>Gary</h5>
                                    <span class="sub-text">{{ $user->email }}</span>
                                </div>
                                <div class="user-actions pt-3">
                                    <ul class="btn-group is-multi g-2">
                                        <li>
                                            <a data-bs-toggle="modal" data-bs-target="#profile-edit" class="btn btn-outline-light btn-white"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner p-0">
                            <ul class="link-list-menu nav nav-tabs">
                                <li><a class="active" href="{{ route('admin.profile') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                <li><a class="" href="{{ route('admin.profile.settings') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Setting</span></a></li>
                                <li><a class="" href="{{ route('admin.profile') }}"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- @@ Profile Edit Modal @e -->
    <div class="modal fade" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Update Profile</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-target="tab" href="#personal">Personal</a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <form id="kyc-profile" action="{{ route('admin.kyc.profile') }}" method="POST">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Full Name</label>
                                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $user->name }}" placeholder="Enter Full name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button class="btn btn-lg btn-primary">Update Profile</button>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
    <!-- @@ Profile Edit Modal @e -->



    @push('scripts')
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script>
        $('#kyc-profile').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                },
            },
            submitHandler: function(form) {
                $('span.invalid-feedack').remove();
                $(form).find('button').attr('disabled', true);
                $(form).ajaxSubmit(ajaxProfileOptions);
            }
        });

        const ajaxProfileOptions = {
            type: 'PUT',
            url: $(this).prop('action'),
            data: $(this).serialize(),
            dataType: 'json',
            clearForm: null,
            success: function(response) {
                if (response.hasOwnProperty('status') && response.status) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    });

                    $('#profile-edit').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    })
                }

                $('#kyc-profile').find('button').attr('disabled', false)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.status)
                console.log(XMLHttpRequest.statusText)
                console.log(errorThrown)

                let errors = XMLHttpRequest.responseJSON.errors;
                // if (errors.hasOwnProperty('email')) {
                //     $(`<span class="invalid-feedback" role="alert">${errors.email[0]}</span>`).insertAfter('#email')
                // }
                    
                // if (errors.hasOwnProperty('current')) {
                //     $(`<span class="invalid-feedback" role="alert">${errors.current[0]}</span>`).insertAfter('#current')
                // } 
        
                $('#kyc-profile').find('button').attr('disabled', false);
        
                // display toast alert
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Unable to process request now.',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        };
    </script>
    @endpush

</x-layouts.dashboard.admin>
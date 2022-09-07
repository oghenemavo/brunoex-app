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
                            <h4 class="nk-block-title">Security Setting</h4>
                            <div class="nk-block-des">
                                <p>These settings are helps you keep your account secure.</p>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="card-inner-group mt-n3">
                                <!-- <div class="card-inner px-0">
                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                        <div class="nk-block-text">
                                            <h6>Save my Activity Logs</h6>
                                            <p>Save your all <a href="https://brunoex.com/public/admin/profile/activity" class="link link-primary">activity logs</a> including unusual activity detected.</p>
                                        </div>
                                        <div class="nk-block-actions">
                                            <ul class="align-center gx-3">
                                                <li class="order-md-last">
                                                    <div class="custom-control custom-switch mr-n2">
                                                        <input type="checkbox" name="activity_log" class="custom-control-input qup-profile" checked id="activity-log" data-key="setting">
                                                        <label class="custom-control-label" for="activity-log"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="card-inner px-0">
                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                        <div class="nk-block-text">
                                            <h6>Change Email Address</h6>
                                            <p>Update your current email address to new email address.</p>
                                        </div>
                                        <div class="nk-block-actions">
                                            <div class="nk-block-actions">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#change-email-modal" class="btn btn-sm btn-primary" id="email-modal-tgl">Change Email</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner px-0">
                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                    <div class="nk-block-text">
                                        <h6>Change Password</h6>
                                        <p>Set a unique password to protect your account.</p>
                                    </div>
                                    <div class="nk-block-actions flex-shrink-sm-0">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                <li class="order-md-last">
                                                    <a href="javascript:void(0)" id="settings-change-password" data-bs-toggle="modal" data-bs-target="#change-password-modal" class="btn btn-sm btn-primary">Change Password</a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
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
                                <li><a class="" href="{{ route('admin.profile') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                <li><a class="active" href="{{ route('admin.profile.settings') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Setting</span></a></li>
                                <li><a class="" href="{{ route('admin.profile') }}"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- change password modal -->
    <div class="modal fade" role="dialog" id="change-password-modal">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Change Password</h5>

                    <form action="{{ route('admin.change.password') }}" method="POST" class="mt-4" id="change-password-form">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="form-label" for="current">Current Password  <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="password" name="current" class="form-control form-control-lg" id="current" placeholder="Enter Current Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">New Password <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter New password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation" placeholder="Retype new password">
                            </div>
                        </div>
                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                            <li>
                                <button id="update-password" class="btn btn-primary">Update Password</button>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-dismiss="modal" class="link link-light">Cancel</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- change password modal -->

    <!-- change Email modal -->
    <div class="modal fade" role="dialog" id="change-email-modal">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Change Email</h5>

                    <form action="{{ route('admin.change.email') }}" method="POST" class="mt-4" id="change-email-form">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="form-label" for="email">New Email <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Enter New Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="current">Current Password <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="password" name="current" class="form-control form-control-lg" id="current" placeholder="Enter Current Password">
                            </div>
                        </div>

                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                            <li>
                                <button id="update-password" class="btn btn-primary">Update Email</button>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-dismiss="modal" class="link link-light">Cancel</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- change Email modal -->

    @push('scripts')
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script>
        $('#change-email-form').validate({
            rules: {
                current: {
                    required: true,
                    minlength: 6,
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            submitHandler: function(form) {
                $('span.invalid-feedack').remove();
                $(form).find('button').attr('disabled', true);
                $(form).ajaxSubmit(ajaxEmailOptions);
            }
        });

        const ajaxEmailOptions = {
            type: 'PUT',
            url: $(this).prop('action'),
            data: $(this).serialize(),
            dataType: 'json',
            clearForm: true,
            success: function(response) {
                if (response.hasOwnProperty('status') && response.status) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    });

                    $('#change-email-modal').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    })
                }

                $('#change-email-form').find('button').attr('disabled', false)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.status)
                console.log(XMLHttpRequest.statusText)
                console.log(errorThrown)

                let errors = XMLHttpRequest.responseJSON.errors;
                if (errors.hasOwnProperty('email')) {
                    $(`<span class="invalid-feedback" role="alert">${errors.email[0]}</span>`).insertAfter('#email')
                }
                    
                if (errors.hasOwnProperty('current')) {
                    $(`<span class="invalid-feedback" role="alert">${errors.current[0]}</span>`).insertAfter('#current')
                } 
        
                $('#change-email-form').find('button').attr('disabled', false);
        
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

        $('#change-password-form').validate({
            rules: {
                current: {
                    required: true,
                    minlength: 6,
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
            },
            submitHandler: function(form) {
                $('span.invalid-feedack').remove();
                $(form).find('button').attr('disabled', true);
                $(form).ajaxSubmit(ajaxOptions);
            }
        });

        const ajaxOptions = {
            type: 'PUT',
            url: $(this).prop('action'),
            data: $(this).serialize(),
            dataType: 'json',
            clearForm: true,
            success: function(response) {
                if (response.hasOwnProperty('status') && response.status) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    });

                    $('#change-password-modal').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    })
                }

                $('#change-password-form').find('button').attr('disabled', false)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.status)
                console.log(XMLHttpRequest.statusText)
                console.log(errorThrown)

                let errors = XMLHttpRequest.responseJSON.errors;
                if (errors.hasOwnProperty('password')) {
                    $(`<span class="invalid-feedback" role="alert">${errors.password[0]}</span>`).insertAfter('#password')
                }
                    
                if (errors.hasOwnProperty('current')) {
                    $(`<span class="invalid-feedback" role="alert">${errors.current[0]}</span>`).insertAfter('#current')
                } 

                if (errors.hasOwnProperty('password_confirmation')) {
                    $(`<span class="invalid-feedback" role="alert">${errors.password_confirmation[0]}</span>`).insertAfter('#password_confirmation')
                } 
        
                $('#change-password-form').find('button').attr('disabled', false);
        
                // display toast alert
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
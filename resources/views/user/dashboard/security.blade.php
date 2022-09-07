<x-layouts.dashboard.user>

    <x-slot name="header">
        <div class="nk-block-head-content">
            <div class="nk-block-head-sub"><span>Account Setting</span></div>
            <h2 class="nk-block-title fw-normal">My Profile</h2>
            <div class="nk-block-des">
                <p>You have full control to manage your own account setting. <span class="text-primary"><em class="icon ni ni-info"></em></span></p>
            </div>
        </div>
    </x-slot>

    <ul class="nk-nav nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="html/crypto/profile.html">Personal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="html/crypto/profile-security.html">Security</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="html/crypto/profile-notification.html">Notifications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="html/crypto/profile-connected.html">Connect Social</a>
        </li>
    </ul><!-- .nk-menu -->
    <div class="nk-block">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Security Settings</h5>
                <div class="nk-block-des">
                    <p>These settings are helps you keep your account secure.</p>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="card card-bordered">
            <div class="card-inner-group">
                <div class="card-inner">
                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                        <div class="nk-block-text">
                            <h6>Save my Activity Logs</h6>
                            <p>You can save your all activity logs including unusual activity detected.</p>
                        </div>
                        <div class="nk-block-actions">
                            <ul class="align-center gx-3">
                                <li class="order-md-last d-inline-flex">
                                    <div class="custom-control custom-switch me-n2">
                                        <input type="checkbox" class="custom-control-input" id="activity-log">
                                        <label class="custom-control-label" for="activity-log"></label>
                                    </div>
                                </li>
                                <li>
                                    <a href="#recent-activity" class="link link-sm link-primary">See Recent Activity</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .card-inner -->
                <div class="card-inner">
                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                        <div class="nk-block-text">
                            <h6>Security Pin Code</h6>
                            <p>You can set your pin code, we will ask you on your withdraw and transfer funds.</p>
                        </div>
                        <div class="nk-block-actions">
                            <div class="custom-control custom-switch me-n2">
                                <input type="checkbox" class="custom-control-input" id="security-pin">
                                <label class="custom-control-label" for="security-pin"></label>
                            </div>
                        </div>
                    </div>
                </div><!-- .card-inner -->
                <div class="card-inner">
                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                        <div class="nk-block-text">
                            <h6>Change Email</h6>
                            <p>Change your email address.</p>
                        </div>
                        <div class="nk-block-actions flex-shrink-sm-0">
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                <li class="order-md-last">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#change-email-modal" class="btn btn-primary">Change Email</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .card-inner -->
                <div class="card-inner">
                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                        <div class="nk-block-text">
                            <h6>Change Password</h6>
                            <p>Set a unique password to protect your account.</p>
                        </div>
                        <div class="nk-block-actions flex-shrink-sm-0">
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                <li class="order-md-last">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#change-password-modal" class="btn btn-primary">Change Password</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .card-inner -->
                <div class="card-inner">
                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                        <div class="nk-block-text">
                            <h6>2FA Authentication <span class="badge bg-success">Enabled</span></h6>
                            <p>Secure your account with 2FA security. When it is activated you will need to enter not only your password, but also a special code using app. You can receive this code by in mobile app. </p>
                        </div>
                        <div class="nk-block-actions">
                            <a href="#" class="btn btn-primary">Disable</a>
                        </div>
                    </div>
                </div><!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-head-content">
                <div class="nk-block-title-group">
                    <h6 class="nk-block-title title">Recent Activity</h6>
                    <a href="html/crypto/profile-activity.html" class="link">See full log</a>
                </div>
                <div class="nk-block-des">
                    <p>This information about the last login activity on your account.</p>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="card card-bordered">
            <table class="table table-ulogs">
                <thead class="table-light">
                    <tr>
                        <th class="tb-col-os"><span class="overline-title">Browser <span class="d-sm-none">/ IP</span></span></th>
                        <th class="tb-col-ip"><span class="overline-title">IP</span></th>
                        <th class="tb-col-time"><span class="overline-title">Time</span></th>
                        <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tb-col-os">Chrome on Window</td>
                        <td class="tb-col-ip"><span class="sub-text">192.149.122.128</span></td>
                        <td class="tb-col-time"><span class="sub-text">11:34 PM</span></td>
                        <td class="tb-col-action"></td>
                    </tr>
                    <tr>
                        <td class="tb-col-os">Mozilla on Window</td>
                        <td class="tb-col-ip"><span class="sub-text">86.188.154.225</span></td>
                        <td class="tb-col-time"><span class="sub-text">Nov 20, 2019 <span class="d-none d-sm-inline-block">10:34 PM</span></span></td>
                        <td class="tb-col-action"><a href="#" class="link-cross me-sm-n1"><em class="icon ni ni-cross"></em></a></td>
                    </tr>
                    <tr>
                        <td class="tb-col-os">Chrome on iMac</td>
                        <td class="tb-col-ip"><span class="sub-text">192.149.122.128</span></td>
                        <td class="tb-col-time"><span class="sub-text">Nov 12, 2019 <span class="d-none d-sm-inline-block">08:56 PM</span></span></td>
                        <td class="tb-col-action"><a href="#" class="link-cross me-sm-n1"><em class="icon ni ni-cross"></em></a></td>
                    </tr>
                </tbody>
            </table>
        </div><!-- .card -->
    </div><!-- .nk-block -->
                        

    <!-- change password modal -->
    <div class="modal fade" role="dialog" id="change-password-modal">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Change Password</h5>

                    <form action="{{ route('user.change.password') }}" method="POST" class="mt-4" id="change-password-form">
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

                    <form action="{{ route('user.change.email') }}" method="POST" class="mt-4" id="change-email-form">
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
</x-layouts.dashboard.user>
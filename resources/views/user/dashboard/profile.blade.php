<x-layouts.dashboard.user>

    <x-slot name="header">
        <div class="nk-block-head-content">
            <div class="nk-block-head-sub"><span>Account Setting</span></div>
            <h2 class="nk-block-title fw-normal">My Profile</h2>
            <div class="nk-block-des">
                <p>You have full control to manage your own account setting. 
                    <span class="text-primary">
                        <em class="icon ni ni-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right"></em>
                    </span>
                </p>
            </div>
        </div>
    </x-slot>

    <!-- NK-Block @s -->
    <div class="nk-block">
        <div class="alert alert-warning">
            <div class="alert-cta flex-wrap flex-md-nowrap">
                <div class="alert-text">
                    <p>Upgrade your account to unlock full feature and increase your limit of transaction amount.</p>
                </div>
                <ul class="alert-actions gx-3 mt-3 mb-1 my-md-0">
                    <li class="order-md-last">
                        <a href="#" class="btn btn-sm btn-warning">Upgrade</a>
                    </li>
                    <li>
                        <a href="#" class="link link-primary">Learn More</a>
                    </li>
                </ul>
            </div>
        </div><!-- .alert -->
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Personal Information</h5>
                <div class="nk-block-des">
                    <p>Basic info, like your name and address, that you use on Nio Platform.</p>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-data data-list">
            <div class="data-head">
                <h6 class="overline-title">Basics</h6>
            </div>
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Full Name</span>
                    <span class="data-value">{{ $user->name }}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- .data-item -->

            <!-- <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Display Name</span>
                    <span class="data-value">Ishtiyak</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div> -->

            <div class="data-item">
                <div class="data-col">
                    <span class="data-label">Email</span>
                    <span class="data-value">{{ $user->email }}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
            </div><!-- .data-item -->
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Phone Number</span>
                    <span class="data-value text-soft">{{ empty($user->kyc->get('phone')) ? 'Not added yet' : $user->kyc->get('phone') }}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- .data-item -->
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Date of Birth</span>
                    <span class="data-value">{{ empty($user->kyc->get('dob')) ? 'Not added yet' : date('d M, Y', strtotime($user->kyc->get('dob'))) }}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- .data-item -->
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit" data-tab-target="#address">
                <div class="data-col">
                    <span class="data-label">Address</span>
                    <span class="data-value">{{ empty($user->kyc->get('address')) ? 'Not added yet' : $user->kyc->get('address') }}</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- .data-item -->
        </div><!-- .nk-data -->
        <div class="nk-data data-list">
            <div class="data-head">
                <h6 class="overline-title">Preferences</h6>
            </div>
            <div class="data-item">
                <div class="data-col">
                    <span class="data-label">Language</span>
                    <span class="data-value">English (United State)</span>
                </div>
                <div class="data-col data-col-end"><a data-bs-toggle="modal" href="#profile-edit" class="link link-primary">Change Language</a></div>
            </div><!-- .data-item -->
            <div class="data-item">
                <div class="data-col">
                    <span class="data-label">Timezone</span>
                    <span class="data-value">Bangladesh (GMT +6)</span>
                </div>
                <div class="data-col data-col-end"><a data-bs-toggle="modal" href="#profile-edit" class="link link-primary">Change</a></div>
            </div><!-- .data-item -->
        </div><!-- .nk-data -->
    </div>
    <!-- NK-Block @e -->

    <!-- @@ Profile Edit Modal @e -->
    <div class="modal fade" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Update Profile</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personal">Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#address">Address</a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <form id="kyc-profile" action="{{ route('user.kyc.profile') }}" method="POST">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Full Name</label>
                                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $user->name }}" placeholder="Enter Full name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone">Phone Number</label>
                                            <input type="text" class="form-control form-control-lg" id="phone" name="phone" value="{{ $user->kyc->get('phone') }}" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="gender">Gender</label>
                                            <select name="gender" class="form-select" id="gender" name="" data-placeholder="Please select" data-ui="lg">
                                                <option value=""></option>
                                                <option value="male" @selected($user->kyc->get('gender') == "male")>Male</option>
                                                <option value="female" @selected($user->kyc->get('gender') == "female")>Female</option>
                                                <option value="other" @selected($user->kyc->get('gender') == "other")>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="dob">Date of Birth</label>
                                            <input type="text" class="form-control form-control-lg date-picker" id="dob" name="dob" value="{{ $user->kyc->get('dob') }}" placeholder="Enter your BirthDay">
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
                        <div class="tab-pane" id="address">
                            <form id="kyc-address" action="{{ route('user.kyc.address') }}" method="post">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="address">Address Line 1 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-lg" id="address" name="address" value="{{ $user->kyc->get('address') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="address_two">Address Line 2</label>
                                            <input type="text" class="form-control form-control-lg" id="address_two" name="address_two" value="{{ $user->kyc->get('address_two') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="city">City</label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="city" class="form-control form-control-lg" id="city" value="{{ $user->kyc->get('city') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="state">State / Province <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg" id="state" name="state" value="{{ $user->kyc->get('state') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="zip">Zip / Postal Code</label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="zip" class="form-control form-control-lg" id="zip" value="{{ $user->kyc->get('zip') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="country">Country <span class="small">(Residential)</span> <span class="text-danger">*</span></label>
                                                <select name="country" class="form-select" id="country" data-ui="lg" data-placeholder="Please select" data-search="on">
                                                    <option value=""></option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->name->common }}" @selected($country->name->common == $user->kyc->get('country'))>
                                                            {{ $country->name->common }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="nationality">Nationality <span class="small">(Citizenship)</span></label>
                                                <select name="nationality" class="form-select" id="nationality" data-ui="lg" data-search="on">
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->name->common }}" @selected($country->name->common == $user->kyc->get('country'))>{{ $country->name->common }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button class="btn btn-lg btn-info">Update Address</button>
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
        $(function() {
            $('#kyc-profile').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5,
                    },
                    phone: {
                        required: true,
                        minlength: 5,
                    },
                    dob: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                },
                submitHandler: function(form) {
                    $('.is-invalid').removeClass('is-invalid');
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
                    if (errors.hasOwnProperty('name')) {
                        const name = $('#name').addClass('is-invalid');
                        $(`<span class="invalid-feedback" role="alert">${errors.name[0]}</span>`).insertAfter(name);
                    } 
                        
                    if (errors.hasOwnProperty('phone')) {
                        const phone = $('#phone').addClass('is-invalid');
                        $(`<span class="invalid-feedback" role="alert">${errors.phone[0]}</span>`).insertAfter(phone);
                    } 
                        
                    if (errors.hasOwnProperty('dob')) {
                        const dob = $('#dob').addClass('is-invalid');
                        $(`<span class="invalid-feedback" role="alert">${errors.dob[0]}</span>`).insertAfter(dob);
                    } 
                        
                    if (errors.hasOwnProperty('gender')) {
                        const gender = $('#gender').addClass('is-invalid');
                        $(`<span class="invalid-feedback" role="alert">${errors.gender[0]}</span>`).insertAfter(gender);
                    } 
            
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
    
            $('#kyc-address').validate({
                rules: {
                    address: {
                        required: true,
                        minlength: 6,
                    },
                    country: {
                        required: true,
                    },
                    state: {
                        required: true,
                        minlength: 3,
                    },
                },
                submitHandler: function(form) {
                    $('.is-invalid').removeClass('is-invalid');
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
    
                        $('#change-password-modal').modal('hide');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                        })
                    }
    
                    $('#kyc-address').find('button').attr('disabled', false)
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.status)
                    console.log(XMLHttpRequest.statusText)
                    console.log(errorThrown)
    
                    let errors = XMLHttpRequest.responseJSON.errors;
                    console.log(errors)
                    if (errors.hasOwnProperty('address')) {
                        const address = $('#address').addClass('is-invalid');
                        $(`<span class="invalid-feedback" role="alert">${errors.address[0]}</span>`).insertAfter(address);
                    }  
                    if (errors.hasOwnProperty('country')) {
                        const country = $('#country').addClass('is-invalid');
                        $(`<span class="invalid-feedback" role="alert">${errors.country[0]}</span>`).insertAfter(country);
                    }  
                    if (errors.hasOwnProperty('state')) {
                        const state = $('#state').addClass('is-invalid');
                        $(`<span class="invalid-feedback" role="alert">${errors.state[0]}</span>`).insertAfter(state);
                    }  
            
                    $('#kyc-address').find('button').attr('disabled', false);
            
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

        });
    </script>
    @endpush
</x-layouts.dashboard.user>
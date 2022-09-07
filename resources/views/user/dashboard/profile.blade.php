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
                    <span class="data-value text-soft">Not add yet</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- .data-item -->
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Date of Birth</span>
                    <span class="data-value">29 Feb, 1986</span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- .data-item -->
            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit" data-tab-target="#address">
                <div class="data-col">
                    <span class="data-label">Address</span>
                    <span class="data-value">2337 Kildeer Drive,<br>Kentucky, Canada</span>
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
                    <span class="data-label">Date Format</span>
                    <span class="data-value">M d, YYYY</span>
                </div>
                <div class="data-col data-col-end"><a data-bs-toggle="modal" href="#profile-edit" class="link link-primary">Change</a></div>
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
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Full Name</label>
                                        <input type="text" class="form-control form-control-lg" id="full-name" value="Abu Bin Ishtiyak" placeholder="Enter Full name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">Display Name</label>
                                        <input type="text" class="form-control form-control-lg" id="display-name" value="Ishtiyak" placeholder="Enter display name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Phone Number</label>
                                        <input type="text" class="form-control form-control-lg" id="phone-no" value="+880" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">Date of Birth</label>
                                        <input type="text" class="form-control form-control-lg date-picker" id="birth-day" placeholder="Enter your BirthDay">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="latest-sale">
                                        <label class="custom-control-label" for="latest-sale">Use full name to display </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <a href="#" class="btn btn-lg btn-primary">Update Profile</a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->
                        <div class="tab-pane" id="address">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-l1">Address Line 1</label>
                                        <input type="text" class="form-control form-control-lg" id="address-l1" value="2337 Kildeer Drive">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-l2">Address Line 2</label>
                                        <input type="text" class="form-control form-control-lg" id="address-l2" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-st">State</label>
                                        <input type="text" class="form-control form-control-lg" id="address-st" value="Kentucky">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-county">Country</label>
                                        <select class="form-select js-select2" id="address-county" data-ui="lg">
                                            <option>Canada</option>
                                            <option>United State</option>
                                            <option>United Kindom</option>
                                            <option>Australia</option>
                                            <option>India</option>
                                            <option>Bangladesh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <a href="#" class="btn btn-lg btn-primary">Update Address</a>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
    <!-- @@ Profile Edit Modal @e -->
    

</x-layouts.dashboard.user>
<x-layouts.dashboard.admin>

    <x-slot name="header">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Sales Overview</h3>
                <div class="nk-block-des text-soft">
                    <p>Welcome to DashLite Dashboard Template.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><span>Last 30 Days</span></a></li>
                                            <li><a href="#"><span>Last 6 Months</span></a></li>
                                            <li><a href="#"><span>Last 1 Years</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </x-slot>

    <div class="nk-block">
        <div class="row g-gs">

            <div class="col-xxl-6">
                <div class="card card-bordered h-100">
                    <div class="card-inner">
                        <div class="card-title-group align-start gx-3 mb-3">
                            <div class="card-title">
                                <h6 class="title">Deposit Overview</h6>
                                <p>In 30 days Deposits. <a href="#">See Details</a></p>
                            </div>
                        </div>
                        <div class="nk-sale-data-group align-center justify-between gy-3 gx-5">
                            <div class="nk-sale-data">
                                <span class="amount">$82,944.60</span>
                            </div>
                            <div class="nk-sale-data">
                                <span class="amount sm">1,937 <small>Users</small></span>
                            </div>
                        </div>
                        <div class="nk-sales-ck large pt-4">
                            <canvas class="sales-overview-chart" id="salesOverview"></canvas>
                        </div>
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->

            <div class="col-xxl-8">
                <div class="card card-bordered card-full">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title"><span class="me-2">Transaction</span> <a href="#" class="link d-none d-sm-inline">See History</a></h6>
                            </div>
                            <div class="card-tools">
                                <ul class="card-tools-nav">
                                    <li><a href="#"><span>Paid</span></a></li>
                                    <li><a href="#"><span>Pending</span></a></li>
                                    <li class="active"><a href="#"><span>All</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner p-0 border-top">
                        <div class="nk-tb-list nk-tb-orders">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col"><span>Order No.</span></div>
                                <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                                <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                <div class="nk-tb-col tb-col-lg"><span>Ref</span></div>
                                <div class="nk-tb-col"><span>Amount</span></div>
                                <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                                <div class="nk-tb-col"><span>&nbsp;</span></div>
                            </div>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <span class="tb-lead"><a href="#">#95954</a></span>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <div class="user-card">
                                        <div class="user-avatar user-avatar-sm bg-purple">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-name">
                                            <span class="tb-lead">Abu Bin Ishtiyak</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub">02/11/2020</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-sub text-primary">SUB-2309232</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount">4,596.75 <span>USD</span></span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="badge badge-dot badge-dot-xs bg-success">Paid</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-action">
                                    <div class="dropdown">
                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            <ul class="link-list-plain">
                                                <li><a href="#">View</a></li>
                                                <li><a href="#">Invoice</a></li>
                                                <li><a href="#">Print</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <span class="tb-lead"><a href="#">#95850</a></span>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <div class="user-card">
                                        <div class="user-avatar user-avatar-sm bg-azure">
                                            <span>DE</span>
                                        </div>
                                        <div class="user-name">
                                            <span class="tb-lead">Desiree Edwards</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub">02/02/2020</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-sub text-primary">SUB-2309154</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount">596.75 <span>USD</span></span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="badge badge-dot badge-dot-xs bg-danger">Canceled</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-action">
                                    <div class="dropdown">
                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            <ul class="link-list-plain">
                                                <li><a href="#">View</a></li>
                                                <li><a href="#">Remove</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <span class="tb-lead"><a href="#">#95812</a></span>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <div class="user-card">
                                        <div class="user-avatar user-avatar-sm bg-warning">
                                            <img src="./images/avatar/b-sm.jpg" alt="">
                                        </div>
                                        <div class="user-name">
                                            <span class="tb-lead">Blanca Schultz</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub">02/01/2020</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-sub text-primary">SUB-2309143</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount">199.99 <span>USD</span></span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="badge badge-dot badge-dot-xs bg-success">Paid</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-action">
                                    <div class="dropdown">
                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            <ul class="link-list-plain">
                                                <li><a href="#">View</a></li>
                                                <li><a href="#">Invoice</a></li>
                                                <li><a href="#">Print</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <span class="tb-lead"><a href="#">#95256</a></span>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <div class="user-card">
                                        <div class="user-avatar user-avatar-sm bg-purple">
                                            <span>NL</span>
                                        </div>
                                        <div class="user-name">
                                            <span class="tb-lead">Naomi Lawrence</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub">01/29/2020</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-sub text-primary">SUB-2305684</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="badge badge-dot badge-dot-xs bg-success">Paid</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-action">
                                    <div class="dropdown">
                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            <ul class="link-list-plain">
                                                <li><a href="#">View</a></li>
                                                <li><a href="#">Invoice</a></li>
                                                <li><a href="#">Print</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <span class="tb-lead"><a href="#">#95135</a></span>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <div class="user-card">
                                        <div class="user-avatar user-avatar-sm bg-success">
                                            <span>CH</span>
                                        </div>
                                        <div class="user-name">
                                            <span class="tb-lead">Cassandra Hogan</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub">01/29/2020</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-sub text-primary">SUB-2305564</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="badge badge-dot badge-dot-xs bg-warning">Due</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-action">
                                    <div class="dropdown">
                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            <ul class="link-list-plain">
                                                <li><a href="#">View</a></li>
                                                <li><a href="#">Invoice</a></li>
                                                <li><a href="#">Notify</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner-sm border-top text-center d-sm-none">
                        <a href="#" class="btn btn-link btn-block">See History</a>
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->
            
            <div class="col-md-6 col-xxl-4">
                <div class="card card-bordered card-full">
                    <div class="card-inner border-bottom">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Recent Activities</h6>
                            </div>
                            <div class="card-tools">
                                <ul class="card-tools-nav">
                                    <li><a href="#"><span>Cancel</span></a></li>
                                    <li class="active"><a href="#"><span>All</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nk-activity">
                        <li class="nk-activity-item">
                            <div class="nk-activity-media user-avatar bg-success"><img src="./images/avatar/c-sm.jpg" alt=""></div>
                            <div class="nk-activity-data">
                                <div class="label">Keith Jensen requested to Widthdrawl.</div>
                                <span class="time">2 hours ago</span>
                            </div>
                        </li>
                        <li class="nk-activity-item">
                            <div class="nk-activity-media user-avatar bg-warning">HS</div>
                            <div class="nk-activity-data">
                                <div class="label">Harry Simpson placed a Order.</div>
                                <span class="time">2 hours ago</span>
                            </div>
                        </li>
                        <li class="nk-activity-item">
                            <div class="nk-activity-media user-avatar bg-azure">SM</div>
                            <div class="nk-activity-data">
                                <div class="label">Stephanie Marshall got a huge bonus.</div>
                                <span class="time">2 hours ago</span>
                            </div>
                        </li>
                        <li class="nk-activity-item">
                            <div class="nk-activity-media user-avatar bg-purple"><img src="./images/avatar/d-sm.jpg" alt=""></div>
                            <div class="nk-activity-data">
                                <div class="label">Nicholas Carr deposited funds.</div>
                                <span class="time">2 hours ago</span>
                            </div>
                        </li>
                        <li class="nk-activity-item">
                            <div class="nk-activity-media user-avatar bg-pink">TM</div>
                            <div class="nk-activity-data">
                                <div class="label">Timothy Moreno placed a Order.</div>
                                <span class="time">2 hours ago</span>
                            </div>
                        </li>
                    </ul>
                </div><!-- .card -->
            </div><!-- .col -->

            <div class="col-md-6 col-xxl-4">
                <div class="card card-bordered card-full">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">New Users</h6>
                                </div>
                                <div class="card-tools">
                                    <a href="html/user-list-regular.html" class="link">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner card-inner-md">
                            <div class="user-card">
                                <div class="user-avatar bg-primary-dim">
                                    <span>AB</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">Abu Bin Ishtiyak</span>
                                    <span class="sub-text">info@softnio.com</span>
                                </div>
                                <div class="user-action">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner card-inner-md">
                            <div class="user-card">
                                <div class="user-avatar bg-pink-dim">
                                    <span>SW</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">Sharon Walker</span>
                                    <span class="sub-text">sharon-90@example.com</span>
                                </div>
                                <div class="user-action">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner card-inner-md">
                            <div class="user-card">
                                <div class="user-avatar bg-warning-dim">
                                    <span>GO</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">Gloria Oliver</span>
                                    <span class="sub-text">gloria_72@example.com</span>
                                </div>
                                <div class="user-action">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner card-inner-md">
                            <div class="user-card">
                                <div class="user-avatar bg-success-dim">
                                    <span>PS</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">Phillip Sullivan</span>
                                    <span class="sub-text">phillip-85@example.com</span>
                                </div>
                                <div class="user-action">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->

        </div><!-- .row -->
    </div><!-- .nk-block -->

</x-layouts.dashboard.admin>
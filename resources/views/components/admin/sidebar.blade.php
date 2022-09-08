<div class="nk-sidebar-element nk-sidebar-head">
    <div class="nk-menu-trigger">
        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
    </div>
    <div class="nk-sidebar-brand">
        <a href="html/index.html" class="logo-link nk-sidebar-logo">
            <img class="logo-light logo-img" src="{{ asset('assets/images/logo.png') }}" srcset="{{ asset('assets/images/logo2x.png 2x') }}" alt="logo">
            <img class="logo-dark logo-img" src="{{ asset('assets/images/logo-dark.png') }}" srcset="{{ asset('assets/images/logo-dark2x.png 2x') }}" alt="logo-dark">
        </a>
    </div>
</div><!-- .nk-sidebar-element -->
<div class="nk-sidebar-element nk-sidebar-body">
    <div class="nk-sidebar-content">
        <div class="nk-sidebar-menu" data-simplebar>
            <ul class="nk-menu">
                <li class="nk-menu-item">
                    <a href="{{ route('admin.dashboard') }}" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                        <span class="nk-menu-text">Dashboard</span>
                    </a>
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item">
                    <a href="{{ route('admin.investment') }}" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                        <span class="nk-menu-text">Investments</span>
                    </a>
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item">
                    <a href="{{ route('admin.bonus') }}" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                        <span class="nk-menu-text">Bonus</span>
                    </a>
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item">
                    <a href="{{ route('admin.penalty') }}" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                        <span class="nk-menu-text">Penalty</span>
                    </a>
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item">
                    <a href="{{ route('admin.users') }}" class="nk-menu-link">
                        <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                        <span class="nk-menu-text">Users</span>
                    </a>
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                        <span class="nk-menu-text">Transactions</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="{{ route('admin.transactions') }}" class="nk-menu-link"><span class="nk-menu-text">Tranx List</span></a>
                            <a href="{{ route('admin.transactions.request') }}" class="nk-menu-link"><span class="nk-menu-text">Tranx List - Requests</span></a>
                            <a href="{{ route('admin.transactions.treated.request') }}" class="nk-menu-link"><span class="nk-menu-text">Tranx List - Treated</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                        <span class="nk-menu-text">Plans</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="{{ route('admin.plans.create') }}" class="nk-menu-link"><span class="nk-menu-text">All Plans</span></a>
                            <a href="{{ route('admin.plans.index') }}" class="nk-menu-link"><span class="nk-menu-text">Add Plan</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                
            </ul><!-- .nk-menu -->
        </div><!-- .nk-sidebar-menu -->
    </div><!-- .nk-sidebar-content -->
</div><!-- .nk-sidebar-element -->
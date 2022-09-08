@php
    $user = auth('web')->user();
@endphp
<li class="dropdown user-dropdown">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
        <div class="user-toggle">
            <div class="user-avatar sm">
                <em class="icon ni ni-user-alt"></em>
            </div>
            <div class="user-info d-none d-md-block">
                <div class="user-status user-status-unverified">Unverified</div>
                <div class="user-name dropdown-indicator">{{ $user->name }}</div>
            </div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
            <div class="user-card">
                <div class="user-avatar">
                    <span>{{ strtoupper(substr($user->name, 0,2)) }}</span>
                </div>
                <div class="user-info">
                    <span class="lead-text">{{ $user->name }}</span>
                    <span class="sub-text">{{ $user->email }}</span>
                </div>
            </div>
        </div>
        <div class="dropdown-inner user-account-info">
            <h6 class="overline-title-alt">Wallet Account</h6>
            <div class="user-balance">@money($user->wallet->balance)<small class="currency currency-usd"> USD</small></div>
            <div class="user-balance-sub">Locked <span>@money($user->wallet->ledger_balance)<span class="currency currency-usd"> USD</span></span></div>
            <a href="{{ route('user.withdraw') }}" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a>
        </div>
        <div class="dropdown-inner">
            <ul class="link-list">
                <li><a href="{{ route('user.profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                <li><a href="{{ route('user.settings') }}"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                <!-- <li><a href="html/crypto/profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li> -->
                <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
            </ul>
        </div>
        <div class="dropdown-inner">
            <ul class="link-list">
                <li><a href="{{ route('user.logout') }}"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
            </ul>
        </div>
    </div>
</li>
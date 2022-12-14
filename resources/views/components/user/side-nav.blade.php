<!-- Menu -->
<ul class="nk-menu">
    <li class="nk-menu-heading">
        <h6 class="overline-title">Menu</h6>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('user.dashboard') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
            <span class="nk-menu-text">Dashboard</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('user.plans') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-view-col"></em></span>
            <span class="nk-menu-text">Plans</span>
        </a>
    </li>
    <li class="nk-menu-item has-sub">
        <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-original-title="" title="">
            <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
            <span class="nk-menu-text">Investments</span>
        </a>
        <ul class="nk-menu-sub" style="display: none;">
            <li class="nk-menu-item">
                <a href="{{ route('user.invest') }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Invest</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('user.investments') }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Investment Details</span></a>
            </li>
        </ul><!-- .nk-menu-sub -->
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('user.wallet') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
            <span class="nk-menu-text">Wallets</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="html/crypto/buy-sell.html" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
            <span class="nk-menu-text">Buy / Sell</span>
        </a>
    </li>
    <li class="nk-menu-item has-sub">
        <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-original-title="" title="">
            <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
            <span class="nk-menu-text">Transactions</span>
        </a>
        <ul class="nk-menu-sub" style="display: none;">
            <li class="nk-menu-item">
                <a href="{{ route('user.transactions') }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Transactions</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('user.transactions.request') }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Transactions Requests</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('user.transactions.treated.request') }}" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Transactions Treated Requests</span></a>
            </li>
        </ul><!-- .nk-menu-sub -->
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('user.profile') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
            <span class="nk-menu-text">My Profile</span>
        </a>
    </li>
</ul><!-- .nk-menu -->
<!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
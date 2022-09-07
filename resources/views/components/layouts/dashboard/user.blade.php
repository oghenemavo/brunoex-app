<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

    <head>
        <base href="{{ url()->to('/') }}">
        <meta charset="utf-8">
        <meta name="author" content="Brunoex">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Crypto Exchange, Loans and Investment.">
        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="./images/favicon.png">
        <!-- Page Title  -->
        <title>Dashboard | Brunoex Dashboard</title>
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.3') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.3') }}">
    </head>

    <body class="nk-body npc-crypto bg-white has-sidebar ">
        <div class="nk-app-root">
            <!-- main @s -->
            <div class="nk-main ">
                <!-- sidebar @s -->
                <div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
                    <div class="nk-sidebar-element nk-sidebar-head">
                        <div class="nk-sidebar-brand">
                            <a href="{{ route('homepage') }}" class="logo-link nk-sidebar-logo">
                                <img class="logo-light logo-img" src="{{ asset('assets/images/logo.png') }}" srcset="{{ asset('assets/images/logo2x.png 2x') }}" alt="logo">
                                <img class="logo-dark logo-img" src="{{ asset('assets/images/logo-dark.png') }}" srcset="{{ asset('assets/images/logo-dark2x.png 2x') }}" alt="logo-dark">
                                <span class="nio-version">Crypto</span>
                            </a>
                        </div>
                        <div class="nk-menu-trigger me-n2">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div><!-- .nk-sidebar-element -->
                    <div class="nk-sidebar-element">
                        <div class="nk-sidebar-body" data-simplebar>
                            <div class="nk-sidebar-content">
                                <div class="nk-sidebar-widget d-none d-xl-block">
                                    <div class="user-account-info between-center">
                                        <div class="user-account-main">
                                            <h6 class="overline-title-alt">Available Balance</h6>
                                            <div class="user-balance">2.014095 <small class="currency currency-btc">BTC</small></div>
                                            <div class="user-balance-alt">18,934.84 <span class="currency currency-btc">BTC</span></div>
                                        </div>
                                        <a href="#" class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                                    </div>
                                    <ul class="user-account-data gy-1">
                                        <li>
                                            <div class="user-account-label">
                                                <span class="sub-text">Profits (7d)</span>
                                            </div>
                                            <div class="user-account-value">
                                                <span class="lead-text">+ 0.0526 <span class="currency currency-btc">BTC</span></span>
                                                <span class="text-success ms-2">3.1% <em class="icon ni ni-arrow-long-up"></em></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="user-account-label">
                                                <span class="sub-text">Deposit in orders</span>
                                            </div>
                                            <div class="user-account-value">
                                                <span class="sub-text">0.005400 <span class="currency currency-btc">BTC</span></span>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="user-account-actions">
                                        <ul class="g-3">
                                            <li><a href="{{ route('user.deposit') }}" class="btn btn-lg btn-primary"><span>Deposit</span></a></li>
                                            <li><a href="{{ route('user.withdraw') }}" class="btn btn-lg btn-warning"><span>Withdraw</span></a></li>
                                        </ul>
                                    </div>
                                </div><!-- .nk-sidebar-widget -->
                                <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                                    <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                                        <div class="user-card-wrap">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">Abu Bin Ishtiyak</span>
                                                    <span class="sub-text">info@softnio.com</span>
                                                </div>
                                                <div class="user-action">
                                                    <em class="icon ni ni-chevron-down"></em>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                                        <div class="user-account-info between-center">
                                            <div class="user-account-main">
                                                <h6 class="overline-title-alt">Available Balance</h6>
                                                <div class="user-balance">2.014095 <small class="currency currency-usd">USD</small></div>
                                                <div class="user-balance-alt">18,934.84 <span class="currency currency-usd">USD</span></div>
                                            </div>
                                        </div>
                                        <ul class="user-account-data">
                                            <li>
                                                <div class="user-account-label">
                                                    <span class="sub-text">Profits (7d)</span>
                                                </div>
                                                <div class="user-account-value">
                                                    <span class="lead-text">+ 0.0526 <span class="currency currency-usd">USD</span></span>
                                                    <span class="text-success ms-2">3.1% <em class="icon ni ni-arrow-long-up"></em></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="user-account-label">
                                                    <span class="sub-text">Deposit in orders</span>
                                                </div>
                                                <div class="user-account-value">
                                                    <span class="sub-text text-base">0.005400 <span class="currency currency-usd">USD</span></span>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="user-account-links">
                                            <li><a href="{{ route('user.withdraw') }}" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a></li>
                                            <li><a href="{{ route('user.deposit') }}" class="link"><span>Deposit Funds</span> <em class="icon ni ni-wallet-in"></em></a></li>
                                        </ul>
                                        <ul class="link-list">
                                            <li><a href="{{ route('user.profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                            <li><a href="html/crypto/profile-security.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                            <li><a href="html/crypto/profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                        </ul>
                                        <ul class="link-list">
                                            <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                        </ul>
                                    </div>
                                </div><!-- .nk-sidebar-widget -->
                                

                                <div class="nk-sidebar-menu">
                                    <x-user.side-nav></x-user.side-nav>
                                </div><!-- .nk-sidebar-menu -->


                            </div><!-- .nk-sidebar-content -->
                        </div><!-- .nk-sidebar-body -->
                    </div><!-- .nk-sidebar-element -->
                </div>
                <!-- sidebar @e -->
                <!-- wrap @s -->
                <div class="nk-wrap ">
                    <!-- main header @s -->
                    <div class="nk-header nk-header-fluid nk-header-fixed is-light">
                        <div class="container-fluid">
                            <div class="nk-header-wrap">
                                <div class="nk-menu-trigger d-xl-none ms-n1">
                                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                                </div>
                                <div class="nk-header-brand d-xl-none">
                                    <a href="{{ route('user.dashboard') }}" class="logo-link">
                                        <img class="logo-light logo-img" src="{{ asset('assets/images/logo.png') }}" srcset="{{ asset('assets/images/logo2x.png 2x') }}" alt="logo">
                                        <img class="logo-dark logo-img" src="{{ asset('assets/images/logo-dark.png') }}" srcset="{{ asset('assets/images/logo-dark2x.png 2x') }}" alt="logo-dark">
                                        <span class="nio-version">Crypto</span>
                                    </a>
                                </div>
                                <div class="nk-header-news d-none d-xl-block">
                                    <div class="nk-news-list">
                                        <a class="nk-news-item" href="#">
                                            <!-- <div class="nk-news-text">
                                                <p>Do you know the latest update of 2022? <span> A overview of our is now available on YouTube</span></p>
                                                <em class="icon ni ni-external"></em>
                                            </div> -->
                                        </a>
                                    </div>
                                </div>
                                <div class="nk-header-tools">
                                    <ul class="nk-quick-nav">
                                        <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                                <div class="quick-icon border border-light">
                                                    <img class="icon" src="{{ asset('assets/images/flags/english-sq.png') }}" alt="">
                                                </div>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                                                <ul class="language-list">
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ asset('assets/images/flags/english.png') }}" alt="" class="language-flag">
                                                            <span class="language-name">English</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ asset('assets/images/flags/spanish.png') }}" alt="" class="language-flag">
                                                            <span class="language-name">Español</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ asset('assets/images/flags/french.png') }}" alt="" class="language-flag">
                                                            <span class="language-name">Français</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ asset('assets/images/flags/turkey.png') }}" alt="" class="language-flag">
                                                            <span class="language-name">Türkçe</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li><!-- .dropdown -->

                                        <x-user.dd-profile></x-user.dd-profile>

                                        <x-user.dd-notification></x-user.dd-notification>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main header @e -->
                    <!-- content @s -->


                    <div class="nk-content nk-content-fluid">
                        <div class="container-xl wide-lg">
                            <div class="nk-content-body">
                                
                                @isset($header)
                                <div class="nk-block-head">
                                    
                                    {{ $header }}
                                    
                                </div><!-- .nk-block-head -->
                                @endisset
                                
                                
                                {{ $slot }}
                                
                            </div>
                        </div>
                    </div>



                    <!-- content @e -->
                    <div class="nk-footer">
                        <div class="container-fluid">
                            <div class="nk-footer-wrap">
                                <div class="nk-footer-copyright"> &copy; 2022 Brunoex.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer @e -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- main @e -->
        </div>
        <!-- app-root @e -->
        <!-- select region modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="region">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-md">
                        <h5 class="title mb-4">Select Your Country</h5>
                        <div class="nk-country-region">
                            <ul class="country-list text-center gy-2">
                                <li>
                                    <a href="#" class="country-item">
                                        <img src="{{ asset('assets/images/flags/english.png') }}" alt="" class="country-flag">
                                        <span class="country-name">United State</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .modal-content -->
            </div><!-- .modla-dialog -->
        </div><!-- .modal -->
        <!-- JavaScript -->
        <script src="{{ asset('assets/js/bundle.js?ver=3.0.3') }}"></script>
        <script src="{{ asset('assets/js/scripts.js?ver=3.0.3') }}"></script>

        @stack('scripts')
    </body>

</html>
<!-- An unexamined life is not worth living. - Socrates -->
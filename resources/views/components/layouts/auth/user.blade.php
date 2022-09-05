<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">
    <head>
        <base href="{{ url()->to('/') }}">
        <meta charset="utf-8">
        <meta name="author" content="Brunoex">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Crypto Exchange, Loans and Investment.">
        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
        <!-- Page Title  -->
        <title>Signup | Brunoex</title>
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.3') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.3') }}">
    </head>

    <body class="nk-body npc-crypto bg-white pg-auth">
        <!-- app body @s -->
        <div class="nk-app-root">
            <div class="nk-split nk-split-page nk-split-lg">
                <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                    <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                        <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                    </div>
                    <div class="nk-block nk-block-middle nk-auth-body">
                        <div class="brand-logo pb-5">
                            <a href="{{ route('homepage') }}" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{ asset('assets/images/logo.png') }}" srcset="{{ asset('assets/images/logo2x.png 2x') }}" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('assets/images/logo-dark.png') }}" srcset="{{ asset('assets/images/logo-dark2x.png 2x') }}" alt="logo-dark">
                            </a>
                        </div>


                        {{ $slot }}
                        



                    </div><!-- .nk-block -->
                    <div class="nk-block nk-auth-footer">
                        <div class="nk-block-between">
                            <ul class="nav nav-sm">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Terms & Condition</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Privacy Policy</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Help</a>
                                </li>
                            </ul><!-- nav -->
                        </div>
                        <div class="mt-3">
                            <p>&copy; 2022 DashLite. All Rights Reserved.</p>
                        </div>
                    </div><!-- nk-block -->
                </div><!-- nk-split-content -->
                <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                    <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                        <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                            <div class="slider-item">
                                <div class="nk-feature nk-feature-center">
                                    <div class="nk-feature-img">
                                        <img class="round" src="{{ asset('assets/images/slides/promo-a.png') }}" srcset="{{ asset('assets/images/slides/promo-a2x.png 2x') }}" alt="">
                                    </div>
                                    <div class="nk-feature-content py-4 p-sm-5">
                                        <h4>Dashlite</h4>
                                        <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                                    </div>
                                </div>
                            </div><!-- .slider-item -->
                            <div class="slider-item">
                                <div class="nk-feature nk-feature-center">
                                    <div class="nk-feature-img">
                                        <img class="round" src="{{ asset('assets/images/slides/promo-b.png') }}" srcset="{{ asset('assets/images/slides/promo-b2x.png 2x') }}" alt="">
                                    </div>
                                    <div class="nk-feature-content py-4 p-sm-5">
                                        <h4>Dashlite</h4>
                                        <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                                    </div>
                                </div>
                            </div><!-- .slider-item -->
                            <div class="slider-item">
                                <div class="nk-feature nk-feature-center">
                                    <div class="nk-feature-img">
                                        <img class="round" src="{{ asset('assets/images/slides/promo-c.png') }}" srcset="{{ asset('assets/images/slides/promo-c2x.png 2x') }}" alt="">
                                    </div>
                                    <div class="nk-feature-content py-4 p-sm-5">
                                        <h4>Dashlite</h4>
                                        <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                                    </div>
                                </div>
                            </div><!-- .slider-item -->
                        </div><!-- .slider-init -->
                        <div class="slider-dots"></div>
                        <div class="slider-arrows"></div>
                    </div><!-- .slider-wrap -->
                </div><!-- nk-split-content -->
            </div><!-- nk-split -->
        </div><!-- app body @e -->
        <!-- JavaScript -->
        <script src="{{ asset('assets/js/bundle.js?ver=3.0.3') }}"></script>
        <script src="{{ asset('assets/js/scripts.js?ver=3.0.3') }}"></script>
        <!-- select region modal -->
        
        
    </body>
</html>
<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
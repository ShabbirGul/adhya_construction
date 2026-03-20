<header class="site-header header-style-2 pbmit-bg-color-white">
    <div class="pbmit-pre-header-wrapper pbmit-color-blackish">
        <div class="container-fluid p-0">
            <div class="pbmit-pre-header-content d-flex justify-content-between">
                <div class="pbmit-pre-header-left">
                    <ul class="pbmit-contact-info">
                        <li><i class="pbmit-base-icon-mail-alt"></i><a href="mailto:aadyaconstructionsequip@gmail.com" class="__cf_email__">aadyaconstructionsequip@gmail.com</a></li>
                        <li><i class="pbmit-base-icon-location-dot-solid"></i>Andhra Pradesh, Tamil Nadu, Kerala, Karnataka, Odisha & nearby</li>
                        <li><i class="pbmit-base-icon-phone-volume-solid-1"></i>9490003311, 9705799889</li>
                    </ul>
                </div>
                <!-- <div class="pbmit-pre-header-right">
                    <ul class="pbmit-social-links">
                        <li class="pbmit-social-li pbmit-social-facebook"><a title="Facebook" href="#" target="_blank"><span><i class="pbmit-base-icon-facebook-f"></i></span></a></li>
                        <li class="pbmit-social-li pbmit-social-twitter"><a title="Twitter" href="#" target="_blank"><span><i class="pbmit-base-icon-twitter-2"></i></span></a></li>
                        <li class="pbmit-social-li pbmit-social-linkedin"><a title="LinkedIn" href="#" target="_blank"><span><i class="pbmit-base-icon-linkedin-in"></i></span></a></li>
                        <li class="pbmit-social-li pbmit-social-instagram"><a title="Instagram" href="#" target="_blank"><span><i class="pbmit-base-icon-instagram"></i></span></a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <div class="pbmit-main-header-area">
        <div class="container-fluid p-0">
            <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                <div class="site-branding">
                    <h1 class="site-title">
                        <a href="{{ route('home') }}">
                            <img class="logo-img" src="{{ asset('assets/user/images/aadyalogo-2.png') }}" alt="Adhya Construction">
                        </a>
                    </h1>
                </div>
                <div class="site-navigation">
                    <nav class="main-menu navbar-expand-xl navbar-light">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button">
                                <i class="pbmit-base-icon-menu-1"></i>
                            </button>
                        </div>
                        <div class="pbmit-mobile-menu-bg"></div>
                        <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                            <div class="pbmit-menu-wrap">
                                <span class="closepanel">
                                    <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="20.163" height="20.163" viewBox="0 0 26.163 26.163">
                                        <rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
                                        <rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
                                    </svg>
                                </span>
                                <ul class="navigation clearfix">
                                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="{{ Request::is('about-us') ? 'active' : '' }}"><a href="{{ route('user.about') }}">About Us</a></li>
                                    <li><a href="{{ route('user.categories') }}">Categories</a></li>
                                    <li><a href="{{ route('user.vehicles') }}">Vehicles</a></li>
                                    <li><a href="{{ route('user.faqs') }}">FAQs</a></li>
                                    <li><a href="{{ route('user.contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="pbmit-right-box d-flex align-items-center">
                    <div class="pbmit-header-button2">
                        <a class="pbmit-btn" href="{{ route('user.contact') }}">
                            <span class="pbmit-button-content-wrapper">
                                <span class="pbmit-button-text">Book Consult</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

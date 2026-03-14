<footer class="site-footer pbmit-bg-color-secondary">
        <div class="pbmit-footer-widget-area">
            <div class="container">
                <div class="row">
                    <div class="pbmit-footer-widget-col-1 col-md-4">
                        <aside class="widget">
                            <div class="pbmit-footer-logo" style="max-width: 250px;">
                                <img src="{{ asset('assets/user/images/logo.svg') }}" class="img-fluid" alt="Adhya Construction" style="filter: brightness(0) invert(1); width: 100%;">
                            </div><br>
                            <ul class="pbmit-social-links">
                                <li class="pbmit-social-li pbmit-social-facebook"><a title="Facebook" href="#" target="_blank"><span><i class="pbmit-base-icon-facebook-f"></i></span></a></li>
                                <li class="pbmit-social-li pbmit-social-twitter"><a title="Twitter" href="#" target="_blank"><span><i class="pbmit-base-icon-twitter-2"></i></span></a></li>
                                <li class="pbmit-social-li pbmit-social-linkedin"><a title="LinkedIn" href="#" target="_blank"><span><i class="pbmit-base-icon-linkedin-in"></i></span></a></li>
                                <li class="pbmit-social-li pbmit-social-instagram"><a title="Instagram" href="#" target="_blank"><span><i class="pbmit-base-icon-instagram"></i></span></a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="pbmit-footer-widget-col-2 col-md-4">
                        <aside class="widget">
                            <h2 class="widget-title">Say Hello</h2>
                            <div class="pbmit-contact-widget-lines">
                                <div class="pbmit-contact-widget-line pbmit-base-icon-phone text-white">+91 12345 67890</div>
                                <div class="pbmit-contact-widget-line pbmit-base-icon-email"><a href="mailto:info@adhyaconstruction.com" class="text-white">info@adhyaconstruction.com</a></div>
                            </div>
                        </aside>
                    </div>
                    <div class="pbmit-footer-widget-col-3 col-md-2">
                        <aside class="widget">
                            <h2 class="widget-title">Useful Link</h2>
                            <ul class="menu">
                                <li><a href="{{ route('home') }}#about-us">About</a></li>
                                <li><a href="{{ route('user.vehicles') }}">Our Vehicles</a></li>
                                <li><a href="{{ route('user.faqs') }}">FAQs</a></li>
                                <li><a href="{{ route('user.categories') }}">Categories</a></li>
                                <li><a href="{{ route('user.contact') }}">Contact Us</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="pbmit-footer-widget-col-4 col-md-2">
                        <aside class="widget widget_text">
                            <h2 class="widget-title">Quick Links</h2>
                            <ul class="menu">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('user.categories') }}">Categories</a></li>
                                <li><a href="{{ route('home') }}#global-presence">Global Presence</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="pbmit-footer-text-area">
            <div class="container">
                <div class="pbmit-footer-text-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pbmit-footer-copyright-text-area">
                                Copyright © {{ date('Y') }} <a href="#">Adhya Construction</a>, All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Scroll To Top -->
<div class="pbmit-backtotop">
    <div class="pbmit-arrow">
        <i class="pbmit-base-icon-plane"></i>
    </div>
    <div class="pbmit-hover-arrow">
        <i class="pbmit-base-icon-plane"></i>
    </div>
</div>

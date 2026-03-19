<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Adhya Construction – Transport and Logistics')</title>
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/user/images/aadyalogo.png') }}">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/pbminfotech-base-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/shortcode.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/responsive.css') }}">

    <style>
        /* Premium Navy Blue Theme Overrides */
        :root {
            --pbmit-global-color: #4a0404; /* Deep Maroon */
            --pbmit-secondary-color: #800000;
            --pbmit-light-navy: #d4af37; /* Gold Accent */
            --pbmit-gold: #d4af37;
            --pbmit-gold-gradient: linear-gradient(135deg, #d4af37, #f1c40f);
            --pbmit-maroon-gradient: linear-gradient(135deg, #4a0404, #800000);
        }
        .pbmit-bg-color-global { background-color: var(--pbmit-global-color) !important; }
        .pbmit-color-global { color: var(--pbmit-global-color) !important; }
        .pbmit-btn { background-color: var(--pbmit-global-color); border-color: var(--pbmit-global-color); color: #fff !important; }
        .pbmit-btn:hover { background-color: var(--pbmit-secondary-color); border-color: var(--pbmit-secondary-color); color: #fff !important; }
        
        /* Form Control Fixes */
        .form-control {
            color: #333 !important;
            border: 1px solid #e1e1e1 !important;
        }
        .form-control:focus {
            border-color: var(--pbmit-global-color) !important;
            box-shadow: none !important;
        }
        .contact-form-wrapper .pbmit-title {
            color: var(--pbmit-global-color) !important;
        }
        
        /* Modern UI Utilities */
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .glass-card, .pbmit-award-box-style-1, .pbmit-service-style-2, .testimonial-card, .pbmit-award-wraper, .pbminfotech-post-item, .pbmit-awardbox-wrapper {
            border-radius: 20px !important;
            overflow: hidden;
        }
        .pbmit-img-box img { border-radius: 20px 20px 0 0; }
        
        /* Award Section Height Leveling */
        .award-section-two .row { display: flex; flex-wrap: wrap; }
        .award-section-two .pbmit-right-col { display: flex; flex-direction: column; }
        .award-section-two .pbmit-award-wraper { flex: 1; display: flex; flex-direction: column; justify-content: center; }
        
        .glass-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
            border-color: rgba(255, 255, 255, 0.2);
        }
        .text-gradient {
            background: var(--pbmit-gold-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .bg-maroon { background: var(--pbmit-maroon-gradient) !important; color: white !important; }
        .bg-gold { background: var(--pbmit-gold-gradient) !important; color: #4a0404 !important; }
        
        .pbmit-title-bar-wrapper .pbmit-title, .pbmit-title-bar-wrapper h1 {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            letter-spacing: 1px;
        }
        .client-logo-wrapper {
            filter: grayscale(100%);
            opacity: 0.6;
            transition: all 0.4s ease;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100px;
        }
        .client-logo-wrapper:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        .testimonial-card {
            position: relative;
            padding: 40px 30px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .testimonial-card::before {
            content: "\f10d";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 60px;
            color: rgba(13, 27, 42, 0.05);
            z-index: 0;
        }
        .testimonial-content { position: relative; z-index: 1; }
        
        /* Global Presence Styling */
        .nation-badge {
            background: var(--pbmit-global-color);
            color: #fff;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            display: inline-block;
            margin-bottom: 10px;
        }
        /* Logo Curve Box */
        .site-branding {
            background: #4a0404;
            padding: 15px 25px;
            border-radius: 0 0 35px 35px;
            box-shadow: 0 10px 20px rgba(74, 4, 4, 0.2);
            position: relative;
            z-index: 10;
        }
        .site-branding img {
            max-height: 70px;
            width: auto;
        }

        /* Responsive Spacing Fixes */
        /* Section Spacing Fixes */
        .service-two-bg { padding: 30px 0; }
        .award-section-two { padding: 15px 0; }
        .section-lg { padding: 40px 0 !important; }
        .section-xl { padding: 60px 0 !important; }
        .stat-card h2 { font-size: 2.2rem !important; }
        .pbmit-title-bar-wrapper .pbmit-title, 
        .pbmit-title-bar-wrapper .pbmit-title-bar-content h1,
        .pbmit-title-bar-wrapper .pbmit-breadcrumb,
        .pbmit-title-bar-wrapper .pbmit-breadcrumb a {
            color: #ffffff !important;
        }
        .pbmit-title-bar-wrapper {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="page-wrapper" id="page">
        @include('user.partials.header')

        @yield('content')

        @include('user.partials.footer')
    </div>

    <!-- JS -->
    <script src="{{ asset('assets/user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/user/js/aos.js') }}"></script>
    <!-- Animation Scripts -->
    <script src="{{ asset('assets/user/js/gsap.js') }}"></script>
    <script src="{{ asset('assets/user/js/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('assets/user/js/SplitText.js') }}"></script>
    <script src="{{ asset('assets/user/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/numinate.min.js') }}"></script>
    
    <script src="{{ asset('assets/user/js/scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>

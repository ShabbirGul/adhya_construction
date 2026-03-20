@extends('layouts.user')

@section('title', 'Adhya Construction – Leading Construction and Logistics Solutions')

@section('content')
<!-- Page Content -->
<div class="page-content">

    <!-- Slider Area -->
    <header class="site-header header-style-2">
        <div class="pbmit-slider-area pbmit-slider-two">
            <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false" data-columns="1" data-margin="0" data-effect="fade">
                <div class="swiper-wrapper">
                    @forelse($banners as $banner)
                    <div class="swiper-slide">
                        <div class="pbmit-slider-item">
                            <div class="pbmit-slider-bg" style="background-image: url({{ asset($banner->image) }});"></div>
                            <div class="container">
                                <div class="pbmit-slider-content">
                                    <h5 class="pbmit-sub-title transform-delay-1"><span>{{ $banner->subtitle }}</span></h5>
                                    <h2 class="pbmit-title transform-left transform-delay-2"><span class="text-white">{!! str_replace('<br>', '<br> ', nl2br($banner->title)) !!}</span></h2>
                                    @if($banner->button_text)
                                    <div class="pbmit-button">
                                        <div class="transform-bottom transform-delay-3">
                                            <a class="pbmit-btn" href="{{ $banner->button_link ?? '#vehicles' }}">
                                                <span class="pbmit-button-content-wrapper">
                                                    <span class="pbmit-button-text">{{ $banner->button_text }}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="swiper-slide">
                        <div class="pbmit-slider-item">
                            <div class="pbmit-slider-bg" style="background-image: url({{ asset('assets/user/images/banner-slider-img/demo-02-slide1.jpg') }});"></div>
                            <div class="container">
                                <div class="pbmit-slider-content">
                                    <h5 class="pbmit-sub-title transform-delay-1"><span>Adhya Construction</span></h5>
                                    <h2 class="pbmit-title transform-left transform-delay-2"><span class="text-white">Building Your <br> Dreams with <br> Excellence.</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </header>

    <!-- Award Box Start (Categories) --> 
    <section id="categories" class="award-section-two pbmit-bg-color-white animated fadeIn animated-fast pbmit-element-award-box-style-1">
        <div class="container">
            <div class="pbmit-heading-subheading text-center mb-5">
                <h4 class="pbmit-subtitle">Our Categories</h4>
                <h2 class="pbmit-title">Explore Our Specializations</h2>
                <div class="mt-2 mx-auto" style="width: 50px; height: 3px; background: var(--pbmit-global-color); border-radius: 2px;"></div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row g-0">
                <div class="col-md-12 col-xl-12 pbmit-left-col">
                    <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="false" data-columns="5" data-margin="30" data-effect="slide">
                        <div class="swiper-wrapper" style="display: flex; align-items: stretch;">
                            @forelse($categories as $category)
                            <article class="pbmit-award-box-style-1 swiper-slide" style="height: auto;">
                                <div class="pbmit-awardbox-wrapper glass-card" style="height: 100%; display: flex; flex-direction: column;">
                                    <div class="pbmit-img-box shimmer">
                                        <a href="{{ route('user.vehicles', ['category' => $category->id]) }}">
                                            <img src="{{ $category->image ? asset($category->image) : asset('assets/user/images/homepage-2/award-box/img-01.jpg') }}" alt="{{ $category->title }}" style="width: 100%; height: 250px; object-fit: cover;">		
                                            <h4 class="pbmit-freight-box-title">{{ $category->title }}</h4>
                                        </a>
                                    </div>
                                    <div class="pbmit-shape-wraper" style="margin-top: auto;">
                                        <div class="pbmit-shape-wraper-inner">
                                            <div class="pbmit-award-btn">
                                                <a class="pbmit-button-inner" href="{{ route('user.vehicles', ['category' => $category->id]) }}">
                                                    <span class="pbmit-button-icon">View Vehicles</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @empty
                            <p class="p-4">No categories found.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </section>

    <!-- Vehicle Start --> 
    <section id="vehicles" class="service-two-bg">
        <div class="container">
            <div class="pbmit-heading-subheading text-center">
                <h4 class="pbmit-subtitle">Our Vehicles</h4>
                <h2 class="pbmit-title">Recent Vehicles <br> for Your Projects</h2>
            </div>
            <div class="row pt-4">
                @forelse($latestVehicles as $vehicle)
                <article class="pbmit-service-style-2 col-md-4 mb-5" id="vehicles-cat-{{ $vehicle->category_id }}">
                    <div class="pbminfotech-post-item glass-card h-100 shadow-lg">
                        <div class="pbmit-featured-img-wrapper shimmer">
                            <div class="pbmit-featured-wrapper">
                                <img src="{{ asset($vehicle->image) }}" class="img-fluid" alt="{{ $vehicle->title }}" style="width: 100%; object-fit: cover;">
                            </div>
                        </div>
                        <div class="pbminfotech-box-content p-4">
                            <div class="pbmit-serv-cat font-weight-bold mb-2" style="color: #4a0404;">{{ $vehicle->category->title ?? '' }}</div>
                            <h3 class="pbmit-service-title mb-3"><a href="#" style="color: #4a0404; font-weight: 800;">{{ $vehicle->title }}</a></h3>
                            <div class="pbmit-service-description">
                                <p class="font-weight-bold" style="color: #333333; font-size: 0.95rem;">{{ Str::limit($vehicle->description, 120) }}</p>
                            </div>
                        </div>
                    </div>
                </article>
                @empty
                <!-- Fallback to static if no vehicles in DB -->
                <article class="pbmit-service-style-2 col-md-4 mb-4">
                    <div class="pbminfotech-post-item">
                        <div class="pbminfotech-box-content">
                            <h3 class="pbmit-service-title"><a href="#">Excavators</a></h3>
                            <div class="pbmit-service-description">
                                <p>Heavy-duty excavators for all your digging and earthmoving needs.</p>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="pbmit-service-style-2 col-md-4 mb-4">
                    <div class="pbminfotech-post-item">
                        <div class="pbminfotech-box-content">
                            <h3 class="pbmit-service-title"><a href="#">Dump Trucks</a></h3>
                            <div class="pbmit-service-description">
                                <p>Reliable dump trucks for efficient material transport across sites.</p>
                            </div>
                        </div>
                    </div>
                </article>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <!-- Statistics Section -->
    <section class="section-md" style="background-color: #4a0404; color: white;">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="stat-card p-5 h-100 shadow-lg" style="background: #ffffff; border-radius: 20px; border: 2px solid #4a0404;">
                        <h2 class="stat-number">5 K+</h2>
                        <h5 class="font-weight-bold mb-2" style="color: #000000;">Successful Project Completion</h5>
                        <p class="mb-0 font-weight-bold" style="color: #444444; font-size: 0.9rem;">For all transport authorize and major infrastructure builds.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card p-5 h-100 shadow-lg" style="background: #ffffff; border-radius: 20px; border: 2px solid #4a0404;">
                        <h2 class="stat-number">30 K+</h2>
                        <h5 class="font-weight-bold mb-2" style="color: #000000;">Proactive Communication</h5>
                        <p class="mb-0 font-weight-bold" style="color: #444444; font-size: 0.9rem;">Key to successful transport project planning and execution.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card p-5 h-100 shadow-lg" style="background: #ffffff; border-radius: 20px; border: 2px solid #4a0404;">
                        <h2 class="stat-number">89 M</h2>
                        <h5 class="font-weight-bold mb-2" style="color: #000000;">Material Handling</h5>
                        <p class="mb-0 font-weight-bold" style="color: #444444; font-size: 0.9rem;">Efficient resource management and streamlined delivery logistics.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Presence Section -->
    <section id="global-presence" class="section-xl" style="background-color: #4a0404; color: white; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; right: 0; opacity: 0.1; width: 50%; pointer-events: none; color: #4a0404;">
            <svg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"><path d="M150 200h700v600h-700z" fill="currentColor"/></svg>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="pbmit-heading-subheading">
                        <h4 class="pbmit-subtitle text-white-50" style="color: rgba(212, 175, 55, 0.7) !important;">Global Presence</h4>
                        <h2 class="pbmit-title text-white">List of nations we <br> work with worldwide</h2>
                    </div>
                    <p class="text-white-50 mt-4" style="font-size: 1.1rem;">We have established a strong presence globally, delivering excellence across borders with streamlined transport and logistics solutions.</p>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        @php
                            $nations = [
                                ['code' => 'IN', 'name' => 'India'],
                                ['code' => 'US', 'name' => 'USA'],
                                ['code' => 'GE', 'name' => 'Germany'],
                                ['code' => 'JA', 'name' => 'Japan'],
                                ['code' => 'UA', 'name' => 'UAE'],
                            ];
                        @endphp
                        @foreach($nations as $nation)
                        <div class="col-6 col-sm-4">
                            <div class="p-4 h-100 text-center shadow-lg" style="background: #ffffff; border-radius: 15px; border: 1px solid #4a0404;">
                                <span class="nation-badge fw-bold" style="background: #ffffffff; color: #4a0404; padding: 5px 12px; border-radius: 8px;">{{ $nation['code'] }}</span>
                                <h5 class="mb-0 mt-3 font-weight-bold" style="color: #4a0404;">{{ $nation['name'] }}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="section-lg bg-light">
        <div class="container">
            <div class="pbmit-heading-subheading text-center mb-5">
                <h4 class="pbmit-subtitle">Our End User Clients</h4>
                <h2 class="pbmit-title">Trusted by industry leaders across India</h2>
                <div class="mt-2 mx-auto" style="width: 50px; height: 3px; background: var(--pbmit-global-color); border-radius: 2px;"></div>
            </div>
            <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="false" data-columns="5" data-margin="30">
                <div class="swiper-wrapper">
                    @foreach($clients as $client)
                    <div class="swiper-slide">
                        <div class="client-logo-wrapper">
                            @if($client->logo)
                            <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}" class="img-fluid" style="max-height: 50px; width: auto;">
                            @else
                            <h5 class="mb-0 text-muted font-weight-bold">{{ $client->name }}</h5>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="section-xl pbmit-bg-color-white">
        <div class="container">
            <div class="pbmit-heading-subheading text-center mb-5">
                <h4 class="pbmit-subtitle">Testimonials</h4>
                <h2 class="pbmit-title">What Our Clients Say</h2>
            </div>
            <div class="row pt-2">
                @foreach($testimonials as $testimonial)
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="pbmit-stars mb-3" style="color: #f1c40f; font-size: 0.8rem;">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p class="mb-4 text-muted" style="line-height: 1.8; font-style: italic;">"{{ $testimonial->content }}"</p>
                            <div class="d-flex align-items-center">
                                <div class="author-info">
                                    <h5 class="mb-0 font-weight-bold" style="color: var(--pbmit-global-color);">{{ $testimonial->name }}</h5>
                                    <small class="text-uppercase tracking-wider" style="color: var(--pbmit-light-navy); font-weight: 600; font-size: 0.7rem;">{{ $testimonial->position }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

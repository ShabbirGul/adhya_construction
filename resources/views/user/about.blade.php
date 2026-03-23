@extends('layouts.user')

@section('title', 'About Us - Aadya Construction')

@section('content')
    <!-- Title Bar -->
    <div class="pbmit-title-bar-wrapper"
        style="background-image: url('{{ asset('assets/user/images/otherpagebanner.jpg') }}');">
        <div class="container">
            <div class="pbmit-title-bar-content">
                <div class="pbmit-title-bar-content-inner">
                    <div class="pbmit-tbar">
                        <div class="pbmit-tbar-inner">
                            <h1 class="pbmit-tbar-title text-white">About Us</h1>
                        </div>
                    </div>
                    <div class="pbmit-breadcrumb">
                        <div class="pbmit-breadcrumb-inner">
                            <span><a href="{{ route('home') }}" class="home"><span>Home</span></a></span>
                            <span class="sep"><i class="pbmit-base-icon-angle-right"></i></span>
                            <span><span class="post-root post post-post current-item">About Us</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <!-- About Section -->
        <section class="section-lg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="about-image-wrapper p-2" style="border: 1px solid #eee; border-radius: 20px;">
                            <img src="{{ ($history && $history->image) ? asset($history->image) : asset('assets/user/images/history/history-01.jpg') }}"
                                class="img-fluid" style="border-radius: 15px;" alt="About Aadya">
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-5">
                        <div class="pbmit-heading-subheading">
                            <h4 class="pbmit-subtitle">Our Story</h4>
                            <div class="pbmit-about-logo mb-3">
                                <img src="{{ asset('assets/user/images/aadyalogo.png') }}" alt="Aadya Logo"
                                    style="max-height: 80px;">
                            </div>
                            <h2 class="pbmit-title">{{ $history->title ?? 'Maximizing Engineering Efficiency' }}</h2>
                        </div>
                        <div class="mt-4 mb-4">
                            <p class="lead text-muted">
                                {{ $history->description ?? 'Aadya Construction is a premier construction and logistics company delivering excellence for over a decade.' }}
                            </p>
                            <p>We pride ourselves on our commitment to quality, safety, and innovation. Over the years, we
                                have grown from a small local firm to a national player in the construction and transport
                                logistics sector, serving industry leaders across India.</p>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start glass-card p-3"
                                    style="background: rgba(74, 4, 4, 0.03);">
                                    <div class="me-3 mt-1">
                                        <i class="fa fa-check-circle text-primary" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Quality Focused</h5>
                                        <p class="small text-muted mb-0">Rigorous standards in every project.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start glass-card p-3"
                                    style="background: rgba(74, 4, 4, 0.03);">
                                    <div class="me-3 mt-1">
                                        <i class="fa fa-users text-primary" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Expert Team</h5>
                                        <p class="small text-muted mb-0">Skilled professionals on board.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(isset($history->year))
                            <div class="pbmit-history-box p-4 border-start border-primary border-4 bg-light rounded">
                                <h4 class="pbmit-color-global mb-0">Established in {{ $history->year }}</h4>
                                <p class="mb-0 text-muted mt-2">Built on a solid foundation of trust and reliability.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission & Vision -->
        <section class="section-md bg-light">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="glass-card p-5 h-100 text-center bg-white shadow-sm border-0">
                            <div class="icon-box mb-4 mx-auto"
                                style="width: 80px; height: 80px; background: rgba(212, 175, 55, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-bullseye text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h3 class="fw-bold">Our Mission</h3>
                            <p class="text-muted">To provide innovative construction and logistics solutions that empower
                                businesses and build lasting infrastructure.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="glass-card p-5 h-100 text-center bg-white shadow-sm border-0">
                            <div class="icon-box mb-4 mx-auto"
                                style="width: 80px; height: 80px; background: rgba(212, 175, 55, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-eye text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h3 class="fw-bold">Our Vision</h3>
                            <p class="text-muted">To be the most trusted and efficient construction partner in India,
                                recognized for our global standards.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="glass-card p-5 h-100 text-center bg-white shadow-sm border-0">
                            <div class="icon-box mb-4 mx-auto"
                                style="width: 80px; height: 80px; background: rgba(212, 175, 55, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-trophy text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h3 class="fw-bold">Our Values</h3>
                            <p class="text-muted">Integrity, Safety, Sustainability, and Excellence in every detail of our
                                operations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
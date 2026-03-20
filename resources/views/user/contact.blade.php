@extends('layouts.user')

@section('title', 'Contact Us - Adhya Construction')

@section('content')
<div class="pbmit-title-bar-wrapper" style="background-image: url('{{ asset('assets/user/images/otherpagebanner.jpg') }}');">
    <div class="container">
        <div class="pbmit-title-bar-content text-center py-5">
            <h1 class="pbmit-title">Contact Us</h1>
        </div>
    </div>
</div>

<section class="section-xl">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="pbmit-contact-info-box">
                    <div class="pbmit-ihbox-style-8">
                        <div class="pbmit-ihbox-icon">
                            <i class="pbmit-carvox-icon pbmit-carvox-icon-location-dot-solid"></i>
                        </div>
                        <div class="pbmit-ihbox-contents">
                            <h4 class="pbmit-element-title">Office Address</h4>
                            <p>Andhra Pradesh, Tamil Nadu, Kerala, Karnataka, Odisha & nearby</p>
                        </div>
                    </div>
                    <div class="pbmit-ihbox-style-8 mt-4">
                        <div class="pbmit-ihbox-icon">
                            <i class="pbmit-carvox-icon pbmit-carvox-icon-phone-volume-solid-1"></i>
                        </div>
                        <div class="pbmit-ihbox-contents">
                            <h4 class="pbmit-element-title">Phone Number</h4>
                            <p>9490003311, 9705799889</p>
                        </div>
                    </div>
                    <div class="pbmit-ihbox-style-8 mt-4">
                        <div class="pbmit-ihbox-icon">
                            <i class="pbmit-carvox-icon pbmit-carvox-icon-mail-alt"></i>
                        </div>
                        <div class="pbmit-ihbox-contents">
                            <h4 class="pbmit-element-title">Email Address</h4>
                            <p>aadyaconstructionsequip@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-form-wrapper p-5 bg-light rounded shadow-sm">
                    <div class="pbmit-heading-subheading mb-4">
                        <h4 class="pbmit-subtitle">Get in Touch</h4>
                        <h2 class="pbmit-title">Ready to Get Started?</h2>
                    </div>
                    <form class="contact-form" action="{{ route('user.contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="name" class="form-control py-3" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" name="email" class="form-control py-3" placeholder="Your Email" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" name="phone" class="form-control py-3" placeholder="Your Phone Number">
                            </div>
                            <div class="col-md-12 mb-3">
                                <textarea name="message" class="form-control py-3" rows="5" placeholder="Tell us about your project" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="pbmit-btn w-100 py-3">
                                    <span class="pbmit-button-content-wrapper">
                                        <span class="pbmit-button-text">Submit Request</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-xl p-0">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.729050064562!2d76.688562375543!3d30.710526074596356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fee9384742d41%3A0xf639726279f6e52c!2sAdhya%20Construction!5e0!3m2!1sen!2sin!4v1709810000000!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
@endsection

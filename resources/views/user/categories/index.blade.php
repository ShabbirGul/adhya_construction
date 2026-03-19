@extends('layouts.user')

@section('title', 'Vehicle Categories - Adhya Construction')

@section('content')
<div class="pbmit-title-bar-wrapper" style="background-image: url('{{ asset('assets/user/images/otherpagebanner.jpg') }}');">
    <div class="container">
        <div class="pbmit-title-bar-content text-center py-5">
            <h1 class="pbmit-title text-white">Vehicle Categories</h1>
            <div class="pbmit-breadcrumb">
                <a href="{{ route('home') }}" class="text-white-50">Home</a>
                <span class="text-white mx-2">/</span>
                <span class="text-white">Categories</span>
            </div>
        </div>
    </div>
</div>

<div class="page-content py-5">
    <div class="container">
        <div class="row">
            @forelse($categories as $category)
            <div class="col-md-4 mb-4">
                <article class="pbmit-award-box-style-1 border rounded overflow-hidden h-100 shadow-sm transition">
                    <div class="pbmit-awardbox-wrapper">
                        <div class="pbmit-img-box" style="height: 250px; overflow: hidden;">
                            <img src="{{ $category->image ? asset($category->image) : asset('assets/user/images/homepage-2/award-box/img-01.jpg') }}" 
                                 class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $category->title }}">		
                        </div>
                        <div class="p-4 text-center">
                            <h4 class="pbmit-freight-box-title mb-3 font-weight-bold">{{ $category->title }}</h4>
                            <p class="text-muted mb-4">{{ Str::limit($category->description, 100) }}</p>
                            <a class="pbmit-btn btn-sm" href="{{ route('user.vehicles', ['category' => $category->id]) }}">
                                <span class="pbmit-button-content-wrapper">
                                    <span class="pbmit-button-text">View Vehicles</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <h3>No categories found.</h3>
                <a href="{{ route('home') }}" class="pbmit-btn mt-3">Back to Home</a>
            </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    .transition { transition: all 0.3s ease; }
    .pbmit-award-box-style-1:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
</style>
@endsection

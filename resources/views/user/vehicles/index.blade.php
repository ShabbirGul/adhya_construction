@extends('layouts.user')

@section('title', 'Our Vehicles - Adhya Construction')

@section('content')
<div class="pbmit-title-bar-wrapper" style="background-image: url('{{ asset('assets/user/images/bg/titlebar.jpg') }}');">
    <div class="container">
        <div class="pbmit-title-bar-content text-center py-5">
            <h1 class="pbmit-title text-white">Our Vehicles</h1>
            <div class="pbmit-breadcrumb">
                <a href="{{ route('home') }}" class="text-white-50">Home</a>
                <span class="text-white mx-2">/</span>
                <span class="text-white">Vehicles</span>
            </div>
        </div>
    </div>
</div>

<div class="page-content py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar / Categories -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <aside class="widget widget_categories p-4 border rounded">
                        <h4 class="widget-title mb-3">Categories</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('user.vehicles') }}" class="{{ !request('category') ? 'pbmit-color-global font-weight-bold' : '' }}">All Vehicles</a></li>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('user.vehicles', ['category' => $category->id]) }}" 
                                   class="{{ request('category') == $category->id ? 'pbmit-color-global font-weight-bold' : '' }}">
                                    {{ $category->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>

            <!-- Vehicles List -->
            <div class="col-lg-9">
                <div class="row">
                    @forelse($vehicles as $vehicle)
                    <div class="col-md-6 mb-4">
                        <article class="pbmit-service-style-2 p-0 border rounded shadow-sm h-100 overflow-hidden">
                            <div class="pbminfotech-post-item">
                                <div class="pbmit-featured-img-wrapper" style="height: 200px; overflow: hidden;">
                                    <img src="{{ $vehicle->image ? asset($vehicle->image) : asset('assets/user/images/service/service-img-01.jpg') }}" 
                                         class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $vehicle->title }}">
                                </div>
                                <div class="pbminfotech-box-content p-3">
                                    <div class="pbmit-serv-cat pbmit-color-global font-weight-bold">{{ $vehicle->category->title }}</div>
                                    <h3 class="pbmit-service-title mt-2">{{ $vehicle->title }}</h3>
                                    <div class="pbmit-service-description mt-2 text-muted">
                                        <p>{{ Str::limit($vehicle->description, 80) }}</p>
                                    </div>
                                    <div class="pbmit-service-btn mt-3">
                                        <a class="pbmit-btn-link" href="{{ route('user.contact') }}">Inquiry Now</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <h4>No vehicles found in this category.</h4>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $vehicles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

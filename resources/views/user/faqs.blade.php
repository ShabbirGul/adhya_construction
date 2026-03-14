@extends('layouts.user')

@section('title', 'Frequently Asked Questions - Adhya Construction')

@section('content')
<div class="pbmit-title-bar-wrapper" style="background-image: url('{{ asset('assets/user/images/bg/titlebar.jpg') }}');">
    <div class="container">
        <div class="pbmit-title-bar-content text-center py-5">
            <h1 class="pbmit-title text-white">Frequently Asked Questions</h1>
            <div class="pbmit-breadcrumb">
                <a href="{{ route('home') }}" class="text-white-50">Home</a>
                <span class="text-white mx-2">/</span>
                <span class="text-white">FAQs</span>
            </div>
        </div>
    </div>
</div>

<div class="page-content py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="accordion custom-accordion" id="faqAccordion">
                    @forelse($faqs as $faq)
                    <div class="accordion-item mb-4 border-0 shadow-sm glass-card" style="border-radius: 15px !important; overflow: hidden;">
                        <h2 class="accordion-header" id="heading{{ $loop->index }}">
                            <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }} py-4 px-4 font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" style="background: transparent; color: var(--pbmit-global-color); font-size: 1.1rem;">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body px-4 pb-4 pt-0 text-muted" style="line-height: 1.8;">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-5">
                        <h4>No FAQs found at the moment.</h4>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-accordion .accordion-button:not(.collapsed) {
        box-shadow: none;
        color: var(--pbmit-global-color);
    }
    .custom-accordion .accordion-button::after {
        background-size: 1rem;
        transition: transform 0.3s ease;
    }
    .custom-accordion .accordion-item {
        background: #fff;
        transition: all 0.3s ease;
    }
    .custom-accordion .accordion-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important;
    }
</style>
@endsection

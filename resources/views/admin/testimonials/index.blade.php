@extends('layouts.admin')

@section('title', 'Testimonials')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" style="color: #ffffff; text-decoration: none;">Admin</a> /
<span>Testimonials</span>
@endsection

@section('content')
<div class="header" style="border:none; margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin:0; text-align: left; font-size: 1.5rem; color: var(--dark); font-weight: 700;">Testimonials</h1>
    <button id="openSlider" class="btn">
        <i class="fa-solid fa-plus"></i> Add Testimonial
    </button>
</div>

<div class="table-card">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 1.25rem 2rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">S.No</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Name</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Position</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Content</th>
                <th style="padding: 1.25rem 2rem; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonials as $testimonial)
            <tr>
                <td style="padding: 1rem 2rem;">{{ $loop->iteration + ($testimonials->currentPage() - 1) * $testimonials->perPage() }}</td>
                <td style="padding: 1rem; font-weight: 600; color: var(--dark);">{{ $testimonial->name }}</td>
                <td style="padding: 1rem;">{{ $testimonial->position }}</td>
                <td style="padding: 1rem; color: #64748b; font-size: 0.875rem;">{{ Str::limit($testimonial->content, 100) }}</td>
                <td style="padding: 1rem 2rem; text-align: right;">
                    <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #fee2e2; color: #ef4444; background: #fff; cursor: pointer;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align: center; padding: 4rem;">No testimonials found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="table-footer" style="padding: 1rem 2rem;">
        {{ $testimonials->links('vendor.pagination.custom') }}
    </div>
</div>

<!-- Add Slider -->
<div class="slider-overlay" id="sliderOverlay"></div>
<div class="right-slider" id="rightSlider">
    <div class="slider-header">
        <h2 style="margin:0;">Add New Testimonial</h2>
        <button class="close-slider" id="closeSlider">&times;</button>
    </div>
    <div class="slider-body">
        <form id="addTestimonialForm" action="{{ route('testimonials.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Name *</label>
                <input type="text" name="name" required style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;">
            </div>
            <div class="form-group">
                <label>Position / Company</label>
                <input type="text" name="position" style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;">
            </div>
            <div class="form-group">
                <label>Content *</label>
                <textarea name="content" rows="6" required style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;"></textarea>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </form>
    </div>
    <div class="slider-footer">
        <button type="submit" form="addTestimonialForm" class="btn-submit" style="flex: 1;">SAVE TESTIMONIAL</button>
        <button type="button" id="cancelSlider" class="btn">CANCEL</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const openSlider = document.getElementById('openSlider');
    const closeSlider = document.getElementById('closeSlider');
    const cancelSlider = document.getElementById('cancelSlider');
    const rightSlider = document.getElementById('rightSlider');
    const sliderOverlay = document.getElementById('sliderOverlay');

    openSlider.addEventListener('click', () => {
        rightSlider.classList.add('active');
        sliderOverlay.classList.add('active');
    });

    [closeSlider, cancelSlider, sliderOverlay].forEach(el => {
        el.addEventListener('click', () => {
            rightSlider.classList.remove('active');
            sliderOverlay.classList.remove('active');
        });
    });
</script>
@endsection

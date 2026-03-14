@extends('layouts.admin')

@section('title', 'History')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" style="color: #ffffff; text-decoration: none;">Admin</a> /
<span>History</span>
@endsection

@section('content')
<div class="header" style="border:none; margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin:0; text-align: left; font-size: 1.5rem; color: var(--dark); font-weight: 700;">History Records</h1>
    <button id="openSlider" class="btn">
        <i class="fa-solid fa-plus"></i> Add New Record
    </button>
</div>

<div class="table-card">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 1.25rem 2rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">S.No</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Image</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Title</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Year</th>
                <th style="padding: 1.25rem 2rem; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($histories as $history)
            <tr>
                <td style="padding: 1rem 2rem;">{{ $loop->iteration + ($histories->currentPage() - 1) * $histories->perPage() }}</td>
                <td style="padding: 1rem;">
                    @if($history->image)
                    <img src="{{ asset($history->image) }}" alt="" style="width: 48px; height: 48px; border-radius: 0.5rem; object-fit: cover; border: 1px solid #e2e8f0;">
                    @else
                    <div style="width: 48px; height: 48px; background: #f1f5f9; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                        <i class="fa-solid fa-image"></i>
                    </div>
                    @endif
                </td>
                <td style="padding: 1rem; font-weight: 600; color: var(--dark);">{{ $history->title }}</td>
                <td style="padding: 1rem;">{{ $history->year }}</td>
                <td style="padding: 1rem 2rem; text-align: right;">
                    <form action="{{ route('histories.destroy', $history->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #fee2e2; color: #ef4444; background: #fff; cursor: pointer;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align: center; padding: 4rem;">No history records found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="table-footer" style="padding: 1rem 2rem;">
        {{ $histories->links('vendor.pagination.custom') }}
    </div>
</div>

<!-- Add Slider -->
<div class="slider-overlay" id="sliderOverlay"></div>
<div class="right-slider" id="rightSlider">
    <div class="slider-header">
        <h2 style="margin:0;">Add New History Record</h2>
        <button class="close-slider" id="closeSlider">&times;</button>
    </div>
    <div class="slider-body">
        <form id="addHistoryForm" action="{{ route('histories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title *</label>
                <input type="text" name="title" required style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;">
            </div>
            <div class="form-group">
                <label>Year *</label>
                <input type="text" name="year" required style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;">
            </div>
            <div class="form-group">
                <label>Description *</label>
                <textarea name="description" rows="5" required style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;"></textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" accept="image/*" style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;">
            </div>
        </form>
    </div>
    <div class="slider-footer">
        <button type="submit" form="addHistoryForm" class="btn-submit" style="flex: 1;">SAVE RECORD</button>
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

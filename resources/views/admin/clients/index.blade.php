@extends('layouts.admin')

@section('title', 'Clients')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" style="color: #ffffff; text-decoration: none;">Admin</a> /
<span>Clients</span>
@endsection

@section('content')
<div class="header" style="border:none; margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin:0; text-align: left; font-size: 1.5rem; color: var(--dark); font-weight: 700;">Clients</h1>
    <button id="openSlider" class="btn">
        <i class="fa-solid fa-plus"></i> Add New Client
    </button>
</div>

<div class="table-card">
    <div class="table-header" style="padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9;">
        <form action="{{ route('clients.index') }}" method="GET" class="search-box" style="position: relative;">
            <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Clients..." style="width: 300px; transition: all 0.2s;">
        </form>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 1.25rem 2rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">S.No</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Logo</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Name</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Status</th>
                <th style="padding: 1.25rem 2rem; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
            <tr>
                <td style="padding: 1rem 2rem;">{{ $loop->iteration + ($clients->currentPage() - 1) * $clients->perPage() }}</td>
                <td style="padding: 1rem;">
                    @if($client->logo)
                    <img src="{{ asset($client->logo) }}" alt="" style="width: 48px; height: 48px; border-radius: 0.5rem; object-fit: contain; border: 1px solid #e2e8f0;">
                    @else
                    <div style="width: 48px; height: 48px; background: #f1f5f9; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                        <i class="fa-solid fa-image"></i>
                    </div>
                    @endif
                </td>
                <td style="padding: 1rem; font-weight: 600; color: var(--dark);">{{ $client->name }}</td>
                <td style="padding: 1rem;">
                    @if($client->status)
                    <span style="background: #dcfce7; color: #166534; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600;">Active</span>
                    @else
                    <span style="background: #fee2e2; color: #991b1b; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600;">Inactive</span>
                    @endif
                </td>
                <td style="padding: 1rem 2rem; text-align: right;">
                    <div style="display: inline-flex; gap: 0.5rem;">
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #fee2e2; color: #ef4444; background: #fff; cursor: pointer;" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align: center; padding: 4rem;">No clients found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="table-footer" style="padding: 1rem 2rem;">
        {{ $clients->links('vendor.pagination.custom') }}
    </div>
</div>

<!-- Add Slider -->
<div class="slider-overlay" id="sliderOverlay"></div>
<div class="right-slider" id="rightSlider">
    <div class="slider-header">
        <h2 style="margin:0;">Add New Client</h2>
        <button class="close-slider" id="closeSlider">&times;</button>
    </div>
    <div class="slider-body">
        <form id="addClientForm" action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Client Name *</label>
                <input type="text" name="name" required style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;">
            </div>
            <div class="form-group">
                <label>Logo</label>
                <input type="file" name="logo" accept="image/*" style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;">
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
        <button type="submit" form="addClientForm" class="btn-submit" style="flex: 1;">SAVE CLIENT</button>
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

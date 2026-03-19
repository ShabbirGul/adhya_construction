@extends('layouts.admin')

@section('title', 'Vehicles')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" style="color: #ffffff; text-decoration: none;">Admin</a> /
<span>Vehicles</span>
@endsection

@section('content')
<div class="header" style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin:0; font-size: 1.5rem; color: var(--dark); font-weight: 700;">Vehicles</h1>
    <button id="openSlider" class="btn">
        <i class="fa-solid fa-plus"></i> Add New Vehicle
    </button>
</div>

<div class="table-card">
    <div class="table-header"
        style="padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9;">
        <form action="{{ route('vehicles.index') }}" method="GET" class="search-box" style="position: relative;">
            <i class="fa-solid fa-magnifying-glass"
                style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Vehicles..."
                style="width: 300px; padding: 0.75rem 1rem 0.75rem 2.5rem; border: 1px solid #cbd5e1; border-radius: 0.75rem;">
        </form>

        <div class="per-page">
            <form action="{{ route('vehicles.index') }}" method="GET">
                <select name="per_page" onchange="this.form.submit()"
                    style="padding: 0.5rem 1rem; border-radius: 0.5rem; border: 1px solid #cbd5e1; background: #ffffff; color: #1e293b; cursor: pointer;">
                    <option value="10" {{ request('per_page')==10 ? 'selected' : '' }}>10 per page</option>
                    <option value="25" {{ request('per_page')==25 ? 'selected' : '' }}>25 per page</option>
                    <option value="50" {{ request('per_page')==50 ? 'selected' : '' }}>50 per page</option>
                </select>
            </form>
        </div>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th
                    style="padding: 1.25rem 2rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    S.No</th>
                <th
                    style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    Image</th>
                <th
                    style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    Title</th>
                <th
                    style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    Category</th>
                <th
                    style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    Status</th>
                <th
                    style="padding: 1.25rem 2rem; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vehicles as $vehicle)
            <tr>
                <td style="padding: 1rem 2rem;">{{ $loop->iteration + ($vehicles->currentPage() - 1) *
                    $vehicles->perPage() }}</td>
                <td style="padding: 1rem;">
                    @if($vehicle->image)
                    <img src="{{ asset($vehicle->image) }}" alt=""
                        style="width: 48px; height: 48px; border-radius: 0.5rem; object-fit: cover; border: 1px solid #e2e8f0;">
                    @else
                    <div
                        style="width: 48px; height: 48px; background: #f1f5f9; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    @endif
                </td>
                <td style="padding: 1rem; font-weight: 600; color: var(--dark);">{{ $vehicle->title }}</td>
                <td style="padding: 1rem;"><span
                        style="background: #f1f5f9; color: #475569; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem;">{{
                        $vehicle->category->title ?? 'N/A' }}</span></td>
                <td style="padding: 1rem;">
                    @if($vehicle->status)
                    <span
                        style="background: #dcfce7; color: #166534; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600;">Active</span>
                    @else
                    <span
                        style="background: #fee2e2; color: #991b1b; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600;">Inactive</span>
                    @endif
                </td>
                <td style="padding: 1rem 2rem; text-align: right;">
                    <div style="display: inline-flex; gap: 0.5rem;">
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}"
                            style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #e2e8f0; color: #64748b; text-decoration: none;"
                            title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this vehicle?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #fee2e2; color: #ef4444; background: #fff; cursor: pointer;"
                                title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 4rem; color: #64748b;">
                    <i class="fa-solid fa-truck-pickup fa-3x"
                        style="margin-bottom: 1rem; display: block; opacity: 0.3;"></i>
                    No vehicles found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table-footer">
        <div style="display: flex; align-items: center; gap: 1.5rem;">
            <div class="pagination-status">
                Showing {{ $vehicles->firstItem() ?? 0 }} - {{ $vehicles->lastItem() ?? 0 }} of {{ $vehicles->total() }}
                entries
            </div>
        </div>
        <div>
            {{ $vehicles->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>

<!-- Right Side Slider (Off-canvas) -->
<div class="slider-overlay" id="sliderOverlay"></div>
<div class="right-slider" id="rightSlider">
    <div class="slider-header">
        <h2 style="margin:0; font-size: 1.25rem; font-weight: 700;">Add New Vehicle</h2>
        <button class="close-slider" id="closeSlider">&times;</button>
    </div>
    <div class="slider-body">
        <form id="addVehicleForm" action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">
                    <span>Vehicle Title <span class="required">*</span></span>
                </label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="" required class="form-control">
                @error('title') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}
                </div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">
                    <span>Category <span class="required">*</span></span>
                </label>
                <select name="category_id" required class="form-control">
                    <option value="" disabled selected>Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>{{
                        $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message
                    }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">
                    <span>Description <span class="required">*</span></span>
                </label>
                <textarea name="description" rows="5" placeholder="Enter vehicle details..." required
                    class="form-control">{{ old('description') }}</textarea>
                @error('description') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message
                    }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Vehicle Image</label>
                <div class="upload-container" onclick="document.getElementById('vehicle_image').click()">
                    <input type="file" name="image" id="vehicle_image" accept="image/*" style="display: none;">
                    <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
                    <span class="upload-text">Click to upload image</span>
                    <span class="upload-hint">JPG, PNG, GIF, WEBP (Max 2MB)</span>
                    <div id="image_preview" class="preview-container">
                        <img src="" alt="Preview" class="preview-image">
                    </div>
                </div>
                @error('image') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}
                </div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </form>
    </div>
    <div class="slider-footer">
        <button type="submit" form="addVehicleForm" class="btn-submit" style="flex: 1;">SAVE VEHICLE</button>
        <button type="button" id="cancelSlider" class="btn"
            style="background: #f1f5f9; color: #64748b !important; box-shadow: none;">CANCEL</button>
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
    const vehicleImage = document.getElementById('vehicle_image');
    const imagePreview = document.getElementById('image_preview');

    const showSlider = () => {
        rightSlider.classList.add('active');
        sliderOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    };

    const hideSlider = () => {
        rightSlider.classList.remove('active');
        sliderOverlay.classList.remove('active');
        document.body.style.overflow = '';
    };

    openSlider.addEventListener('click', showSlider);
    closeSlider.addEventListener('click', hideSlider);
    cancelSlider.addEventListener('click', hideSlider);
    sliderOverlay.addEventListener('click', hideSlider);

    vehicleImage.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.querySelector('img').src = e.target.result;
                imagePreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    @if ($errors -> any())
        showSlider();
    @endif
</script>
@endsection
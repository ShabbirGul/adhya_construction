@extends('layouts.admin')

@section('title', 'Banners')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" style="color: #ffffff; text-decoration: none;">Admin</a> /
<span>Banners</span>
@endsection

@section('content')
<div class="header"
    style="border:none; margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin:0; text-align: left; font-size: 1.5rem; color: var(--dark); font-weight: 700;">Banners</h1>
    <button id="openSlider" class="btn">
        <i class="fa-solid fa-plus"></i> Add New Banner
    </button>
</div>

<div class="table-card">
    <div class="table-header"
        style="padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9;">
        <form action="{{ route('banners.index') }}" method="GET" class="search-box" style="position: relative;">
            <i class="fa-solid fa-magnifying-glass"
                style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Banners..."
                style="width: 300px; transition: all 0.2s;">
        </form>

        <div class="per-page">
            <form action="{{ route('banners.index') }}" method="GET">
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
                    Subtitle</th>
                <th
                    style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    Button</th>
                <th
                    style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    Status</th>
                <th
                    style="padding: 1.25rem 2rem; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($banners as $banner)
            <tr>
                <td style="padding: 1rem 2rem;">{{ $loop->iteration + ($banners->currentPage() - 1) *
                    $banners->perPage() }}</td>
                <td style="padding: 1rem;">
                    @if($banner->image)
                    <img src="{{ asset('storage/' . $banner->image) }}" alt=""
                        style="width: 60px; height: 60px; border-radius: 0.5rem; object-fit: cover; border: 1px solid #e2e8f0;">
                    @else
                    <div
                        style="width: 60px; height: 60px; background: #f1f5f9; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                        <i class="fa-solid fa-image"></i>
                    </div>
                    @endif
                </td>
                <td style="padding: 1rem; font-weight: 600; font-size: 0.875rem; color: var(--dark);">{{ $banner->title
                    }}</td>
                <td style="padding: 1rem; font-size: 0.875rem; color: #64748b;">{{ Str::limit($banner->subtitle, 40) }}
                </td>
                <td style="padding: 1rem;">
                    @if($banner->button_text)
                    <span
                        style="font-size: 0.75rem; background: #f1f5f9; padding: 0.25rem 0.5rem; border-radius: 0.25rem; color: #475569;">{{
                        $banner->button_text }}</span>
                    @else
                    <span style="color: #cbd5e1; font-size: 0.75rem;">None</span>
                    @endif
                </td>
                <td style="padding: 1rem;">
                    @if($banner->status)
                    <span
                        style="background: #dcfce7; color: #166534; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600;">Active</span>
                    @else
                    <span
                        style="background: #fee2e2; color: #991b1b; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600;">Inactive</span>
                    @endif
                </td>
                <td style="padding: 1rem 2rem; text-align: right;">
                    <div style="display: inline-flex; gap: 0.5rem;">
                        <button type="button" class="edit-banner-btn" data-banner="{{ json_encode($banner) }}"
                            data-image-url="{{ asset('storage/' . $banner->image) }}"
                            style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #e2e8f0; color: #64748b; background: #fff; cursor: pointer; transition: all 0.2s;"
                            title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <form action="{{ route('banners.destroy', $banner->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this banner?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #fee2e2; color: #ef4444; background: #fff; cursor: pointer; transition: all 0.2s;"
                                title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 4rem; color: #64748b;">
                    <i class="fa-solid fa-images fa-3x" style="margin-bottom: 1rem; display: block; opacity: 0.3;"></i>
                    No banners found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table-footer">
        <div style="display: flex; align-items: center; gap: 1.5rem;">
            <div class="pagination-status">
                Showing {{ $banners->firstItem() ?? 0 }} - {{ $banners->lastItem() ?? 0 }} of {{
                $banners->total() }} entries
            </div>

            <div class="footer-per-page">
                <form action="{{ route('banners.index') }}" method="GET">
                    @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <select name="per_page" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page')==10 ? 'selected' : '' }}>10 rows</option>
                        <option value="25" {{ request('per_page')==25 ? 'selected' : '' }}>25 rows</option>
                        <option value="50" {{ request('per_page')==50 ? 'selected' : '' }}>50 rows</option>
                    </select>
                </form>
            </div>
        </div>

        <div>
            {{ $banners->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>

<!-- Right Side Slider (Off-canvas) -->
<div class="slider-overlay" id="sliderOverlay"></div>
<div class="right-slider" id="rightSlider">
    <div class="slider-header">
        <h2 id="sliderTitle" style="margin:0; font-size: 1.25rem; font-weight: 700;">Add New Banner</h2>
        <button class="close-slider" id="closeSlider">&times;</button>
    </div>
    <div class="slider-body">
        <form id="bannerForm" action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="methodField"></div>

            <div class="form-group">
                <label class="form-label">
                    <span>Banner Title <span class="required">*</span></span>
                </label>
                <input type="text" name="title" id="bannerTitleInput" value="{{ old('title') }}"
                    placeholder="e.g. Summer Collection" required class="form-control">
                @error('title') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}
                </div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">
                    <span>Banner Subtitle <span class="required">*</span></span>
                </label>
                <input type="text" name="subtitle" id="bannerSubtitleInput" value="{{ old('subtitle') }}"
                    placeholder="e.g. Up to 50% Off" required class="form-control">
                @error('subtitle') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}
                </div> @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" id="bannerButtonTextInput" value="{{ old('button_text') }}"
                        placeholder="e.g. Shop Now" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" id="bannerButtonLinkInput" value="{{ old('button_link') }}"
                        placeholder="e.g. https://..." class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Banner Image <span id="imageRequiredStar" class="required">*</span></label>
                <div class="upload-container" onclick="document.getElementById('banner_image').click()"
                    style="background: #f8fafc; border: 2px dashed #e2e8f0; border-radius: 1rem; padding: 1.5rem; text-align: center; cursor: pointer;">
                    <input type="file" name="image" id="banner_image" accept="image/*" style="display: none;">
                    <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
                    <span class="upload-text">Click to upload image</span>
                    <span class="upload-hint">JPG, PNG, GIF, WEBP (Max 2MB)</span>

                    <div id="image_preview_box" class="preview-container" style="display: none; margin-top: 1rem;">
                        <img id="image_preview_img" src="" alt="Preview" class="preview-image"
                            style="max-width: 100%; border-radius: 0.75rem;">
                    </div>
                </div>
                @error('image') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}
                </div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" id="bannerStatusInput" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </form>
    </div>
    <div class="slider-footer">
        <button type="submit" form="bannerForm" class="btn-submit" style="flex: 1;">SAVE BANNER</button>
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
    const bannerImage = document.getElementById('banner_image');
    const imagePreviewBox = document.getElementById('image_preview_box');
    const imagePreviewImg = document.getElementById('image_preview_img');
    const bannerForm = document.getElementById('bannerForm');
    const sliderTitle = document.getElementById('sliderTitle');
    const methodField = document.getElementById('methodField');
    const imageRequiredStar = document.getElementById('imageRequiredStar');

    // Form Inputs
    const titleInput = document.getElementById('bannerTitleInput');
    const subtitleInput = document.getElementById('bannerSubtitleInput');
    const buttonTextInput = document.getElementById('bannerButtonTextInput');
    const buttonLinkInput = document.getElementById('bannerButtonLinkInput');
    const statusInput = document.getElementById('bannerStatusInput');

    const showSlider = (isEdit = false, banner = null, imageUrl = null) => {
        if (isEdit) {
            sliderTitle.innerText = 'Edit Banner';
            bannerForm.action = `/admin/banners/${banner.id}`;
            methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
            imageRequiredStar.style.display = 'none';
            bannerImage.required = false;

            // Fill Data
            titleInput.value = banner.title;
            subtitleInput.value = banner.subtitle;
            buttonTextInput.value = banner.button_text || '';
            buttonLinkInput.value = banner.button_link || '';
            statusInput.value = banner.status ? '1' : '0';

            if (imageUrl) {
                imagePreviewImg.src = imageUrl;
                imagePreviewBox.style.display = 'block';
            }
        } else {
            sliderTitle.innerText = 'Add New Banner';
            bannerForm.action = "{{ route('banners.store') }}";
            methodField.innerHTML = '';
            imageRequiredStar.style.display = 'inline';
            bannerImage.required = true;

            // Reset Data
            bannerForm.reset();
            imagePreviewBox.style.display = 'none';
        }

        rightSlider.classList.add('active');
        sliderOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    };

    const hideSlider = () => {
        rightSlider.classList.remove('active');
        sliderOverlay.classList.remove('active');
        document.body.style.overflow = '';
    };

    openSlider.addEventListener('click', () => showSlider(false));
    closeSlider.addEventListener('click', hideSlider);
    cancelSlider.addEventListener('click', hideSlider);
    sliderOverlay.addEventListener('click', hideSlider);

    // Edit Button Click
    document.querySelectorAll('.edit-banner-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const banner = JSON.parse(this.dataset.banner);
            const imageUrl = this.dataset.imageUrl;
            showSlider(true, banner, imageUrl);
        });
    });

    bannerImage.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreviewImg.src = e.target.result;
                imagePreviewBox.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    // Keep slider open if there are validation errors
    @if ($errors -> any())
        // Detect if it was an edit or add based on session or old input if possible
        // For now, simpler to just open as Add or let the user decide
        rightSlider.classList.add('active');
    sliderOverlay.classList.add('active');
    @endif
</script>
@endsection
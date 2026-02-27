@extends('layouts.admin')

@section('title', 'Categories')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" style="color: #ffffff; text-decoration: none;">Admin</a> /
<span>Categories</span>
@endsection

@section('content')
<div class="header"
    style="border:none; margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin:0; text-align: left; font-size: 1.5rem; color: var(--dark); font-weight: 700;">Categories</h1>
    <button id="openSlider" class="btn">
        <i class="fa-solid fa-plus"></i> Add New Category
    </button>
</div>

<div class="table-card">
    <div class="table-header"
        style="padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9;">
        <form action="{{ route('categories.index') }}" method="GET" class="search-box" style="position: relative;">
            <i class="fa-solid fa-magnifying-glass"
                style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Categories..."
                style="width: 300px; transition: all 0.2s;">
        </form>

        <div class="per-page">
            <form action="{{ route('categories.index') }}" method="GET">
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
                    Description</th>
                <th
                    style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    Status</th>
                <th
                    style="padding: 1.25rem 2rem; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                    Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td style="padding: 1rem 2rem;">{{ $loop->iteration + ($categories->currentPage() - 1) *
                    $categories->perPage() }}</td>
                <td style="padding: 1rem;">
                    @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt=""
                        style="width: 48px; height: 48px; border-radius: 0.5rem; object-fit: cover; border: 1px solid #e2e8f0;">
                    @else
                    <div
                        style="width: 48px; height: 48px; background: #f1f5f9; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                        <i class="fa-solid fa-image"></i>
                    </div>
                    @endif
                </td>
                <td style="padding: 1rem; font-weight: 600; color: var(--dark);">{{ $category->title }}</td>
                <td style="padding: 1rem; color: #64748b; max-width: 300px;">{{ Str::limit($category->description, 60)
                    }}</td>
                <td style="padding: 1rem;">
                    @if($category->status)
                    <span
                        style="background: #dcfce7; color: #166534; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600;">Active</span>
                    @else
                    <span
                        style="background: #fee2e2; color: #991b1b; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600;">Inactive</span>
                    @endif
                </td>
                <td style="padding: 1rem 2rem; text-align: right;">
                    <div style="display: inline-flex; gap: 0.5rem;">
                        <a href="{{ route('categories.edit', $category->id) }}"
                            style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #e2e8f0; color: #64748b; text-decoration: none; transition: all 0.2s;"
                            title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this category?')">
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
                <td colspan="6" style="text-align: center; padding: 4rem; color: #64748b;">
                    <i class="fa-solid fa-folder-open fa-3x"
                        style="margin-bottom: 1rem; display: block; opacity: 0.3;"></i>
                    No categories found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table-footer">
        <div style="display: flex; align-items: center; gap: 1.5rem;">
            <div class="pagination-status">
                Showing {{ $categories->firstItem() ?? 0 }} - {{ $categories->lastItem() ?? 0 }} of {{
                $categories->total() }} entries
            </div>

            <div class="footer-per-page">
                <form action="{{ route('categories.index') }}" method="GET">
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
            {{ $categories->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>

<!-- Right Side Slider (Off-canvas) -->
<div class="slider-overlay" id="sliderOverlay"></div>
<div class="right-slider" id="rightSlider">
    <div class="slider-header">
        <h2 style="margin:0; font-size: 1.25rem; font-weight: 700;">Add New Category</h2>
        <button class="close-slider" id="closeSlider">&times;</button>
    </div>
    <div class="slider-body">
        <form id="addCategoryForm" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label style="color: #475569; font-weight: 600;">Category Title <span
                        style="color: #ef4444;">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="" required
                    style="background: #ffffff; color: #1e293b; border: 1px solid #cbd5e1; padding: 0.875rem;">
                @error('title') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}
                </div> @enderror
            </div>

            <div class="form-group">
                <label style="color: #475569; font-weight: 600;">Description <span
                        style="color: #ef4444;">*</span></label>
                <textarea name="description" rows="6" placeholder="Enter category details..." required
                    style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; font-family: inherit; resize: vertical;">{{ old('description') }}</textarea>
                @error('description') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message
                    }}</div> @enderror
            </div>

            <div class="form-group">
                <label style="color: #475569; font-weight: 600;">Category Image</label>
                <div
                    style="border: 2px dashed #cbd5e1; border-radius: 0.75rem; padding: 1.5rem; text-align: center; background: #f8fafc;">
                    <input type="file" name="image" id="category_image" accept="image/*" style="display: none;">
                    <label for="category_image" style="cursor: pointer; margin: 0; color: var(--primary);">
                        <i class="fa-solid fa-cloud-arrow-up fa-2x" style="display: block; margin-bottom: 0.5rem;"></i>
                        <span>Click to upload image</span>
                    </label>
                    <div id="image_preview" style="margin-top: 1rem; display: none;">
                        <img src="" alt="Preview"
                            style="max-width: 100%; height: 100px; border-radius: 0.5rem; object-fit: cover;">
                    </div>
                </div>
                <small style="color: #64748b; display: block; margin-top: 0.5rem;">JPG, PNG, GIF, WEBP (Max 2MB)</small>
                @error('image') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}
                </div> @enderror
            </div>

            <div class="form-group">
                <label style="color: #475569; font-weight: 600;">Status</label>
                <select name="status"
                    style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; background: #ffffff; cursor: pointer;">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </form>
    </div>
    <div class="slider-footer">
        <button type="submit" form="addCategoryForm" class="btn-submit" style="flex: 1;">SAVE CATEGORY</button>
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
    const categoryImage = document.getElementById('category_image');
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

    categoryImage.addEventListener('change', function () {
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
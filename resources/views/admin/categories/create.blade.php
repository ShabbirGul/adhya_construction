@extends('layouts.admin')

@section('title', 'Add Category')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" style="color: #64748b;">Admin</a> / <a href="{{ route('categories.index') }}"
    style="color: #64748b;">Categories</a> / <span>Add</span>
@endsection

@section('content')
<div class="form-card" style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 2rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 1rem;">
        <h2 style="margin:0; font-size: 1.5rem; color: var(--dark); font-weight: 700;">Add New Category</h2>
        <p style="color: #64748b; margin: 0.5rem 0 0 0;">Create a new category to organize your projects or vehicles.
        </p>
    </div>

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">
                <span>Category Title <span class="required">*</span></span>
            </label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Projects" required
                class="form-control">
            @error('title') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">
                <span>Description <span class="required">*</span></span>
            </label>
            <textarea name="description" rows="5" placeholder="Enter category details..." required
                class="form-control">{{ old('description') }}</textarea>
            @error('description') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}
            </div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Category Image</label>
            <div class="upload-container" onclick="document.getElementById('category_image').click()"
                style="background: #f8fafc; border: 2px dashed #e2e8f0; border-radius: 1rem; padding: 2rem; text-align: center; cursor: pointer; transition: all 0.2s;">
                <input type="file" name="image" id="category_image" accept="image/*" style="display: none;">
                <i class="fa-solid fa-cloud-arrow-up"
                    style="font-size: 2.5rem; color: #cbd5e1; margin-bottom: 1rem; display: block;"></i>
                <span style="display: block; font-weight: 600; color: #475569; margin-bottom: 0.25rem;">Click to upload
                    image</span>
                <span style="display: block; font-size: 0.75rem; color: #94a3b8;">JPG, PNG, GIF, WEBP (Max 2MB)</span>
                <div id="image_preview_container" style="margin-top: 1.5rem; display: none;">
                    <img id="image_preview" src="" alt="Preview"
                        style="max-width: 150px; border-radius: 0.75rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                </div>
            </div>
            @error('image') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status')=='1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status')=='0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 3rem; border-top: 1px solid #f1f5f9; padding-top: 2rem;">
            <button type="submit" class="btn" style="padding: 0.875rem 2.5rem;">SAVE CATEGORY</button>
            <a href="{{ route('categories.index') }}" class="btn"
                style="background: #f1f5f9; color: #64748b !important; border: 1px solid #e2e8f0; box-shadow: none; padding: 0.875rem 2.5rem;">CANCEL</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('category_image').addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('image_preview').src = e.target.result;
                document.getElementById('image_preview_container').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
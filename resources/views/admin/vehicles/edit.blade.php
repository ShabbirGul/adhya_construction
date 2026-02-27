@extends('layouts.admin')

@section('title', 'Edit Vehicle')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" style="color: #ffffff; text-decoration: none;">Admin</a> / <a
    href="{{ route('vehicles.index') }}" style="color: #ffffff; text-decoration: none;">Vehicles</a> / <span>Edit</span>
@endsection

@section('content')
<div class="form-card" style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 2rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 1rem;">
        <h2 style="margin:0; font-size: 1.5rem; color: var(--dark); font-weight: 700;">Edit Vehicle</h2>
        <p style="color: #64748b; margin: 0.5rem 0 0 0;">Update the core details and branding of your vehicle.</p>
    </div>

    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">
                <span>Vehicle Title <span class="required">*</span></span>
            </label>
            <input type="text" name="title" value="{{ old('title', $vehicle->title) }}"
                placeholder="e.g. Excavator Model X" required class="form-control">
            @error('title') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">
                <span>Category <span class="required">*</span></span>
            </label>
            <select name="category_id" required class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $vehicle->category_id) == $category->id ?
                    'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
            @error('category_id') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}
            </div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">
                <span>Description <span class="required">*</span></span>
            </label>
            <textarea name="description" rows="5" placeholder="Enter vehicle details..." required
                class="form-control">{{ old('description', $vehicle->description) }}</textarea>
            @error('description') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}
            </div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Vehicle Image</label>
            <div
                style="display: flex; gap: 2rem; align-items: start; background: #f8fafc; padding: 1.5rem; border-radius: 1rem; border: 1px solid #e2e8f0; margin-bottom: 1.5rem;">
                <div style="text-align: center;">
                    <span
                        style="display: block; font-size: 0.75rem; color: #64748b; margin-bottom: 0.75rem; font-weight: 600;">CURRENT
                        IMAGE</span>
                    @if($vehicle->image)
                    <img src="{{ asset('storage/' . $vehicle->image) }}" alt=""
                        style="width: 120px; height: 120px; border-radius: 0.75rem; object-fit: cover; border: 2px solid #ffffff; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                    @else
                    <div
                        style="width: 120px; height: 120px; background: #ffffff; display: flex; align-items: center; justify-content: center; color: #cbd5e1; border-radius: 0.75rem; border: 1px solid #e2e8f0;">
                        <i class="fa-solid fa-truck fa-2x"></i>
                    </div>
                    @endif
                </div>
                <div style="flex: 1;">
                    <span
                        style="display: block; font-size: 0.75rem; color: #64748b; margin-bottom: 0.75rem; font-weight: 600;">REPLACE
                        IMAGE</span>
                    <input type="file" name="image" accept="image/*" class="form-control"
                        style="background: #ffffff; padding: 0.5rem 1rem;">
                    <p style="font-size: 0.75rem; color: #94a3b8; margin-top: 0.5rem; margin-bottom: 0;">JPG, PNG, GIF,
                        WEBP (Max 2MB)</p>
                </div>
            </div>
            @error('image') <div style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status', $vehicle->status) ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !old('status', $vehicle->status) ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 3rem; border-top: 1px solid #f1f5f9; padding-top: 2rem;">
            <button type="submit" class="btn" style="padding: 0.875rem 2.5rem;">UPDATE VEHICLE</button>
            <a href="{{ route('vehicles.index') }}" class="btn"
                style="background: #f1f5f9; color: #64748b !important; border: 1px solid #e2e8f0; box-shadow: none; padding: 0.875rem 2.5rem;">CANCEL</a>
        </div>
    </form>
</div>
@endsection
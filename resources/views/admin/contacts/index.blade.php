@extends('layouts.admin')

@section('title', 'Contact Queries')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" style="color: #ffffff; text-decoration: none;">Admin</a> /
<span>Contact Queries</span>
@endsection

@section('content')
<div class="header" style="border:none; margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin:0; text-align: left; font-size: 1.5rem; color: var(--dark); font-weight: 700;">Contact Queries</h1>
</div>

<div class="table-card">
    <div class="table-header" style="padding: 1.5rem 2rem; border-bottom: 1px solid #f1f5f9;">
        <form action="{{ route('contacts.index') }}" method="GET" class="search-box" style="position: relative;">
            <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email or phone..." style="width: 300px; transition: all 0.2s;">
        </form>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 1.25rem 2rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Date</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Sender</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Contact Info</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Message</th>
                <th style="padding: 1.25rem 2rem; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($queries as $item)
            <tr>
                <td style="padding: 1rem 2rem; font-size: 0.875rem;">{{ $item->created_at->format('M d, Y') }}</td>
                <td style="padding: 1rem; font-weight: 600; color: var(--dark);">{{ $item->name }}</td>
                <td style="padding: 1rem; font-size: 0.875rem; color: #64748b;">
                    <div><i class="fa-solid fa-envelope" style="width: 15px;"></i> {{ $item->email }}</div>
                    <div><i class="fa-solid fa-phone" style="width: 15px;"></i> {{ $item->phone }}</div>
                </td>
                <td style="padding: 1rem; color: #64748b; font-size: 0.875rem;">{{ Str::limit($item->message, 150) }}</td>
                <td style="padding: 1rem 2rem; text-align: right;">
                    <form action="{{ route('contacts.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this query?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #fee2e2; color: #ef4444; background: #fff; cursor: pointer;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align: center; padding: 4rem;">No queries found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="table-footer" style="padding: 1rem 2rem;">
        {{ $queries->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Adhya Construction</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('styles')
</head>

<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <i class="fa-solid fa-helmet-safety"></i>
                <span>ADHYA ADMIN</span>
            </div>
            <nav class="sidebar-nav">
                <a href="{{ route('categories.index') }}"
                    class="{{ request()->routeIs('categories.*') || request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-layer-group"></i> Categories
                </a>
                <a href="{{ route('banners.index') }}" class="{{ request()->routeIs('banners.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-image"></i> Banners
                </a>
                <a href="{{ route('vehicles.index') }}" class="{{ request()->routeIs('vehicles.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-truck-pickup"></i> Vehicles
                </a>
            </nav>
            <div class="sidebar-footer">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-header">
                <div class="breadcrumb">
                    @yield('breadcrumb')
                </div>
                <div class="user-info">
                    <span>Admin User</span>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=f59e0b&color=1e293b" alt="AV">
                </div>
            </header>

            <div class="content-body">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>

    @yield('scripts')
</body>

</html>
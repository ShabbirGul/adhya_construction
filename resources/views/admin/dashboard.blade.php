<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Adhya Construction</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        body {
            background: #f1f5f9;
            color: #1e293b;
            display: block;
            padding: 2rem;
        }
    </style>
</head>

<body>
    <div class="dashboard-container" style="margin: 0 auto;">
        <div class="header">
            <h2 style="margin:0;">Adhya Construction Admin</h2>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-link" style="border:none; cursor:pointer;">LOGOUT</button>
            </form>
        </div>

        <div style="padding: 2rem; border: 2px dashed #cbd5e1; border-radius: 0.75rem; text-align: center;">
            <p style="font-size: 1.25rem; color: #64748b;">Welcome to your secure dashboard, Admin!</p>
            <p>You can manage your construction projects, site updates, and user accounts from here.</p>
        </div>
    </div>
</body>

</html>
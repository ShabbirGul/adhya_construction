<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Adhya Construction</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <div class="login-card">
        <div class="construction-logo">
            <i class="fa-solid fa-helmet-safety"></i>
        </div>
        <h1>ADHYA ADMIN</h1>

        @if ($errors->any())
        <div
            style="background: rgba(239, 68, 68, 0.2); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; font-size: 0.875rem; color: #fecaca;">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="/admin/login" method="POST">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="admin@gmail.com">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn">SECURE LOGIN</button>
        </form>
    </div>
</body>

</html>
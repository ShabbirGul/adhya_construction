<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Aadya Construction</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #f59e0b;
            --primary-hover: #d97706;
            --dark: #040720;
            /* New Theme Color */
            --light: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: var(--light);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 3rem;
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }

        .construction-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .construction-logo i {
            font-size: 3rem;
            color: var(--primary);
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #94a3b8;
        }

        input {
            width: 100%;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0.875rem;
            border-radius: 0.75rem;
            color: white;
            font-size: 1rem;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .btn {
            width: 100%;
            background: var(--primary);
            color: var(--dark);
            padding: 1rem;
            border-radius: 0.75rem;
            border: none;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }

        .error-msg {
            color: #ef4444;
            font-size: 0.8rem;
            margin-top: 1rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="construction-logo">
            <i class="fa-solid fa-helmet-safety"></i>
        </div>
        <h1>Aadya ADMIN</h1>

        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="admin@gmail.com">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn">LOGIN TO DASHBOARD</button>

            @if($errors->any())
                <div class="error-msg">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>
</body>

</html>
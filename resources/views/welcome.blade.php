<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dental Care</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
            margin: 0;
        }
        .center-box {
            max-width: 420px;
            margin: 7vh auto;
            background: #fff;
            border-radius: 1.2rem;
            box-shadow: 0 8px 32px rgba(60,72,100,0.10);
            padding: 2.5rem 2rem 2rem 2rem;
            text-align: center;
        }
        .logo-circle {
            width: 80px;
            height: 80px;
            background: #6366f1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem auto;
        }
        .logo-circle i {
            color: #fff;
            font-size: 2.5rem;
        }
        h1 {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        .subtitle {
            color: #64748b;
            margin-bottom: 2rem;
        }
        .welcome-btn {
            display: inline-block;
            margin: 0.5rem 0.5rem 0 0.5rem;
            padding: 0.7rem 1.5rem;
            border-radius: 2rem;
            border: none;
            background: #6366f1;
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            transition: background 0.2s;
            text-decoration: none;
        }
        .welcome-btn:hover {
            background: #4338ca;
        }
        .footer {
            margin-top: 2.5rem;
            color: #94a3b8;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <div class="center-box">
        <div class="logo-circle">
            <i class="fas fa-tooth"></i>
        </div>
        <h1>Welcome to Dental Care</h1>
        <div class="subtitle">Your smile, our passion. Manage your dental clinic with ease.</div>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/admin/dashboard') }}" class="welcome-btn">
                    <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="welcome-btn">
                    <i class="fas fa-sign-in-alt me-1"></i> Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="welcome-btn" style="background:#f59e42;">
                        <i class="fas fa-user-plus me-1"></i> Register
                    </a>
                @endif
            @endauth
        @endif
        <div class="footer">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} &middot; PHP v{{ PHP_VERSION }}
        </div>
    </div>
</body>
</html>

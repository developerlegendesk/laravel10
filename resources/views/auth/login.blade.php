<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $setting->app_name }} - Sign In</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
            display: flex;
        }

        /* ── Layout ── */
        .auth-wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

       .auth-left {
            flex: 0 0 50%;
            background: linear-gradient(135deg, #1e3a5f 0%, #2563eb 100%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 52px 56px;
            position: relative;
            overflow: hidden;
            gap: 40px; /* ← add this */
        }

        .auth-left::before {
            content: '';
            position: absolute;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            top: -100px; right: -100px;
        }

        .auth-left::after {
            content: '';
            position: absolute;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            bottom: -80px; left: -80px;
        }

        .auth-right {
            flex: 0 0 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 40px;
        }

        /* ── Left panel content ── */
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            z-index: 1;
        }

        .brand-icon {
            width: 150px;          /* Thoda bada ki logo fit ho jaye */
            height: 150px;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 12px;  /* Rounded corners thodi smooth */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;     /* Image container se bahar na jaye */
        }

        .brand-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;  /* Maintain logo aspect ratio */
        }

        .brand-name {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            white-space: nowrap;   /* Long names break na ho */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .left-headline {
        position: relative;
        z-index: 1;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 16px;
        padding: 36px 40px;
        backdrop-filter: blur(6px);
        }

        .left-headline {
            position: relative;
            z-index: 1;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 16px;
            padding: 36px 40px;
            backdrop-filter: blur(6px);
        }

        .left-headline::before {
            content: '';
            display: block;
            width: 40px;
            height: 4px;
            background: rgba(255,255,255,0.5);
            border-radius: 2px;
            margin-bottom: 20px;
        }

        .stats {
            display: flex;
            gap: 16px;
            position: relative;
            z-index: 1;
        }

        .stat-item {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 12px;
            padding: 14px 22px;
            text-align: center;
            transition: background .2s;
        }

        .stat-item:hover {
            background: rgba(255,255,255,0.18);
        }

        .stat-value {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: -0.01em;
        }

        .stat-label {
            color: rgba(255,255,255,0.5);
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: .1em;
            margin-top: 3px;
        }
        /* ── Form ── */
        .auth-form {
            width: 100%;
            max-width: 400px;
        }

        .auth-form h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 6px;
        }

        .auth-form .subtitle {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 32px;
        }

        .field { margin-bottom: 20px; }

        .field label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
        }

        .input-group {
            display: flex;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            overflow: hidden;
            transition: border-color .2s;
        }

        .input-group:focus-within {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
        }

        .input-group.is-invalid {
            border-color: #dc2626;
        }

        .input-group input {
            flex: 1;
            border: none;
            outline: none;
            padding: 12px 14px;
            font-size: 0.9rem;
            color: #111827;
            background: transparent;
            font-family: inherit;
        }

        .input-group input::placeholder { color: #9ca3af; }

        .input-group .icon {
            display: flex;
            align-items: center;
            padding: 0 14px;
            color: #9ca3af;
            font-size: 13px;
            cursor: pointer;
            background: transparent;
            border: none;
            transition: color .2s;
        }

        .input-group:focus-within .icon { color: #2563eb; }

        .field-error {
            font-size: 0.8rem;
            color: #dc2626;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Remember + forgot */
        .row-between {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .checkbox-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
            color: #6b7280;
            cursor: pointer;
            user-select: none;
        }

        .checkbox-wrap input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: #2563eb;
            cursor: pointer;
        }

        .forgot-link {
            font-size: 0.875rem;
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-link:hover { text-decoration: underline; }

        /* Button */
        .btn-signin {
            width: 100%;
            padding: 13px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            transition: background .2s, transform .1s;
            letter-spacing: .01em;
        }

        .btn-signin:hover { background: #1d4ed8; }
        .btn-signin:active { transform: scale(.98); }

        .divider {
            text-align: center;
            color: #9ca3af;
            font-size: 0.8rem;
            margin: 20px 0;
            position: relative;
        }

        .divider::before, .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 44%;
            height: 1px;
            background: #e5e7eb;
        }

        .divider::before { left: 0; }
        .divider::after  { right: 0; }

        .register-link {
            text-align: center;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .register-link a {
            color: #2563eb;
            font-weight: 500;
            text-decoration: none;
        }

        .register-link a:hover { text-decoration: underline; }

        /* Responsive */
        @media (max-width: 768px) {
            .auth-left { display: none; }
            .auth-right { flex: 1; }
        }
    </style>
</head>
<body>

<div class="auth-wrapper">

    {{-- Left Panel --}}
    <div class="auth-left">
        <div class="brand">
            <div class="brand-icon">
                <img src="{{ $setting->app_logo ? asset(Storage::url($setting->app_logo)) : asset('images/default-logo.png') }}" alt="Logo">
            </div>
            <span class="brand-name">{{ $setting->app_name }}</span>
        </div>

        <div class="left-headline">
            <h1>Welcome back to<br>your dashboard.</h1>
            <p>Manage your operations, monitor activity, and stay in full control — all from one place.</p>
        </div>

        <div class="stats">
            <div class="stat-item">
                <div class="stat-value">99.9%</div>
                <div class="stat-label">Uptime</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">256-bit</div>
                <div class="stat-label">Encryption</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">24/7</div>
                <div class="stat-label">Support</div>
            </div>
        </div>
    </div>

    {{-- Right Panel --}}
    <div class="auth-right">
        <div class="auth-form">

            <h2>Sign in</h2>
            <p class="subtitle">Enter your credentials to access your account.</p>

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                {{-- Email --}}
                <div class="field">
                    <label for="email">Email address</label>
                    <div class="input-group {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            autocomplete="email"
                        >
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                    </div>
                    @error('email')
                        <div class="field-error">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="field">
                    <label for="password">Password</label>
                    <div class="input-group {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            autocomplete="current-password"
                        >
                        <button type="button" class="icon" onclick="togglePassword()">
                            <i class="fas fa-eye" id="pw-icon"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="field-error">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Remember + Forgot --}}
                {{-- <div class="row-between">
                    <label class="checkbox-wrap">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                    <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                </div> --}}

                <button type="submit" class="btn-signin">Sign In</button>
            </form>



            {{-- <div class="register-link">
                Don't have an account? <a href="{{ route('register') }}">Create one</a>
            </div> --}}

        </div>
    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon  = document.getElementById('pw-icon');
        const isText = input.type === 'text';
        input.type = isText ? 'password' : 'text';
        icon.classList.toggle('fa-eye', isText);
        icon.classList.toggle('fa-eye-slash', !isText);
    }
</script>

</body>
</html>

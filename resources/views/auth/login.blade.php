<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6c63ff, #4facfe);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.6s ease-in-out;
        }
        .login-card h3 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #4facfe;
        }
        .form-control:focus {
            border-color: #4facfe;
            box-shadow: 0 0 0 0.2rem rgba(79,172,254,0.25);
        }
        .btn-primary {
            background: linear-gradient(90deg, #6c63ff, #4facfe);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #4facfe, #6c63ff);
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3>Login</h3>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="text" name="email" value="{{ old('email') }}" 
                   class="form-control @error('email') is-invalid @enderror" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" 
                   class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label class="form-check-label" for="remember">Ingat Saya</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>

        
    </form>
    <div class="text-center mt-3">
        <a href="/">Kembali ke laman utama</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

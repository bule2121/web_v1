@extends('layouts.app')

@section('title', 'Login')

@push('styles')
<style>
    body {
        background: #e6f9ea;
    }
    .login-bg {
        background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80') center center/cover no-repeat;
        border-top-left-radius: 12px;
        border-bottom-left-radius: 12px;
    }
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .login-card {
        box-shadow: 0 4px 32px rgba(0,0,0,0.12);
        border-radius: 12px;
        overflow: hidden;
        max-width: 700px;
        width: 100%;
        background: #fff;
        display: flex;
        min-height: 400px;
    }
    .login-form-section {
        flex: 1 1 0%;
        padding: 48px 32px;
        background: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .login-form-section h2 {
        font-weight: 700;
        margin-bottom: 32px;
        letter-spacing: 2px;
        color: #222;
    }
    .form-control {
        background: #f3f6f6;
        border: none;
        border-radius: 24px;
        padding-left: 20px;
        font-size: 1.1rem;
    }
    .form-control:focus {
        background: #e6f9ea;
        box-shadow: 0 0 0 2px #1db95433;
    }
    .form-check-input {
        border-radius: 12px;
    }
    .login-btn {
        background: #1db954;
        color: #fff;
        border-radius: 24px;
        font-weight: 600;
        letter-spacing: 1px;
        font-size: 1.1rem;
        transition: background 0.2s;
    }
    .login-btn:hover {
        background: #159c41;
    }
    .forgot-link {
        color: #1db954;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.98rem;
    }
    .forgot-link:hover {
        text-decoration: underline;
    }
    @media (max-width: 768px) {
        .login-card {
            flex-direction: column;
            min-height: unset;
        }
        .login-bg {
            display: none;
        }
    }
</style>
@endpush

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="col-md-6 login-bg d-none d-md-block"></div>
        <div class="col-md-6 login-form-section">
            <h2 class="text-center mb-4">LOGIN</h2>
            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember" style="font-size:0.98rem; color:#888;">REMEMBER ME</label>
                    </div>
                    <a href="#" class="forgot-link">FORGOT PASSWORD?</a>
                </div>
                <button type="submit" class="btn login-btn w-100 py-2">SIGN IN</button>
            </form>
        </div>
    </div>
</div>
@endsection 
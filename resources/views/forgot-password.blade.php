@extends('layout')

@section('title', 'Forgot Password')

@section('extra-css')
<style>
    body, html {
        min-height: 100vh;
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
    }
    .forgot-container {
        max-width: 400px;
        margin: 60px auto;
        background: #232526;
        border-radius: 18px;
        box-shadow: 0 8px 32px 0 rgba(0,198,255,0.18);
        padding: 40px 32px 32px 32px;
        position: relative;
        overflow: hidden;
        color: #fff;
    }
    .forgot-heading {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 28px;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        background-size: 200% auto;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        animation: gradientMove 3s linear infinite;
        letter-spacing: 1px;
    }
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }
    .forgot-form {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    .forgot-form input[type="email"],
    .forgot-form input[type="password"] {
        width: 100%;
        padding: 12px 16px;
        border-radius: 10px;
        border: none;
        background: #181a1b;
        color: #fff;
        font-size: 1rem;
        transition: box-shadow 0.2s, background 0.2s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .forgot-form input:focus {
        outline: none;
        background: #232526;
        box-shadow: 0 0 0 2px #00c6ff;
    }
    .forgot-btn {
        margin-top: 10px;
        padding: 14px 0;
        font-size: 1.1rem;
        font-weight: bold;
        color: #fff;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        background-size: 200% auto;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        box-shadow: 0 4px 16px rgba(0,0,0,0.18);
        transition: background-position 0.5s, transform 0.2s;
        animation: gradientMove 2s linear infinite;
        outline: none;
    }
    .forgot-btn:hover {
        transform: scale(1.04);
        background-position: 100% 0;
    }
    .success-message {
        background: rgba(0, 198, 255, 0.12);
        color: #00c6ff;
        border-radius: 8px;
        padding: 10px 16px;
        margin-bottom: 16px;
        text-align: center;
        font-weight: 500;
        font-size: 1rem;
        box-shadow: 0 2px 8px rgba(0,198,255,0.08);
    }
    .error-message {
        background: rgba(255, 82, 82, 0.12);
        color: #ff5252;
        border-radius: 8px;
        padding: 10px 16px;
        margin-bottom: 16px;
        text-align: center;
        font-weight: 500;
        font-size: 1rem;
        box-shadow: 0 2px 8px rgba(255,82,82,0.08);
    }
</style>
@endsection

@section('content')
<div class="forgot-container">
    <div class="forgot-heading">Forgot Password</div>
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="error-message">{{ session('error') }}</div>
    @endif
    <form action="/forgot-password" method="POST" class="forgot-form">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Enter new password" required>
        <button type="submit" class="forgot-btn">Change Password</button>
    </form>
</div>
@endsection 
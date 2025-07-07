@extends('layout')

@section('extra-css')
<style>
    body, html {
        min-height: 100vh;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #232526 0%, #414345 100%);
        font-family: 'Segoe UI', Arial, sans-serif;
    }
    .login-container {
        max-width: 400px;
        margin: 60px auto;
        background: rgba(30, 30, 40, 0.98);
        border-radius: 18px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.25);
        padding: 40px 32px 32px 32px;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
        border: 1px solid rgba(0, 198, 255, 0.1);
    }
    .login-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(0, 198, 255, 0.05) 50%, transparent 70%);
        animation: float 8s ease-in-out infinite;
        pointer-events: none;
    }
    .login-heading {
        font-size: 2.2rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 28px;
        background: linear-gradient(90deg, #00c6ff, #0072ff, #ff512f, #dd2476);
        background-size: 200% auto;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        animation: gradientMove 3s linear infinite;
        letter-spacing: 1px;
        text-shadow: 0 0 20px rgba(0, 198, 255, 0.3);
        position: relative;
        z-index: 1;
    }
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    .login-form {
        display: flex;
        flex-direction: column;
        gap: 18px;
        position: relative;
        z-index: 1;
    }
    .input-group {
        position: relative;
        animation: fadeInUp 0.8s ease-out;
    }
    .input-group input {
        width: 100%;
        padding: 12px 40px 12px 16px;
        border-radius: 10px;
        border: 1px solid rgba(0, 198, 255, 0.2);
        background: #232526;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .input-group input:focus {
        outline: none;
        background: #2d2f36;
        box-shadow: 0 0 0 2px #00c6ff, 0 0 15px rgba(0, 198, 255, 0.3);
        transform: scale(1.02);
        border-color: #00c6ff;
    }
    .input-group .input-icon {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #00c6ff;
        font-size: 1.1rem;
        pointer-events: none;
        transition: all 0.3s ease;
    }
    .input-group input:focus + .input-icon {
        color: #ff512f;
        transform: translateY(-50%) scale(1.1);
    }
    .login-btn {
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
        transition: all 0.3s ease;
        animation: gradientMove 2s linear infinite, pulse 2s ease-in-out infinite;
        outline: none;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    .login-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    .login-btn:hover::before {
        left: 100%;
    }
    .login-btn:hover {
        transform: scale(1.05) translateY(-2px);
        background-position: 100% 0;
        box-shadow: 0 8px 25px rgba(0, 198, 255, 0.4);
    }
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.02); }
    }
    .register-link {
        text-align: center;
        margin-top: 18px;
        color: #aaa;
        font-size: 1rem;
        position: relative;
        z-index: 1;
    }
    .register-link a {
        color: #00c6ff;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
    }
    .register-link a::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        transition: width 0.3s ease;
    }
    .register-link a:hover::after {
        width: 100%;
    }
    .register-link a:hover {
        color: #ff512f;
        transform: translateY(-1px);
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
        border: 1px solid rgba(255, 82, 82, 0.2);
        animation: fadeInUp 0.5s ease-out;
        position: relative;
        z-index: 1;
    }
    @media (max-width: 500px) {
        .login-container {
            padding: 24px 8px 18px 8px;
        }
        .login-heading {
            font-size: 1.5rem;
        }
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
@endsection

@section('content')
<div class="login-container">
    <div class="login-heading" id="loginHeading">Welcome Back</div>
    @if(session('error'))
        <div class="error-message">{{ session('error') }}</div>
    @endif
    <form action="/login" method="POST" class="login-form">
        @csrf
        <div class="input-group">
            <input name="email" type="email" placeholder="Email" required>
            <span class="input-icon"><i class="fa fa-envelope"></i></span>
        </div>
        <div class="input-group">
            <input name="password" type="password" placeholder="Password" required>
            <span class="input-icon"><i class="fa fa-lock"></i></span>
        </div>
        <button type="submit" class="login-btn"><span id="loginBtnText">Login</span></button>
    </form>
    <div style="text-align:center;margin-top:10px;">
        <a href="/forgot-password" style="color:#00c6ff;text-decoration:underline;font-size:1rem;">Forgot Password?</a>
    </div>
    <div class="register-link">
        Don't have an account? <a href="/register">Register here</a>
    </div>
</div>
@endsection

@section('extra-js')
<script>
// Animated heading text effect
const heading = document.getElementById('loginHeading');
let headingText = heading.innerText;
heading.innerText = '';
let idx = 0;
function animateHeading() {
    if (idx < headingText.length) {
        heading.innerText += headingText.charAt(idx);
        idx++;
        setTimeout(animateHeading, 35);
    }
}
setTimeout(animateHeading, 300);
// Animated Login button text
const loginBtnText = document.getElementById('loginBtnText');
let btnStr = 'Login';
let btnIdx = 0;
function animateBtn() {
    loginBtnText.innerText = '';
    btnIdx = 0;
    const interval = setInterval(() => {
        if (btnIdx < btnStr.length) {
            loginBtnText.innerText += btnStr.charAt(btnIdx);
            btnIdx++;
        } else {
            clearInterval(interval);
            setTimeout(animateBtn, 1200);
        }
    }, 60);
}
setTimeout(animateBtn, 1200);
</script>
@endsection

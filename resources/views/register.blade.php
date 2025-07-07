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
    .register-container {
        max-width: 400px;
        margin: 60px auto;
        background: rgba(30, 30, 40, 0.98);
        border-radius: 18px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.25);
        padding: 40px 32px 32px 32px;
        position: relative;
        overflow: hidden;
    }
    .register-heading {
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
    }
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }
    .register-form {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    .input-group {
        position: relative;
    }
    .input-group input {
        width: 100%;
        padding: 12px 40px 12px 16px;
        border-radius: 10px;
        border: none;
        background: #232526;
        color: #fff;
        font-size: 1rem;
        transition: box-shadow 0.2s, background 0.2s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .input-group input:focus {
        outline: none;
        background: #2d2f36;
        box-shadow: 0 0 0 2px #00c6ff;
    }
    .input-group .input-icon {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #00c6ff;
        font-size: 1.1rem;
        pointer-events: none;
    }
    .register-btn {
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
    .register-btn:hover {
        transform: scale(1.04);
        background-position: 100% 0;
    }
    .login-link {
        text-align: center;
        margin-top: 18px;
        color: #aaa;
        font-size: 1rem;
    }
    .login-link a {
        color: #00c6ff;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }
    .login-link a:hover {
        color: #ff512f;
    }
    @media (max-width: 500px) {
        .register-container {
            padding: 24px 8px 18px 8px;
        }
        .register-heading {
            font-size: 1.5rem;
        }
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
@endsection

@section('content')
<div class="register-container">
    @if ($errors->any())
        <div style="background:#ffdddd;color:#b30000;padding:12px 18px;border-radius:8px;margin-bottom:18px;">
            <ul style="margin:0;padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="register-heading" id="registerHeading">Create Your Account</div>
    <form action="/register" method="POST" class="register-form" enctype="multipart/form-data">
        @csrf
        <div class="input-group">
            <input name="name" placeholder="Name" required>
            <span class="input-icon"><i class="fa fa-user"></i></span>
        </div>
        <div class="input-group">
            <input name="email" type="email" placeholder="Email" required>
            <span class="input-icon"><i class="fa fa-envelope"></i></span>
        </div>
        <div class="input-group">
            <input name="password" type="password" placeholder="Password" required>
            <span class="input-icon"><i class="fa fa-lock"></i></span>
        </div>
        <div class="input-group">
            <input name="mobile" placeholder="Mobile Number" required>
            <span class="input-icon"><i class="fa fa-phone"></i></span>
        </div>
        <div class="input-group">
            <input type="file" name="profile_picture" accept="image/*" style="padding: 10px 16px; background: #232526; color: #fff; border-radius: 10px; border: none;" />
            <span class="input-icon"><i class="fa fa-image"></i></span>
        </div>
        <button type="submit" class="register-btn"><span id="registerBtnText">Register</span></button>
    </form>
    <div class="login-link">
        Already have an account? <a href="/login">Login here</a>
    </div>
</div>
@endsection

@section('extra-js')
<script>
// Animated heading text effect
const heading = document.getElementById('registerHeading');
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
// Animated Register button text
const registerBtnText = document.getElementById('registerBtnText');
let btnStr = 'Register';
let btnIdx = 0;
function animateBtn() {
    registerBtnText.innerText = '';
    btnIdx = 0;
    const interval = setInterval(() => {
        if (btnIdx < btnStr.length) {
            registerBtnText.innerText += btnStr.charAt(btnIdx);
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

@extends('layout')

@section('title', 'Verify Code')

@section('extra-css')
<style>
    body, html {
        min-height: 100vh;
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
    }
    .verify-container {
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
    .verify-heading {
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
    .verify-form {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    .verify-form input[type="text"] {
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
    .verify-form input:focus {
        outline: none;
        background: #232526;
        box-shadow: 0 0 0 2px #00c6ff;
    }
    .verify-btn {
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
    .verify-btn:hover {
        transform: scale(1.04);
        background-position: 100% 0;
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
<div class="verify-container">
    <div class="verify-heading">Verify Code</div>
    @if(session('error'))
        <div class="error-message">{{ session('error') }}</div>
    @endif
    @if(session('code'))
    <div id="codePopup" style="position:fixed;top:40px;left:50%;transform:translateX(-50%);z-index:99999;background:linear-gradient(90deg,#00c6ff,#ff512f,#dd2476);color:#fff;padding:18px 38px;border-radius:30px;font-size:1.15rem;font-weight:bold;box-shadow:0 4px 24px rgba(0,0,0,0.18);display:flex;align-items:center;gap:18px;animation:fadeInOutCode 5s forwards;">
        <span>Verification Code: <span id="popupCode">{{ session('code') }}</span></span>
        <button onclick="copyCode()" style="padding:6px 18px;border-radius:18px;border:none;background:#fff;color:#00c6ff;font-weight:bold;cursor:pointer;font-size:1rem;">Copy</button>
    </div>
    <style>
    @keyframes fadeInOutCode {
        0% { opacity: 0; transform: translateX(-50%) scale(0.95); }
        10% { opacity: 1; transform: translateX(-50%) scale(1.04); }
        90% { opacity: 1; transform: translateX(-50%) scale(1); }
        100% { opacity: 0; transform: translateX(-50%) scale(0.95); }
    }
    </style>
    <script>
        function copyCode() {
            var code = document.getElementById('popupCode').innerText;
            navigator.clipboard.writeText(code);
        }
        setTimeout(function(){
            var popup = document.getElementById('codePopup');
            if(popup) popup.style.display = 'none';
        }, 5000);
    </script>
    @endif
    <form action="/verify-code" method="POST" class="verify-form">
        @csrf
        <input type="text" name="code" id="code" placeholder="Enter Verification Code" required autofocus>
        <button type="submit" class="verify-btn">Verify</button>
    </form>
</div>
@endsection 
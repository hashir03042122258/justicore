@extends('layout')

@section('extra-css')
<style>
    body, html {
        min-height: 100vh;
        background: linear-gradient(135deg, #232526 0%, #414345 100%);
    }
    .profile-container {
        max-width: 420px;
        margin: 60px auto;
        background: rgba(30, 30, 40, 0.98);
        border-radius: 18px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.25);
        padding: 40px 32px 32px 32px;
        text-align: center;
    }
    .profile-pic {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #00c6ff;
        margin-bottom: 18px;
        background: #eee;
    }
    .profile-name {
        font-size: 1.3rem;
        font-weight: bold;
        color: #fff;
        margin-bottom: 18px;
    }
    .profile-form input[type='file'] {
        display: none;
    }
    .profile-form label {
        display: inline-block;
        padding: 10px 24px;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        color: #fff;
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        margin-bottom: 18px;
        margin-top: 10px;
        transition: background 0.3s;
    }
    .profile-form label:hover {
        background: linear-gradient(90deg, #ff512f, #00c6ff);
    }
    .profile-form button {
        margin-top: 18px;
        padding: 12px 32px;
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: #fff;
        border: none;
        border-radius: 24px;
        font-weight: bold;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background 0.3s;
    }
    .profile-form button:hover {
        background: linear-gradient(90deg, #ff512f, #00c6ff);
    }
    .success-message {
        background: #27ae60;
        color: #fff;
        border-radius: 8px;
        padding: 10px 16px;
        margin-bottom: 18px;
        font-weight: 500;
        font-size: 1rem;
        box-shadow: 0 2px 8px rgba(39,174,96,0.08);
    }
</style>
@endsection

@section('content')
<div class="profile-container">
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <img id="profilePicPreview" src="/{{ session('profile_picture') ?? 'default-profile.png' }}" class="profile-pic" alt="Profile Picture">
    <div class="profile-name">{{ session('user') }}</div>
    <form class="profile-form" action="/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewProfilePic(event)">
        <label for="profile_picture"><i class="fa fa-image"></i> Choose New Picture</label>
        <br>
        <button type="submit">Update Profile Picture</button>
    </form>
</div>
@endsection

@section('extra-js')
<script>
function previewProfilePic(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('profilePicPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection 
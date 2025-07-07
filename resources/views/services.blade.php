@extends('layout')

@section('title', 'Our Services')

@section('extra-css')
<style>
    body, html {
        background: linear-gradient(135deg, #232526 0%, #414345 100%);
    }
    .services-main-section {
        max-width: 1100px;
        margin: 60px auto 40px auto;
        padding: 0 20px;
        animation: fadeInUp 0.8s ease-out;
    }
    .services-heading {
        text-align: center;
        font-size: 2.5rem;
        font-weight: bold;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        background-size: 200% auto;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        animation: gradientMove 3s linear infinite;
        margin-bottom: 48px;
        letter-spacing: 1px;
        text-shadow: 0 0 30px rgba(0, 198, 255, 0.3);
    }
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }
    .services-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 32px;
        max-width: 1000px;
        margin: 0 auto;
    }
    .service-card {
        text-align: center;
        background: #232526;
        padding: 32px 24px;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(0, 198, 255, 0.1);
        animation: fadeInUp 0.8s ease-out;
    }
    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 198, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }
    .service-card:hover::before {
        left: 100%;
    }
    .service-card:hover {
        transform: translateY(-8px) scale(1.04);
        box-shadow: 0 16px 32px rgba(0,198,255,0.18), 0 4px 24px 0 rgba(0,0,0,0.18);
        border-color: #00c6ff;
    }
    .service-card i {
        font-size: 2.5rem;
        color: #00c6ff;
        margin-bottom: 18px;
        text-shadow: 0 0 15px rgba(0, 198, 255, 0.4);
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
    }
    .service-card:hover i {
        transform: scale(1.1) rotate(5deg);
        text-shadow: 0 0 25px rgba(0, 198, 255, 0.6);
    }
    .service-card h3 {
        color: #00c6ff;
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 8px;
        text-shadow: 0 0 10px rgba(0, 198, 255, 0.3);
        position: relative;
        z-index: 1;
    }
    .service-card p {
        font-size: 0.98rem;
        margin-bottom: 10px;
        color: #e0e0e0;
        line-height: 1.5;
        position: relative;
        z-index: 1;
    }
    .service-card a {
        margin-top: 10px;
        display: inline-block;
        padding: 10px 28px;
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: white;
        text-decoration: none;
        border-radius: 20px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
        overflow: hidden;
    }
    .service-card a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    .service-card a:hover::before {
        left: 100%;
    }
    .service-card a:hover {
        background: linear-gradient(90deg, #ff512f, #00c6ff);
        transform: scale(1.05) translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 198, 255, 0.4);
    }
    @media (max-width: 900px) {
        .services-container {
            grid-template-columns: repeat(2, 1fr);
            max-width: 600px;
        }
    }
    @media (max-width: 600px) {
        .services-container {
            grid-template-columns: 1fr;
            max-width: 300px;
        }
    }
    /* Navbar and footer theme match */
    .navbar {
        background: #232526 !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .navbar a {
        color: #fff !important;
    }
    .navbar a:hover {
        color: #00c6ff !important;
    }
    .footer-container, .glass-white-footer {
        background: #232526 !important;
        color: #fff !important;
        border-top: 1px solid #333 !important;
    }
    .footer-left h2, .footer-center .quote, .footer-right h3 {
        color: #00c6ff !important;
    }
    .footer-left p, .footer-center .quote, .footer-right {
        color: #e0e0e0 !important;
    }
    .social-icons a {
        color: #fff !important;
    }
</style>
@endsection

@section('content')
<div class="services-main-section">
    <div class="services-heading" id="servicesHeading">Our Services</div>
    <div class="services-container">
@php
$services = [
    [
        'title' => 'Legal Consultation',
        'slug' => 'legal-consultation',
        'icon' => 'fa-scale-balanced',
        'lawyer' => 'Usman Ahmed',
        'image' => 'usman.png',
    ],
    [
        'title' => 'Civil Law',
        'slug' => 'civil-law',
        'icon' => 'fa-landmark',
        'lawyer' => 'Muzamil Hassan',
        'image' => 'muzamilhassan.png',
    ],
    [
        'title' => 'Family Law',
        'slug' => 'family-law',
        'icon' => 'fa-people-roof',
        'lawyer' => 'Ali Raza',
        'image' => 'aliraza.jpeg',
    ],
    [
        'title' => 'Criminal Defense',
        'slug' => 'criminal-defense',
        'icon' => 'fa-shield-halved',
        'lawyer' => 'Sara Khan',
        'image' => 'sara.png',
    ],
    [
        'title' => 'Property Disputes',
        'slug' => 'property-disputes',
        'icon' => 'fa-house-circle-exclamation',
        'lawyer' => 'Kamran Sheikh',
        'image' => 'kamran.jpeg',
    ],
    [
        'title' => 'Contract Review',
        'slug' => 'contract-review',
        'icon' => 'fa-file-contract',
        'lawyer' => 'Tahir Mehmood',
        'image' => 'tahir.png',
    ],
];
@endphp
@foreach ($services as $service)
        <div class="service-card">
            <i class="fa-solid {{ $service['icon'] }}"></i>
            <h3>{{ $service['title'] }}</h3>
            <p>By {{ $service['lawyer'] }}</p>
            <a href="{{ url('/service/' . $service['slug']) }}">Learn More</a>
        </div>
@endforeach
    </div>
</div>
@endsection

@section('extra-js')
<script>
// Animated heading text effect
const heading = document.getElementById('servicesHeading');
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
</script>
@endsection 
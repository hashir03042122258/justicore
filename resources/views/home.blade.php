@extends('layout')

@section('title', 'Home')

@section('extra-css')
<style>
    body, html {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        min-height: 100vh;
        position: relative;
    }
    .banner {
        height: 90vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: linear-gradient(120deg, #232526 60%, #003366 100%);
        box-shadow: 0 12px 32px 0 rgba(0,0,0,0.25), 0 1.5px 8px 0 rgba(0,198,255,0.08);
        perspective: 1200px;
        animation: fadeInUp 1s ease-out;
    }
    .banner::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: url('/image/img.jpg') no-repeat center center/cover;
        opacity: 0.18;
        z-index: 1;
        animation: float 8s ease-in-out infinite;
    }
    .banner::after {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(0, 198, 255, 0.1) 50%, transparent 70%);
        animation: float 6s ease-in-out infinite reverse;
        z-index: 1;
    }
    .text-box {
        z-index: 2;
        color: #fff;
        text-align: center;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
        position: relative;
        will-change: transform;
        transition: transform 0.3s cubic-bezier(.25,.8,.25,1);
        animation: fadeInUp 1.2s ease-out 0.3s both;
    }
    .banner:hover .text-box {
        transform: translateY(-10px) scale(1.04) rotateY(8deg);
        box-shadow: 0 8px 32px 0 rgba(0,198,255,0.18);
    }
    .text-box h1 {
        font-size: 2.7rem;
        font-weight: bold;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        background-size: 200% auto;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        animation: gradientMove 3s linear infinite;
        border: none;
        display: inline-block;
        margin-bottom: 18px;
        text-shadow: 0 0 30px rgba(0, 198, 255, 0.5);
    }
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }
    .text-box a {
        display: inline-block;
        margin-top: 20px;
        padding: 14px 32px;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        color: #fff;
        font-weight: bold;
        text-decoration: none;
        border-radius: 30px;
        font-size: 1.1rem;
        box-shadow: 0 4px 16px rgba(0,0,0,0.18);
        transition: all 0.3s ease;
        animation: gradientMove 2s linear infinite, pulse 2s ease-in-out infinite;
        position: relative;
        overflow: hidden;
    }
    .text-box a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    .text-box a:hover::before {
        left: 100%;
    }
    .text-box a:hover {
        background-position: 100% 0;
        transform: scale(1.05) translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 198, 255, 0.4);
    }
    .why-section, .lawyer-section {
        background: #232526;
        border-radius: 18px;
        box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 1.5px 8px 0 rgba(0,198,255,0.08);
        padding: 60px 20px;
        text-align: center;
        margin: 40px auto 0 auto;
        max-width: 1100px;
        transform-style: preserve-3d;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
    }
    .why-section::before, .lawyer-section::before {
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
    .why-section:hover, .lawyer-section:hover {
        box-shadow: 0 16px 48px 0 rgba(0,198,255,0.18), 0 4px 24px 0 rgba(0,0,0,0.18);
        transform: translateY(-6px) scale(1.02) rotateX(3deg);
    }
    .why-section h2, .lawyer-section h2 {
        font-size: 2.1rem;
        font-weight: bold;
        margin-bottom: 40px;
        color: #00c6ff;
        letter-spacing: 1px;
        text-shadow: 0 0 20px rgba(0, 198, 255, 0.3);
        position: relative;
        z-index: 1;
    }
    .why-boxes {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        max-width: 1000px;
        margin: auto;
        position: relative;
        z-index: 1;
    }
    .why-box {
        flex: 1 1 220px;
        background: #232526;
        padding: 30px;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(0,198,255,0.10), 0 1.5px 8px 0 rgba(0,0,0,0.10);
        color: #fff;
        border: 1px solid #333;
        transition: all 0.3s ease;
        transform-style: preserve-3d;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
    }
    .why-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 198, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }
    .why-box:hover::before {
        left: 100%;
    }
    .why-box:hover {
        transform: translateY(-8px) scale(1.04);
        box-shadow: 0 16px 32px rgba(0,198,255,0.18), 0 4px 24px 0 rgba(0,0,0,0.18);
        border-color: #00c6ff;
    }
    .why-box h3 {
        font-size: 1.2rem;
        font-weight: bold;
        color: #00c6ff;
        text-shadow: 0 0 10px rgba(0, 198, 255, 0.3);
        position: relative;
        z-index: 1;
    }
    .why-box p {
        margin-top: 10px;
        color: #e0e0e0;
        line-height: 1.6;
        position: relative;
        z-index: 1;
    }
    .lawyer-section h2 {
        color: #ff512f;
    }
    .lawyer-section a {
        margin-top: 20px;
        padding: 12px 25px;
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: white;
        text-decoration: none;
        border-radius: 30px;
        font-weight: bold;
        display: inline-block;
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
        overflow: hidden;
    }
    .lawyer-section a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    .lawyer-section a:hover::before {
        left: 100%;
    }
    .lawyer-section a:hover {
        background: linear-gradient(90deg, #ff512f, #00c6ff);
        transform: scale(1.05) translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 81, 47, 0.4);
    }
    .lawyer-section p {
        color: #ffffff;
        line-height: 1.6;
        position: relative;
        z-index: 1;
    }
    .shining-text {
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        background-size: 200% auto;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        animation: shineFade 2s ease-in-out infinite;
    }
    @keyframes shineFade {
        0%, 100% {
            opacity: 0.5;
            background-position: 0% 50%;
        }
        50% {
            opacity: 4;
            background-position: 100% 50%;
        }
    }
    .achievements-section {
        background: #232526;
        padding: 60px 20px;
        text-align: center;
        color: #fff;
        border-radius: 18px;
        margin: 40px auto 0 auto;
        max-width: 1100px;
        box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 1.5px 8px 0 rgba(0,198,255,0.08);
        transform-style: preserve-3d;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
    }
    .achievements-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 215, 0, 0.05) 50%, transparent 70%);
        animation: float 8s ease-in-out infinite;
        pointer-events: none;
    }
    .achievements-section:hover {
        box-shadow: 0 16px 48px 0 rgba(0,198,255,0.18), 0 4px 24px 0 rgba(0,0,0,0.18);
        transform: translateY(-6px) scale(1.02) rotateX(3deg);
    }
    .achievements-section h2 {
        font-size: 2.1rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #ffd700;
        text-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        position: relative;
        z-index: 1;
    }
    .achievements-section p {
        font-size: 1.1rem;
        margin-bottom: 50px;
        position: relative;
        z-index: 1;
    }
    .achievements-boxes {
        display: flex;
        justify-content: center;
        gap: 60px;
        flex-wrap: wrap;
        max-width: 900px;
        margin: auto;
        position: relative;
        z-index: 1;
    }
    .achievement {
        flex: 1 1 200px;
        background: #232526;
        border-radius: 14px;
        padding: 30px 0;
        box-shadow: 0 4px 18px rgba(0,198,255,0.10), 0 1.5px 8px 0 rgba(0,0,0,0.10);
        margin: 0 10px;
        border: 1px solid #333;
        transform-style: preserve-3d;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
    }
    .achievement::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.1), transparent);
        transition: left 0.5s ease;
    }
    .achievement:hover::before {
        left: 100%;
    }
    .achievement:hover {
        box-shadow: 0 16px 32px rgba(0,198,255,0.18), 0 4px 24px 0 rgba(0,0,0,0.18);
        transform: translateY(-6px) scale(1.04) rotateY(2deg);
        border-color: #ffd700;
    }
    .achievement h3 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #ffd700;
        text-shadow: 0 0 15px rgba(255, 215, 0, 0.4);
        position: relative;
        z-index: 1;
    }
    .achievement p {
        font-size: 1.1rem;
        color: #fff;
        position: relative;
        z-index: 1;
    }
    .services-section {
        position: relative;
        z-index: 2;
        padding: 60px 20px;
        background: #232526;
        border-radius: 18px;
        max-width: 1100px;
        margin: 40px auto;
        box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 1.5px 8px 0 rgba(0,198,255,0.08);
        transform-style: preserve-3d;
        transition: all 0.3s ease;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
    }
    .services-section::before {
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
    .services-section:hover {
        box-shadow: 0 16px 48px 0 rgba(0,198,255,0.18), 0 4px 24px 0 rgba(0,0,0,0.18);
        transform: translateY(-6px) scale(1.02) rotateX(3deg);
    }
    .services-section h2 {
        text-align: center;
        font-size: 2.1rem;
        font-weight: bold;
        margin-bottom: 40px;
        color: #00c6ff;
        text-shadow: 0 0 20px rgba(0, 198, 255, 0.3);
        position: relative;
        z-index: 1;
    }
    .services-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        max-width: 900px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    .service-card {
        text-align: center;
        background: #232526;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(0,198,255,0.10), 0 1.5px 8px 0 rgba(0,0,0,0.10);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid #333;
        transform-style: preserve-3d;
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
        margin-bottom: 20px;
        text-shadow: 0 0 15px rgba(0, 198, 255, 0.4);
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
    }
    .service-card:hover i {
        transform: scale(1.1) rotate(5deg);
        text-shadow: 0 0 25px rgba(0, 198, 255, 0.6);
    }
    .service-card h3 {
        color: #00c6ff;
        font-size: 1.2rem;
        font-weight: bold;
        text-shadow: 0 0 6px #00c6ff, 0 0 10px #00c6ff;
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
        padding: 8px 20px;
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

    /* Animation CSS */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

@section('content')
<!-- === Banner Section === -->
<div class="banner">
    <div class="text-box">
        <h1 id="typewriterText"></h1>
        <br>
        <a href="/services">Are You Ready?</a>
    </div>
</div>


<section class="why-section">
    <h2>Why Choose Us</h2>
    <div class="why-boxes">
        <div class="why-box">
            <h3>Affordable Legal Fees</h3>
            <p>Quality Legal Services at Affordable Fees, Get the Help You Need Today!</p>
        </div>
        <div class="why-box">
            <h3>Quick Case Resolutions</h3>
            <p>Fast Legal Solutions Get Quick Resolutions for Your Case Today!</p>
        </div>
        <div class="why-box">
            <h3>Confidential Assistance</h3>
            <p>Your Privacy Matters, Get Confidential Legal Assistance Today!</p>
        </div>
        <div class="why-box">
            <h3>No Hidden Charges</h3>
            <p>Transparent Pricing, No Hidden Charges, Only Honest Legal Fees!</p>
        </div>
    </div>
</section>

<!-- === Experienced Lawyer Section === -->
<section class="lawyer-section">
    <h2>Experienced Lawyer in Karachi</h2>
    <p>
        Get expert legal support for <strong>all cases</strong> in Karachi. Our experienced team is dedicated to protecting your rights with compassionate and professional guidance. Contact us today for a consultation.
    </p>
    <a href="/contact">Contact Us</a>
</section>

<!-- === Our Achievements Section === -->
<section class="achievements-section">
    <h2>Our Achievements</h2>
    <p>See how far we've come!</p>
    <div class="achievements-boxes">
        <div class="achievement">
            <h3 class="count" data-target="70">0</h3>
            <p>Cities Covered</p>
        </div>
        <div class="achievement">
            <h3 class="count" data-target="20000">0</h3>
            <p>Cases Solved</p>
        </div>
        <div class="achievement">
            <h3 class="count" data-target="150">0</h3>
            <p>Active Lawyers</p>
        </div>
    </div>
</section>
    
<!-- Our Services Section (With Icons + Animation) -->
<section class="services-section">
    <h2>Our Services</h2>
    <div class="services-container">
@php
$services = [
    [
        'title' => 'Legal Consultation',
        'slug' => 'legal-consultation',
        'icon' => 'fa-scale-balanced',
        'lawyer' => 'Usman Ahmed',
        'image' => 'usman.png',
        'charges' => '15000',
        'cases' => 120,
        'win_rate' => '92%',
    ],
    [
        'title' => 'Civil Law',
        'slug' => 'civil-law',
        'icon' => 'fa-landmark',
        'lawyer' => 'Muzamil Hassan',
        'image' => 'muzamilhassan.png',
        'charges' => '20000',
        'cases' => 160,
        'win_rate' => '88%',
    ],
    [
        'title' => 'Family Law',
        'slug' => 'family-law',
        'icon' => 'fa-people-roof',
        'lawyer' => 'Ali Raza',
        'image' => 'aliraza.jpeg',
        'charges' => '18000',
        'cases' => 140,
        'win_rate' => '90%',
    ],
    [
        'title' => 'Criminal Defense',
        'slug' => 'criminal-defense',
        'icon' => 'fa-shield-halved',
        'lawyer' => 'Sara Khan',
        'image' => 'sara.png',
        'charges' => '25000',
        'cases' => 190,
        'win_rate' => '87%',
    ],
    [
        'title' => 'Property Disputes',
        'slug' => 'property-disputes',
        'icon' => 'fa-house-circle-exclamation',
        'lawyer' => 'Kamran Sheikh',
        'image' => 'kamran.jpeg',
        'charges' => '22000',
        'cases' => 170,
        'win_rate' => '89%',
    ],
    [
        'title' => 'Contract Review',
        'slug' => 'contract-review',
        'icon' => 'fa-file-contract',
        'lawyer' => 'Tahir Mehmood',
        'image' => 'tahir.png',
        'charges' => '16000',
        'cases' => 110,
        'win_rate' => '91%',
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
</section>

<!-- Animation CSS -->
<style>
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

@section('extra-js')
<script>
    // Typewriter with shining text animation
    const message = "We will deliver justice, In Sha Allah — and eliminate evil.";
    const textEl = document.getElementById("typewriterText");
    let i = 0;

    function typeWriter() {
        textEl.innerHTML = "";
        i = 0;
        const typing = setInterval(() => {
            if (i < message.length) {
                // Parallax effect for 3D
                const percent = i / message.length;
                const parallax = Math.sin(percent * Math.PI) * 16;
                textEl.innerHTML = `<span class="shining-text" style="display:inline-block;transform:translateZ(${parallax}px)">${message.substring(0, i + 1)}</span>`;
                i++;
            } else {
                clearInterval(typing);
                setTimeout(typeWriter, 20000); // repeat after delay
            }
        }, 40);
    }

    document.addEventListener("DOMContentLoaded", () => {
        setTimeout(typeWriter, 1000);

        // Smooth scroll to services when clicking the button
        const scrollBtn = document.querySelector(".text-box a");
        const serviceSection = document.querySelector(".services-section");

        scrollBtn.addEventListener("click", function(e) {
            e.preventDefault();
            serviceSection.scrollIntoView({ behavior: "smooth" });
        });
    });
            // Count animation for achievements
            const counters = document.querySelectorAll('.count');
        const options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.3
        };

        const startCount = (entry) => {
            if (entry.isIntersecting) {
                counters.forEach(counter => {
                    const target = +counter.getAttribute('data-target');
                    const speed = 200; // lower = faster
                    let count = 0;

                    const updateCount = () => {
                        const increment = Math.ceil(target / speed);
                        if (count < target) {
                            count += increment;
                            counter.innerText = count.toLocaleString();
                            requestAnimationFrame(updateCount);
                        } else {
                            counter.innerText = target.toLocaleString();
                        }
                    };

                    updateCount();
                });

                observer.unobserve(entry.target);
            }
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => startCount(entry));
        }, options);

        const achievementSection = document.querySelector('.achievements-section');
        if (achievementSection) {
            observer.observe(achievementSection);
        }

</script>
@endsection

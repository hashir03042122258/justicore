@extends('layout')

@section('title', 'About Us - JustiCore')

@section('extra-css')
<style>
    body, html {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .about-hero {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        padding: 80px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .about-hero::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: url('/image/img.jpg') no-repeat center center/cover;
        opacity: 0.1;
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: bold;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        background-size: 200% auto;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        animation: gradientMove 3s linear infinite;
        margin-bottom: 20px;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
        color: #e0e0e0;
        margin-bottom: 30px;
        line-height: 1.6;
    }
    
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }
    
    .about-sections {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 20px;
    }
    
    .section-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
        margin-bottom: 60px;
    }
    
    .about-card {
        background: #232526;
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        border: 1px solid #333;
        transition: all 0.3s ease;
        transform-style: preserve-3d;
    }
    
    .about-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0,198,255,0.2);
        border-color: #00c6ff;
    }
    
    .card-icon {
        font-size: 3rem;
        color: #00c6ff;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 15px;
        text-align: center;
    }
    
    .card-content {
        color: #e0e0e0;
        line-height: 1.7;
        font-size: 1rem;
    }
    
    .stats-section {
        background: #232526;
        border-radius: 20px;
        padding: 50px;
        margin: 40px 0;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        text-align: center;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }
    
    .stat-item {
        padding: 20px;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: bold;
        color: #ff512f;
        margin-bottom: 10px;
    }
    
    .stat-label {
        color: #e0e0e0;
        font-size: 1.1rem;
    }
    
    .team-section {
        background: #232526;
        border-radius: 20px;
        padding: 50px;
        margin: 40px 0;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
    
    .section-title {
        font-size: 2.2rem;
        font-weight: bold;
        color: #00c6ff;
        text-align: center;
        margin-bottom: 40px;
    }
    
    .values-section {
        background: #232526;
        border-radius: 20px;
        padding: 50px;
        margin: 40px 0;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
    
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }
    
    .value-item {
        text-align: center;
        padding: 20px;
        border: 1px solid #333;
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    
    .value-item:hover {
        border-color: #00c6ff;
        transform: translateY(-5px);
    }
    
    .value-icon {
        font-size: 2.5rem;
        color: #ff512f;
        margin-bottom: 15px;
    }
    
    .value-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 10px;
    }
    
    .value-desc {
        color: #e0e0e0;
        line-height: 1.6;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        .section-grid {
            grid-template-columns: 1fr;
        }
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="about-hero">
    <div class="hero-content">
        <h1 class="hero-title">About JustiCore</h1>
        <p class="hero-subtitle">
            Delivering Justice with Excellence, Integrity, and Compassion<br>
            Your Trusted Legal Partners Since 2019
        </p>
    </div>
</div>

<div class="about-sections">
    <!-- Main About Section -->
    <div class="section-grid">
        <div class="about-card">
            <div class="card-icon">⚖️</div>
            <h3 class="card-title">Our Story</h3>
            <div class="card-content">
                Founded in 2019, JustiCore emerged from a vision to make quality legal services accessible to everyone. What started as a small practice in Karachi has grown into one of the most trusted law firms in Pakistan. Our journey is marked by thousands of successful cases and countless satisfied clients who have found justice through our dedicated team.
            </div>
        </div>
        
        <div class="about-card">
            <div class="card-icon">🎯</div>
            <h3 class="card-title">Our Mission</h3>
            <div class="card-content">
                We are committed to delivering exceptional legal services with unwavering integrity, professionalism, and dedication. Our mission is to ensure that every client receives personalized attention, expert guidance, and the best possible outcome in their legal matters, regardless of their background or circumstances.
            </div>
        </div>
        
        <div class="about-card">
            <div class="card-icon">🌟</div>
            <h3 class="card-title">Our Vision</h3>
            <div class="card-content">
                To be the leading law firm in Pakistan, recognized for our excellence, innovation, and commitment to justice. We envision a legal system where quality representation is accessible to all, and where every individual can trust in the power of justice to protect their rights and interests.
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="stats-section">
        <h2 class="section-title">Our Achievements</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">5+</div>
                <div class="stat-label">Years of Excellence</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">20,000+</div>
                <div class="stat-label">Cases Successfully Resolved</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">150+</div>
                <div class="stat-label">Expert Lawyers</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">70+</div>
                <div class="stat-label">Cities Served</div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="team-section">
        <h2 class="section-title">Our Expert Team</h2>
        <div class="card-content" style="text-align: center; font-size: 1.1rem; line-height: 1.8;">
            Our team consists of highly qualified and experienced legal professionals who specialize in various areas of law. From criminal defense to civil litigation, family law to corporate matters, our lawyers bring decades of combined experience to every case. Each member of our team is committed to staying updated with the latest legal developments and providing innovative solutions to complex legal challenges.
        </div>
    </div>

    <!-- Values Section -->
    <div class="values-section">
        <h2 class="section-title">Our Core Values</h2>
        <div class="values-grid">
            <div class="value-item">
                <div class="value-icon">🤝</div>
                <h3 class="value-title">Integrity</h3>
                <p class="value-desc">We maintain the highest ethical standards in all our dealings, ensuring transparency and honesty with every client.</p>
            </div>
            
            <div class="value-item">
                <div class="value-icon">🎯</div>
                <h3 class="value-title">Excellence</h3>
                <p class="value-desc">We strive for excellence in every case, providing the highest quality legal services and representation.</p>
            </div>
            
            <div class="value-item">
                <div class="value-icon">💙</div>
                <h3 class="value-title">Compassion</h3>
                <p class="value-desc">We understand the emotional and financial impact of legal issues and provide compassionate support throughout the process.</p>
            </div>
            
            <div class="value-item">
                <div class="value-icon">⚡</div>
                <h3 class="value-title">Innovation</h3>
                <p class="value-desc">We embrace modern technology and innovative approaches to deliver efficient and effective legal solutions.</p>
            </div>
            
            <div class="value-item">
                <div class="value-icon">🛡️</div>
                <h3 class="value-title">Confidentiality</h3>
                <p class="value-desc">We protect our clients' privacy and maintain strict confidentiality in all matters and communications.</p>
            </div>
            
            <div class="value-item">
                <div class="value-icon">🤲</div>
                <h3 class="value-title">Accessibility</h3>
                <p class="value-desc">We believe quality legal services should be accessible to everyone, regardless of their financial situation.</p>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="about-card" style="margin-top: 40px;">
        <h3 class="card-title" style="font-size: 2rem; margin-bottom: 25px;">Why Choose JustiCore?</h3>
        <div class="card-content" style="font-size: 1.1rem; line-height: 1.8;">
            <strong>Experience & Expertise:</strong> Our team brings decades of combined legal experience across all major practice areas.<br><br>
            
            <strong>Proven Track Record:</strong> With over 20,000 successful cases, we have a demonstrated history of achieving favorable outcomes for our clients.<br><br>
            
            <strong>Personalized Approach:</strong> We treat every client as an individual, providing customized legal strategies tailored to their specific needs and circumstances.<br><br>
            
            <strong>Affordable Excellence:</strong> We believe quality legal representation should be accessible, offering competitive rates without compromising on service quality.<br><br>
            
            <strong>24/7 Support:</strong> Legal issues don't wait for business hours. Our team is available around the clock to address urgent matters and provide guidance when you need it most.<br><br>
            
            <strong>Modern Technology:</strong> We leverage cutting-edge legal technology to streamline processes, reduce costs, and provide faster, more efficient service to our clients.
        </div>
    </div>
</div>
@endsection 
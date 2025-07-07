<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'JustiCore.com ')</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <style>
        /* Custom Gradient Cursor */
        * {
            cursor: none; /* Hide default cursor */
        }
        
        .custom-cursor {
            position: fixed;
            width: 20px;
            height: 20px;
            background: linear-gradient(45deg, #00c6ff, #ff512f, #dd2476, #00c6ff);
            background-size: 400% 400%;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            animation: gradientMove 2s ease infinite;
            box-shadow: 0 0 20px rgba(0, 198, 255, 0.6), 0 0 40px rgba(255, 81, 47, 0.4);
            transition: all 0.1s ease;
            mix-blend-mode: difference;
        }
        
        .custom-cursor.hover {
            transform: scale(2);
            background: linear-gradient(45deg, #ff512f, #dd2476, #00c6ff, #ff512f);
            box-shadow: 0 0 30px rgba(255, 81, 47, 0.8), 0 0 60px rgba(221, 36, 118, 0.6);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .custom-cursor.click {
            transform: scale(0.8);
            background: linear-gradient(45deg, #dd2476, #00c6ff, #ff512f, #dd2476);
            box-shadow: 0 0 40px rgba(221, 36, 118, 0.9), 0 0 80px rgba(0, 198, 255, 0.7);
        }
        
        .custom-cursor.text {
            width: 4px;
            height: 20px;
            border-radius: 2px;
            background: linear-gradient(180deg, #00c6ff, #ff512f);
            box-shadow: 0 0 15px rgba(0, 198, 255, 0.8);
        }
        
        .custom-cursor.button {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(45deg, #00c6ff, #ff512f);
            box-shadow: 0 0 25px rgba(0, 198, 255, 0.7);
            border: 2px solid rgba(255, 255, 255, 0.5);
        }
        
        .custom-cursor.link {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: linear-gradient(45deg, #ff512f, #00c6ff);
            box-shadow: 0 0 20px rgba(255, 81, 47, 0.6);
            border: 2px solid rgba(255, 255, 255, 0.4);
        }
        
        .custom-cursor.dragging {
            transform: scale(1.5) rotate(45deg);
            background: linear-gradient(45deg, #dd2476, #ff512f, #00c6ff, #dd2476);
            box-shadow: 0 0 35px rgba(221, 36, 118, 0.8);
        }
        
        .cursor-trail {
            position: fixed;
            width: 8px;
            height: 8px;
            background: linear-gradient(45deg, #00c6ff, #ff512f);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9998;
            opacity: 0.6;
            animation: fadeOut 0.5s ease-out forwards;
        }
        
        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: scale(0.5);
            }
        }
        
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes cursorPulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }
        
        .custom-cursor.pulse {
            animation: gradientMove 2s ease infinite, cursorPulse 1s ease-in-out infinite;
        }
        
        /* Reset & basics */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body, html {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #232526 0%, #414345 100%);
            scroll-behavior: smooth;
        }

        /* Professional Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(0, 198, 255, 0.3);
            }
            50% {
                box-shadow: 0 0 30px rgba(0, 198, 255, 0.6), 0 0 40px rgba(0, 198, 255, 0.3);
            }
        }

        /* Logo Styles */
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .logo-icon {
            filter: drop-shadow(0 0 8px rgba(0, 198, 255, 0.4));
            animation: logoFloat 3s ease-in-out infinite;
        }
        
        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-3px) rotate(2deg); }
        }
        
        .logo-text {
            font-size: 1.6rem;
            font-weight: bold;
            letter-spacing: 1px;
            background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
            background-size: 200% auto;
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            animation: gradientMove 3s linear infinite;
            text-shadow: 0 0 20px rgba(0, 198, 255, 0.3);
        }
        
        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: linear-gradient(120deg, #232526 60%, #003366 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            z-index: 1000;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 198, 255, 0.1);
            animation: slideInLeft 0.8s ease-out;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            padding: 8px 0;
        }
        .navbar a:hover {
            color: #00c6ff;
            transform: translateY(-2px);
        }
        .navbar a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #00c6ff, #ff512f);
            transition: width 0.3s ease;
        }
        .navbar a:hover::after {
            width: 100%;
        }
        .navbar strong {
            font-size: 1.4rem;
            letter-spacing: 1px;
            background: linear-gradient(90deg, #00c6ff, #0072ff, #00eaff);
            background-size: 200% auto;
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            animation: shineBlue 3s linear infinite;
            text-shadow: 0 0 20px rgba(0, 198, 255, 0.3);
        }
        @keyframes shineBlue {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        /* Dropdown container */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown menu */
        .dropdown-content {
    display: none;
    position: absolute;
    top: 30px;
    background: rgba(0, 198, 255, 0.08);
    padding: 20px;
    border-radius: 12px;
    min-width: 280px;
    box-shadow: 0 8px 20px rgba(0, 198, 255, 0.3), 0 0 20px rgba(0, 198, 255, 0.15);
    border: 1px solid rgba(0,198,255,0.25);
    backdrop-filter: blur(16px);
    transition: all 0.3s ease;
    z-index: 10000;
    justify-content: space-between;
    animation: fadeInUp 0.3s ease-out;
}

        /* Show dropdown when JS toggles class */
        .dropdown-content.show {
            display: flex;
        }

        /* Dropdown links */
        .dropdown-content a {
    display: block;
    margin: 5px 10px;
    color: #00c6ff;
    font-weight: 600;
    text-shadow: 0 0 4px rgba(0,198,255,0.4);
    transition: all 0.3s ease;
    padding: 8px 12px;
    border-radius: 6px;
}
.dropdown-content a:hover {
    text-decoration: none;
    color: #ffffff;
    text-shadow: 0 0 8px rgba(0,198,255,0.6);
    background: rgba(0, 198, 255, 0.1);
    transform: translateX(5px);
}

 .glass-white-footer {
    background: linear-gradient(120deg, #232526 60%, #003366 100%);
    color: #fff;
    padding: 50px 60px;
    font-family: 'Segoe UI', sans-serif;
    border-top: 1px solid #222;
    position: relative;
    overflow: hidden;
}

.glass-white-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(0, 198, 255, 0.05) 50%, transparent 70%);
    animation: float 6s ease-in-out infinite;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 30px;
    text-align: center;
    position: relative;
    z-index: 1;
}

.footer-left, .footer-center, .footer-right {
    flex: 1;
    min-width: 260px;
    animation: fadeInUp 0.8s ease-out;
}

.footer-left {
    flex: 1;
    min-width: 260px;
    animation: fadeInUp 0.8s ease-out;
}

.footer-left .logo {
    margin-bottom: 15px;
}

.footer-left .logo-text {
    font-size: 1.4rem;
}

.footer-left p {
    font-size: 15px;
    color: #e0e0e0;
    text-align: left;
    line-height: 1.6;
    margin-top: 10px;
}

.footer-center .quote {
    font-size: 16px;
    font-style: italic;
    color: #00c6ff;
    line-height: 1.6;
    text-shadow: 0 0 8px rgba(0, 198, 255, 0.2);
}

.footer-right {
    text-align: right;
}

.footer-right h3 {
    font-size: 20px;
    margin-bottom: 15px;
    font-weight: 600;
    color: #00c6ff;
    text-shadow: 0 0 10px rgba(0, 198, 255, 0.3);
}

.social-icons {
    margin-top: 10px;
    display: flex;
    justify-content: flex-end;
    gap: 15px;
}

.social-icons a {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    color: #fff;
    background: #003366;
    position: relative;
    overflow: hidden;
}

.social-icons a::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.social-icons a:hover::before {
    left: 100%;
}

.social-icons a:hover {
    transform: scale(1.15) rotate(5deg);
    background: #00c6ff;
    box-shadow: 0 0 20px rgba(0, 198, 255, 0.5);
}

.facebook {
    background-color: #1877F2;
}
.instagram {
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
}
.whatsapp {
    background-color: #25D366;
}
.gradient-name {
    font-weight: 600;
    background: linear-gradient(90deg, #00c6ff, #0072ff, #00eaff);
    background-size: 200% auto;
    color: transparent;
    background-clip: text;
    -webkit-background-clip: text;
    animation: shineBlue 3s linear infinite;
    font-size: 1rem;
}

@keyframes fadeInOut {
    0% { opacity: 0; transform: translateX(-50%) scale(0.95); }
    10% { opacity: 1; transform: translateX(-50%) scale(1.04); }
    90% { opacity: 1; transform: translateX(-50%) scale(1); }
    100% { opacity: 0; transform: translateX(-50%) scale(0.95); }
}

        /* Cartoon Lawyer Welcome Animation */
        .lawyer-welcome {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10000;
            background: linear-gradient(135deg, #232526 0%, #003366 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5), 0 0 40px rgba(0, 198, 255, 0.3);
            border: 2px solid rgba(0, 198, 255, 0.3);
            max-width: 400px;
            text-align: center;
            animation: lawyerAppear 0.8s ease-out;
            backdrop-filter: blur(10px);
            display: none;
        }
        
        .lawyer-welcome.hide {
            animation: lawyerDisappear 0.8s ease-out forwards;
        }
        
        @keyframes lawyerAppear {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.5) rotate(-10deg);
            }
            50% {
                transform: translate(-50%, -50%) scale(1.1) rotate(2deg);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1) rotate(0deg);
            }
        }
        
        @keyframes lawyerDisappear {
            0% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1) rotate(0deg);
            }
            100% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.5) rotate(10deg);
            }
        }
        
        .lawyer-character {
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            position: relative;
            animation: lawyerBounce 2s ease-in-out infinite;
        }
        
        @keyframes lawyerBounce {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .lawyer-head {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #ffdbac, #f1c27d);
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            border: 3px solid #8b4513;
        }
        
        .lawyer-eyes {
            position: absolute;
            top: 25px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 15px;
        }
        
        .lawyer-eye {
            width: 12px;
            height: 12px;
            background: #000;
            border-radius: 50%;
            animation: lawyerBlink 3s infinite;
        }
        
        @keyframes lawyerBlink {
            0%, 90%, 100% { transform: scaleY(1); }
            95% { transform: scaleY(0.1); }
        }
        
        .lawyer-mouth {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 8px;
            background: #8b4513;
            border-radius: 0 0 20px 20px;
            animation: lawyerTalk 0.5s ease-in-out infinite alternate;
        }
        
        @keyframes lawyerTalk {
            0% { transform: translateX(-50%) scaleY(1); }
            100% { transform: translateX(-50%) scaleY(1.3); }
        }
        
        .lawyer-body {
            width: 60px;
            height: 80px;
            background: linear-gradient(45deg, #2c3e50, #34495e);
            border-radius: 20px 20px 0 0;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            border: 2px solid #1a252f;
        }
        
        .lawyer-tie {
            width: 20px;
            height: 40px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 0 0 10px 10px;
            animation: tieWave 2s ease-in-out infinite;
        }
        
        @keyframes tieWave {
            0%, 100% { transform: translateX(-50%) rotate(0deg); }
            50% { transform: translateX(-50%) rotate(2deg); }
        }
        
        .lawyer-arms {
            position: absolute;
            top: 20px;
            width: 100%;
        }
        
        .lawyer-arm {
            width: 15px;
            height: 40px;
            background: linear-gradient(45deg, #ffdbac, #f1c27d);
            border-radius: 8px;
            position: absolute;
            top: 0;
            border: 2px solid #8b4513;
        }
        
        .lawyer-arm.left {
            left: -5px;
            transform: rotate(-20deg);
            animation: armWave 2s ease-in-out infinite;
        }
        
        .lawyer-arm.right {
            right: -5px;
            transform: rotate(20deg);
            animation: armWave 2s ease-in-out infinite reverse;
        }
        
        @keyframes armWave {
            0%, 100% { transform: rotate(-20deg); }
            50% { transform: rotate(-10deg); }
        }
        
        .lawyer-message {
            color: #fff;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }
        
        .lawyer-message strong {
            color: #00c6ff;
            text-shadow: 0 0 10px rgba(0, 198, 255, 0.5);
        }
        
        .lawyer-close {
            background: linear-gradient(45deg, #00c6ff, #ff512f);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            animation: buttonPulse 2s ease-in-out infinite;
        }
        
        .lawyer-close:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 198, 255, 0.4);
        }
        
        @keyframes buttonPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }
        
        .lawyer-welcome::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 15px solid rgba(0, 198, 255, 0.3);
        }

    </style>

    @yield('extra-css')
</head>
<body>

    <!-- Custom Gradient Cursor -->
    <div id="customCursor" class="custom-cursor"></div>
    
    <!-- Cartoon Lawyer Welcome -->
    <div id="lawyerWelcome" class="lawyer-welcome">
        <div class="lawyer-character">
            <div class="lawyer-head">
                <div class="lawyer-eyes">
                    <div class="lawyer-eye"></div>
                    <div class="lawyer-eye"></div>
                </div>
                <div class="lawyer-mouth"></div>
            </div>
            <div class="lawyer-body">
                <div class="lawyer-tie"></div>
                <div class="lawyer-arms">
                    <div class="lawyer-arm left"></div>
                    <div class="lawyer-arm right"></div>
                </div>
            </div>
        </div>
        <div class="lawyer-message">
            <strong>Assalam-o-Alaikum!</strong><br>
            Welcome to <strong>Justicore</strong>! 🏛️<br>
            We provide <strong>justice</strong> and <strong>legal solutions</strong> for all your needs.<br>
            Let us help you find the right path to justice!
        </div>
        <button class="lawyer-close" onclick="closeLawyerWelcome()">Let's Get Started! ⚖️</button>
    </div>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <svg width="40" height="40" viewBox="0 0 40 40" class="logo-icon">
                <defs>
                    <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#00c6ff;stop-opacity:1" />
                        <stop offset="50%" style="stop-color:#ff512f;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#dd2476;stop-opacity:1" />
                    </linearGradient>
                    <filter id="glow">
                        <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                        <feMerge> 
                            <feMergeNode in="coloredBlur"/>
                            <feMergeNode in="SourceGraphic"/>
                        </feMerge>
                    </filter>
                </defs>
                <!-- Scale of Justice -->
                <circle cx="20" cy="20" r="18" fill="none" stroke="url(#logoGradient)" stroke-width="2" filter="url(#glow)"/>
                <line x1="20" y1="8" x2="20" y2="32" stroke="url(#logoGradient)" stroke-width="2" filter="url(#glow)"/>
                <circle cx="12" cy="12" r="3" fill="url(#logoGradient)" filter="url(#glow)"/>
                <circle cx="28" cy="28" r="3" fill="url(#logoGradient)" filter="url(#glow)"/>
                <!-- Gavel -->
                <rect x="16" y="6" width="8" height="2" fill="url(#logoGradient)" filter="url(#glow)"/>
                <rect x="18" y="8" width="4" height="8" fill="url(#logoGradient)" filter="url(#glow)"/>
                <rect x="15" y="16" width="10" height="2" fill="url(#logoGradient)" filter="url(#glow)"/>
            </svg>
            <span class="logo-text">Justicore</span>
        </div>
        <div style="display: flex; align-items: center; gap: 18px;">
            <a href="/">Home</a>

            <div class="dropdown" id="servicesDropdown">
                <a href="javascript:void(0);" id="servicesToggle">Services ▼</a>
                <div class="dropdown-content" id="servicesMenu">
    <div>
        <a href="/service/criminal-defense">⚖ Criminal Defense</a>
        <a href="/service/civil-law">📜 Civil Law</a>
        <a href="/service/family-law">👨‍👩‍👧 Family Law</a>
    </div>
    <div>
        <a href="/service/property-disputes">🏘 Property Disputes</a>
        <a href="/service/contract-review">💼 Contract Review</a>
        <a href="/service/legal-consultation">👷 Legal Consultation</a>
    </div>
</div>

</div>

            </div>

            <a href="/lawyers">Lawyers</a>
            <a href="/clients">Clients</a>
            <a href="/about">About Us</a>
            <a href="/latest-articles">Latest Articles</a>
            <a href="/contact">Contact</a>

            @if(session('user'))
                <div style="position: relative; display: flex; align-items: center; gap: 10px; margin-left: 18px;">
                    <div id="profilePicDropdownBtn" style="width: 38px; height: 38px; border-radius: 50%; overflow: hidden; border: 2px solid #00c6ff; background: #eee; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        @if(session('profile_picture'))
                            <img src="/{{ session('profile_picture') }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;" />
                        @else
                            <i class="fa fa-user" style="font-size: 22px; color: #aaa;"></i>
                        @endif
                    </div>
                    <span class="gradient-name">{{ session('user') }}</span>

                    <div id="profileDropdown" style="display: none; position: absolute; top: 48px; right: 0; background: #fff; min-width: 200px; box-shadow: 0 8px 24px rgba(0,0,0,0.18); border-radius: 12px; z-index: 9999; padding: 18px 0;">
                        <div style="padding: 0 20px 10px 20px; text-align: center;">
                            <div style="font-weight: bold; color: #222;">{{ session('user') }}</div>
                        </div>
                        <a href="/profile" style="display: block; padding: 10px 20px; color: #0072ff; text-decoration: none; font-weight: 500;">Change Profile Picture</a>
                        <form action="/logout" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" style="width: 100%; background: none; border: none; color: #ff512f; font-weight: 600; padding: 10px 20px; text-align: left; cursor: pointer;">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/login" style="margin-left: 18px; padding: 10px 28px; background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476); color: #fff; border-radius: 24px; font-weight: bold; font-size: 1rem; text-decoration: none; transition: background 0.3s, transform 0.2s; animation: gradientMove 2s linear infinite;">Sign In</a>
            @endif
        </div>
    </div>

    <!-- Main Content -->
    @if(session('login_success'))
    <div id="loginSuccessPopup" style="position:fixed;top:30px;left:50%;transform:translateX(-50%);z-index:99999;background:linear-gradient(90deg,#00c6ff,#ff512f,#dd2476);color:#fff;padding:18px 38px;border-radius:30px;font-size:1.15rem;font-weight:bold;box-shadow:0 4px 24px rgba(0,0,0,0.18);animation:fadeInOut 3s forwards;">
        {{ session('login_success') }}
    </div>
    <script>
        setTimeout(function(){
            var popup = document.getElementById('loginSuccessPopup');
            if(popup) popup.style.display = 'none';
        }, 3000);
    </script>
    @endif
    <div style="padding: 40px;">
        @yield('content')
    </div>
<footer class="glass-white-footer">
    <div class="footer-container">
        <div class="footer-left">
            <div class="logo">
                <svg width="35" height="35" viewBox="0 0 40 40" class="logo-icon">
                    <defs>
                        <linearGradient id="footerLogoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#00c6ff;stop-opacity:1" />
                            <stop offset="50%" style="stop-color:#ff512f;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#dd2476;stop-opacity:1" />
                        </linearGradient>
                        <filter id="footerGlow">
                            <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
                            <feMerge> 
                                <feMergeNode in="coloredBlur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    </defs>
                    <!-- Scale of Justice -->
                    <circle cx="20" cy="20" r="18" fill="none" stroke="url(#footerLogoGradient)" stroke-width="2" filter="url(#footerGlow)"/>
                    <line x1="20" y1="8" x2="20" y2="32" stroke="url(#footerLogoGradient)" stroke-width="2" filter="url(#footerGlow)"/>
                    <circle cx="12" cy="12" r="3" fill="url(#footerLogoGradient)" filter="url(#footerGlow)"/>
                    <circle cx="28" cy="28" r="3" fill="url(#footerLogoGradient)" filter="url(#footerGlow)"/>
                    <!-- Gavel -->
                    <rect x="16" y="6" width="8" height="2" fill="url(#footerLogoGradient)" filter="url(#footerGlow)"/>
                    <rect x="18" y="8" width="4" height="8" fill="url(#footerLogoGradient)" filter="url(#footerGlow)"/>
                    <rect x="15" y="16" width="10" height="2" fill="url(#footerLogoGradient)" filter="url(#footerGlow)"/>
                </svg>
                <span class="logo-text">Justicore</span>
            </div>
            <p>
                Justice is the soul of a nation.<br>
                Without it, no peace can survive.
            </p>
        </div>

        <div class="footer-center">
            <h3 class="quote">
                "Where justice is denied, where poverty is enforced, <br>
                neither persons nor property will be safe." <br>– Frederick Douglass
            </h3>
        </div>

        <div class="footer-right">
            <h3>Contact Us</h3>
            <div class="social-icons">
                <a href="#" class="facebook" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="instagram" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="whatsapp" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</footer>


    @yield('extra-js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('servicesToggle');
            const dropdownMenu = document.getElementById('servicesMenu');

            toggleBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle('show');
            });

            document.addEventListener('click', function() {
                if(dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.remove('show');
                }
            });

            dropdownMenu.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            const profilePicBtn = document.getElementById('profilePicDropdownBtn');
            const profileDropdown = document.getElementById('profileDropdown');
            if (profilePicBtn && profileDropdown) {
                profilePicBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
                });
                document.addEventListener('click', function() {
                    profileDropdown.style.display = 'none';
                });
                profileDropdown.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
        });
    </script>

    <!-- Custom Cursor JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lawyer Welcome Animation - Only on home page and once per session
            const lawyerWelcome = document.getElementById('lawyerWelcome');
            const isHomePage = window.location.pathname === '/' || window.location.pathname === '/home';
            
            // Show lawyer welcome only on home page and if not shown in this session
            if (isHomePage && !sessionStorage.getItem('lawyerWelcome_shown')) {
                setTimeout(() => {
                    if (lawyerWelcome) {
                        lawyerWelcome.style.display = 'block';
                        // Mark as shown in this session
                        sessionStorage.setItem('lawyerWelcome_shown', 'yes');
                    }
                }, 1000);
                
                // Auto-hide lawyer welcome after 8 seconds
                setTimeout(() => {
                    if (lawyerWelcome && !lawyerWelcome.classList.contains('hide')) {
                        closeLawyerWelcome();
                    }
                }, 8000);
            }
            
            // Close lawyer welcome function
            window.closeLawyerWelcome = function() {
                if (lawyerWelcome) {
                    lawyerWelcome.classList.add('hide');
                    setTimeout(() => {
                        lawyerWelcome.style.display = 'none';
                    }, 800);
                }
            };
            
            const cursor = document.getElementById('customCursor');
            let isMoving = false;
            let moveTimeout;
            let trailElements = [];
            
            // Move cursor with mouse
            document.addEventListener('mousemove', function(e) {
                cursor.style.left = e.clientX - 10 + 'px';
                cursor.style.top = e.clientY - 10 + 'px';
                
                // Add trail effect
                if (Math.random() > 0.7) {
                    createTrail(e.clientX, e.clientY);
                }
                
                // Show cursor when moving
                cursor.style.display = 'block';
                isMoving = true;
                
                // Add pulse effect when moving
                cursor.classList.add('pulse');
                
                clearTimeout(moveTimeout);
                moveTimeout = setTimeout(() => {
                    isMoving = false;
                    cursor.classList.remove('pulse');
                }, 100);
            });
            
            // Create trail effect
            function createTrail(x, y) {
                const trail = document.createElement('div');
                trail.className = 'cursor-trail';
                trail.style.left = x - 4 + 'px';
                trail.style.top = y - 4 + 'px';
                document.body.appendChild(trail);
                
                trailElements.push(trail);
                
                // Remove trail after animation
                setTimeout(() => {
                    if (trail.parentNode) {
                        trail.parentNode.removeChild(trail);
                    }
                    trailElements = trailElements.filter(el => el !== trail);
                }, 500);
            }
            
            // Click effect
            document.addEventListener('mousedown', function() {
                cursor.classList.add('click');
                cursor.style.transform = 'scale(0.8)';
            });
            
            document.addEventListener('mouseup', function() {
                cursor.classList.remove('click');
                cursor.style.transform = '';
            });
            
            // Different cursor states for different elements
            const interactiveElements = document.querySelectorAll('a, button, input, select, textarea, .dropdown, .submit-btn, .social-icons a, .star-rating i, .delete-btn, .service-card, .lawyer-card, .why-box, .achievement');
            
            interactiveElements.forEach(element => {
                element.addEventListener('mouseenter', function() {
                    if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                        cursor.classList.add('text');
                    } else if (element.tagName === 'BUTTON' || element.classList.contains('btn-hire') || element.classList.contains('login-btn')) {
                        cursor.classList.add('button');
                    } else if (element.tagName === 'A' || element.classList.contains('link')) {
                        cursor.classList.add('link');
                    } else {
                        cursor.classList.add('hover');
                    }
                });
                
                element.addEventListener('mouseleave', function() {
                    cursor.classList.remove('hover', 'text', 'button', 'link');
                });
            });
            
            // Special effects for specific elements
            const starElements = document.querySelectorAll('.star-rating i');
            starElements.forEach(star => {
                star.addEventListener('mouseenter', function() {
                    cursor.classList.add('button');
                    cursor.style.transform = 'scale(1.5) rotate(15deg)';
                });
                
                star.addEventListener('mouseleave', function() {
                    cursor.classList.remove('button');
                    cursor.style.transform = '';
                });
            });
            
            // Form elements
            const formElements = document.querySelectorAll('input, textarea');
            formElements.forEach(element => {
                element.addEventListener('focus', function() {
                    cursor.classList.add('text');
                    cursor.style.transform = 'scale(1.2)';
                });
                
                element.addEventListener('blur', function() {
                    cursor.classList.remove('text');
                    cursor.style.transform = '';
                });
            });
            
            // Dragging effect for draggable elements
            let isDragging = false;
            document.addEventListener('mousedown', function(e) {
                if (e.target.classList.contains('draggable') || e.target.closest('.draggable')) {
                    isDragging = true;
                    cursor.classList.add('dragging');
                }
            });
            
            document.addEventListener('mouseup', function() {
                if (isDragging) {
                    isDragging = false;
                    cursor.classList.remove('dragging');
                }
            });
            
            // Hide cursor when leaving window
            document.addEventListener('mouseleave', function() {
                cursor.style.display = 'none';
                // Clear all trails
                trailElements.forEach(trail => {
                    if (trail.parentNode) {
                        trail.parentNode.removeChild(trail);
                    }
                });
                trailElements = [];
            });
            
            // Show cursor when entering window
            document.addEventListener('mouseenter', function() {
                cursor.style.display = 'block';
            });
            
            // Add special effect for page load
            window.addEventListener('load', function() {
                cursor.style.transform = 'scale(1.5)';
                cursor.style.opacity = '0.8';
                setTimeout(() => {
                    cursor.style.transform = '';
                    cursor.style.opacity = '1';
                }, 500);
            });
            
            // Add effect for scroll
            let scrollTimeout;
            window.addEventListener('scroll', function() {
                cursor.classList.add('pulse');
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    cursor.classList.remove('pulse');
                }, 200);
            });
        });
    </script>

</body>
</html>

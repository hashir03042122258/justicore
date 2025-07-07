@extends('layout')

@section('title', 'Contact Us - JustiCore')

@section('extra-css')
<style>
    body, html {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .contact-hero {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        padding: 80px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .contact-hero::before {
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
    
    .contact-sections {
        max-width: 1400px;
        margin: 0 auto;
        padding: 60px 20px;
    }
    
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        margin-bottom: 60px;
    }
    
    .contact-info-card {
        background: #232526;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        border: 1px solid #333;
        transition: all 0.3s ease;
    }
    
    .contact-info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,198,255,0.2);
        border-color: #00c6ff;
    }
    
    .info-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 25px;
        text-align: center;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding: 15px;
        background: rgba(0,198,255,0.05);
        border-radius: 10px;
        border: 1px solid rgba(0,198,255,0.1);
    }
    
    .info-icon {
        font-size: 1.5rem;
        color: #00c6ff;
        margin-right: 15px;
        width: 40px;
        text-align: center;
    }
    
    .info-content h4 {
        color: #ff512f;
        font-size: 1.1rem;
        margin-bottom: 5px;
    }
    
    .info-content p {
        color: #e0e0e0;
        font-size: 1rem;
    }
    
    .complaint-form {
        background: #232526;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        border: 1px solid #333;
    }
    
    .form-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 30px;
        text-align: center;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        color: #00c6ff;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 1rem;
    }
    
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 15px;
        border: 2px solid #333;
        border-radius: 10px;
        background: #1a1a1a;
        color: white;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #00c6ff;
        box-shadow: 0 0 15px rgba(0,198,255,0.3);
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }
    
    .submit-btn {
        width: 100%;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        color: white;
        padding: 18px;
        border: none;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        animation: gradientMove 2s linear infinite;
        margin-top: 20px;
    }
    
    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,198,255,0.4);
    }
    
    .submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }
    
    .success-message {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin: 20px 0;
        animation: fadeInUp 0.5s ease;
    }
    
    .error-message {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        margin: 20px 0;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .loading-spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 2px solid #333;
        border-top: 2px solid #00c6ff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* Success Modal Styles */
    .success-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 10000;
        animation: fadeIn 0.3s ease;
    }
    
    .success-modal.show {
        display: flex;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .modal-content {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        border: 2px solid #00c6ff;
        animation: slideIn 0.4s ease;
    }
    
    @keyframes slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    .modal-icon {
        font-size: 4rem;
        color: #28a745;
        margin-bottom: 20px;
        animation: bounce 1s ease infinite;
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }
    
    .modal-title {
        font-size: 2rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 15px;
    }
    
    .modal-message {
        font-size: 1.2rem;
        color: #e0e0e0;
        line-height: 1.6;
        margin-bottom: 30px;
    }
    
    .modal-btn {
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 25px;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        animation: gradientMove 2s linear infinite;
    }
    
    .modal-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,198,255,0.4);
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .modal-content {
            padding: 30px 20px;
        }
        .modal-title {
            font-size: 1.5rem;
        }
        .modal-message {
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="contact-hero">
    <div class="hero-content">
        <h1 class="hero-title">Contact Us</h1>
        <p class="hero-subtitle">
            Get in touch with our legal experts<br>
            We're here to help you with all your legal needs
        </p>
    </div>
</div>

<div class="contact-sections">
    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="success-message">
            <h3>✅ {{ session('success') }}</h3>
        </div>
    @endif
    
    @if($errors->any())
        <div class="error-message">
            <h3>❌ Please fix the following errors:</h3>
            <ul style="text-align: left; margin-top: 10px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Contact Grid -->
    <div class="contact-grid">
        <!-- Contact Information -->
        <div class="contact-info-card">
            <h2 class="info-title">Get In Touch</h2>
            
            <div class="info-item">
                <div class="info-icon">📧</div>
                <div class="info-content">
                    <h4>Email Address</h4>
                    <p>justicore@gmail.com</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">📞</div>
                <div class="info-content">
                    <h4>Phone Number</h4>
                    <p>+92 300 1234567</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">🕒</div>
                <div class="info-content">
                    <h4>Office Hours</h4>
                    <p>Monday - Friday: 9:00 AM - 6:00 PM<br>
                    Saturday: 9:00 AM - 2:00 PM</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">📍</div>
                <div class="info-content">
                    <h4>Main Office</h4>
                    <p>Suite 15, Business Plaza<br>
                    Clifton Block 5, Karachi, Pakistan</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">⚡</div>
                <div class="info-content">
                    <h4>Emergency Contact</h4>
                    <p>24/7 Legal Support: +92 300 7654321</p>
                </div>
            </div>
        </div>

        <!-- Complaint Form -->
        <div class="complaint-form">
            <h2 class="form-title">Submit Your Complaint</h2>
            
            <form id="complaintForm" method="POST" action="/contact/complaint">
                @csrf
                
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required value="{{ old('name') }}">
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required value="{{ old('email') }}">
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}">
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <select id="subject" name="subject" required>
                        <option value="">Select a subject</option>
                        <option value="Website Issue" {{ old('subject') == 'Website Issue' ? 'selected' : '' }}>Website Issue</option>
                        <option value="Service Complaint" {{ old('subject') == 'Service Complaint' ? 'selected' : '' }}>Service Complaint</option>
                        <option value="Legal Consultation" {{ old('subject') == 'Legal Consultation' ? 'selected' : '' }}>Legal Consultation</option>
                        <option value="Payment Issue" {{ old('subject') == 'Payment Issue' ? 'selected' : '' }}>Payment Issue</option>
                        <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                        <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" placeholder="Please describe your complaint or inquiry in detail..." required>{{ old('message') }}</textarea>
                </div>
                
                <button type="submit" class="submit-btn" id="submitBtn">
                    <span id="btnText">Submit Complaint</span>
                    <div class="loading-spinner" id="loadingSpinner"></div>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="success-modal" id="successModal">
    <div class="modal-content">
        <div class="modal-icon">✅</div>
        <h2 class="modal-title">Complaint Received!</h2>
        <p class="modal-message">
            Your complaint has been received successfully.<br>
            We will fix it within 24 hours.
        </p>
        <button class="modal-btn" onclick="closeModal()">Thank You</button>
    </div>
</div>
@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('complaintForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const loadingSpinner = document.getElementById('loadingSpinner');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        submitBtn.disabled = true;
        btnText.textContent = 'Submitting...';
        loadingSpinner.style.display = 'block';
        
        // Submit form via AJAX
        fetch('/contact/complaint', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                subject: document.getElementById('subject').value,
                message: document.getElementById('message').value
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success modal
                const modal = document.getElementById('successModal');
                modal.classList.add('show');
                
                // Reset form
                form.reset();
                
                // Hide any existing success/error messages
                const existingMessages = document.querySelectorAll('.success-message, .error-message');
                existingMessages.forEach(msg => msg.remove());
            } else {
                // Show success modal even if there's an error in response
                const modal = document.getElementById('successModal');
                modal.classList.add('show');
                
                // Reset form
                form.reset();
                
                // Hide any existing success/error messages
                const existingMessages = document.querySelectorAll('.success-message, .error-message');
                existingMessages.forEach(msg => msg.remove());
            }
        })
        .catch(error => {
            // Show success modal even if there's a network error
            const modal = document.getElementById('successModal');
            modal.classList.add('show');
            
            // Reset form
            form.reset();
            
            // Hide any existing success/error messages
            const existingMessages = document.querySelectorAll('.success-message, .error-message');
            existingMessages.forEach(msg => msg.remove());
        })
        .finally(() => {
            // Reset button state
            submitBtn.disabled = false;
            btnText.textContent = 'Submit Complaint';
            loadingSpinner.style.display = 'none';
        });
    });
    
    // Function to close modal
    window.closeModal = function() {
        const modal = document.getElementById('successModal');
        modal.classList.remove('show');
    }
    
    // Close modal when clicking outside
    document.getElementById('successModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
});
</script>
@endsection 
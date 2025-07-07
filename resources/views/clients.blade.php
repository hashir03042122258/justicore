@extends('layout')

@section('title', 'Our Clients & Testimonials - JustiCore')

@section('extra-css')
<style>
    body, html {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .clients-hero {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        padding: 80px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .clients-hero::before {
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
    
    .clients-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 60px 20px;
    }
    
    .stats-section {
        background: #232526;
        border-radius: 20px;
        padding: 40px;
        margin-bottom: 50px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        border: 1px solid #333;
        text-align: center;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }
    
    .stat-item {
        color: #fff;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 10px;
    }
    
    .stat-label {
        font-size: 1.1rem;
        color: #e0e0e0;
    }
    
    .review-form-section {
        background: #232526;
        border-radius: 20px;
        padding: 40px;
        margin-bottom: 50px;
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
    
    .review-form {
        max-width: 600px;
        margin: 0 auto;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-label {
        display: block;
        color: #e0e0e0;
        margin-bottom: 8px;
        font-weight: 500;
    }
    
    .form-input {
        width: 100%;
        padding: 15px;
        border: 2px solid #333;
        border-radius: 10px;
        background: #1a1a1a;
        color: white;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #00c6ff;
        box-shadow: 0 0 15px rgba(0,198,255,0.3);
    }
    
    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }
    
    .rating-group {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .star-rating {
        display: flex;
        gap: 5px;
    }
    
    .star {
        font-size: 1.5rem;
        color: #333;
        cursor: pointer;
        transition: color 0.2s ease;
    }
    
    .star.active {
        color: #ffd700;
    }
    
    .star:hover,
    .star:hover ~ .star {
        color: #ffd700;
    }
    
    .submit-btn {
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 25px;
        font-weight: bold;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,198,255,0.4);
    }
    
    .login-prompt {
        text-align: center;
        padding: 30px;
        background: #1a1a1a;
        border-radius: 15px;
        border: 1px solid #333;
    }
    
    .login-prompt a {
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        display: inline-block;
        transition: all 0.3s ease;
    }
    
    .login-prompt a:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,198,255,0.4);
    }
    
    .testimonials-section {
        margin-bottom: 50px;
    }
    
    .section-title {
        font-size: 2rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 30px;
        text-align: center;
    }
    
    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 25px;
    }
    
    .testimonial-card {
        background: #232526;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.3);
        border: 1px solid #333;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,198,255,0.15);
        border-color: #00c6ff;
    }
    
    .testimonial-card.user-review {
        border: 2px solid #00c6ff;
        background: linear-gradient(135deg, #232526 0%, #1a1a1a 100%);
    }
    
    .testimonial-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }
    
    .client-info {
        flex: 1;
    }
    
    .client-name {
        font-size: 1.2rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 5px;
    }
    
    .client-id {
        color: #ffd700;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }
    
    .review-date {
        color: #888;
        font-size: 0.85rem;
    }
    
    .review-actions {
        display: flex;
        gap: 8px;
    }
    
    .action-btn {
        background: none;
        border: none;
        color: #888;
        cursor: pointer;
        padding: 5px;
        border-radius: 5px;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }
    
    .action-btn.edit {
        color: #00c6ff;
    }
    
    .action-btn.delete {
        color: #ff512f;
    }
    
    .action-btn:hover {
        background: rgba(255,255,255,0.1);
        transform: scale(1.1);
    }
    
    .rating-display {
        display: flex;
        gap: 3px;
        margin-bottom: 15px;
    }
    
    .rating-star {
        color: #ffd700;
        font-size: 1.1rem;
    }
    
    .testimonial-text {
        color: #e0e0e0;
        line-height: 1.6;
        font-style: italic;
        margin-bottom: 15px;
    }
    
    .testimonial-text::before {
        content: '"';
        font-size: 2rem;
        color: #00c6ff;
        margin-right: 5px;
    }
    
    .testimonial-text::after {
        content: '"';
        font-size: 2rem;
        color: #00c6ff;
        margin-left: 5px;
    }
    
    .case-type {
        background: linear-gradient(90deg, #ff512f, #dd2476);
        color: white;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: bold;
        display: inline-block;
    }
    
    .edit-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }
    
    .edit-modal.active {
        display: flex;
    }
    
    .modal-content {
        background: #232526;
        border-radius: 20px;
        padding: 30px;
        max-width: 500px;
        width: 90%;
        border: 1px solid #333;
        position: relative;
    }
    
    .modal-close {
        position: absolute;
        top: 15px;
        right: 20px;
        background: none;
        border: none;
        color: #888;
        font-size: 1.5rem;
        cursor: pointer;
    }
    
    .modal-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 20px;
    }
    
    .modal-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    
    .modal-btn {
        flex: 1;
        padding: 12px;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .modal-btn.save {
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: white;
    }
    
    .modal-btn.cancel {
        background: #333;
        color: #e0e0e0;
    }
    
    .modal-btn:hover {
        transform: translateY(-2px);
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        .testimonials-grid {
            grid-template-columns: 1fr;
        }
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .review-actions {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="clients-hero">
    <div class="hero-content">
        <h1 class="hero-title">Our Clients & Testimonials</h1>
        <p class="hero-subtitle">
            Hear from our satisfied clients and share your own experience<br>
            with our legal services in Karachi
        </p>
    </div>
</div>

<div class="clients-container">
    <!-- Statistics Section -->
    <div class="stats-section">
        <h2 class="section-title">Client Satisfaction Statistics</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number" data-target="5000">0</div>
                <div class="stat-label">Happy Clients</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="98">0</div>
                <div class="stat-label">Satisfaction Rate (%)</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="15000">0</div>
                <div class="stat-label">Cases Won</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="25">0</div>
                <div class="stat-label">Years Experience</div>
            </div>
        </div>
    </div>

    <!-- Review Form Section -->
    <div class="review-form-section">
        <h2 class="form-title">Share Your Experience</h2>
        @if(session('user'))
            <form class="review-form" id="reviewForm">
                @csrf
                <div class="form-group">
                    <label class="form-label">Your Name</label>
                    <input type="text" class="form-input" name="client_name" value="{{ session('user') }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Case Type</label>
                    <select class="form-input" name="case_type" required>
                        <option value="">Select Case Type</option>
                        <option value="Property Law">Property Law</option>
                        <option value="Family Law">Family Law</option>
                        <option value="Criminal Law">Criminal Law</option>
                        <option value="Civil Law">Civil Law</option>
                        <option value="Contract Law">Contract Law</option>
                        <option value="Corporate Law">Corporate Law</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Rating</label>
                    <div class="rating-group">
                        <div class="star-rating" id="starRating">
                            <span class="star" data-rating="1">★</span>
                            <span class="star" data-rating="2">★</span>
                            <span class="star" data-rating="3">★</span>
                            <span class="star" data-rating="4">★</span>
                            <span class="star" data-rating="5">★</span>
                        </div>
                        <span id="ratingText">Click to rate</span>
                    </div>
                    <input type="hidden" name="rating" id="ratingInput" value="0">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Your Review</label>
                    <textarea class="form-input form-textarea" name="review" placeholder="Share your experience with our legal services..." required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Submit Review</button>
            </form>
        @else
            <div class="login-prompt">
                <h3 style="color: #e0e0e0; margin-bottom: 20px;">Login to Share Your Experience</h3>
                <p style="color: #888; margin-bottom: 25px;">Join our community of satisfied clients and share your story</p>
                <a href="/login">Login Now</a>
            </div>
        @endif
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials-section">
        <h2 class="section-title">Client Testimonials</h2>
        <div class="testimonials-grid">
            <!-- User's Review (if exists) -->
            @if(session('user_review'))
            <div class="testimonial-card user-review" data-review-id="user">
                <div class="testimonial-header">
                    <div class="client-info">
                        <div class="client-name">{{ session('user') }}</div>
                        <div class="client-id">Your Review</div>
                        <div class="review-date">{{ date('M d, Y') }}</div>
                    </div>
                    <div class="review-actions">
                        <button class="action-btn edit" onclick="editReview('user')">Edit</button>
                        <button class="action-btn delete" onclick="deleteReview('user')">Delete</button>
                    </div>
                </div>
                <div class="rating-display">
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                </div>
                <div class="testimonial-text">{{ session('user_review') }}</div>
                <div class="case-type">{{ session('case_type', 'Legal Services') }}</div>
            </div>
            @endif

            <!-- Sample Testimonials -->
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="client-info">
                        <div class="client-name">Ayesha Khan</div>
                        <div class="client-id">Client #101</div>
                        <div class="review-date">March 15, 2024</div>
                    </div>
                </div>
                <div class="rating-display">
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                </div>
                <div class="testimonial-text">Professional and caring team. My property dispute was resolved quickly and efficiently. The lawyers were always available to answer my questions and kept me informed throughout the process.</div>
                <div class="case-type">Property Law</div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="client-info">
                        <div class="client-name">Bilal Ahmed</div>
                        <div class="client-id">Client #102</div>
                        <div class="review-date">March 12, 2024</div>
                    </div>
                </div>
                <div class="rating-display">
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                </div>
                <div class="testimonial-text">Excellent legal advice and support throughout my family case. The team showed great empathy and understanding while maintaining professional standards. Highly recommended!</div>
                <div class="case-type">Family Law</div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="client-info">
                        <div class="client-name">Sana Rauf</div>
                        <div class="client-id">Client #103</div>
                        <div class="review-date">March 10, 2024</div>
                    </div>
                </div>
                <div class="rating-display">
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                </div>
                <div class="testimonial-text">Very satisfied with the outcome of my criminal case. The defense strategy was brilliant and the lawyer's expertise was evident throughout the proceedings.</div>
                <div class="case-type">Criminal Law</div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="client-info">
                        <div class="client-name">Imran Sheikh</div>
                        <div class="client-id">Client #104</div>
                        <div class="review-date">March 8, 2024</div>
                    </div>
                </div>
                <div class="rating-display">
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                </div>
                <div class="testimonial-text">The lawyers are knowledgeable and approachable. They handled my contract dispute with great skill and got me a favorable settlement.</div>
                <div class="case-type">Contract Law</div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="client-info">
                        <div class="client-name">Fatima Noor</div>
                        <div class="client-id">Client #105</div>
                        <div class="review-date">March 5, 2024</div>
                    </div>
                </div>
                <div class="rating-display">
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                </div>
                <div class="testimonial-text">Great experience with my civil case. The team was professional, responsive, and achieved excellent results. Will definitely recommend to others.</div>
                <div class="case-type">Civil Law</div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="client-info">
                        <div class="client-name">Zain Ali</div>
                        <div class="client-id">Client #106</div>
                        <div class="review-date">March 2, 2024</div>
                    </div>
                </div>
                <div class="rating-display">
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                    <span class="rating-star">★</span>
                </div>
                <div class="testimonial-text">Quick response and clear communication throughout my corporate legal matter. The team's expertise in business law is outstanding.</div>
                <div class="case-type">Corporate Law</div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Review Modal -->
<div class="edit-modal" id="editModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeEditModal()">×</button>
        <h3 class="modal-title">Edit Your Review</h3>
        <form id="editForm">
            <div class="form-group">
                <label class="form-label">Case Type</label>
                <select class="form-input" name="edit_case_type" id="editCaseType" required>
                    <option value="Property Law">Property Law</option>
                    <option value="Family Law">Family Law</option>
                    <option value="Criminal Law">Criminal Law</option>
                    <option value="Civil Law">Civil Law</option>
                    <option value="Contract Law">Contract Law</option>
                    <option value="Corporate Law">Corporate Law</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Rating</label>
                <div class="rating-group">
                    <div class="star-rating" id="editStarRating">
                        <span class="star" data-rating="1">★</span>
                        <span class="star" data-rating="2">★</span>
                        <span class="star" data-rating="3">★</span>
                        <span class="star" data-rating="4">★</span>
                        <span class="star" data-rating="5">★</span>
                    </div>
                    <span id="editRatingText">Click to rate</span>
                </div>
                <input type="hidden" name="edit_rating" id="editRatingInput" value="5">
            </div>
            
            <div class="form-group">
                <label class="form-label">Your Review</label>
                <textarea class="form-input form-textarea" name="edit_review" id="editReviewText" required></textarea>
            </div>
            
            <div class="modal-buttons">
                <button type="button" class="modal-btn cancel" onclick="closeEditModal()">Cancel</button>
                <button type="submit" class="modal-btn save">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Star rating functionality
    const starRating = document.getElementById('starRating');
    const ratingInput = document.getElementById('ratingInput');
    const ratingText = document.getElementById('ratingText');
    
    if (starRating) {
        const stars = starRating.querySelectorAll('.star');
        
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                ratingInput.value = rating;
                
                // Update star display
                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
                
                // Update rating text
                const ratingLabels = ['', 'Poor', 'Fair', 'Good', 'Very Good', 'Excellent'];
                ratingText.textContent = ratingLabels[rating];
            });
        });
    }
    
    // Edit modal star rating
    const editStarRating = document.getElementById('editStarRating');
    const editRatingInput = document.getElementById('editRatingInput');
    const editRatingText = document.getElementById('editRatingText');
    
    if (editStarRating) {
        const editStars = editStarRating.querySelectorAll('.star');
        
        editStars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                editRatingInput.value = rating;
                
                editStars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
                
                const ratingLabels = ['', 'Poor', 'Fair', 'Good', 'Very Good', 'Excellent'];
                editRatingText.textContent = ratingLabels[rating];
            });
        });
    }
    
    // Form submission
    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm) {
        reviewForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (ratingInput.value == 0) {
                alert('Please select a rating');
                return;
            }
            
            // Submit form via AJAX
            const formData = new FormData(this);
            
            fetch('/clients-review', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Review submitted successfully!');
                    location.reload();
                } else {
                    alert('Error submitting review. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error submitting review. Please try again.');
            });
        });
    }
    
    // Animate statistics
    const stats = document.querySelectorAll('.stat-number');
    stats.forEach(stat => {
        const target = parseInt(stat.getAttribute('data-target'));
        const increment = target / 100;
        let current = 0;
        
        const updateStat = () => {
            if (current < target) {
                current += increment;
                stat.textContent = Math.ceil(current);
                setTimeout(updateStat, 20);
            } else {
                stat.textContent = target;
            }
        };
        
        updateStat();
    });
});

// Edit review functionality
function editReview(reviewId) {
    const modal = document.getElementById('editModal');
    const editReviewText = document.getElementById('editReviewText');
    
    // Get current review text (in a real app, this would come from the database)
    const currentReview = "{{ session('user_review', '') }}";
    editReviewText.value = currentReview;
    
    // Set current rating (assuming 5 stars for demo)
    const editStars = document.querySelectorAll('#editStarRating .star');
    editStars.forEach((star, index) => {
        if (index < 5) {
            star.classList.add('active');
        }
    });
    document.getElementById('editRatingInput').value = 5;
    document.getElementById('editRatingText').textContent = 'Excellent';
    
    modal.classList.add('active');
}

function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.classList.remove('active');
}

function deleteReview(reviewId) {
    if (confirm('Are you sure you want to delete your review?')) {
        // In a real app, this would make an AJAX call to delete the review
        alert('Review deleted successfully!');
        location.reload();
    }
}

// Edit form submission
document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // In a real app, this would make an AJAX call to update the review
    alert('Review updated successfully!');
    closeEditModal();
    location.reload();
});

// Close modal when clicking outside
document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditModal();
    }
});
</script>
@endsection 
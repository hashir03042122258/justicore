@extends('layout')

@section('title', 'Book Meeting')

@section('extra-css')
<style>
    body {
        background: linear-gradient(135deg, #232526 0%, #414345 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .meeting-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 40px;
        background: #232526;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        color: white;
    }

    .meeting-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .meeting-header h1 {
        font-size: 2.5rem;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        background-size: 200% auto;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        animation: gradientMove 3s linear infinite;
        margin-bottom: 10px;
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }

    .meeting-form {
        display: grid;
        gap: 25px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group label {
        font-weight: 600;
        color: #00c6ff;
        font-size: 1.1rem;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
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
        min-height: 100px;
    }

    .payment-info {
        background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
        padding: 25px;
        border-radius: 15px;
        border: 2px solid #00c6ff;
        margin: 20px 0;
    }

    .payment-info h3 {
        color: #00c6ff;
        margin-bottom: 15px;
        text-align: center;
    }

    .payment-amount {
        font-size: 2rem;
        font-weight: bold;
        color: #ff512f;
        text-align: center;
        margin: 15px 0;
    }

    .payment-instructions {
        background: #1a1a1a;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #333;
        margin: 20px 0;
    }

    .payment-instructions h4 {
        color: #00c6ff;
        margin-bottom: 15px;
    }

    .payment-instructions ul {
        list-style: none;
        padding: 0;
    }

    .payment-instructions li {
        padding: 8px 0;
        border-bottom: 1px solid #333;
        color: #e0e0e0;
    }

    .payment-instructions li:last-child {
        border-bottom: none;
    }

    .payment-instructions li:before {
        content: "✓ ";
        color: #00c6ff;
        font-weight: bold;
    }

    .submit-btn {
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        color: white;
        padding: 18px 40px;
        border: none;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        animation: gradientMove 2s linear infinite;
        width: 100%;
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

    .payment-loading {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .loading-spinner {
        width: 80px;
        height: 80px;
        border: 4px solid #333;
        border-top: 4px solid #00c6ff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-bottom: 20px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loading-text {
        color: white;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
    }

    .success-message {
        display: none;
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin: 20px 0;
        animation: fadeInUp 0.5s ease;
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

    .error-message {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        margin: 20px 0;
        display: none;
    }
</style>
@endsection

@section('content')
<div class="meeting-container">
    <div class="meeting-header">
        <h1>Book Your Meeting</h1>
        <p>Schedule a consultation with our expert lawyers</p>
    </div>

    <form id="meetingForm" class="meeting-form" method="POST" action="/book-meeting">
        @csrf
        
        <div class="form-group">
            <label for="lawyer_name">Select Lawyer</label>
            <select name="lawyer_name" id="lawyer_name" required>
                <option value="">Choose a lawyer...</option>
                <option value="Usman Ahmed">Usman Ahmed - Legal Consultation</option>
                <option value="Muzamil Hassan">Muzamil Hassan - Civil Law</option>
                <option value="Ali Raza">Ali Raza - Family Law</option>
                <option value="Sara Khan">Sara Khan - Criminal Defense</option>
                <option value="Kamran Sheikh">Kamran Sheikh - Property Disputes</option>
                <option value="Tahir Mehmood">Tahir Mehmood - Contract Review</option>
            </select>
        </div>

        <div class="form-group">
            <label for="service_type">Service Type</label>
            <select name="service_type" id="service_type" required>
                <option value="">Select service...</option>
                <option value="Legal Consultation">Legal Consultation</option>
                <option value="Civil Law">Civil Law</option>
                <option value="Family Law">Family Law</option>
                <option value="Criminal Defense">Criminal Defense</option>
                <option value="Property Disputes">Property Disputes</option>
                <option value="Contract Review">Contract Review</option>
            </select>
        </div>

        <div class="form-group">
            <label for="case_date">Case Date</label>
            <input type="date" name="case_date" id="case_date" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" name="phone" id="phone" required placeholder="Enter your phone number">
        </div>

        <div class="form-group">
            <label for="case_description">Case Description (Optional)</label>
            <textarea name="case_description" id="case_description" placeholder="Briefly describe your case..."></textarea>
        </div>

        <div class="payment-info">
            <h3>Payment Information</h3>
            <div class="payment-amount">Rs. 5,000</div>
            <p style="text-align: center; color: #ccc;">Consultation Fee</p>
        </div>

        <div class="payment-instructions">
            <h4>Payment Instructions:</h4>
            <ul>
                <li>Select your preferred payment method below</li>
                <li>Payment amount is Rs. 5,000 for consultation</li>
                <li>After payment, you will receive meeting confirmation</li>
                <li>Meeting will be scheduled based on your case date</li>
                <li>You can print your meeting details after booking</li>
            </ul>
        </div>

        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select name="payment_method" id="payment_method" required>
                <option value="">Select payment method...</option>
                <option value="Cash">Cash</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="EasyPaisa">EasyPaisa</option>
                <option value="JazzCash">JazzCash</option>
            </select>
        </div>

        <button type="submit" class="submit-btn" id="submitBtn">
            Book Meeting & Pay Rs. 5,000
        </button>
    </form>
</div>

@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Only handle lawyer selection - no AJAX processing
    document.getElementById('lawyer_name').addEventListener('change', function() {
        const lawyer = this.value;
        const serviceSelect = document.getElementById('service_type');
        
        const lawyerServices = {
            'Usman Ahmed': 'Legal Consultation',
            'Muzamil Hassan': 'Civil Law',
            'Ali Raza': 'Family Law',
            'Sara Khan': 'Criminal Defense',
            'Kamran Sheikh': 'Property Disputes',
            'Tahir Mehmood': 'Contract Review'
        };
        
        if (lawyerServices[lawyer]) {
            serviceSelect.value = lawyerServices[lawyer];
        }
    });
});
</script>
@endsection

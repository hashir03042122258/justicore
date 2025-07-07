@extends('layout')

@section('title', 'Payment Successful')

@section('extra-css')
<style>
    body {
        background: linear-gradient(135deg, #232526 0%, #414345 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .success-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 40px;
        background: #232526;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        color: white;
        text-align: center;
    }

    .success-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #28a745, #20c997);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
        font-size: 3rem;
        color: white;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    .success-title {
        font-size: 2.5rem;
        background: linear-gradient(90deg, #28a745, #20c997);
        background-size: 200% auto;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        animation: gradientMove 3s linear infinite;
        margin-bottom: 20px;
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }

    .meeting-details {
        background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
        padding: 30px;
        border-radius: 15px;
        border: 2px solid #00c6ff;
        margin: 30px 0;
        text-align: left;
    }

    .meeting-details h3 {
        color: #00c6ff;
        margin-bottom: 20px;
        text-align: center;
        font-size: 1.5rem;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #333;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 600;
        color: #00c6ff;
        min-width: 150px;
    }

    .detail-value {
        color: #fff;
        text-align: right;
        flex: 1;
    }

    .action-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 15px 30px;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-print {
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: white;
    }

    .btn-home {
        background: linear-gradient(90deg, #28a745, #20c997);
        color: white;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,198,255,0.4);
    }

    .payment-info {
        background: linear-gradient(135deg, #ff512f, #dd2476);
        padding: 20px;
        border-radius: 10px;
        margin: 20px 0;
    }

    .payment-amount {
        font-size: 2rem;
        font-weight: bold;
        color: white;
    }

    @media print {
        body {
            background: white !important;
            color: black !important;
        }
        
        .success-container {
            background: white !important;
            color: black !important;
            box-shadow: none !important;
        }
        
        .meeting-details {
            background: #f8f9fa !important;
            border: 2px solid #333 !important;
            color: black !important;
        }
        
        .detail-label {
            color: #333 !important;
        }
        
        .detail-value {
            color: #333 !important;
        }
        
        .action-buttons {
            display: none !important;
        }
        
        .success-icon {
            background: #28a745 !important;
        }
    }
</style>
@endsection

@section('content')
<div class="success-container">
    <div class="success-icon">
        ✅
    </div>
    
    <h1 class="success-title">Payment Successful!</h1>
    <p style="font-size: 1.2rem; color: #ccc; margin-bottom: 30px;">
        Your meeting has been scheduled successfully. Here are your meeting details:
    </p>

    <div class="payment-info">
        <div class="payment-amount">Rs. 5,000</div>
        <p style="text-align: center; margin: 5px 0 0 0;">Payment Completed</p>
    </div>

    <div class="meeting-details">
        <h3>Meeting Details</h3>
        
        <div class="detail-row">
            <span class="detail-label">Client Name:</span>
            <span class="detail-value">{{ $meeting->user_name }}</span>
        </div>
        
        <div class="detail-row">
            <span class="detail-label">Phone Number:</span>
            <span class="detail-value">{{ $meeting->user_phone }}</span>
        </div>
        
        <div class="detail-row">
            <span class="detail-label">Lawyer:</span>
            <span class="detail-value">{{ $meeting->lawyer_name }}</span>
        </div>
        
        <div class="detail-row">
            <span class="detail-label">Service Type:</span>
            <span class="detail-value">{{ $meeting->service_type }}</span>
        </div>
        
        <div class="detail-row">
            <span class="detail-label">Case Date:</span>
            <span class="detail-value">{{ \Carbon\Carbon::parse($meeting->case_date)->format('F j, Y') }}</span>
        </div>
        
        <div class="detail-row">
            <span class="detail-label">Meeting Date & Time:</span>
            <span class="detail-value">{{ \Carbon\Carbon::parse($meeting->meeting_datetime)->format('F j, Y \a\t g:i A') }}</span>
        </div>
        
        <div class="detail-row">
            <span class="detail-label">Payment Method:</span>
            <span class="detail-value">{{ $meeting->payment_method }}</span>
        </div>
        
        <div class="detail-row">
            <span class="detail-label">Payment Amount:</span>
            <span class="detail-value">Rs. {{ number_format($meeting->payment_amount) }}</span>
        </div>
        
        @if($meeting->case_description)
        <div class="detail-row">
            <span class="detail-label">Case Description:</span>
            <span class="detail-value">{{ $meeting->case_description }}</span>
        </div>
        @endif
        
        <div class="detail-row">
            <span class="detail-label">Meeting ID:</span>
            <span class="detail-value">#{{ $meeting->id }}</span>
        </div>
    </div>

    <div class="action-buttons">
        <a href="/print-meeting/{{ $meeting->id }}" class="btn btn-print" target="_blank">
            🖨️ Print Meeting Details
        </a>
        <a href="/" class="btn btn-home">
            🏠 Back to Home
        </a>
    </div>
</div>
@endsection 
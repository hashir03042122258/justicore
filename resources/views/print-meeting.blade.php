<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Details - #{{ $meeting->id }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background: white;
            padding: 20px;
        }

        .print-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border: 2px solid #333;
            border-radius: 10px;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #00c6ff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #00c6ff;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 1.1rem;
        }

        .success-badge {
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            display: inline-block;
            font-weight: bold;
            margin: 20px 0;
        }

        .meeting-info {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            border: 2px solid #e9ecef;
            margin: 20px 0;
        }

        .meeting-info h2 {
            color: #00c6ff;
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: bold;
            color: #495057;
            min-width: 150px;
        }

        .info-value {
            color: #333;
            text-align: right;
            flex: 1;
        }

        .payment-section {
            background: linear-gradient(135deg, #ff512f, #dd2476);
            color: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            margin: 30px 0;
        }

        .payment-amount {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .payment-status {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e9ecef;
            color: #666;
        }

        .meeting-id {
            background: #00c6ff;
            color: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            margin: 20px 0;
        }

        .important-note {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .important-note h4 {
            color: #856404;
            margin-bottom: 10px;
        }

        @media print {
            body {
                padding: 0;
            }
            
            .print-container {
                border: none;
                padding: 20px;
            }
            
            .no-print {
                display: none !important;
            }
        }

        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #00c6ff;
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,198,255,0.3);
            transition: all 0.3s ease;
        }

        .print-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,198,255,0.4);
        }
    </style>
</head>
<body>
    <button class="print-button no-print" onclick="window.print()">
        🖨️ Print / Save PDF
    </button>

    <div class="print-container">
        <div class="header">
            <h1>Legal Consultation Meeting</h1>
            <p>Professional Legal Services</p>
            <div class="success-badge">✅ Payment Successful</div>
        </div>

        <div class="meeting-id">
            Meeting ID: #{{ $meeting->id }}
        </div>

        <div class="payment-section">
            <div class="payment-amount">Rs. {{ number_format($meeting->payment_amount) }}</div>
            <div class="payment-status">Payment Completed via {{ $meeting->payment_method }}</div>
        </div>

        <div class="meeting-info">
            <h2>Meeting Details</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Client Name:</span>
                    <span class="info-value">{{ $meeting->user_name }}</span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Phone Number:</span>
                    <span class="info-value">{{ $meeting->user_phone }}</span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Lawyer:</span>
                    <span class="info-value">{{ $meeting->lawyer_name }}</span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Service Type:</span>
                    <span class="info-value">{{ $meeting->service_type }}</span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Case Date:</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($meeting->case_date)->format('F j, Y') }}</span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Meeting Date:</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($meeting->meeting_datetime)->format('F j, Y') }}</span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Meeting Time:</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($meeting->meeting_datetime)->format('g:i A') }}</span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Meeting Status:</span>
                    <span class="info-value">{{ ucfirst($meeting->meeting_status) }}</span>
                </div>
            </div>
            
            @if($meeting->case_description)
            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #dee2e6;">
                <div class="info-item">
                    <span class="info-label">Case Description:</span>
                    <span class="info-value">{{ $meeting->case_description }}</span>
                </div>
            </div>
            @endif
        </div>

        <div class="important-note">
            <h4>📋 Important Information:</h4>
            <ul style="margin-left: 20px;">
                <li>Please arrive 10 minutes before your scheduled meeting time</li>
                <li>Bring all relevant documents related to your case</li>
                <li>Meeting will be held at our office in Karachi</li>
                <li>For any changes, please contact us at least 24 hours in advance</li>
                <li>This document serves as your meeting confirmation</li>
            </ul>
        </div>

        <div class="footer">
            <p><strong>Generated on:</strong> {{ \Carbon\Carbon::now()->format('F j, Y \a\t g:i A') }}</p>
            <p>Thank you for choosing our legal services!</p>
        </div>
    </div>

    <script>
        // Auto-print when page loads (optional)
        // window.onload = function() {
        //     window.print();
        // };
    </script>
</body>
</html> 
@extends('layout')

@section('title', 'Admin - View Complaints')

@section('extra-css')
<style>
    body, html {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .admin-container {
        max-width: 1200px;
        margin: 60px auto 0 auto;
        padding: 20px;
    }
    
    .admin-header {
        background: #232526;
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        margin-bottom: 30px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
    
    .admin-title {
        font-size: 2.5rem;
        font-weight: bold;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        background-size: 200% auto;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        animation: gradientMove 3s linear infinite;
        margin-bottom: 10px;
    }
    
    .admin-subtitle {
        color: #e0e0e0;
        font-size: 1.1rem;
    }
    
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }
    
    .complaints-table {
        background: #232526;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        overflow-x: auto;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        color: white;
    }
    
    .table th {
        background: #1a1a1a;
        padding: 15px;
        text-align: left;
        border-bottom: 2px solid #00c6ff;
        color: #00c6ff;
        font-weight: bold;
    }
    
    .table td {
        padding: 15px;
        border-bottom: 1px solid #333;
        color: #e0e0e0;
    }
    
    .table tr:hover {
        background: rgba(0,198,255,0.05);
    }
    
    .status-pending {
        background: #ffc107;
        color: #000;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: bold;
    }
    
    .status-in_progress {
        background: #17a2b8;
        color: white;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: bold;
    }
    
    .status-resolved {
        background: #28a745;
        color: white;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: bold;
    }
    
    .no-complaints {
        text-align: center;
        color: #e0e0e0;
        font-size: 1.2rem;
        padding: 40px;
    }
    
    .back-btn {
        display: inline-block;
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: white;
        padding: 12px 25px;
        text-decoration: none;
        border-radius: 25px;
        font-weight: bold;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    
    .back-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,198,255,0.3);
        color: white;
    }
    
    @media (max-width: 768px) {
        .table {
            font-size: 0.9rem;
        }
        .table th, .table td {
            padding: 10px 8px;
        }
    }
</style>
@endsection

@section('content')
<div class="admin-container">
    <a href="/" class="back-btn">← Back to Home</a>
    
    <div class="admin-header">
        <h1 class="admin-title">Complaints Management</h1>
        <p class="admin-subtitle">View and manage all customer complaints</p>
    </div>
    
    <div class="complaints-table">
        @if($complaints->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                    <tr>
                        <td>{{ $complaint->id }}</td>
                        <td>{{ $complaint->name }}</td>
                        <td>{{ $complaint->email }}</td>
                        <td>{{ $complaint->phone ?: 'N/A' }}</td>
                        <td>{{ $complaint->subject }}</td>
                        <td style="max-width: 200px; word-wrap: break-word;">
                            {{ Str::limit($complaint->message, 100) }}
                        </td>
                        <td>
                            <span class="status-{{ $complaint->status }}">
                                {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                            </span>
                        </td>
                        <td>{{ $complaint->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-complaints">
                <h3>No complaints found</h3>
                <p>There are no complaints in the database yet.</p>
            </div>
        @endif
    </div>
</div>
@endsection 
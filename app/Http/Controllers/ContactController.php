<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submitComplaint(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $complaint = Complaint::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'pending'
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your complaint has been submitted successfully! We will get back to you soon.',
                'complaint_id' => $complaint->id
            ]);
        }

        return back()->with('success', 'Your complaint has been submitted successfully! We will get back to you soon.');
    }

    public function viewComplaints()
    {
        $complaints = Complaint::orderBy('created_at', 'desc')->get();
        return view('admin.complaints', compact('complaints'));
    }
}

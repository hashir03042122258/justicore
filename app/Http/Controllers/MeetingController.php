<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use Carbon\Carbon;

class MeetingController extends Controller
{
    public function show()
    {
        if (!session()->has('user')) {
            return redirect('/login');
        }
        return view('meeting');
    }

    public function bookMeeting(Request $request)
    {
        // Debug: Check if request is coming through
        \Log::info('Meeting booking request received', [
            'method' => $request->method(),
            'has_csrf' => $request->has('_token'),
            'session_id' => session()->getId(),
            'user' => session('user')
        ]);

        $request->validate([
            'lawyer_name' => 'required|string',
            'service_type' => 'required|string',
            'case_date' => 'required|date|after:today',
            'payment_method' => 'required|string',
            'phone' => 'required|string',
            'case_description' => 'nullable|string'
        ]);

        // Calculate meeting date (1 week before case date, or 2 days from today if less than a week)
        $caseDate = Carbon::parse($request->case_date);
        $today = Carbon::now();
        $daysUntilCase = $today->diffInDays($caseDate, false);

        if ($daysUntilCase >= 7) {
            $meetingDate = $caseDate->copy()->subDays(7);
        } else {
            $meetingDate = $today->copy()->addDays(2);
        }

        // Find available meeting time (9 AM to 5 PM, 1 hour slots)
        $availableTime = $this->findAvailableMeetingTime($meetingDate);
        
        if (!$availableTime) {
            return back()->with('error', 'No available meeting slots for the selected date. Please choose a different case date.');
        }

        // Create meeting record
        $meeting = Meeting::create([
            'user_name' => session('user'),
            'user_email' => session('email', ''),
            'user_phone' => $request->phone,
            'lawyer_name' => $request->lawyer_name,
            'service_type' => $request->service_type,
            'payment_amount' => 5000.00,
            'payment_method' => $request->payment_method,
            'case_date' => $request->case_date,
            'meeting_datetime' => $availableTime,
            'meeting_status' => 'scheduled',
            'case_description' => $request->case_description
        ]);

        // Store meeting ID in session for payment success page
        session(['meeting_id' => $meeting->id]);

        return redirect('/payment-success');
    }

    private function findAvailableMeetingTime($date)
    {
        $startHour = 9; // 9 AM
        $endHour = 17;  // 5 PM
        
        for ($hour = $startHour; $hour < $endHour; $hour++) {
            $proposedTime = $date->copy()->setTime($hour, 0, 0);
            
            // Check if this time slot is already booked
            $existingMeeting = Meeting::where('meeting_datetime', $proposedTime)->first();
            
            if (!$existingMeeting) {
                return $proposedTime;
            }
        }
        
        return null; // No available time slots
    }

    public function paymentSuccess()
    {
        if (!session()->has('meeting_id')) {
            return redirect('/meeting');
        }

        $meeting = Meeting::find(session('meeting_id'));
        if (!$meeting) {
            return redirect('/meeting');
        }

        return view('payment-success', compact('meeting'));
    }

    public function printMeeting($id)
    {
        $meeting = Meeting::findOrFail($id);
        return view('print-meeting', compact('meeting'));
    }
}

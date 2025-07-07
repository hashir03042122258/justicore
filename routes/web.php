<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MeetingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\SignIn;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('home');
});

Route::get('/service/{slug}', [ServiceController::class, 'show']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/meeting', [MeetingController::class, 'show']);
Route::post('/book-meeting', [MeetingController::class, 'bookMeeting']);
Route::get('/payment-success', [MeetingController::class, 'paymentSuccess']);
Route::get('/print-meeting/{id}', [MeetingController::class, 'printMeeting']);

Route::post('/logout', function(Request $request) {
    $request->session()->flush();
    return redirect('/login');
});

Route::get('/profile', function(Request $request) {
    if (!session('user')) return redirect('/login');
    return view('profile');
});

Route::post('/profile', function(Request $request) {
    if (!session('user')) return redirect('/login');
    $request->validate([
        'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $user = SignIn::where('name', session('user'))->first();
    if ($user && $request->hasFile('profile_picture')) {
        $file = $request->file('profile_picture');
        $filename = uniqid('profile_').'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/profile_pictures', $filename);
        $user->profile_picture = 'storage/profile_pictures/'.$filename;
        $user->save();
        session(['profile_picture' => $user->profile_picture]);
        return back()->with('success', 'Profile picture updated successfully!');
    }
    return back()->with('success', 'No picture uploaded.');
});
Route::get('/lawyers', function () {
    return view('lawyers');
});

Route::get('/services', function () {
    return view('services');
});

// Contact page route
Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact/complaint', [ContactController::class, 'submitComplaint']);
Route::get('/admin/complaints', [ContactController::class, 'viewComplaints']);

// About Us page route
Route::get('/about', function () {
    return view('about');
});

// Latest Articles page route
Route::get('/latest-articles', function () {
    return view('latest-articles');
});

// Clients page route
Route::get('/clients', function () {
    return view('clients');
});

// Forgot Password routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

// Verify Code routes
Route::get('/verify-code', [AuthController::class, 'showVerifyCode']);
Route::post('/verify-code', [AuthController::class, 'verifyCode']);

// Clients review submission
Route::post('/clients-review', function (\Illuminate\Http\Request $request) {
    $request->validate(['review' => 'required|string|max:500']);
    session(['user_review' => $request->review]);
    return redirect('/clients');
});
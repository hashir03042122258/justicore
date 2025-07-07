<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SignIn;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:signin,email',
            'password' => 'required|min:6',
            'mobile' => 'required|min:11',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Save user to session (no DB for now)
        $sign = new SignIn();
        $sign->name = $request->name;
        $sign->email = $request->email;
        $sign->password = Hash::make($request->password);;
        $sign->contact_no = $request->mobile;
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = uniqid('profile_').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/profile_pictures', $filename);
            $sign->profile_picture = 'storage/profile_pictures/'.$filename;
        }
        try {
        $sign->save();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) { // Integrity constraint violation (duplicate entry)
                return back()->withErrors(['email' => 'This account already exists.'])->withInput();
            }
            throw $e;
        }
        session(['user' => $sign->name, 'profile_picture' => $sign->profile_picture]);
        // Show popup and stay on same page
        return redirect()->back()->with('login_success', 'You are login successfully');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = SignIn::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user->name, 'profile_picture' => $user->profile_picture]);
            // Redirect to intended or previous page, fallback to home
            $intended = $request->session()->pull('url.intended', url()->previous());
            if ($intended == url('/login') || $intended == url('/register')) {
                $intended = url('/');
            }
            return redirect($intended)->with('login_success', 'You are login successfully');
        } else {
            return back()->with('error', 'Invalid credentials.');
        }
    }

    public function showForgotPassword(Request $request)
    {
        // Generate a 4-digit code and store in session
        $code = rand(1000, 9999);
        session(['code' => $code]);
        return view('forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = \App\Models\SignIn::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'No user found with this email.');
        }
        $code = rand(1000, 9999);
        session(['code' => $code, 'reset_email' => $request->email, 'reset_password' => $request->password]);
        return redirect('/verify-code');
    }

    public function showVerifyCode(Request $request)
    {
        if (!session('code') || !session('reset_email') || !session('reset_password')) {
            return redirect('/forgot-password');
        }
        return view('verify-code');
    }

    public function verifyCode(Request $request)
    {
        $sessionCode = session('code');
        $email = session('reset_email');
        $password = session('reset_password');
        if (!$sessionCode || $request->input('code') != $sessionCode) {
            return back()->with('error', 'Invalid or expired verification code.')->withInput();
        }
        $user = \App\Models\SignIn::where('email', $email)->first();
        if (!$user) {
            return redirect('/forgot-password')->with('error', 'No user found with this email.');
        }
        $user->password = \Hash::make($password);
        $user->save();
        session()->forget(['code', 'reset_email', 'reset_password']);
        return redirect('/login')->with('success', 'Password updated successfully! You can now login.');
    }
}

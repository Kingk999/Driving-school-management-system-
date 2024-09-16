<?php

namespace App\Http\Controllers;

use App\Mail\welcome;
use App\Mail\WelcomeMessage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|digits:10',
        ]);
    
        // Create a new user
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
    
        Auth::login($user);

        Mail::to($user->email)->send(new WelcomeMessage($user));
    
        return redirect()->route('home'); // Redirect to home after registration
    }

    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Show the login page
    public function getLoginPage()
    {
        return view('auth.login');
    }

    // Authenticate the user
    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('home'); // Adjust this route based on your app
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Logout the user
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect('login'); // Adjust this route based on your app
    }
    
    // Send reset link email
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $token = Str::random(60); // Generate a token (you should save this token to the database)
            
            Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));
    
            // Redirect back with a success message
            return redirect()->back()->with('alertMessage', 'Email sent successfully!');
        }
    
        // Redirect back with an error message
        return redirect()->back()->with('alertMessage', 'Email not found!');
    }

    // Show the forgot password form
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Show the reset password form
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }
 
    // Handle the password reset
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
     
        // Reset the user's password.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                // Manually update and hash the password
                $user->password = Hash::make($password);
                $user->save();
     
                // Optional: Log the success of password update
                Log::info('Password reset successful for user ID: ' . $user->id);
            }
        );
     
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('auth.getLoginPage')->with('status', __($status));
        }
     
        return back()->withErrors(['email' => [__($status)]]);
    }
}

    
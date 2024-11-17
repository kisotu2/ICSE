<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OTPcontroller extends Controller
{
    public function sendOtp(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        // Generate a 6-character OTP
        $otp = Str::random(6);

        // Store OTP and timestamp in the user's record
        $user = User::where('email', $request->email)->first();
        $user->otp = $otp;  // Store OTP as plain text
        $user->otp_created_at = Carbon::now();
        $user->save();

        // Send the OTP to the user's email
        Mail::send('emails.otp', ['otp' => $otp], function($message) use ($request) {
            $message->to($request->email);
            $message->subject('Your OTP Code');
        });

        // Redirect to OTP verification form
        return redirect()->route('otp.verify')->with('email', $request->email);
    }

    public function verifyOtp(Request $request)
    {
        // Validate the OTP and email
        $request->validate([
            'otp' => 'required|string|size:6',
            'email' => 'required|email|exists:users,email'
        ]);

        // Retrieve the user record
        $user = User::where('email', $request->email)->first();

        // Check if OTP matches and hasn't expired
        if ($user && $user->otp === $request->otp && Carbon::now()->diffInMinutes($user->otp_created_at) <= 10) {
            $user->otp = null;  // Clear OTP after successful verification
            $user->email_verified_at = Carbon::now();
            $user->save();

            // Log the user in
            auth()->login($user);

            return redirect()->route('dashboard')->with('status', 'Email verified successfully.');
        } else {
            return back()->withErrors(['otp' => 'Invalid OTP or it has expired.']);
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TwoFactorCodeMail;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorController extends Controller
{
    // Show the 2FA form where the user can choose email or authenticator
    public function index()
    {
        return view('auth.two-factor');
    }

    // Show the 2FA input form
    public function showTwoFactorForm(Request $request)
    {
        return view('auth.two-factor');
    }

    // Generate a new 2FA code and send it via email
    public function generateTwoFactorCode()
    {
        $user = Auth::user();

        // Generate a random 6-digit code for 2FA
        $user->two_factor_code = rand(100000, 999999);
        $user->two_factor_expires_at = Carbon::now()->addMinutes(10); // Set the expiration time
        $user->save();

        // Send the 2FA code to the user's email using PHPMailer
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'lolloler73@gmail.com'; // SMTP username (your email)
            $mail->Password = 'xixe qgst nsjq itgj'; // SMTP password (your email password or app password)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('your_email@gmail.com', 'Animal Shelter');
            $mail->addAddress($user->email, $user->name); // Send to the logged-in user's email

            // Content
            $mail->isHTML(false); // Plain text email
            $mail->Subject = 'Your 2FA Code';
            $mail->Body = "Hello {$user->name},\n\nYour 2FA code is: {$user->two_factor_code}\n\nIt will expire in 10 minutes.\n\nBest regards,\nAnimal Shelter Team";

            // Send the email
            $mail->send();

            return back()->with('success', 'A 2FA code has been sent to your email. Please enter it to proceed.');
        } catch (Exception $e) {
            return back()->with('error', 'Sorry, there was an error sending your email. Please try again.');
        }
    }

    // Verify the 2FA code sent via email
    public function verifyEmailCode(Request $request)
    {
        $user = Auth::user();

        // Validate the input code
        $request->validate([
            'two_factor_code' => 'required|numeric|digits:6',
        ]);

        // Check if the code is valid and hasn't expired
        if ($request->two_factor_code === $user->two_factor_code && $user->two_factor_expires_at >= now()) {
            $user->clearTwoFactorCode(); // Clear the 2FA code after successful verification
            return redirect()->intended('dashboard')->with('success', 'Two-factor authentication successful!');
        }

        return back()->withErrors(['two_factor_code' => 'The provided code is invalid or has expired.']);
    }

    // Resend the 2FA code (email method)
    public function resendCode(Request $request)
    {
        $user = Auth::user();

        $this->generateTwoFactorCode(); // Regenerate the code and save it
        return back()->with('success', 'A new 2FA code has been sent to your email.');
    }

    // Handle the form submission for 2FA
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($request->method == 'email') {
            // Email-based 2FA verification
            $request->validate([
                'two_factor_code' => 'required|numeric|digits:6',
            ]);

            if ($user->two_factor_code !== $request->two_factor_code || $user->two_factor_expires_at < now()) {
                return back()->withErrors(['two_factor_code' => 'Invalid or expired code.']);
            }

            // Clear the code after successful verification
            $user->clearTwoFactorCode();

            return redirect()->intended('dashboard')->with('success', 'Two-factor authentication successful!');
        }

        if ($request->method == 'authenticator') {
            // Authenticator-based 2FA verification (for later use if needed)
            return $this->verifyAuthenticatorCode($request);
        }

        return back()->withErrors(['method' => 'Invalid method selected.']);
    }

    // Verify the authenticator-based 2FA code
    public function verifyAuthenticatorCode(Request $request)
    {
        $user = Auth::user();

        // Validate the input
        $request->validate([
            'authenticator_code' => 'required|string',
        ]);

        if ($this->isValidAuthenticatorCode($user, $request->authenticator_code)) {
            session(['two_factor_verified' => true]);
            return redirect()->intended('dashboard')->with('success', 'Two-factor authentication successful!');
        }

        return back()->withErrors(['authenticator_code' => 'The provided code is invalid.']);
    }

    // Helper method to validate authenticator codes
    private function isValidAuthenticatorCode($user, $code)
    {
        // Ensure the user has a 2FA secret
        if (!$user->two_factor_secret) {
            return false;
        }

        // Use Google2FA to validate the code
        $google2fa = app('pragmarx.google2fa');

        return $google2fa->verifyKey($user->two_factor_secret, $code);
    }

    // Enable two-factor authentication (setup method)
    public function enableTwoFactor()
    {
        $user = Auth::user();

        // Initialize Google2FA
        $google2fa = new Google2FA();

        // Check if the user already has a 2FA secret
        if (!$user->two_factor_secret) {
            // Generate a new secret key if no secret exists
            $secret = $google2fa->generateSecretKey();

            // Save the new secret to the database
            $user->two_factor_secret = $secret;
            $user->save();
        } else {
            // Use the existing secret if it already exists
            $secret = $user->two_factor_secret;
        }

        // Pass the secret key to the view (this is the setup key you want)
        return view('auth.enable-2fa', [
            'qrCodeUrl' => $google2fa->getQRCodeUrl(
                config('app.name'),
                $user->email,
                $secret
            ),
        ]);
    }
}

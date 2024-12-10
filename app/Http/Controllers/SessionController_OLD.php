<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PragmaRX\Google2FA\Google2FA;
use App\Models\User;

class SessionController_OLD extends Controller
{
    /**
     * Attempt to log the user in.
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to log the user in
    if (Auth::attempt($credentials)) {
        Log::debug('Login successful');

        $user = Auth::user();

        // Check if the user is an admin and if 2FA is not confirmed
        if ($user->is_admin && !$user->two_factor_confirmed_at) {
            // Redirect to the 2FA challenge page for admin users
            return redirect()->route('two-factor.challenge');
        }

        // Instead of redirecting to the dashboard, stay on the login page or redirect elsewhere
        return redirect()->route('signin'); // Adjust this route as needed
    }

    Log::debug('Login failed, invalid credentials.');

    // Redirect back to login page with error message
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}
    /**
     * Show the two-factor challenge form.
     */
    public function showTwoFactorChallenge()
    {
        return view('auth.two-factor'); // Ensure this view exists.
    }

    /**
     * Verify the two-factor code entered by the user.
     */
    public function verifyTwoFactorCode(Request $request)
    {
        // Validate the 2FA code
        $request->validate([
            'two_factor_code' => 'required|numeric',
        ]);

        $user = Auth::user();
        
        // Google2FA instance
        $google2fa = app(Google2FA::class);

        // Decrypt the user's 2FA secret key
        $secret = decrypt($user->two_factor_secret);

        // Verify the 2FA code
        if ($google2fa->verifyKey($secret, $request->two_factor_code)) {
            // 2FA verified successfully, mark as confirmed
            $user->two_factor_confirmed_at = now();
            /** @var \App\Models\User $user **/
            $user->save();

            // Redirect to the intended page (dashboard)
            return redirect()->intended('/dashboard');
        }

        // If verification fails, show an error
        return back()->withErrors(['two_factor_code' => 'The provided 2FA code is incorrect.']);
    }

    /**
     * Enable two-factor authentication for the user.
     */
    public function enableTwoFactor(Request $request)
    {
        $user = Auth::user();
        if ($user->is_admin && !$user->two_factor_confirmed_at) {
            return redirect()->route('two-factor.challenge');
        }
    
        $google2fa = new Google2FA();
    
        // Generate a new secret key for the user
        $secret = $google2fa->generateSecretKey();
    
        // Encrypt the secret before saving it
        $encryptedSecret = encrypt($secret);
    
        // Set the two_factor_secret directly without update()
        $user->two_factor_secret = $encryptedSecret;
    
        // Save the user instance
        /** @var \App\Models\User $user **/
        $user->save();  // This should persist the changes correctly
    
        // Generate a QR code URL (optional, you can show it to the user)
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            'YourAppName',  // Application name or something recognizable for the user
            $user->email,   // The user's email (or username)
            $secret         // The secret key
        );
    
        // Return the view with the QR code URL (this view should render the QR code for the user to scan)
        return view('auth.two-factor-enable', ['qrCodeUrl' => $qrCodeUrl]);
    }
}
   /** @var \App\Models\User $user **/
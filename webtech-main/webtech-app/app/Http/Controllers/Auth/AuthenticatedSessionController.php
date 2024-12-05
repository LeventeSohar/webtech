<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        // Check if the user is an admin and 2FA is required
        if ($user->is_admin && !$user->two_factor_confirmed_at) {
            Log::debug('Admin login requires 2FA confirmation.');
            return redirect()->route('two-factor.challenge');
        }

        // Default redirect after login
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
           /** @var \App\Models\User $user **/
        $user = Auth::user();
        $user->two_factor_confirmed_at = null;  // Reset the 2FA confirmation flag
        $user->save();
    
        // Log the user out and clear the session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Show the two-factor challenge form.
     */
    public function showTwoFactorChallenge(Request $request)
    {
        $user = $request->user();

        // Get the two_factor_secret from the correct column (plain text secret)
        $twoFactorSecret = $user->two_factor_secret;

        // Pass the secret key to the view
        return view('auth.two-factor', [
            'twoFactorSecret' => $twoFactorSecret
        ]);
    }

    /**
     * Verify the two-factor code entered by the user.
     */
    public function verifyTwoFactorCode(Request $request): RedirectResponse
    {
        $request->validate([
            'two_factor_code' => 'required|numeric|digits:6',  // Ensure 6 digits for the code
        ]);

        $user = Auth::user();
        $google2fa = app(Google2FA::class);

        try {
            // Get the 2FA secret key (this should be plain text)
            $secret = $user->two_factor_secret;

            // Log for debugging purposes
            Log::info('Decrypted Secret: ' . $secret);
            Log::info('Entered Code: ' . $request->two_factor_code);

            // Verify the entered code against the secret-+**
               /** @var \App\Models\User $user **/
            if ($google2fa->verifyKey($secret, $request->two_factor_code)) {
                $user->two_factor_confirmed_at = now();
                $user->save();

                // Redirect to the intended page (usually the dashboard)
                return redirect()->intended(route('dashboard', absolute: false));
            } else {
                // Log the failed verification attempt
                Log::warning('Failed 2FA verification for user: ' . $user->id);

                // If the verification fails, return with an error message
                return back()->withErrors(['two_factor_code' => 'The provided 2FA code is incorrect.']);
            }
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error('Error during 2FA verification: ' . $e->getMessage());

            // Handle decryption or verification errors
            return back()->withErrors(['two_factor_code' => 'An error occurred while verifying your 2FA code.']);
        }
    }

    /**
     * Enable two-factor authentication for the user.
     */
    public function enableTwoFactor(Request $request)
    {
        $user = Auth::user();

        // Initialize Google2FA
        $google2fa = new Google2FA();

        // Check if the user already has a 2FA secret
        if (!$user->two_factor_secret) {
            // Generate a new secret key if no secret exists
            $secret = $google2fa->generateSecretKey();

            // Save the new secret to the database
               /** @var \App\Models\User $user **/
            $user->two_factor_secret = $secret;
            $user->save();
        } else {
            // Use the existing secret if it already exists
            $secret = $user->two_factor_secret;
        }

        // Pass the secret key to the view (this is the setup key you want)
        return view('auth.two-factor')->with([
            'twoFactorSecret' => $secret  // Show the setup key to the user
        ]);
    }
}

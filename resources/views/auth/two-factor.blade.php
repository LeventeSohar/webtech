<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Factor Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Two-Factor Authentication
                </div>
                <div class="card-body">
                    <!-- Toggle Buttons for Choosing 2FA Method -->
                    <div class="d-flex justify-content-between mb-3">
                        <button id="email-method-btn" class="btn btn-secondary w-48%">Email</button>
                        <button id="authenticator-method-btn" class="btn btn-secondary w-48%">Authenticator</button>
                    </div>

                    <!-- Email 2FA Form (Initially visible) -->
                    <form action="{{ route('two-factor.verify.email') }}" method="POST" id="email-form">
                        @csrf
                        <div class="mb-3">
                            <label for="two_factor_code_email" class="form-label">Enter the 2FA code sent to your email:</label>
                            <input type="text" name="two_factor_code" id="two_factor_code_email" class="form-control" required>
                        </div>

                        <!-- Resend Code button for Email method -->
                        <p class="mt-4 text-gray-500 text-sm">
                            Didn't receive a code? 
                            <button id="resend-btn-email" type="button" class="text-indigo-600 hover:underline">Resend Code</button>
                        </p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary w-100">Verify Code</button>
                    </form>

                    <!-- Authenticator 2FA Form (Initially hidden) -->
                    <form action="{{ route('two-factor.verify.authenticator') }}" method="POST" id="authenticator-form" style="display:none;">
                        @csrf
                        <div class="mb-3">
                            <label for="two_factor_code_authenticator" class="form-label">Enter the 2FA code from your authenticator app:</label>
                            <input type="text" name="two_factor_code" id="two_factor_code_authenticator" class="form-control" required>
                        </div>

                        <!-- Resend Code button for Authenticator method -->
                        <p class="mt-4 text-gray-500 text-sm">
                            Didn't receive a code? 
                            <button id="resend-btn-authenticator" type="button" class="text-indigo-600 hover:underline">Resend Code</button>
                        </p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary w-100">Verify Code</button>
                    </form>

                    <!-- Display the secret key for authenticator -->
                    <div class="mt-3" id="authenticator-key" style="display:none;">
                        <h5>Use this key in your authenticator app:</h5>
                        <p><strong>{{ $twoFactorSecret ?? 'No secret available' }}</strong></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Handle toggling between email and authenticator methods
    document.getElementById('email-method-btn').addEventListener('click', function() {
        document.getElementById('email-form').style.display = 'block';
        document.getElementById('authenticator-form').style.display = 'none';
        document.getElementById('authenticator-key').style.display = 'none';
        this.classList.add('btn-primary');
        this.classList.remove('btn-secondary');
        document.getElementById('authenticator-method-btn').classList.add('btn-secondary');
        document.getElementById('authenticator-method-btn').classList.remove('btn-primary');
    });

    document.getElementById('authenticator-method-btn').addEventListener('click', function() {
        document.getElementById('authenticator-form').style.display = 'block';
        document.getElementById('email-form').style.display = 'none';
        document.getElementById('authenticator-key').style.display = 'block';
        this.classList.add('btn-primary');
        this.classList.remove('btn-secondary');
        document.getElementById('email-method-btn').classList.add('btn-secondary');
        document.getElementById('email-method-btn').classList.remove('btn-primary');
    });

    // Resend Code (Email method)
    document.getElementById('resend-btn-email').addEventListener('click', async () => {
        const response = await fetch('/resend-2fa-code', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        if (response.ok) {
            alert('A new code has been sent to your email.');
        } else {
            alert('Failed to resend the code. Please try again.');
        }
    });

    // Resend Code (Authenticator method)
    document.getElementById('resend-btn-authenticator').addEventListener('click', async () => {
        const response = await fetch('/resend-2fa-code', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        if (response.ok) {
            alert('A new code has been sent to your authenticator app.');
        } else {
            alert('Failed to resend the code. Please try again.');
        }
    });
</script>

</body>
</html>

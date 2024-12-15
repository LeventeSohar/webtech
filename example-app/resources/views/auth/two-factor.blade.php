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
                    <form action="{{ route('two-factor.verify') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="two_factor_code" class="form-label">Enter the 2FA code:</label>
                            <input type="text" name="two_factor_code" id="two_factor_code" class="form-control" required>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary w-100">Verify Code</button>
                    </form>

                    <!-- Display the secret key -->
                    <<div class="mt-3">
                        <h5>Use this key in your authenticator app:</h5>
                        <p><strong>{{ $twoFactorSecret ?? 'No secret available' }}</strong></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

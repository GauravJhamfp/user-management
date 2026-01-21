<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @include('partials.styles')
</head>
<body class="bg-light">

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-lg-4 col-md-6">

                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-4 p-md-5">

                        <!-- Header -->
                        <div class="text-center mb-4">
                            <h3 class="fw-bold mb-1">Welcome Back</h3>
                            <p class="text-muted mb-0">Sign in to your account</p>
                        </div>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login.submit') }}" novalidate>
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required>

                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Enter your password" required>

                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm">
                                Sign In
                            </button>
                        </form>

                        <!-- Footer -->
                        <div class="text-center mt-4">
                            <p class="text-muted small mb-0">
                                © {{ date('Y') }} Your Company. All rights reserved.
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('partials.scripts')

    <script>
        // Optional client-side validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = this.email.value.trim();
            const password = this.password.value.trim();

            if (!email || !password) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });

    </script>

</body>
</html>

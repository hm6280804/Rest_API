<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .form-icon {
            width: 40px;
        }

        .form-section {
            padding: 30px;
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
        }

        .form-control::placeholder {
            font-size: 0.9rem;
        }
    </style>
</head>

<body class="bg-light d-flex align-items-center" style="height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">

                    <div class="row g-0">

                        <!-- Left Form Section -->
                        <div class="col-md-6 form-section bg-white">
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Error!</h4>
                                <div class="alert-body">
                                    {{ $error }}
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <h3 class="mb-4 text-center">Sign Up</h3>

                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="mb-3 input-group">
                                    <span class="input-group-text bg-white"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
                                </div>

                                <div class="mb-3 input-group">
                                    <span class="input-group-text bg-white"><i class="bi bi-envelope-fill"></i></span>
                                    <input name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                                </div>

                                <div class="mb-3 input-group">
                                    <span class="input-group-text bg-white"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>

                                <div class="mb-3 input-group">
                                    <span class="input-group-text bg-white"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Create Account</button>
                                </div>
                            </form>
                        </div>

                        <!-- Right Image Section -->
                        <div class="col-md-6 signup-image d-none d-md-block" style="background: url('{{ asset('images/register.png') }}') center center / cover no-repeat">
                            <!-- Image is handled by CSS background -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
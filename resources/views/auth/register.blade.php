<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-card {
            background: #fff;
            padding: 2.5rem 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
        }
        .form-label {
            font-weight: 600;
        }
        .btn-primary {
            background: #6c63ff;
            border: none;
        }
        .btn-primary:hover {
            background: #5848c2;
        }
        .alert-success {
            border-radius: 10px;
        }
        small.text-danger {
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="register-card shadow-sm">
        <h2 class="text-center mb-4 fw-bold" style="color:#333;">Create Your Account</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('register.store') }}" method="POST" novalidate>
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control shadow-sm" placeholder="Enter your full name" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control shadow-sm" placeholder="name@example.com" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Register As</label>
                <select name="role" class="form-select shadow-sm" required>
                    <option value="">-- Select Role --</option>
                    <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee</option>
                    <option value="employer" {{ old('role') == 'employer' ? 'selected' : '' }}>Employer</option>
                </select>
                @error('role') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control shadow-sm" placeholder="Enter password" required>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control shadow-sm" placeholder="Confirm password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fs-5 fw-semibold rounded-3">Register</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="container-sm mt-4">
        <h4 class="mb-3">Please Enter Your New Password. Reset Password for "{{ $email }}"</h4>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <!-- Email Field (Hidden) -->
            <input type="hidden" name="email" value="{{ $email }}">

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Please enter your new password" required>
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Please confirm your new password" required>
            </div>

            <!-- Hidden Token Field -->
            <input type="hidden" name="token" value="{{ $token }}">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

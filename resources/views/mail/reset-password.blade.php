<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>Password Reset Request</h4>
            </div>
            <div class="card-body">
                <p>Hello,</p>
                <p>We received a request to reset the password for your account. You can reset your password by clicking the button below:</p>
                <a href="{{ url('/reset-password/'.$token.'?email='.$email) }}" class="btn btn-primary">Reset Password</a>
                <p>If you did not request a password reset, please ignore this email.</p>
                <p>Thank you!</p>
            </div>
            <div class="card-footer text-center">
                <p>&copy; {{ date('Y') }} Your Company</p>
            </div>
        </div>
    </div>
</body>
</html>


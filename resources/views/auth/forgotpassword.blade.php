<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Request Reset Password</title>
</head>
<body>

@if(session('alertMessage'))
    <script>
        alert("{{ session('alertMessage') }}");
    </script>
@endif

    <div class="container-sm mt-4">
        <!-- Forgot Password Form -->
        <form action="{{ route('password.email') }}" method="POST">
            <h4 class="mb-3">Sorry you forgot your password. We will help you reset it.</h4>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Please enter your email" required>
            </div>
            @csrf 
            <button type="submit" class="btn btn-primary">Submit</button>

            <a href="{{ route('auth.getLoginPage') }}" class="btn btn-success">Go to Login Page</a>
        </form>
    </div>

    <!-- Optional: Include Bootstrap JavaScript for alert functionality -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




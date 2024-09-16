<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <form class="container-sm mt-4" action="{{ route('login') }}" method="POST">
      
    @csrf
    <h4 class="mb-3">Welcome back. Please login</h4>
       
        <div class="mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Please enter your email" required>
</div>

<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Please enter your password" required>
</div>

        @csrf 
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="{{ route('auth.forgotPassword') }}" class="btn btn-danger">Forgot Password</a><br><br>
        <a href="{{route('getRegisterPage')}}" >Don't have an account? Click here to register</a>
    </form>
</body>
</html>

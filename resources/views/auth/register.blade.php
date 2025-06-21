<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-6">
           <div class="card shadow">
                <div class="card-header text-center">
                   <h3>Create an Account</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input 
                              type="text" 
                              class="form-control @error('name') is-invalid @enderror" 
                              id="name" 
                              name="name" 
                              placeholder="Enter your name" 
                              value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input 
                              type="email" 
                              class="form-control @error('email') is-invalid @enderror" 
                              id="email" 
                              name="email" 
                              placeholder="Enter your email" 
                              value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input 
                              type="password" 
                              class="form-control @error('password') is-invalid @enderror" 
                              id="password" 
                              name="password" 
                              placeholder="Enter your password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input 
                              type="password" 
                              class="form-control" 
                              id="password_confirmation" 
                              name="password_confirmation" 
                              placeholder="Confirm your password">
                        </div>

                        <div class="form-check mb-3">
                            <input 
                              type="checkbox" 
                              class="form-check-input" 
                              id="is_admin" 
                              name="is_admin">
                            <label class="form-check-label" for="is_admin">Admin?</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    Already have an account? <a href="/login">Login here</a>
                </div>
           </div>
       </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
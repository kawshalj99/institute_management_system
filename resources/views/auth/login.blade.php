<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - IMS</title>
  <link rel="icon" href="{{url('public/assets/dist/img/logo.png')}}" type="image/x-icon">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="public/assets/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="public/assets/dist/css/adminlte.min.css">
  <style>
   
    body {
      background-image: url('public/assets/dist/img/10135315_18129294.jpg');
      background-size: cover; 
      background-position: center; 
      background-repeat: no-repeat; 
    }

    .login-page {
      background-color: rgba(0, 0, 0, 0.5); 
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="{{url('public/assets/dist/img/logo.png')}}" alt="logo" height="80" width="80" style="align-item: center; border-radius: 50%;">
      <p class="h2">Institute Management System</p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      @include('_message')
      
      <form action="{{ url('login')}}" method="post">
        {{ csrf_field()}}
        <div class="input-group mb-3">
          <input type="email" class="form-control" required name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
    
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>

        </div>
      </form>



      <p class="mb-1">
        <a href="{{ url('forgot-password')}}">I forgot my password</a>
      </p>
      
  
  </div>

</div>



<script src="public/assets/plugins/jquery/jquery.min.js"></script>

<script src="public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="public/assets/dist/js/adminlte.min.js"></script>
</body>
</html>

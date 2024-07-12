<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Airwing Parking - Web Portal [Login]</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-social/bootstrap-social.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('front_assets/img/AWP favicon.png') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>
<style>

input:focus {
    outline: none !important;
    border-color: #0000;
    box-shadow: 0 0 10px #ff9f9f;
  }
  #loginimg:hover{
    transform: scale(1.04);
  }

  #loginimg{
    transition: transform 0.2s ease;
  }

  #login-btn{
    transition: 0.4s ease;
  }

  #login-btn:hover{
    transform: translateY(-0.1rem);
    box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
  }
  .center {
    display: block;
    margin: auto;
    margin-right: auto;
    margin-top: auto;
    margin-bottom: auto;
    width: 90%;
    /* text-align: center; */
    /* padding: 50px; */
  }
  .customlabel{
    margin-bottom: 8px;
    font-weight: 600;
    color: #34395e;
    font-size: 12px;
    letter-spacing: 0.5px;
  }
</style>
<body style="background-image: url('assets/img/background8.jpg'); background-repeat: repeat; background-size: cover;">
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-danger">
              <div class="mt-3" style="font-size:20px; text-align: center; text-transform:uppercase; font-family:Arial, Helvetica, sans-serif; font-weight:700; color:#da171c">
                <img class="mb-1 mr-1" src="assets/img/dashboard/AWP logo copy.png" width="40" alt="">Airwing - <span class="text-dark">Login</span> </div>
              <div class="card-header center">

                <img alt="image" id="loginimg" src="{{ asset('assets/img/login1.gif') }}" width="280" class="center" />
              </div>
              <div class="card-body" style="padding-bottom: 15px;">

                <form method="POST" action="/login" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group" style="margin-top: -10px;">
                    <div class="text-center customlabel" for="email" >EMAIL</div>
                    {{-- <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus> --}}
                    <input class="text-center" type="email" name="email" tabindex="1" required id="email" autofocus placeholder="Enter your email address"
                    style="width:98%; height: 42px; border-color: #e4e6fc; background-color:#ffecec; margin-left: 3px; border: 1px solid #da171c; border-radius: 0.25rem;">
                    <div class="invalid-feedback">
                       Enter your email!
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <div for="password" class="control-label customlabel text-center">PASSWORD</div>
                      <div class="float-right">
                        {{-- <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a> --}}
                      </div>
                    </div>
                    {{-- <input id="password" type="password" class="form-control" name="password" tabindex="2" required> --}}
                    <input class="text-center mb-2" type="password" name="password" autocomplete="current-password" required="" id="password" placeholder="Enter your password"
                    style="width:98%; height: 42px; border-color: #ffd9d9; margin-left: 3px; background-color:#ffecec; border: 1px solid #da171c; border-radius: 0.25rem;">
                    <i class="bi bi-eye-slash" id="togglePassword" onclick="myFunction();" style="margin-left: -30px; cursor: pointer;"></i>
                    <div class="invalid-feedback">
                        Enter your password!
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="text-danger text-center">
                      @if(isset($fail))
                      {{ $fail }}
                      @endif
                    </div>

                  </div>

                  <div class="form-group">
                    <button type="submit" id="login-btn" class="btn search-btn btn-lg btn-block" tabindex="4">
                        LOGIN
                    </button>
                  </div>
                </form>


              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/js/custom.js')}}"></script>
  <script>
    function myFunction() {
      document.getElementById("togglePassword").classList.toggle("bi-eye");

        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
  </script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>

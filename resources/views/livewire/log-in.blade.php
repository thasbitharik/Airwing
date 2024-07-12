@push('flogin', 'active')
<div>
  <!-- Page Header Start -->
  <div class="container-fluid page-header mb-5 p-0" style="background-image: url(front_assets/img/bg-img-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
      <div class="container text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center text-uppercase">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <section>
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5 mb-2">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid"
            alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

          <form method="POST" action="/customer-login">
            @csrf
            <style>
              .login-card{
                transition: 0.3s ease;
              }
              .login-card:hover{
                transform: scale(1.01);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
              }
            </style>
            <!-- Email input -->
            <div class="card shadow-2-strong login-card" style="border-radius: 15px; padding-left:20px;padding-right:20px;padding-top:20px;">
              <h3 class="text-center">LOGIN</h3>
              <div class="form-outline mb-4"
                style="margin-right: 10px; margin-left:10px; margin-top:20px; margin-bottom:10px;">
                <input type="email" id="email" class="form-control form-control-lg @error('customer_email')
                is-invalid @enderror" name="customer_email" value="{{old('customer_email')}}"
                  placeholder="Enter Email address" required autocomplete="email" autofocus />
                {{-- <label class="form-label" for="form3Example3">Email address</label> --}}
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3" style="margin-right: 10px; margin-left:10px; margin-bottom:10px;">
                <input type="password" id="password" class="form-control form-control-lg @error('password')
                is-invalid @enderror" name="password" placeholder="Enter password" required autocomplete="current-password" />
                <i class="bi bi-eye-slash" id="togglePassword" onclick="myFunction();" style="float:right; margin-top:-35px; margin-right:18px;cursor: pointer;"></i>
                {{-- <label class="form-label" for="form3Example4">Password</label> --}}
              </div>

              {{-- <div class="d-flex justify-content-between align-items-center"
                style="margin-right: 10px; margin-left:10px; "> --}}
                <!-- Checkbox -->
                {{-- <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                  <label class="form-check-label" for="form2Example3">
                    Remember me
                  </label>
                </div> --}}
                {{-- <a href="#!" class="text-body">Forgot password?</a> --}}
              {{-- </div> --}}

              <div class="text-center text-white text-lg-start mt-3 "
                style="margin-right: 10px; margin-left:10px; margin-bottom:20px;">
                <center>
                <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">
                    Login </button></center>
                <br>
                
                <h6 class="text-center">Don't have an account?
                  <a href="registration" class="link-danger"> Click here to Register</a>
                </h6>
              </div>
          </form>
        </div>
      </div>
    </div>

  </section>
</div>
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

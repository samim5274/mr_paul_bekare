<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Login | Mantis Bootstrap 5 Admin Template</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
<link rel="icon" href="./assets/images/favicon.svg" type="image/x-icon"> <!-- [Google Font] Family -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<link rel="stylesheet" href="./assets/fonts/tabler-icons.min.css" >
<link rel="stylesheet" href="./assets/fonts/feather.css" >
<link rel="stylesheet" href="./assets/fonts/fontawesome.css" >
<link rel="stylesheet" href="./assets/fonts/material.css" >
<link rel="stylesheet" href="./assets/css/style.css" id="main-style-link" >
<link rel="stylesheet" href="./assets/css/style-preset.css" >

</head>


<body>
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="auth-header">
          <a href="#"><img src="./assets/images/logo.png" alt="img" style="height: 50px; width:auto;"></a>
        </div>
        
        <div class="card my-5">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end mb-4">
              <h3 class="mb-0"><b>Login</b></h3>
              <a href="{{url('/create-new-account')}}" class="link-primary">Don't have an account?</a>
            </div>
            @include('layouts.message')
            <form action="{{url('/user-login')}}" method="POST">
              @csrf
              <div class="form-group mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="txtEmail" class="form-control" placeholder="Email Address">
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="txtPassword" class="form-control" placeholder="Password">
              </div>
              <div class="d-flex mt-1 justify-content-between">
                <div class="form-check">
                  <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                  <label class="form-check-label text-muted" for="customCheckc1">Keep me sign in</label>
                </div>
                <h5 class="text-secondary f-w-400"><a href="{{ url('/find-account') }}">Forgot Password?</a></h5>
              </div>
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
            <!-- <div class="saprator mt-3">
              <span>Login with</span>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="d-grid">
                  <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                    <img src="./assets/images/authentication/google.svg" alt="img"> <span class="d-none d-sm-inline-block"> Google</span>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="d-grid">
                  <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                    <img src="./assets/images/authentication/twitter.svg" alt="img"> <span class="d-none d-sm-inline-block"> Twitter</span>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="d-grid">
                  <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                    <img src="./assets/images/authentication/facebook.svg" alt="img"> <span class="d-none d-sm-inline-block"> Facebook</span>
                  </button>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        <div class="auth-footer row">
            <div class="col my-1">
              <p class="m-0">Created By <a href="https://shamim.deegau.com/">SAMIM-HosseN.</a></p>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/js/plugins/popper.min.js"></script>
  <script src="./assets/js/plugins/simplebar.min.js"></script>
  <script src="./assets/js/plugins/bootstrap.min.js"></script>
  <script src="./assets/js/fonts/custom-font.js"></script>
  <script src="./assets/js/pcoded.js"></script>
  <script src="./assets/js/plugins/feather.min.js"></script>
</body>


</html>
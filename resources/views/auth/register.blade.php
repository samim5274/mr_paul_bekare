<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Sign up | Mantis Bootstrap 5 Admin Template</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <link rel="icon" href="./assets/images/favicon.svg" type="image/x-icon"> 
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
  @include('layouts.message')
  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="card my-5">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-end mb-4">
                <h3 class="mb-0"><b>Sign up</b></h3>
                <a href="{{url('/login')}}" class="link-primary">Already have an account?</a>
              </div>
              <form action="{{url('/create-account')}}" method="POST">
              <div class="row">
                    @csrf
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label class="form-label">First Name*</label>
                        <input type="text" name="txtFirstName" class="form-control" placeholder="First Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="txtLastName" class="form-control" placeholder="Last Name">
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label">Email Address*</label>
                    <input type="email" name="txtEmail" class="form-control" placeholder="Email Address">
                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="txtPassword" class="form-control" placeholder="Password">
                  </div>
                  <p class="mt-4 text-sm text-muted">By Signing up, you agree to our <a href="#" class="text-primary"> Terms of Service </a> and <a href="#" class="text-primary"> Privacy Policy</a></p>
                  <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary">Create Account</button>
                  </div>
                </form>
              <!-- <div class="saprator mt-3">
                <span>Sign up with</span>
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
              </div>             -->
            </div>
          
        </div>
        
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
  <script src="./assets/js/plugins/popper.min.js"></script>
  <script src="./assets/js/plugins/simplebar.min.js"></script>
  <script src="./assets/js/plugins/bootstrap.min.js"></script>
  <script src="./assets/js/fonts/custom-font.js"></script>
  <script src="./assets/js/pcoded.js"></script>
  <script src="./assets/js/plugins/feather.min.js"></script>

  
</body>
<!-- [Body] end -->

</html>
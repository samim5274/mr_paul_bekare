<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->
<head>
    <title>Forget Account || Mr. Paul Bakers</title>
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
              <h3 class="mb-0"><b>Forget Password</b></h3>
            </div>
            @include('layouts.message')
            <form action="{{url('/find-account-by-email')}}" method="GET">
              @csrf
              <div class="form-group mb-3">
                <label class="form-label">Enter your email address</label>
                <input type="email" name="txtEmail" class="form-control" placeholder="Enter your email address" value="cse.shamim.cub@gmail.com">
              </div>
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Find</button>
              </div>
            </form>
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
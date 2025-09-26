<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Home | Mantis Bootstrap 5 Admin Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">


    <link rel="icon" href="./img/LOGO35 pix.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/fonts/tabler-icons.min.css" >
    <link rel="stylesheet" href="./assets/fonts/feather.css" >
    <link rel="stylesheet" href="./assets/fonts/fontawesome.css" >
    <link rel="stylesheet" href="./assets/fonts/material.css" >
    <link rel="stylesheet" href="./assets/css/style.css" id="main-style-link" >
    <link rel="stylesheet" href="./assets/css/style-preset.css" >

 <style>
    .drop-zone {
        border: 2px dashed #6c757d;
        padding: 30px;
        text-align: center;
        color: #6c757d;
        cursor: pointer;
        border-radius: 8px;
        transition: background-color 0.2s;
    }

    .drop-zone.dragover {
        background-color: #e9ecef;
    }

    .preview-img {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }

    .table td img {
        object-fit: cover;
        border-radius: 6px;
    }

    .loader {
        width: 48px;
        height: 48px;
        border: 5px solid #000;
        border-bottom-color: transparent;
        border-radius: 50%;
        display: inline-block;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    } 
</style>

    </head>

    <body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

        @include('layouts.menu')

        <div class="pc-container">
            <div class="pc-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('/profile')}}">Profile</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.message')
                <div class="row">
                    <h1>Profile</h1>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Left side (Profile Info) -->
                                    <div class="col-md-4 text-center mb-4 mb-md-0">
                                        <img src="{{ asset('/img/employee/' . $user->photo) }}" 
                                            class="rounded-circle mb-3 shadow" 
                                            width="150" height="150" 
                                            alt="Profile Image"
                                            style="border: 3px solid rgba(0, 174, 255, 1);">
                                            <br><br>

                                        <h5 class="mb-1">{{ $user->name }}</h5>
                                        

                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="text-muted">Email</th>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-muted">Date Of Birth</th>
                                                    <td>{{ \Carbon\Carbon::parse($user->dob)->format('d M Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-muted"><strong>Role:</strong></th>
                                                    <td>@php
                                                            $roles = [1 => 'Admin', 2 => 'Manager', 3 => 'Waiter', 4 => 'Shafe', 5 => 'Other'];
                                                        @endphp
                                                        {{ $roles[$user->role] ?? 'Unknown' }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-muted"><strong>Status:</strong></th>
                                                    <td>@php
                                                            $statuses = [
                                                                0 => 'Inactive',
                                                                1 => 'Active',
                                                            ];
                                                        @endphp
                                                        {{ $statuses[$user->status] ?? 'Unknown' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                    <!-- Right side (Form) -->
                                    <div class="col-md-8">
                                        <div class="card shadow border-0 p-4">
                                            <h4 class="mb-4">User Information</h4>
                                                            
                                            <form action="{{url('/update-profile/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" name="email" readonly class="form-control" value="{{ $user->email }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Branch</label>
                                                    <input type="text" name="branch" class="form-control" value="{{ $user->branch[0]->name ?? 'No Branch' }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control" maxlength="10" pattern="\d{10}" value="{{ $user->phone }}" placeholder="Enter 10-digit phone number without zero '0'">
                                                </div>

                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="photo">Change Profile Image. Max: 2MB</label>
                                                    <div id="dropZone" class="drop-zone">
                                                        Drag & Drop Image Here or Click to Browse
                                                        <input type="file" id="imageInput" name="fileImage" accept="image/*" hidden>
                                                    </div>
                                                    <img id="previewImage" class="preview-img d-none" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Old Password</label>
                                                    <input type="password" name="password" class="form-control" required placeholder="Enter your password for updated your profile.">
                                                </div>

                                                <button type="submit" class="btn btn-outline-success px-4 btn-sm w-100 d-flex align-items-center justify-content-center">
                                                    <i class="mdi mdi-pencil-box-outline m-0" style="font-size: 1.5rem;"></i> 
                                                    <span> <strong>Update</strong></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        
        

        @include('layouts.footer')
        
        <script src="./assets/js/plugins/popper.min.js"></script>
        <script src="./assets/js/plugins/simplebar.min.js"></script>
        <script src="./assets/js/plugins/bootstrap.min.js"></script>
        <script src="./assets/js/fonts/custom-font.js"></script>
        <script src="./assets/js/pcoded.js"></script>
        <script src="./assets/js/plugins/feather.min.js"></script>
        <script src="{{ asset('/js/main.js')}}"></script>

    </body>


</html>
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
                                                            
                                            <div class="mb-3">
                                                <label class="form-label text-muted">Full Name</label>
                                                <div class="fs-5">{{ $user->name }}</div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label text-muted">Email Address</label>
                                                <div class="fs-5">{{ $user->email }}</div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label text-muted">Branch</label>
                                                <div class="fs-5">{{ $user->branch[0]->name ?? 'No Branch' }}</div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label text-muted">Phone Number</label>
                                                <div class="fs-5">+880 {{ $user->phone }}</div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label text-muted">Date of Birth</label>
                                                <div class="fs-5">{{ \Carbon\Carbon::parse($user->dob)->format('d M Y') }}</div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label text-muted">Address</label>
                                                <div class="fs-5">{{ $user->address }}</div>
                                            </div>

                                            <div class="text-end mt-4">
                                                <a href="{{url('/edit-profile')}}" class="btn btn-outline-primary px-4">Edit Profile</a>
                                            </div>
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

    </body>


</html>
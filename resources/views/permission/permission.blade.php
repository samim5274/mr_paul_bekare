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
    .icon{
        width:48px; height:48px; font-size:24px; box-shadow: 0 2px 6px rgba(13, 110, 253, 0.4);
    }
    .form-img {
        width: 50px;       
        height: 50px;      
        object-fit: cover; 
        border-radius: 5px; 
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
                                    <li class="breadcrumb-item"><a href="{{url('/permission')}}">Permission</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Permission</li>
                                </ul>
                            </div>                            
                        </div>
                    </div>
                </div>
                @include('layouts.message')
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="m-0">Permission</h1>
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-user-plus"></i> Create new user
                        </button>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="col-md-12 text-center mb-4 mb-md-0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped " id="printableTable">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Photo</th>
                                                    <th class="text-start">Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Date of Birth</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user as $val)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><img src="{{ asset('img/employee/'.$val->photo) }}" alt="user-image" class="form-img"></td>
                                                    <td class="text-start text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}">{{$val->name}}</td>
                                                    <td class="text-start">{{$val->email}}</td>
                                                    <td class="text-start">{{$val->phone}}</td>
                                                    <td class="text-start">{{$val->address}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($val->dob)->format('d M Y') }}</td>
                                                    @php
                                                        $roles = [ 1 => 'Admin', 2 => 'Manager', 3 => 'Incharge', 4 => 'Cashier' ];
                                                        $roleId = $val->role;

                                                        $status = [ 1 => 'Active', 2 => 'De-active' ];
                                                        $statusId = $val->status;
                                                    @endphp
                                                    <td class="text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}">{{ $roles[$roleId] ?? 'Unknown' }}</td>
                                                    <td class="text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}">{{ $status[$statusId] ?? 'Unknown' }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="d-flex justify-content-end mt-3">
                                            {{$user->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 


<!-- Modal -->
@foreach($user as $val)
<div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/user-permission-update')}}" method="GET">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$val->name}} - Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <input type="hidden" name="txtId" value="{{$val->id}}">
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <label for="Role" class="form-label">Role</label>
                        <select name="cbxRole" id="Role" class="form-select" required>
                            <option disabled selected>-- Select Role --</option>
                            <option value="1">Admin</option>
                            <option value="2">Manager</option>
                            <option value="3">Incharge</option>
                            <option value="4">Cashier</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4">
                        <label for="Status" class="form-label">Status</label>
                        <select name="cbxStatus" id="Status" class="form-select" required>
                            <option disabled selected>-- Select Status --</option>
                            <option value="1">Active</option>
                            <option value="2">De-active</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure? You want to change the permission for this {{$val->name}} user?')">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
        

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/create-account')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new user account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <input type="hidden" name="txtId" value="{{$val->id}}">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">First Name*</label>
                                <input type="text" name="txtFirstName" value="Sabbir" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="txtLastName" value="Hossain" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Email Address*</label>
                        <input type="email" name="txtEmail" value="sabbir@gmail.com" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="txtPassword" value="123456789" class="form-control" placeholder="Password">
                    </div>
                    <p class="mt-4 text-sm text-muted">By Signing up, you agree to our <a href="#" class="text-primary"> Terms of Service </a> and <a href="#" class="text-primary"> Privacy Policy</a></p>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure? You want to craeate new user?')">Create Account</button>
                    </div>
                </div>
            </form>
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
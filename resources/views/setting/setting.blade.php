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
        .menu-item {
            cursor: pointer;
        }
        .menu-item:hover {
            color: #0d6efd;
            text-decoration: underline;
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
                                <li class="breadcrumb-item"><a href="{{url('/setting')}}">Setting</a></li>
                                <li class="breadcrumb-item" aria-current="page">Setting</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            <div class="row">
                <h1>Setting</h1>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <!-- Left side (Menu) -->
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h5 class="menu-item" data-target="personal"><i class="fa-solid fa-id-card-clip me-3"></i>Personal Details</h5><hr>
                                    <h5 class="menu-item" data-target="privacy"><i class="fa-solid fa-lock me-3"></i>Privacy</h5><hr>
                                    <h5 class="menu-item" data-target="Category"><i class="fa-solid fa-tablet-screen-button me-3"></i>Category</h5><hr>
                                    <h5 class="menu-item" data-target="SubCategory"><i class="fa-solid fa-table-columns me-3"></i>Sub-Category</h5><hr>
                                    <h5 class="menu-item" data-target="checkup"><i class="fa-solid fa-user-tie me-3"></i>Account Checkup</h5><hr>
                                    <h5 class="menu-item" data-target="terms"><i class="fa-solid fa-paperclip me-3"></i></i>Terms of Service</h5><hr>
                                    <h5 class="menu-item" data-target="policy"><i class="fa-solid fa-shield-halved me-3"></i>Privacy Policy</h5><hr>
                                    <h5 class="menu-item" data-target="cookies"><i class="fa-solid fa-cookie me-3"></i>Cookies Policy</h5><hr>
                                    <h5 class="menu-item" data-target="backup"><i class="fa-solid fa-download me-3"></i> Backup</h5><hr>
                                </div>

                                <!-- Right side (Details) -->
                                <div class="col-md-8">
                                    <div id="personal" class="detail-section">
                                        <div class="border-0">
                                            <div class="text-center">
                                                <!-- Profile Image -->
                                                <img src="{{ asset('/img/employee/' . ($user->photo ?? 'default.jpg')) }}" 
                                                    class="rounded-circle mb-3 shadow-sm"
                                                    width="150" height="150"
                                                    alt="Profile Image"
                                                    style="border: 3px solid rgba(0, 174, 255, 1); object-fit: cover;">

                                                <!-- Name -->
                                                <h4 class="fw-bold mb-0">{{ $user->name }}</h4>
                                                <p class="text-muted mb-3">@php $roles = [1 => 'Admin', 2 => 'Manager', 3 => 'Waiter', 4 => 'Chef', 5 => 'Other']; @endphp {{ $roles[$user->role] ?? 'Unknown' }}</p>

                                                <!-- Info Table -->
                                                <table class="table table-sm table-borderless text-start mx-auto" style="max-width: 400px;">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="text-muted">Email</th>
                                                            <td>{{ $user->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="text-muted">Phone</th>
                                                            <td>+880 {{ $user->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="text-muted">Date of Birth</th>
                                                            <td>{{ \Carbon\Carbon::parse($user->dob)->format('d M Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="text-muted">Status</th>
                                                            <td>
                                                                @php
                                                                    $statuses = [0 => 'Inactive', 1 => 'Active'];
                                                                @endphp
                                                                <span class="badge {{ $user->status ? 'bg-success' : 'bg-danger' }}">
                                                                    {{ $statuses[$user->status] ?? 'Unknown' }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <!-- Optional Actions -->
                                                <div class="mt-3">
                                                    <a href="{{ url('/edit-profile') }}" class="btn btn-outline-primary btn-sm">
                                                        <i class="fa-solid fa-pen"></i> Edit Profile
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="privacy" class="detail-section d-none">
                                        <div class="container mx-auto p-4">
                                            <h5 class="text-xl font-semibold mb-4">Privacy</h5>

                                            <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-4 max-w-lg mx-auto">
                                                <h4 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Change Password</h4>

                                                <form action="{{url('/change-password')}}" method="POST" id="passwordForm" class="container max-w-lg mx-auto p-4 bg-white rounded-lg shadow-md">
                                                    @csrf
                                                    <div class="mb-3 row align-items-center">
                                                        <label for="OldPass" class="col-md-4 col-form-label text-end">Old Password</label>
                                                        <div class="col-md-8">
                                                            <input type="password" id="OldPass" name="txtOldPassword" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row align-items-center">
                                                        <label for="NewPass" class="col-md-4 col-form-label text-end">New Password</label>
                                                        <div class="col-md-8">
                                                            <input type="password" id="NewPass" name="txtNewPassword" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row align-items-center">
                                                        <label for="rePass" class="col-md-4 col-form-label text-end">Re-Type Password</label>
                                                        <div class="col-md-8">
                                                            <input type="password" id="rePass" name="reNewPassword" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary w-100">Update Password</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <div id="Category" class="detail-section d-none">
                                        <h4>Category</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="{{ url('/create-product-category') }}" method="POST">
                                                    @csrf
                                                    <input type="text" class="form-control" name="txtCategory" required placeholder="Category name">
                                                    <button type="submit" class="form-control mt-2">Save</button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="max-height: 400px; overflow-y: auto; border: 1px solid #ccc; padding: 8px; border-radius: 5px;">
                                                    @foreach($categories as $val)
                                                        <p style="margin: 0 0 5px 0;" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $val->id }}">{{ $val->name }}</p>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($categories as $key => $val)
                                    <div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{url('/update-category/'.$val->id)}}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><a href="{{url('/edit-product/'.$val->id)}}">{{ $val->name }}</a></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <label for="Category_id" class="form-label">Category:</label>
                                                            <input type="text" id="Category_id" name="txtCategory" class="form-control" min="0" placeholder="Enter category name" value="{{ $val->name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div id="SubCategory" class="detail-section d-none">
                                        <h4>Create Sub-Category</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="{{ url('/create-product-sub-category') }}" method="POST">
                                                    @csrf
                                                    <select name="cbxCategory" id="categroy" class="form-control" required>
                                                        <option selected disabled>-- Select Category --</option>
                                                        @foreach($categories as $val)
                                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" class="form-control mt-2" name="txtSubCategory" required placeholder="Sub Category name">
                                                    <button type="submit" class="form-control mt-2">Save</button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <div style="max-height: 400px; overflow-y: auto; border: 1px solid #ccc; padding: 8px; border-radius: 5px;">
                                                    @foreach($subcategories as $val)
                                                        <div style="margin-bottom: 6px; font-size: 14px;" data-bs-toggle="modal" data-bs-target="#subcategory{{ $val->id }}">
                                                            <strong>{{ $val->category->name }}</strong> → {{ $val->name }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($subcategories as $key => $val)
                                    <div class="modal fade" id="subcategory{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{url('/update-sub-category/'.$val->id)}}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><a href="{{url('/edit-product/'.$val->id)}}">{{ $val->name }}</a></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <select name="cbxCategory" id="categroy" class="form-control" required>
                                                                <option selected disabled>-- Select Category --</option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{ $category->id }}" 
                                                                        {{ $category->id == $val->category_id ? 'selected' : '' }}>
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label for="subCategory_id" class="form-label">Category:</label>
                                                            <input type="text" id="subCategory_id" name="txtSubCategory" class="form-control" min="0" placeholder="Enter sub-category name" value="{{ $val->name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div id="checkup" class="detail-section d-none">
                                        <h4>Account Checkup</h4>
                                        <p>Checkup details...</p>
                                    </div>
                                    <div id="terms" class="detail-section d-none">
                                        <h4>Terms of Service</h4>
                                        <p>Terms and conditions...</p>
                                    </div>
                                    <div id="policy" class="detail-section d-none">
                                        <h4>Privacy Policy</h4>
                                        <p>Policy details...</p>
                                    </div>
                                    <div id="cookies" class="detail-section d-none">
                                        <h4>Cookies Policy</h4>
                                        <p>Cookies info...</p>
                                        <a href="{{url('/clear')}}" class="pc-link"><i class="fa-solid fa-cookie me-3"></i> Clear your browser cookies.</a>
                                    </div>
                                    <div id="backup" class="detail-section d-none">
                                        <h4>Backup Database</h4>
                                        <p>Database management info...</p>
                                        <a href="{{url('/backup-database')}}" class="pc-link" onclick="return confirm('Are you sure you want to download your database?')"><i class="fa-solid fa-download me-3"></i> Download your database for your own security.</a>
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

    <script>
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', () => {
                // Hide all sections
                document.querySelectorAll('.detail-section').forEach(section => {
                    section.classList.add('d-none');
                });

                // Show the selected section
                const target = item.getAttribute('data-target');
                document.getElementById(target).classList.remove('d-none');
            });
        });
    </script>

</body>
</html>
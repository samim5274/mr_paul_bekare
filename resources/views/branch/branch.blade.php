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
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">

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
                                <li class="breadcrumb-item"><a href="{{url('/branch')}}">Branch</a></li>
                                <li class="breadcrumb-item" aria-current="page">Branch</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Bakery branch List</h4>
                    <h5 class="m-0 text-primary">
                        <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-circle-plus me-2"></i> Add </a>
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped ">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Location</th>
                                <th>Phone</th>
                                <th>Manager</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branch as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}"><a href="#">{{ $val->name }}</a></td>
                                <td data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}">{{ $val->location }}</td>
                                <td data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}">+88 {{ $val->phone }}</td>
                                <td data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}">{{ $val->manager->name }}</td>
                                <td class="text-center text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}"><i class="fa-solid fa-pen-to-square" style="font-size: 20px;"></i></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <div class="d-flex justify-content-end mt-3">
                        {{ $branch->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div> 

    @foreach($branch as $key => $val)
    <div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="card shadow">
                        <div class="card-body">
                            <form id="branchForm" action="{{url('/update-branch/'.$val->id)}}" method="GET" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                <!-- branch Name -->
                                    <div class="col-md-12">
                                        <label for="branchName" class="form-label">Branch Name</label>
                                        <input type="text" id="branchName" name="txtbranchName" value="{{$val->name}}" class="form-control" required>
                                    </div>

                                    <!-- Location -->
                                    <div class="col-md-12">
                                        <label for="Location" class="form-label">Location</label>
                                        <input type="text" id="Location" name="txtLocation" value="{{$val->location}}" class="form-control" required>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-12">
                                        <label for="Phone" class="form-label">Phone</label>
                                        <input type="text" id="Phone" name="txtPhone" value="{{$val->phone}}" class="form-control" required>
                                    </div>

                                    <!-- manager Dropdown -->
                                    <div class="col-md-12">
                                        <label for="manager" class="form-label">Manager</label>
                                        <select id="manager" name="cbxManager" class="form-select" required>
                                            <option disabled selected>--Select Manager--</option>
                                            @foreach($manager as $mng)
                                                <option value="{{ $mng->id }}" {{ $val->manager_id == $mng->id ? 'selected' : '' }}>
                                                    {{ $mng->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fa-solid fa-pen-to-square me-2"></i> Edit Branch
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    @endforeach

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Branch</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <form id="branchForm" action="{{url('/add-branch')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                        <!-- branch Name -->
                            <div class="col-md-6">
                                <label for="branchName" class="form-label">Branch Name</label>
                                <input type="text" id="branchName" name="txtbranchName" class="form-control" required>
                            </div>

                            <!-- Location -->
                            <div class="col-md-6">
                                <label for="Location" class="form-label">Location</label>
                                <input type="text" id="Location" name="txtLocation" class="form-control" required>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label for="Phone" class="form-label">Phone</label>
                                <input type="text" id="Phone" name="txtPhone" class="form-control" required>
                            </div>

                            <!-- manager Dropdown -->
                            <div class="col-md-6">
                                <label for="manager" class="form-label">Manager</label>
                                <select id="manager" name="cbxManager" class="form-select" required>
                                    <option disabled selected>--Select Manager--</option>
                                    @foreach($manager as $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fa-solid fa-circle-plus me-2"></i> Add Branch
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    @include('layouts.footer')

    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

</body>
</html>
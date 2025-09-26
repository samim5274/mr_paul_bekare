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
                                    <li class="breadcrumb-item"><a href="{{url('/account-permission')}}">Permission</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Permission</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.message')
                <div class="container mt-4">
                    <h4 class="mb-3">Account Permission</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped ">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Branch</th>
                                    <th>Role</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$val->id}}">
                                        @if($val->photo)
                                            <a href="#"><img src="{{ asset('img/employee/' . $val->photo) }}" alt="Product Image" style="height: 60px; width: 60px; border-radius: 6px;"></a>
                                        @else
                                            <a href="#"><span class="text-muted">No Image</span></a>
                                        @endif
                                    </td>
                                    <td data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$val->id}}"><a href="#">{{ $val->name }}</a></td>                                   
                                    <td>{{ \Carbon\Carbon::parse($val->dob)->format('d M Y') }}</td>
                                    <td>{{ $val->phone }}</td>
                                    <td>{{ $val->email }}</td>
                                    <td>{{ $val->address }}</td>
                                    <td>{{ $val->branchs->name?? 'Unknown' }}</td>
                                    <td>
                                        @php
                                            $roles = [
                                                1 => 'Admin',
                                                2 => 'Manager',
                                                3 => 'Incharge',
                                                4 => 'Cashier'
                                            ];

                                            $roleId = $val->role;
                                        @endphp
                                        {{ $roles[$roleId] ?? 'Unknown' }}
                                    </td>
                                    @if($val->status == 1)
                                        <td class="text-center"><a href="{{url('/account-status/'.$val->id)}}"><i class="text-success fa-solid fa-eye"></i></i></a></td>
                                    @else
                                        <td class="text-center"><a href="{{url('/account-status/'.$val->id)}}"><i class="text-danger fa-solid fa-eye-slash"></i></a></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="d-flex justify-content-end mt-3">
                            {{ $user->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div> 


@foreach($user as $key => $val)
<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{$val->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/update-user-permission')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $val->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="txtStdIt" value="{{$val->id}}" hidden>
                    <label for="Branch" class="form-label">Select Branch</label>
                    <select class="form-control" name="branch_id" id="branch_id">
                        <option selected disabled>--Select Branch--</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $val->branch_id == $branch->id ? 'selected' : '' }}>
                                {{ $branch->name }}
                            </option>
                        @endforeach
                    </select>
                    @php
                        $roles = [
                            1 => 'Admin',
                            2 => 'Manager',
                            3 => 'Incharge',
                            4 => 'Cashier'
                        ];
                    @endphp
                    <br>
                    <label for="role_id" class="form-label">Select Role</label>
                    <select name="role_id" id="role_id" class="form-control">
                        <option disabled {{ empty($user->role_id) ? 'selected' : '' }}>-- Select Role --</option>
                        @foreach($roles as $key => $label)
                            <option value="{{ $key }}" {{ $val->role == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
        

        @include('layouts.footer')
        
        <script src="./assets/js/plugins/popper.min.js"></script>
        <script src="./assets/js/plugins/simplebar.min.js"></script>
        <script src="./assets/js/plugins/bootstrap.min.js"></script>
        <script src="./assets/js/fonts/custom-font.js"></script>
        <script src="./assets/js/pcoded.js"></script>
        <script src="./assets/js/plugins/feather.min.js"></script>

    </body>


</html>
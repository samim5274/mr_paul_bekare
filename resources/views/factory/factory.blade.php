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
                                <li class="breadcrumb-item"><a href="{{url('/purchase')}}">Purchase Order</a></li>
                                <li class="breadcrumb-item" aria-current="page">Order List</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Purchase Order List</h4>
                    <!-- <h5 class="m-0 text-primary">
                        <a href="#" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                    </h5> -->
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="printableTable">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Reg</th>
                                <th>Total (৳)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$val->date}}</td>
                                <td>{{$val->time}}</td>
                                <td>{{$val->user->name}}</td>
                                <td>{{$val->branchs->name}}</td>
                                <td><a href="{{url('/view-order-item/'.$val->chalan_reg)}}">CH-{{$val->chalan_reg}}</a></td>
                                <td>৳{{$val->total}}/-</td>
                                <td data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}">
                                    @switch($val->status)
                                        @case(1)
                                            <span class="badge bg-warning text-dark">Pending</span>
                                            @break

                                        @case(2)
                                            <span class="badge bg-info text-dark">Processing</span>
                                            @break

                                        @case(3)
                                            <span class="badge bg-success">Completed</span>
                                            @break

                                        @case(4)
                                            <span class="badge bg-primary">Delivery</span>
                                            @break

                                        @case(0)
                                            <span class="badge bg-danger">Cancelled</span>
                                            @break

                                        @default
                                            <span class="badge bg-secondary">Unknown</span>
                                    @endswitch
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <div class="d-flex justify-content-end mt-3">
                        {{$order->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
@foreach($order as $key => $val)
    <div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('/purchase-status')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">CH-{{$val->chalan_reg}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" value="{{$val->chalan_reg}}" hidden name="txtChalanNo">
                        <div class="col-md-12">
                            <label for="Status" class="form-label">Status</label>
                            <select id="Status" name="cbxStatus" class="form-select" required>
                                <option disabled selected>--Select Status--</option>                
                                <option value="1">Pending</option>
                                <option value="2">Processing</option>
                                <option value="3">Completed</option>
                                <option value="4">Delivery</option>
                                <option value="0">Cancelled</option>                
                            </select>
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


    @include('layouts.footer')

    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

</body>
</html>
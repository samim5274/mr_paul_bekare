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

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                                <li class="breadcrumb-item"><a href="{{url('/factory')}}">Factory</a></li>
                                <li class="breadcrumb-item" aria-current="page">Order Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            
            <div class="container mt-4">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="m-0">Delivery Details</h4>
                        <!-- <h5 class="m-0 text-primary">
                            <a href="#" class="btn btn-primary w-100"><i class="fa-solid fa-circle-plus me-2"></i> Add </a>
                        </h5> -->
                        <h5>CH-{{$reg}}</h5>
                    </div>
                    <div class="col-lg-12 col-md-6">                        
                        <div class="row g-3"> 
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered align-middle text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Price (৳)</th>
                                            <th>Quantity</th>
                                            <th>Subtotal (৳)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cart as $key => $val)
                                        <tr class="cart-item">
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <a href="{{ url('/edit-product/' . $val->product_id) }}" class="text-success text-decoration-none">
                                                    {{ $val->product->name }}
                                                </a>
                                            </td>
                                            <td>
                                                <span data-price="{{ $val->unit_price }}">
                                                    ৳{{ $val->unit_price }}/-
                                                </span>
                                            </td>
                                            <td>
                                                <span data-price="{{ $val->unit_price }}">
                                                    {{ $val->order_qty }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="item-subtotal fw-semibold text-success" data-id="{{ $val->id }}">
                                                    ৳{{ $val->unit_price * $val->order_qty }}/-
                                                </span>
                                            </td>
                                            <td data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}">
                                                <i class="fa-solid fa-pen-to-square text-success fs-4 me-3"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 



<!-- Modal -->
 @foreach ($cart as $key => $val)
<div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/update-order-qty/'.$val->chalan_reg.'/'.$val->product_id)}}" method="GET">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $val->product->name }} - ৳{{ $val->unit_price }}/-</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="txtQty" class="form-control" placeholder="Insert update order qty" required>
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
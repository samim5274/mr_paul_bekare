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
                                <li class="breadcrumb-item"><a href="{{url('/purchase')}}">Purchase</a></li>
                                <li class="breadcrumb-item" aria-current="page">Purchase</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            
            <div class="container mt-4">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="m-0">Purchase Details</h4>
                        <!-- <h5 class="m-0 text-primary">
                            <a href="#" class="btn btn-primary w-100"><i class="fa-solid fa-circle-plus me-2"></i> Add </a>
                        </h5> -->
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="grid-margin stretch-card">
                            <div class="card mt-2">
                                <div class="card-body"> 
                                    <div class="py-2">
                                        <form action="{{url('/make-purchase-order')}}" method="GET">
                                            <input type="search" name="search" id="search" class="form-control" placeholder="Search by food name or ID">
                                        </form>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row g-3">                       
                            @if($cart)
                            @foreach($cart as $key => $val)
                            <div class="col-lg-4 col-md-6 mt-3">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body p-3 d-flex flex-column justify-content-between h-100">

                                        <!-- Product Header -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <a href="{{url('/edit-product/'.$val->product_id)}}" class="text-decoration-none">
                                                <h5 class="mb-0 text-success fw-semibold">{{ $val->product->name }}</h5>
                                            </a>
                                            <span class="badge bg-light text-dark fs-6">#{{ $key + 1 }}</span>
                                        </div>

                                        <!-- Price per item -->
                                        <div class="mb-3">
                                            <small class="text-muted d-block mb-1">Price per item:</small>
                                            <strong class="text-dark fs-6" data-price="{{ $val->unit_price }}">
                                                ৳{{ number_format($val->unit_price, 2) }}
                                            </strong>
                                        </div>

                                        <!-- Quantity input -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="text-muted">Quantity:</div>
                                            <div class="input-group input-group-sm" style="width: 120px;">
                                                <button type="button" class="btn btn-outline-secondary btn-minus"
                                                    data-id="{{ $val->id }}"
                                                    style="padding: 0 6px; font-size: 14px; height: 28px;">−</button>

                                                <input type="number"
                                                    class="form-control text-center qty-input"
                                                    value="{{ $val->order_qty }}"
                                                    min="1"
                                                    name="txtStock"
                                                    data-id="{{ $val->id }}"
                                                    data-price="{{ $val->unit_price }}"
                                                    style="width: 36px; height: 28px; font-size: 13px; padding: 0;">

                                                <button type="button" class="btn btn-outline-secondary btn-plus"
                                                    data-id="{{ $val->id }}"
                                                    style="padding: 0 6px; font-size: 14px; height: 28px;">+</button>
                                            </div>
                                        </div>

                                        <!-- Subtotal -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-muted">Total:</div>
                                            <h6 class="mb-0 text-success fw-semibold">
                                                <span class="item-subtotal display-6" data-id="{{ $val->id }}">
                                                    ৳{{ number_format($val->unit_price * $val->order_qty) }}
                                                </span>
                                            </h6>
                                        </div>
                                    </div>

                                    <!-- Remove Button -->
                                    <div class="card-footer bg-white border-0 d-flex justify-content-end pt-2">
                                        <button class="btn btn-sm btn-outline-danger remove-item-link"
                                            data-id="{{ $val->id }}" title="Remove item">
                                            <i class="mdi mdi-cart-off"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @else
                            <div class="col-12 text-center py-4 text-muted">
                                <i class="mdi mdi-cart-outline display-4 d-block mb-2"></i>
                                <p class="mb-0">No items in your cart.</p>
                            </div>
                            @endif
                            <div class="row resultData" id="content"></div>                        
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-2">
                        <div class="card mt-2">
                            <div class="card-body p-2 p-md-4">
                                <form action="{{url('/confirm-purchase-order')}}" method="POST" id="myForm">
                                    @csrf
                                    <div class="card-body p-3 p-md-4">
                                        <input type="text" class="form-control mb-2" hidden value="{{ $chalanReg }}" name="txtReg">
                                        <h4>ORD-{{ $chalanReg }}</h4>
                                        <hr>
                                        <h4>Location</h4>
                                        <p><i class="mdi mdi-map-marker"></i> Uttara, Dhaka-1230</p>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="m-0">Subtotal ({{ $count }} items)</h5>
                                            <h5 class="card-title m-0">৳<span id="cart-subtotal">{{$sum}}</span>/-</h5>
                                        </div><br>
                                        <!-- payment section -->

                                        <button type="submit" id="confirmBtn" class="btn btn-outline-success w-100">
                                            <span id="btnText">
                                                <h4 class="m-0">Confirm</h4>
                                            </span>
                                        </button>
                                    </div>
                                </form> 
                            </div>
                        </div>        
                    </div>
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
    <script src="{{ asset('./js/purchaseCart.js') }}"></script>

</body>
</html>
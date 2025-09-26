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
                                <li class="breadcrumb-item"><a href="{{url('/return-order-list')}}">Return</a></li>
                                <li class="breadcrumb-item" aria-current="page">Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message') 
            <div id="successMessage" class="alert alert-success d-none">
                <strong>✅ Success!</strong> Order confirmed successfully!
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row g-3">                       
                            @if($cart)
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-warning">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Product Name</th>
                                            <th class="text-center">Unit Price</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($cart as $key => $val)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td><a href="{{url('/edit-product/'.$val->product_id)}}">{{ $val->product->name }}</a></td>
                                                <td class="text-center">
                                                    <span data-price="{{ $val->price }}">
                                                        ৳{{ $val->price }}
                                                    </span>
                                                </td>
                                                <td class="text-center">{{ $val->quantity }}</td>
                                                <td class="text-center">
                                                    <strong>
                                                        <span class="item-subtotal">৳{{$val->price * $val->quantity}}</span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                                <form action="{{url('/order-return-confirm/'.$order[0]->reg)}}" method="GET" id="myForm">
                                    @csrf
                                    <div class="card-body p-3 p-md-4">
                                        <input type="hidden" id="cart-total-input" name="txtSubTotal" 
                                            value="{{ $cart->sum(fn($i) => $i->price * $i->quantity) }}">
                                        <input type="text" class="form-control mb-2" hidden value="{{ $reg }}" name="txtReg">
                                        <h4>ORD-{{ $reg }}</h4>
                                        <hr>
                                        <h4>Location</h4>
                                        <p><i class="mdi mdi-map-marker"></i> Uttara, Dhaka-1230</p>
                                        <hr>
                                        
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <p class="m-0">Total</p>
                                            <h5 class="card-title m-0">৳<span id="cart-total">{{ number_format($cart->sum(fn($i) => $i->price * $i->quantity), 0) }}</span>/-</h5>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="m-0">Shipping Fee</h5>
                                            <h5 class="card-title m-0">৳<span id="shipping-fee">0.00</span>/-</h5>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="m-0">VAT (৳)</h5>
                                            <h5 class="card-title m-0">৳<span id="vat-amount">{{$order[0]->vat}}</span>/-</h5>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="m-0">Discount</h5>
                                            <h5 class="card-title m-0">৳<span id="discount-amount">{{$order[0]->discount}}</span>/-</h5>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="m-0">Subtotal ({{ $count }} items)</h5>
                                            <h5 class="card-title m-0">৳<span id="cart-subtotal">{{ number_format($cart->sum(fn($i) => $i->price * $i->quantity), 0) }}</span>/-</h5>
                                        </div><hr>

                                        <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Are you sure you want to RETURN this bill?')">Return</button>
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


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    
</body>
</html>
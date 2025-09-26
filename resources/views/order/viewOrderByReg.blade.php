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
                                <li class="breadcrumb-item"><a href="{{url('/sale-due-collection')}}">Due List</a></li>
                                <li class="breadcrumb-item" aria-current="page">Order Item List</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container py-4">

                <!-- Order Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h3 class="fw-bold text-primary">Order #{{ $order->reg }}</h3>
                        <hr>
                    </div>
                </div>

                <!-- Main Row -->
                <div class="row g-4">
                    
                    <!-- Cart Items (col-8) -->
                    <div class="col-lg-8 col-md-12">
                        <div class="row g-4">
                            @foreach($cart as $val)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card h-100 shadow-sm border-0 rounded-3">
                                    <div class="card-body p-4 d-flex flex-column justify-content-between">

                                        <!-- Product Header -->
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <h5 class="text-primary fw-semibold mb-0">{{ $val->product->name }}</h5>
                                            <span class="badge bg-secondary">#{{ $loop->iteration }}</span>
                                        </div>

                                        <!-- Price -->
                                        <div class="mb-2">
                                            <small class="text-muted d-block">Price per item</small>
                                            <span class="fw-bold text-dark">৳{{ number_format($val->price, 2) }}</span>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="mb-1 d-flex justify-content-between align-items-center">
                                            <small class="text-muted d-block">QTY</small>
                                            <span class="fw-semibold">{{ $val->quantity }} pcs</span>
                                        </div>

                                        <!-- Subtotal -->
                                        <div class="d-flex justify-content-between align-items-center mt-auto">
                                            <small class="text-muted">Subtotal</small>
                                            <span class="text-success fw-bold">
                                                ৳{{ number_format($val->price * $val->quantity, 2) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Order Summary (col-4) -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-header bg-primary text-white fw-bold">
                                Order Summary
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Total:</span>
                                    <span>৳{{ number_format($order->total, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Discount:</span>
                                    <span>- ৳{{ number_format($order->discount, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>VAT:</span>
                                    <span>+ ৳{{ number_format($order->vat, 2) }}</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold text-primary mb-2">
                                    <span>Payable:</span>
                                    <span>৳{{ number_format($order->payable, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Paid:</span>
                                    <span>৳{{ number_format($order->pay, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between text-danger fw-semibold">
                                    <span>Due:</span>
                                    <span>৳{{ number_format($order->due, 2) }}</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Customer Name:</span>
                                    <span>{{ $order->customerName }}</span>
                                </div>
                                <div class="d-flex justify-content-between text-primary fw-semibold">
                                    <span>Customer Phone:</span>
                                    <span>0{{ $order->customerPhone }}</span>
                                </div>
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

    <script>
        window.onload = function () {
            const today = new Date().toISOString().split('T')[0];

            const startInput = document.getElementById('dtpStartDate');
            const endInput = document.getElementById('dtpEndDate');

            startInput.max = today;
            endInput.max = today;

            startInput.value = today;
            endInput.value = today;
        };
    </script>

</body>
</html>
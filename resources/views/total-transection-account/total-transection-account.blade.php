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
                                <li class="breadcrumb-item"><a href="{{url('/total-sale')}}">Report</a></li>
                                <li class="breadcrumb-item" aria-current="page">Total Sale</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold text-dark m-0">
                        <i class="fa-solid fa-chart-line text-primary"></i> Transaction Details Report
                    </h3>
                    <a href="{{url('/print-closing-balance')}}" class="btn btn-outline-primary btn-sm" target="_blank">
                        <i class="fa-solid fa-print"></i> Print Report
                    </a>
                </div>

                <!-- Summary Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-1">Total</h6>
                                <h4 class="fw-bold text-primary">৳{{$total}}/-</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-1">Discount</h6>
                                <h4 class="fw-bold text-warning">৳{{$discount}}/-</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-1">VAT</h6>
                                <h4 class="fw-bold text-info">৳{{$vat}}/-</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-1">Payable</h6>
                                <h4 class="fw-bold text-success">৳{{$payable}}/-</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-1">Paid</h6>
                                <h4 class="fw-bold text-info">৳{{$pay}}/-</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-1">Due</h6>
                                <h4 class="fw-bold text-danger">৳{{$due}}/-</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-1">Expenses</h6>
                                <h4 class="fw-bold text-primary">৳{{$expenses}}/-</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-body text-center">
                                <h6 class="text-muted mb-1">Balance</h6>
                                <h4 class="fw-bold text-success">৳{{$pay - $expenses}}/-</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="table-responsive mb-4">
                    <table class="table table-bordered  align-middle">                        
                        <tbody>
                            <tr class="fw-bold">
                                <td class="">Total Amount</td>
                                <td class="text-end">৳{{$total}}/-</td>
                            </tr>
                            <tr class="fw-bold">
                                <td class="">VAT</td>
                                <td class="text-end">৳{{$vat}}/-</td>
                            </tr>
                            <tr class="fw-bold">
                                <td class="">Payable</td>
                                <td class="text-end">৳{{$payable}}/-</td>
                            </tr>
                            <tr class="fw-bold">
                                <td class="">Pay</td>
                                <td class="text-end">৳{{$pay}}/-</td>
                            </tr>                            
                            <tr class="fw-bold">
                                <td class="">Due</td>
                                <td class="text-end">৳{{$due}}/-</td>
                            </tr>
                            <tr class="fw-bold">
                                <td class="">Expenses</td>
                                <td class="text-end">৳{{$expenses}}/-</td>
                            </tr>
                            <tr class="fw-bold">
                                <td class="text-center">Closeing Balance</td>
                                <td class="text-end">৳{{ $pay - $expenses }}/-</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->

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
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
                                <li class="breadcrumb-item"><a href="{{url('/factory')}}">Factory</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/product-order')}}">Purchase Order</a></li>
                                <li class="breadcrumb-item" aria-current="page">Product Order List</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Total Product Stock Report</h4>
                    <h5 class="m-0 text-primary">
                        <a href="{{url('/print-all-product-order-list')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                    </h5>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body p-2 p-md-4">
                                <form action="{{url('/search-product-wise-order-qty')}}" method="GET" target="_blank">
                                    @CSRF
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="input-group mb-3">
                                                <div class="col-md-12">
                                                    <select id="Product" name="cbxProduct" class="form-select" required>
                                                        <option disabled selected >--Select Product--</option>
                                                        @foreach($product as $val)
                                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                                <input type="submit" class="btn btn-outline-primary w-100 py-2" value="Search">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    @isset($stock)
                    <table class="table table-bordered table-striped " id="printableTable">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center">#</th>
                                <th>Product</th>
                                <th class="text-center">Branch</th>
                                <th class="text-center">Order Qty</th>
                                <th class="text-center">Ready Qty</th>
                                <th class="text-center">Delivery Qty Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stock as $key => $val)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td><a href="{{url('/find-product-order/'.$val->product_id)}}">{{ $val->product->name }}</a></td>
                                <td class="text-center">{{$val->branchs->name}}</td>
                                <td class="text-center">{{$val->order_qty}}</td>
                                <td class="text-center">{{$val->ready_qty}}</td>
                                <td class="text-center">{{$val->delivery_qty}}</td>
                            </tr>
                            @endforeach
                            <tr class="table-info">
                                <td colspan="3">Total:</td>
                                <td class="text-center">{{$stockOrder}}</td>
                                <td class="text-center">{{$stockReady}}</td>
                                <td class="text-center">{{$stockDelivery}}</td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <table class="table table-bordered table-striped" id="printableTable">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center">#</th>
                                <th>Product</th>
                                <th class="text-center">Order Qty</th>
                                <th class="text-center">Ready Qty</th>
                                <th class="text-center">Delivery Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paginatedSummary as $key => $val)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>
                                        <a href="{{ url('/find-product-order/' . $val->product_id) }}">
                                            {{ $val->product->name ?? 'Unknown' }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $val->order_qty }}</td>
                                    <td class="text-center">{{ $val->ready_qty }}</td>
                                    <td class="text-center">{{ $val->delivery_qty }}</td>
                                </tr>
                            @endforeach
                            <tr class="table-info">
                                <td colspan="2">Total:</td>
                                <td class="text-center">{{ $totalOrder_qty }}</td>
                                <td class="text-center">{{ $totalReady_qty }}</td>
                                <td class="text-center">{{ $totalDelivery_qty }}</td>
                            </tr>
                        </tbody>
                    </table>

                    @endif
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5></h5>
                    <div class="d-flex justify-content-end mt-3">
                        @isset($stock)
                        {{$stock->links()}}
                        @else
                        {{ $paginatedSummary->links() }}
                        @endif
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

</body>
</html>
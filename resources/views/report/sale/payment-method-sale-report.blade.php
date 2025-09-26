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
                                <li class="breadcrumb-item" aria-current="page">Payment Method</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Payment Method Sale Report</h4>
                    <!-- <h5 class="m-0 text-primary">
                        <a href="#" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                    </h5> -->
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body p-2 p-md-4">
                                <form action="{{url('/search-report-date-payment-method')}}" method="GET" target="_blank">
                                    @CSRF
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <!-- Start Date -->
                                                <div class="col-md-6 mb-3">
                                                    <label for="dtpStartDate" class="form-label">Start Date</label>
                                                    <input type="date" id="dtpStartDate" required class="form-control py-2" name="dtpStartDate">
                                                </div>

                                                <!-- End Date -->
                                                <div class="col-md-6 mb-3">
                                                    <label for="dtpEndDate" class="form-label">End Date</label>
                                                    <input type="date" id="dtpEndDate" required class="form-control py-2" name="dtpEndDate">
                                                </div>

                                                <!-- Product Dropdown -->
                                                <div class="col-md-12 mb-3">
                                                    <select id="Payment Methods" name="cbxPayMethod" class="form-select" required>
                                                        <option disabled selected >--Select Payment Methods--</option>
                                                        @foreach($paymentMethods as $val)
                                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="col-lg-12 d-flex align-items-end">
                                            <div class="w-100 d-flex gap-2">
                                                <input type="submit" class="btn btn-outline-primary w-50 py-2" value="Search">
                                                <button type="submit" name="print" value="1" class="btn btn-primary w-50 d-flex align-items-center justify-content-center gap-2">
                                                    <i class="fa-solid fa-print"></i><span>Print</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="printableTable">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Method</th>
                                <th>Reg</th>
                                <th>Total (৳)</th>
                                <th>Discount (৳)</th>
                                <th>VAT % (৳)</th>
                                <th>Payable (৳)</th>
                                <th>Pay (৳)</th>
                                <th>Due (৳)</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$val->date}}</td>
                                <td>{{$val->payment->name}}</td>
                                <td>{{$val->reg}}</td>
                                <td>৳{{$val->total}}/-</td>
                                <td>৳{{$val->discount}}/-</td>
                                <td>৳{{$val->vat}}/-</td>
                                <td>৳{{$val->payable}}/-</td>
                                <td>৳{{$val->pay}}/-</td>
                                <td>৳{{$val->due}}/-</td>
                                <td class="text-center">
                                    @if($val->status == 2)
                                        <span class="badge bg-success">Paid</span>
                                    @else
                                        <span class="badge bg-danger">Due</span>
                                    @endif
                                    <span class="text-primary"><a href="{{url('/specific-order-print/'.$val->reg)}}" target="_blank"><i class="fa-solid fa-print"></i></a></span>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="table-info">
                                <td colspan="4">Total:</td>
                                <td>৳{{$total}}/-</td>
                                <td>৳{{$discount}}/-</td>
                                <td>৳{{$vat}}/-</td>
                                <td>৳{{$payable}}/-</td>
                                <td>৳{{$pay}}/-</td>
                                <td>৳{{$due}}/-</td>
                                <td></td>
                            </tr>
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


    @include('layouts.footer')

    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

    <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('dtpStartDate').value = today;
        document.getElementById('dtpEndDate').value = today;
        document.getElementById('dtpStartDate').max = today;
        document.getElementById('dtpEndDate').max = today;
    </script>

</body>
</html>
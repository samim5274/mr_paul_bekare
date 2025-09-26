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
                                <li class="breadcrumb-item"><a href="{{url('/product-view')}}">Product</a></li>
                                <li class="breadcrumb-item" aria-current="page">Due Collection</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Due List</h4>
                    <!-- <h5 class="m-0 text-primary">
                        <a href="{{url('/print-all-order')}}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                    </h5> -->
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="printableTable">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>C.Name</th>
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
                                <td>{{ $val->customerName ?? 'N/A' }}</td>
                                <td><a href="{{url('/order-view/'.$val->reg)}}">ORD-{{$val->reg}}</a></td>
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
                                        <span class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#due{{$val->id}}">Due</span>
                                    @endif
                                    <span class="text-primary"><a href="{{url('/specific-order-print/'.$val->reg)}}" target="_blank"><i class="fa-solid fa-print"></i></a></span>
                                    <a href="{{url('/return-product-cart/'.$val->reg)}}" class="text-danger"><i class="fa-regular fa-share-from-square"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="table-info">
                                <td colspan="3">Total:</td>
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

    <!-- Modal -->
    @foreach($order as $key => $val)
    <div class="modal fade" id="due{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/due-collection/'.$val->reg)}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ORD-{{$val->reg}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="num1{{$val->id}}" class="col-sm-3 col-form-label">Total Amount:</label>
                        <div class="col-sm-9">
                            <!-- Hidden total input -->
                            <input type="text" class="form-control" id="num1{{$val->id}}" name="txtDue" hidden readonly value="{{ $val->due }}">
                            <!-- Display total as styled text -->
                            <h1 class="display-1 text-danger">${{ $val->due }}/-</h1>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="num3{{$val->id}}" class="col-sm-3 col-form-label">Discount:</label>
                        <div class="col-sm-9">
                            <input type="number" readonly class="form-control" id="num3{{$val->id}}" name="txtDiscount" value="0" placeholder="Discount" onkeyup="calculateAmount({{$val->id}})" onchange="calculateAmount({{$val->id}})">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="num2{{$val->id}}" class="col-sm-3 col-form-label">Pay:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="num2{{$val->id}}" name="txtPay" placeholder="Pay" onkeyup="calculateAmount({{$val->id}})" onchange="calculateAmount({{$val->id}})">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="num2" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <p id="result{{$val->id}}" class="display-6 text-danger">Amount: 00/-</p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnSave{{$val->id}}" onclick="return confirm('Are you sure you want to collect this due?')">Save</button>
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
    <script src="{{ asset('./js/due.js') }}"></script>
    <script src="{{ asset('./js/orderListPrint.js') }}"></script>

</body>
</html>
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
                                <li class="breadcrumb-item"><a href="{{url('/product-view')}}">Product</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/sale-view')}}">Sale</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/cart-view')}}">Cart</a></li>
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
                        <div class="grid-margin stretch-card">
                            <div class="card mt-2">
                                <div class="card-body"> 
                                    <div class="py-2">
                                        <form action="{{url('/add-to-cart-2')}}" method="GET">
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
                                <div class="card shadow-sm border-0 h-100 mb-3">
                                    <div class="card-body p-3">

                                        <!-- Product Name and Item No -->
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="mb-0 text-primary fw-semibold">{{ $val->product->name }}</h5>
                                            <span class="badge bg-secondary rounded-pill">#{{ $key + 1 }}</span>
                                        </div>

                                        <!-- Price -->
                                        <div class="mb-2">
                                            <small class="text-muted d-block">Price per item:</small>
                                            <span class="text-dark fw-bold" data-price="{{ $val->price }}">
                                                ৳{{ number_format($val->price, 2) }}
                                            </span>
                                        </div>

                                        <!-- Quantity Controls -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <small class="text-muted">Quantity:</small>
                                            <div class="input-group input-group-sm" style="width: 120px;">
                                                <button type="button" 
                                                        class="btn btn-outline-secondary btn-minus"
                                                        data-id="{{ $val->id }}">−</button>

                                                <input type="number"
                                                    class="form-control text-center qty-input"
                                                    value="{{ $val->quantity }}"
                                                    min="1"
                                                    name="txtStock"                                                    
                                                    data-id="{{ $val->id }}">

                                                <button type="button" 
                                                        class="btn btn-outline-secondary btn-plus"
                                                        data-id="{{ $val->id }}">+</button>
                                            </div>
                                        </div>

                                        <!-- Total Price -->
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">Subtotal:</small>
                                            <span class="text-success fw-semibold item-subtotal">
                                                ৳{{ number_format($val->price * $val->quantity, 2) }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Card Footer with Remove Button -->
                                    <div class="card-footer bg-white border-0 text-end">
                                        <a href="{{url('/remove-to-cart/'.$val->product_id.'/'.$val->reg)}}" class="btn btn-sm btn-outline-danger remove-item-link">Remove</a>
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
                                <form action="{{url('/confirm-order')}}" method="POST" id="myForm">
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
                                            <h5 class="m-0">VAT %</h5>
                                            <h5 class="card-title m-0">৳<span id="vat-amount">0.00</span>/-</h5>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="m-0">Discount</h5>
                                            <h5 class="card-title m-0">৳<span id="discount-amount">0.00</span>/-</h5>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="m-0">Subtotal ({{ $count }} items)</h5>
                                            <h5 class="card-title m-0">৳<span id="cart-subtotal">{{ number_format($cart->sum(fn($i) => $i->price * $i->quantity), 0) }}</span>/-</h5>
                                        </div>
                                        <!-- payment section -->

                                        <div class="form-group row">
                                            <label for="num4" class="col-sm-3 col-form-label">VAT (%) :</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="num4" name="txtVAT" value="0" placeholder="VAT" onkeyup="calculateAmount()" onchange="calculateAmount()" min="0">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="num3" class="col-sm-3 col-form-label">Discount:</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="num3" name="txtDiscount" value="0" placeholder="Discount" onkeyup="calculateAmount()" onchange="calculateAmount()" min="0">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="num2" class="col-sm-3 col-form-label">Pay:</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="num2" name="txtPay" placeholder="Pay" onkeyup="calculateAmount()" onchange="calculateAmount()" min="0">
                                            </div>
                                        </div><hr>

                                        <br>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <p id="result" class="display-6 text-danger">Amount: 00/-</p>
                                            </div>
                                        </div>

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


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('./js/cart.js') }}"></script>
    <script src="{{ asset('./js/orderPayment.js') }}"></script>


<script>
    document.getElementById('myForm').addEventListener('submit', function(e){
        e.preventDefault();

        const btn = document.getElementById('confirmBtn');
        const btnText = document.getElementById('btnText');

        // Loading Spinner
        btn.disabled = true;
        btnText.innerHTML = `<h4 class="m-0"><i class="fas fa-spinner fa-spin"></i> Loading...</h4>`;

        let formData = new FormData(this);

        axios.post('{{ url("/confirm-order") }}', formData)
        .then(response => {
            const reg = response.data.reg;

            const printUrl = `{{ url('/specific-order-print') }}/${reg}`;
            window.open(printUrl, '_blank'); 

            localStorage.setItem('orderSuccess', '1');

            document.getElementById('myForm').reset();

            setTimeout(() => {
                window.location.reload();
            }, 1000); 
        })
        .catch(error => {
            alert('Failed to confirm order!');
            console.error(error);

            btn.disabled = false;
            btnText.innerHTML = `<h4 class="m-0">Confirm Order</h4>`;
        });
    });

    window.onload = function () {
        if (localStorage.getItem('orderSuccess')) {
            document.getElementById('successMessage').classList.remove('d-none');

            setTimeout(() => {
                document.getElementById('successMessage').classList.add('d-none');
            }, 5000);

            localStorage.removeItem('orderSuccess');
        }
        const searchInput = document.getElementById('search');
        if (searchInput) {
            searchInput.focus();
        }
    };
</script>
    
</body>
</html>
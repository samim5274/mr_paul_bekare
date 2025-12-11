<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Branch Transfer | Mr. Paul Bakers</title>
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
                                <li class="breadcrumb-item"><a href="{{url('/product-view')}}">Product's</a></li>
                                <li class="breadcrumb-item" aria-current="page">Branch to Branch Transfer</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Branch to Branch Transfer</h4>
                    <!-- <h5 class="m-0 text-primary">
                        <a href="#" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                    </h5> -->
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card mt-2">
                        <input type="search" name="search" id="search" class="form-control" placeholder="Search by food name or Id or scan product ber code . . .">
                    </div>
                </div>
                <!-- <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle" id="printableTable">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Product</th>
                                <th class="text-center" style="width: 100px;">Price</th>
                                <th class="text-center" style="width: 100px;">Stock</th>
                                <th class="text-center" style="width: 500px;">Action</th>
                            </tr>
                        </thead>
                        <tbody class="resultData" id="content"></tbody>
                        <tbody class="allData">
                            @isset($products)
                                @foreach($products as $key => $val)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>
                                            <a href="{{ url('/edit-product/'.$val->id) }}" class="fw-semibold text-decoration-none text-primary">
                                                {{ $val->name }}
                                            </a>
                                        </td>
                                        <td class="text-center">{{ $val->price }}</td>
                                        <td class="text-center">{{ $val->stock }}</td>
                                        <td class="text-center">
                                            <form action="{{ url('/branch-to-branch-transfer/'.$val->id) }}" method="POST" class="d-flex justify-content-center align-items-center gap-2">
                                                @csrf
                                                <select name="branch_id" id="branch_id" class="form-control form-control-sm text-center" style="max-width: 100px;">
                                                    <option selected disabled>-- Select Branch --</option>
                                                    @foreach($branchs as $bnc)
                                                    <option value="{{ $bnc->id }}">{{ $bnc->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="number" name="stock" value="{{ $val->stock }}" max="{{ $val->stock }}" min="0" required class="form-control form-control-sm text-center" style="max-width: 100px;">
                                                <input type="text" name="reason" value="N/A" required class="form-control form-control-sm text-center" style="max-width: 100px;">
                                                <button type="submit" class="btn btn-sm btn-success">Save</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>

                    <div class="mt-3 resultData" id="content">
                        {{ $products->links() }}
                    </div>
                </div> -->

                <div class="card shadow-sm border-0">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-center" style="width: 60px;">#</th>
                                        <th>Product</th>
                                        <th class="text-center" style="width: 120px;">Price</th>
                                        <th class="text-center" style="width: 120px;">Available Stock</th>
                                        <th class="text-center" style="width: 420px;">Transfer Action</th>
                                    </tr>
                                </thead>

                                <tbody class="resultData" id="content"></tbody>
                                <tbody class="allData">
                                    @isset($products)
                                        @foreach ($products as $key => $val)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>

                                                <td>
                                                    <a href="{{ url('/edit-product/'.$val->id) }}"
                                                    class="fw-semibold text-decoration-none text-primary">
                                                    {{ $val->name }}
                                                    </a>
                                                </td>

                                                <td class="text-center fw-semibold text-dark">
                                                    ৳{{ number_format($val->price, 2) }}
                                                </td>

                                                <td class="text-center">
                                                    <span class="badge bg-success px-3 py-2">
                                                        {{ $val->stock }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <form action="{{ url('/branch-to-branch-transfer/'.$val->id) }}"
                                                        method="POST"
                                                        class="row g-2 justify-content-center">
                                                        @csrf

                                                        <div class="col-md-4">
                                                            <select name="branch_id"
                                                                    class="form-select form-select-sm"
                                                                    required>
                                                                <option selected disabled>Choose Branch</option>
                                                                @foreach ($branchs as $bnc)
                                                                    <option value="{{ $bnc->id }}">{{ $bnc->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <input type="number"
                                                                name="stock"
                                                                value="0"
                                                                min="1"
                                                                max="{{ $val->stock }}"
                                                                required
                                                                class="form-control form-control-sm text-center"
                                                                placeholder="Qty">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="reason"
                                                                value="Transfer"
                                                                required
                                                                class="form-control form-control-sm text-center"
                                                                placeholder="Reason">
                                                        </div>

                                                        <div class="col-md-2 text-center">
                                                            <button type="submit" class="btn btn-md btn-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                                                <i class="fa-solid fa-truck"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $products->links() }}
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

    <!-- for live search -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $('#search').on('keyup', function() {
            $value = $(this).val();
            if($value) {
                $('.allData').hide();
                $('.resultData').show();
            } else {
                $('.allData').show();
                $('.resultData').hide();
            }
            $.ajax({
                type:'get',
                url: '{{URL::to('branch/transfer/product')}}',
                data:{'search':$value},

                success:function(data){
                    console.log(data);
                    $('#content').html(data);
                }
            });
        });
    </script>

</body>
</html>
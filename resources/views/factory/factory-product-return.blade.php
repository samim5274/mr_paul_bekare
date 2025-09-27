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
                                <li class="breadcrumb-item"><a href="{{url('/stock-report')}}">Stock Report</a></li>
                                <li class="breadcrumb-item" aria-current="page">Product Stock</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Factory Return Product's</h4>
                    <!-- <h5 class="m-0 text-primary">
                        <a href="#" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                    </h5> -->
                </div>  
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card mt-2">
                        <input type="search" name="search" id="search" class="form-control" placeholder="Search by food name or Id or scan product ber code . . .">
                    </div>
                </div>              
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle" id="printableTable">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Product</th>
                                <th class="text-center" style="width: 120px;">Price</th>
                                <th class="text-center" style="width: 120px;">Stock</th>
                                <th class="text-center" style="width: 300px;">Action</th>
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
                                            <form action="{{ url('/factory-return-qty/'.$val->id) }}" method="POST" class="d-flex justify-content-center align-items-center gap-2">
                                                @csrf
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
                    <!-- Pagination -->
                    <div class="mt-3 resultData" id="content">
                        {{ $products->links() }}
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
                url: '{{URL::to('search/product/factory/return')}}',
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
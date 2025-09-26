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
                                <li class="breadcrumb-item"><a href="{{url('/sale-view')}}">Sale</a></li>
                                <li class="breadcrumb-item" aria-current="page">Sale</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            <div class="container">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card mt-2">
                        <div class="card-body"> 
                            <div class="py-2">
                                <form action="{{url('/add-to-cart-2')}}" method="GET">
                                    <input type="search" name="search" id="search" class="form-control" placeholder="Search by food name or Id . . .">
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="col-lg-12 col-md-6">
                    <div class="row g-3">
                        @if($data)
                        @foreach($data as $key => $val)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4 allData">
                            <div class="card h-100 shadow-sm">
                                <a href="{{url('/edit-product/'.$val->id)}}"><img src="{{ asset('/img/food/' . $val->image) }}" class="card-img-top" alt="image not found" style="max-height: 250px;"></a>
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title"><a href="{{url('/edit-product/'.$val->id)}}">{{strlen($val->name) > 22 ? substr($val->name, 0, 22).'...' : $val->name}} - ৳{{ $val->price }}/-</a></h4>
                                    <p>{{ strlen($val->ingredients) > 40 ? substr($val->ingredients, 0, 40) . '...' : $val->ingredients }}</p>
                                    <p>{{ strlen($val->description) > 40 ? substr($val->description, 0, 40) . '...' : $val->description }}</p>
                                    <a href="{{url('/add-to-cart/'.$val->id)}}" class="mt-auto btn btn-outline-success w-100">
                                        <i class="mdi mdi-cart-plus fa-lg" aria-hidden="true" style="font-size: 1rem;"></i>
                                        <span style="font-size: 1rem;" class="mb-0">Add Cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="row resultData" id="content">
                            {{ $data->links()}}
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
                $('.resultData').shhideow();
            }
            $.ajax({
                type:'get',
                url: '{{URL::to('search')}}',
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
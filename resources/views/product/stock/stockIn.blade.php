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

 <style>
    .drop-zone {
        border: 2px dashed #6c757d;
        padding: 30px;
        text-align: center;
        color: #6c757d;
        cursor: pointer;
        border-radius: 8px;
        transition: background-color 0.2s;
    }

    .drop-zone.dragover {
        background-color: #e9ecef;
    }

    .preview-img {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }

    .table td img {
        object-fit: cover;
        border-radius: 6px;
    }

    .loader {
        width: 48px;
        height: 48px;
        border: 5px solid #000;
        border-bottom-color: transparent;
        border-radius: 50%;
        display: inline-block;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    } 
</style>

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
                                <li class="breadcrumb-item" aria-current="page">Stock</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            <div class="container mt-4">
                <h4 class="mb-3">Bakery Product List</h4>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card mt-2">
                        <input type="search" name="search" id="search" class="form-control" placeholder="Search by food name or Id or scan product ber code . . .">
                    </div>
                </div> 
                <div class="table-responsive">
                    <table class="table table-bordered table-striped ">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Price (৳)</th>
                                <th>Stock</th>
                                <th>Size</th>
                                <th class="text-center" colspan="2">Availability</th>
                            </tr>
                        </thead>
                        <tbody class="resultData" id="content" style="display:none;"></tbody>

                        <tbody class="allData">
                            @foreach($products as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if($val->image)
                                        <a href="{{ url('/edit-product/'.$val->id) }}">
                                            <img src="{{ asset('img/food/' . $val->image) }}" alt="Product Image" style="height: 60px; border-radius: 6px;">
                                        </a>
                                    @else
                                        <a href="{{ url('/edit-product/'.$val->id) }}">
                                            <span class="text-muted">No Image</span>
                                        </a>
                                    @endif
                                </td>
                                <td><a href="{{ url('/edit-product/'.$val->id) }}">{{ $val->name }}</a></td>
                                <td>{{ $val->category->name ?? 'N/A' }}</td>
                                <td>{{ $val->subcategory->name ?? 'N/A' }}</td>
                                <td>৳{{ $val->price }}/-</td>
                                <td>{{ $val->stock }}</td>
                                <td>{{ $val->size ?? '-' }}</td>
                                <td class="text-center">
                                    @if($val->availability)
                                        <span class="badge bg-success">Available</span>
                                    @else
                                        <span class="badge bg-danger">Not Available</span>
                                    @endif                                    
                                </td>
                                <td class="text-center" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $val->id }}">
                                    <span class="badge bg-primary"><i class="fa-solid fa-circle-plus"></i></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <div class="d-flex justify-content-end mt-3">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div> 

 

<!-- Modal -->
@foreach($products as $key => $val)
<div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/stock-in/'.$val->id)}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><a href="{{url('/edit-product/'.$val->id)}}">{{ $val->name }}</a></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="date" class="form-label">Expired Date:</label>
                        <input type="date" id="date" name="dtpDate" class="form-control" value="{{ $val->expired }}" required>
                    </div>
                    <div class="col-md-12">
                        <label for="Stock" class="form-label">Stock Qty:</label>
                        <input type="number" id="Stock" name="txtStock" class="form-control" min="0" placeholder="Enter stock qty" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
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
                url: '{{URL::to('search/product/stock')}}',
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
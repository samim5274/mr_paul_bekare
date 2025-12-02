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
    <link rel="stylesheet" href="./assets/fonts/tabler-icons.min.css" >
    <link rel="stylesheet" href="./assets/fonts/feather.css" >
    <link rel="stylesheet" href="./assets/fonts/fontawesome.css" >
    <link rel="stylesheet" href="./assets/fonts/material.css" >
    <link rel="stylesheet" href="./assets/css/style.css" id="main-style-link" >
    <link rel="stylesheet" href="./assets/css/style-preset.css" >
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        .icon{
            width:48px; height:48px; font-size:24px; box-shadow: 0 2px 6px rgba(13, 110, 253, 0.4);
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
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Bercode</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="container mt-4">
                <h4 class="mb-3">Ber-code Details</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <!-- <th>Image</th> -->
                                <th class="text-start">Name</th>
                                <th>SKU</th>
                                <th>Stock</th>
                                <th>Size</th>
                                <th>Manufactured</th>
                                <th>Expired</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <!-- <td>
                                    @if($val->image)
                                        <a href="{{url('/generate/bercode/'.$val->id)}}"><img src="{{ asset('img/food/' . $val->image) }}" alt="Product Image" style="height: 60px; border-radius: 6px;"></a>
                                    @else
                                        <a href="{{url('/generate/bercode/'.$val->id)}}"><span class="text-muted">No Image</span></a>
                                    @endif
                                </td> -->
                                <td class="text-start"><a href="{{url('/generate/bercode/'.$val->id)}}">{{ $val->name }}</a></td>
                                <td>{{ $val->sku }}</td>
                                <td>{{ $val->stock }}</td>
                                <td>{{ $val->size ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($val->manufactured)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($val->expired)->format('d M Y') }}</td>
                                <td class="text-center">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->id}}">
                                        <i class="fa-solid fa-print me-2"></i>
                                    </a>
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
    </div> 


    @foreach($products as $key => $val)
    <div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$val->id}}" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 shadow">

                <!-- Modal Header -->
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title text-white" id="exampleModalLabel{{$val->id}}">
                        <i class="fa fa-box-open me-2"></i> {{ $val->name }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Form -->
                <form action="{{ url('/print-bercode/'.$val->id) }}" method="POST" enctype="multipart/form-data" target="_blank">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="PrintQty{{$val->id}}" class="form-label fw-semibold">Print Quantity</label>
                            <small class="text-muted">Available Stock: {{ $val->stock }}</small>
                            <input type="number" min="1" max="{{ $val->stock }}" value="{{ $val->stock }}" name="txtPrintQty" id="PrintQty{{$val->id}}" class="form-control" required>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times me-1"></i> Cancel </button>
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-print me-1"></i> Print </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endforeach


    

    @include('layouts.footer')
    
    <script src="./assets/js/plugins/popper.min.js"></script>
    <script src="./assets/js/plugins/simplebar.min.js"></script>
    <script src="./assets/js/plugins/bootstrap.min.js"></script>
    <script src="./assets/js/fonts/custom-font.js"></script>
    <script src="./assets/js/pcoded.js"></script>
    <script src="./assets/js/plugins/feather.min.js"></script>

</body>
</html>
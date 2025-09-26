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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content border-0 shadow">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">
                <i class="fa fa-box-open me-2"></i> Add New Product
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="productForm" action="{{ url('/add-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                <div class="row g-4">
                    <!-- Product Name -->
                    <div class="col-md-6">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" name="txtProductName" id="productName" class="form-control" required>
                    </div>

                    <!-- Price -->
                    <div class="col-md-6">
                    <label for="price" class="form-label">Price (৳)</label>
                    <input type="number" name="txtPrice" id="price" class="form-control" required step="0.01" min="0">
                    </div>

                    <!-- Category -->
                    <div class="col-md-6">
                    <label for="category" class="form-label">Category</label>
                    <select name="cbxCategory" id="category" class="form-select" required>
                        <option disabled selected>-- Select Category --</option>
                        @foreach($category as $val)
                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <span class="loader" id="loader"></span>
                    <!-- Sub-Category -->
                    <div class="col-md-6">
                    <label for="subCategory" class="form-label">Sub-Category</label>
                    <select name="cbxSubCategory" id="subCategory" class="form-select" required>
                        <option disabled selected>-- Select Sub-Category --</option>
                    </select>
                    </div>

                    <!-- Stock -->
                    <div class="col-md-6">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="txtStock" id="stock" class="form-control" required>
                    </div>

                    <!-- Weight/Size -->
                    <div class="col-md-6">
                    <label for="ws" class="form-label">Weight/Size</label>
                    <input type="text" name="txtWeightSize" id="ws" class="form-control" required>
                    </div>

                    <!-- Dates -->
                    <div class="col-md-6">
                    <label for="Manufacturing-Date" class="form-label">Manufacturing Date</label>
                    <input type="date" name="dtpManuDate" id="Manufacturing-Date" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                    <label for="Expiry-Date" class="form-label">Expiry Date</label>
                    <input type="date" name="dtpExpireDate" id="Expiry-Date" class="form-control" required>
                    </div>

                    <!-- Ingredients -->
                    <div class="col-md-6">
                    <label for="ingredients" class="form-label">Ingredients</label>
                    <textarea name="txtIngredient" id="ingredients" rows="3" class="form-control"></textarea>
                    </div>

                    <!-- Description -->
                    <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="txtDescription" id="description" rows="3" class="form-control"></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="col-md-12">
                    <label class="form-label">Upload Product Image</label>
                    <div class="border rounded p-3 text-center bg-light" id="dropZone" style="cursor: pointer;">
                        Click or drag & drop image here
                        <input type="file" id="imageInput" name="fileImage" accept="image/*" hidden>
                    </div>
                    <div class="mt-2">
                        <img id="previewImage" src="#" class="img-thumbnail d-none" width="120" />
                    </div>
                    </div>

                    <!-- Availability -->
                    <div class="col-md-6 mt-3">
                    <label class="form-label">Availability</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="availability" name="availability" value="1">
                        <label class="form-check-label" for="availability">Available</label>
                    </div>
                    <input type="hidden" name="availability_hidden" id="availability_hidden" value="0">
                    </div>
                </div>
                </div>

                <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fa fa-times me-1"></i> Cancel
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus-circle me-1"></i> Add Product
                </button>
                </div>
            </form>
            </div>
        </div>
    </div>


    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/product-view')}}">Product</a></li>
                                <li class="breadcrumb-item" aria-current="page">Product</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>                
            @include('layouts.message')
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Product Details</h4>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-circle-plus me-2"></i> Add
                        </a>
                    </div>
                </div>
                <!-- <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Add New Product</h4>
                    </div>
                    <div class="card-body">
                        <form id="productForm" action="{{url('/add-product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" id="productName" name="txtProductName" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price (৳)</label>
                                    <input type="number" id="price" name="txtPrice" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="category" class="form-label">Category</label>
                                    <select id="category" name="cbxCategory" class="form-select" required>
                                        <option disabled selected>--Select Category--</option>
                                        @foreach($category as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <span class="loader" id="loader"></span>

                                <div class="col-md-6">
                                    <label for="subCategory" class="form-label">Sub-Category</label>
                                    <select id="subCategory" name="cbxSubCategory" class="form-select" required>
                                        <option disabled selected>--Select Sub-Category--</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="stock" class="form-label">stock</label>
                                    <input type="number" id="stock" name="txtStock" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="ws" class="form-label">Weight/Size</label>
                                    <input type="text" id="ws" name="txtWeightSize" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="Manufacturing-Date" class="form-label">Manufacturing Date</label>
                                    <input type="date" id="Manufacturing-Date" name="dtpManuDate" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="Expiry-Date" class="form-label">Expiry Date</label>
                                    <input type="date" id="Expiry-Date" name="dtpExpireDate" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="ingredients" class="form-label">Ingredients</label>
                                    <textarea id="ingredients" rows="3" name="txtIngredient" class="form-control"></textarea>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" rows="3" name="txtDescription" class="form-control"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Upload Product Image</label>
                                    <div id="dropZone" class="drop-zone">
                                        Drag & Drop Image Here or Click to Browse
                                        <input type="file" id="imageInput" name="fileImage" accept="image/*" hidden>
                                    </div>
                                    <img id="previewImage" class="preview-img d-none" />
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label d-block">Availability</label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="availability" name="availability" value="1">
                                        <label class="form-check-label" for="availability">Available</label>
                                    </div>
                                    <input type="hidden" name="availability_hidden" id="availability_hidden" value="0">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-success w-100">
                                        <i class="fa-solid fa-circle-plus me-2"></i> Add Product
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="container mt-4">
                <!-- <h4 class="mb-3">Bakery Product List</h4> -->

                <div class="table-responsive">
                    <table class="table table-bordered table-striped ">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Price (৳)</th>
                                <th>Stock</th>
                                <th>Size</th>
                                <th>Availability</th>
                                <th>Manufactured</th>
                                <th>Expired</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if($val->image)
                                        <a href="{{url('/edit-product/'.$val->id)}}"><img src="{{ asset('img/food/' . $val->image) }}" alt="Product Image" style="height: 60px; border-radius: 6px;"></a>
                                    @else
                                        <a href="{{url('/edit-product/'.$val->id)}}"><span class="text-muted">No Image</span></a>
                                    @endif
                                </td>
                                <td><a href="{{url('/edit-product/'.$val->id)}}">{{ $val->name }}</a></td>
                                <td>{{ $val->category->name ?? 'N/A' }}</td>
                                <td>{{ $val->subcategory->name ?? 'N/A' }}</td>
                                <td>৳{{ $val->price }}/-</td>
                                <td>{{ $val->stock }}</td>
                                <td>{{ $val->size ?? '-' }}</td>
                                <td>
                                    @if($val->availability)
                                        <span class="badge bg-success">Available</span>
                                    @else
                                        <span class="badge bg-danger">Not Available</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($val->manufactured)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($val->expired)->format('d M Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <div class="d-flex justify-content-end mt-3">
                        {{ $product->links() }}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('/js/main.js')}}"></script>

</body>
</html>
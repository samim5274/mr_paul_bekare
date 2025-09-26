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
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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
                                <li class="breadcrumb-item"><a href="{{url('/expenses-view')}}">Expenses</a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit expenses</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            @if($expenses)
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Edit Expenses</h4>                    
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('/update-expenses/'.$expenses->id)}}" method="GET">
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="cbxCategory" id="category" required class="form-control">
                                        <option disabled selected>-- Select Category --</option>
                                        @if($category)
                                            @foreach($category as $key => $val)
                                                <option value="{{ $val->id }}" {{ $val->id == $expenses->catId ? 'selected' : '' }}>
                                                    {{ $val->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <span class="loader" id="loader"></span>
                            <div class="form-group row">
                                <label for="subcategory" class="col-sm-3 col-form-label">Sub-Category</label>
                                <div class="col-sm-9">
                                    <select name="cbxsubcategory" id="subcategory" required class="form-control">
                                        <option disabled selected>-- Select Sub-Category --</option>   
                                        @if($category)
                                            @foreach($subcategory as $key => $val)
                                                <option value="{{ $val->id }}" {{ $val->id == $expenses->subcatId ? 'selected' : '' }}>
                                                    {{ $val->name }}
                                                </option>
                                            @endforeach
                                        @endif                                                 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Amount" class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="Amount" name="txtAmount" value="{{$expenses->amount}}" required placeholder="Amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Remark" class="col-sm-3 col-form-label">Remark</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="Remark" name="txtRemark" value="{{$expenses->remark}}" required placeholder="Remark">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
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
    <script>
        $(document).ready(function(){
            var loader = $('#loader');  // Correct selector with $
            var category = $('#category');

            loader.hide();

            category.change(function(){
                var categoryId = $(this).val();
                console.log("Selected Category ID:", categoryId);

                if(!categoryId) {
                    $("#subcategory").html("<option disabled selected>-- Select Sub-Category --</option>");
                } else {
                    loader.show();

                    $.ajax({
                        url: "/getSubCategory/" + categoryId,
                        type: "GET",
                        success: function(data){
                            var subCategory = data.subCategory;
                            var html = "<option disabled selected>-- Select Sub Category --</option>";

                            for(let i = 0; i < subCategory.length; i++){
                                html += `<option value="${subCategory[i].id}">${subCategory[i].name}</option>`;
                            }

                            $("#subcategory").html(html);
                            loader.hide();
                        },
                        error: function(){
                            alert('Failed to fetch subcategories.');
                            loader.hide();
                        }
                    });
                }
            });
        });
    </script>

</body>
</html>
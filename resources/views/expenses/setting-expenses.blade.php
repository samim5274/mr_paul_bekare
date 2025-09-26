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
                                <li class="breadcrumb-item"><a href="{{url('/expenses-view')}}">Expenses</a></li>
                                <li class="breadcrumb-item" aria-current="page">Setting</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.message')
            
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0">Expenses Setting</h4>
                    <div class="d-flex gap-2">
                        <a href="{{url('/expenses-setting')}}" class="btn btn-primary">
                            <i class="fa-solid fa-sliders"></i>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive col-lg-6 col-md-12">
                        <table class="table table-bordered table-striped ">
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th colspan="2">Expenses Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $cat)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td class="text-center text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$cat->id}}"><i class="fa-solid fa-edit"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            <div class="d-flex justify-content-end mt-3">
                                {{$category->links()}}
                            </div>
                        </div>
                    </div> 
                    <div class="table-responsive col-lg-6 col-md-12">
                        <table class="table table-bordered table-striped ">
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Expenses Category</th>
                                    <th colspan="2">Expenses Sub-Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subCategory as $val)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$val->category->name}}</td>
                                    <td>{{$val->name}}</td>
                                    <td class="text-center text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$val->name}}"><i class="fa-solid fa-edit"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            <div class="d-flex justify-content-end mt-3">
                                {{$subCategory->links()}}
                            </div>
                        </div>
                    </div> 
                </div>                           
            </div>
        </div>
    </div> 

<!-- Modal -->
@foreach($category as $Cat)
<div class="modal fade" id="exampleModal{{$Cat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('/edit-expenses-category/'.$cat->id)}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group row">
                        <label for="Category" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Category" name="txtCategory" value="{{$Cat->name}}" required placeholder="Category">
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

@foreach($subCategory as $val)
<div class="modal fade" id="exampleModal{{$val->name}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('/edit-expenses-category/'.$val->id)}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sub-Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <select name="cbxCategory" id="category" required class="form-control">
                                <option disabled selected>-- Select Category --</option>
                                @foreach($category as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == $val->cat_id ? 'selected' : '' }}>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subcategory" class="col-sm-3 col-form-label">Sub-Category</label>
                        <div class="col-sm-9">
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="subcategory" name="txtsubcategory" value="{{$val->name}}" required placeholder="subcategory">
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
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
</body>
</html>
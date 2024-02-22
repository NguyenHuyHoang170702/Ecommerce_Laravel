<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        /* Đảm bảo tất cả các văn bản hiển thị đều là màu trắng */
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        label,
        input,
        textarea,
        select,
        option,
        button {
            color: #fff; /* Màu trắng */
        }

        /* Ghi đè lên màu văn bản mặc định của trình duyệt cho input */
        input[type="text"],
        input[type="password"],
        input[type="email"],
        textarea,
        select {
            color: #fff !important; /* Màu trắng */
        }
    </style>
    <style>
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="container-scroller">

    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.header')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="p-3">
                <div class="card shadow border-0 mt-4 p-3">
                    <div class="card-header bg-primary bg-gradient ml-0 py-3">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h2 class="text-white py-2">Add Product</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-10">
                            <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="p-3 border border-primary">
                                    {{--                                    <input for="Product.Product_Id" type="hidden" />--}}

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select name="category" class="form-control text-blue-50">
                                            <option disabled selected>---Choose Category---</option>
                                            @foreach($category as $c)
                                                <option value="{{$c->category_name}}" class="text-amber-50">{{$c->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Images</label>
                                        <input type="file" name="image" class="form-control" multiple>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" name="quantity" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" name="price" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="discount_price" class="form-label">Discount Price</label>
                                        <input type="text" name="discount_price" class="form-control">
                                    </div>


                                    <button type="submit" class="btn btn-primary me-2">Add Product</button>
                                    <a class="btn btn-secondary">Back to List</a>
                                </div>
                            </form>
                        </div>
                        {{--                        <div class="col-2">--}}
                        {{--                            @if (Model.Product.ProductImages != null)--}}
                        {{--                                {--}}
                        {{--                                foreach (var image in Model.Product.ProductImages)--}}
                        {{--                                {--}}
                        {{--                                <div class="border p-1 m-2  text-center">--}}
                        {{--                                    <img style="width: 100%; height: 210px;border-radius: 10px; border: 1px solid #bbb9b9;"--}}
                        {{--                                         alt="Product Image" src="@image.ImgUrl">--}}
                        {{--                                    <a action="DeleteImage" class="btn btn-danger" route-ImageId="@image.Id">--}}
                        {{--                                        <i class="bi bi-trash-fill"></i> Delete--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                                }--}}
                        {{--                                }--}}
                        {{--                        </div>--}}

                    </div>

                </div>
            </div>
        </div>
    </div

<?php
?>

<?php
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
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
                                <h2 class="text-white py-2">Update Product</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-10">
                            <form action="{{ url('/updateProductConfirm',$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="p-3 border border-primary">
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control">{{ $data->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select name="category" class="form-control text-blue-50">
                                            <option name="category" value="{{ $data->category}}" selected class="text-amber-50">{{ $data->category}}</option>
                                            @foreach($category as $c)
                                                <option name="category" value="{{ $c->category_name }}" class="text-amber-50">{{ $c->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Images</label>
                                        <input type="file" name="image" class="form-control" multiple>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" name="quantity" class="form-control" value="{{ $data->quantity }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" name="price" class="form-control" value="{{ $data->price }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="discount_price" class="form-label">Discount Price</label>
                                        <input type="text" name="discount_price" class="form-control" value="{{ $data->discount_price }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Update Product</button>
                                    <a href="{{ url('/show_product') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-2">
                            <div class="border p-1 m-2 text-center">
                                <img style="width: 100%; height: 210px; border-radius: 10px; border: 1px solid #bbb9b9;" alt="Product Image" src="{{ asset('product/' . $data->image) }}">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- plugins:js -->
@include('admin.script')
<!-- End custom js for this page -->

</body>
</html>


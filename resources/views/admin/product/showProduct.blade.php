<?php
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.css')
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


            {{--            show category--}}
            <div class="card shadow border-0 mt-4 p-3">
                <div class="card-header bg-primary bg-gradient ml-0 py-3">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="text-white py-2">Product List</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4 ">

                </div>
                <table class="table">
                    <thead class="table-primary">
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->title}}</td>
                            <td>
                                @foreach($categories as $category)
                                    @if($category->id == $item->category)
                                        {{$category->category_name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->discount_price}}</td>
                            <td>
                                <img src="product/{{$item->image}}" style="width: 100px; height: 100px">
                            </td>
                            <td>
                                <a href="{{url('edit_product',$item->id)}}" class="btn btn-success">
                                    <i class="bi bi-pencil-square" style="height:30px; cursor:pointer"></i>  Edit
                                </a>
                                &nbsp;
                                <a href="{{url('delete_product',$item->id)}}" class="btn btn-danger">
                                    <i class="bi bi-trash" style="height:30px; cursor:pointer"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach


                    {!!$data->withQueryString()->links('pagination::bootstrap-5')!!}
                    </tbody>
                </table>
                {{--            end show--}}
            </div>
        </div>
        <!-- container-scroller -->
    </div>
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</div>

</body>
</html>



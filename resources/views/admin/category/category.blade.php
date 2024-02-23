<!DOCTYPE html>
<html lang="en">
<head>
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
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>
                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Write category name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </form>
                </div>
            </div>

{{--            show category--}}
                <div class="card shadow border-0 mt-4 p-3">
                    <div class="card-header bg-primary bg-gradient ml-0 py-3">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h2 class="text-white py-2">Category List</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 ">

                    </div>
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">Category ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Create Date Time</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data)

                            <tr>
                                <th scope="row">{{$data->id}}</th>
                                <td>{{$data->category_name}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>
                                    <a href="{{url('edit_category',$data->id)}}"
                                       class="btn btn-success"><i class="bi bi-pencil-square" style="height:30px; cursor:pointer"></i>  Edit</a>
                                    &nbsp;
                                    <a href="{{url('delete_category',$data->id)}}"
                                       class="btn btn-primary"><i class="bi bi-trash" style="height:30px; cursor:pointer"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
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

</body>
</html>

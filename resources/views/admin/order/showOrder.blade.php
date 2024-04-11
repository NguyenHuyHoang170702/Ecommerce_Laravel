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

            {{--            show category--}}
            <div class="card shadow border-0 mt-4 p-3">
                <div class="card-header bg-primary bg-gradient ml-0 py-3">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="text-white py-2">Order List</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4 ">

                </div>
                <table class="table">
                    <thead class="table-primary">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Delivery Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                <a  href="{{url('Paid',$order->id)}}" class="btn btn-primary">Paid</a> &nbsp;
                                <a href="{{url('UnPaid',$order->id)}}"  class="btn btn-primary">Un Paid</a>&nbsp;
                                <a  href="{{url('Shipping',$order->id)}}" class="btn btn-primary">Shipping</a>
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

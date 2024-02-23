<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hexashop Ecommerce HTML CSS Template</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/templatemo-hexashop.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/lightbox.css') }}">
</head>
<body>
<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->
@include('home.header')
<!-- ***** Header Area End ***** -->
<div style="padding-top: 10px; margin-top: 50px">
    <form method="post" style="padding: 50px">
        <br>
        <div class="card shadow border-8">
            <div class="card-header bg-secondary bg-gradient text-light ml-0 py-4">
                <div class="row px-4">
                    <div class="col-6">
                        <h5 class="pt-2 text-white">Shopping Cart</h5>
                    </div>
                </div>
            </div>
            <div class="card-body my-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                    </div>
                @endif
                <div class="row mb-3 pb-3">
                    <div class="col-md-2 offset-md-1">
                        <a href="{{ url('/') }}" class="btn btn-outline-primary text-uppercase mb-5 btn-sm"><small>Continue Shopping</small></a>
                    </div>
                    @foreach ($cart as $item)
                        <div class="col-md-10 offset-md-1">
                            <div class="row border-bottom pb-3">
                                <div class="d-none d-lg-block col-lg-1 text-center py-2">
                                    <img src="/product/{{$item['image']}}" class="card-img-top rounded w-100" alt="Product Image">
                                </div>

                                <div class="col-12 col-lg-10 text-center row my-3">
                                    <div class="col-3 text-md-right pt-2 pt-md-4">
                                        <h6 class="fw-semibold">{{ $item['price'] }}<span class="text-muted">&nbsp;x&nbsp;</span>{{ $item['quantity'] }}</h6>
                                    </div>
                                    <div class="col-6 col-sm-4 col-lg-6 pt-2">
                                        <div class="w-75 btn-group" role="group">
                                            <a href="{{ url('plus/'.$item['id']) }}" class="btn btn-outline-primary bg-gradient py-2"><i class="fa fa-plus"></i></a>&nbsp;
                                            <a href="{{ url('minus/'.$item['id']) }}" class="btn btn-outline-primary bg-gradient py-2"><i class="fa fa-minus"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-3 col-sm-4 col-lg-2 offset-lg-1 text-right pt-2">
                                        <a href="{{ url('delete/'.$item['id']) }}" class="btn btn-danger bg-gradient py-2"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer bg-white border-0">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <ul class="list-group mb-4">
                                <li class="d-flex justify-content-between align-items-center">
                                    <h5 class="text-dark fw-semibold text-uppercase"> Total (USD)</h5>
                                    <h4 class="text-dark fw-bolder">{{ $totalPrice }}</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 offset-md-5">
                            <a href="{{ url('shopping_cart/summary') }}" class="btn btn-primary border-0 bg-gradient w-100 py-2">Summary</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@include('home.footer')
<!-- ***** Footer End ***** -->
</body>
</html>

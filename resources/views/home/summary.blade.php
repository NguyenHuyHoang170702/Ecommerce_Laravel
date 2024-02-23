<?php
use Carbon\Carbon;

?>
    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop Ecommerce HTML CSS Template</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/templatemo-hexashop.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/lightbox.css')}}">
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
    <form method="post" style="padding: 10px">
        <br />
        <div class="container">
            <div class="card shadow border-0">

                <div class="card-header bg-secondary bg-gradient text-light ml-0 py-4">
                    <div class="row px-4">
                        <div class="col-6">
                            <h5 class="pt-2 text-white">
                                Order Summary
                            </h5>
                        </div>
                        <div class="col-6 text-end">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container rounded p-2">
                        <div class="row">
                            <div class="col-12 col-lg-6 pb-4">
                                <div class="row">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-info">Shipping Details:</span>
                                    </h4>
                                </div>
                                <div class="row my-1">
                                    <div class="col-3">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control" type="text" data-val="true" name="name" value="{{ $user->name ?? '' }}"/>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-3">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control" type="email" data-val="true" name="email" value="{{ $user->email ?? '' }}"/>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-3">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control" type="text" name="phonenumber" value="{{ $user->phonenumber ?? '' }}"/>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-3">
                                        <label>Street Address</label>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control" type="text" name="address" value="{{ $user->address ?? '' }}"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-lg-5 offset-lg-1">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-info">Order Summary:</span>
                                </h4>
                                <ul class="list-group mb-3">
                                    @foreach ($cart as $item)
                                        <li class="list-group-item d-flex justify-content-between">
                                            <div>
                                                <h6 class="my-0">{{ $item['title'] }}</h6>
                                                <small class="text-muted">Quantity: {{ $item['quantity'] }}</small>
                                            </div>
                                            <span class="text-muted">{{ $item['price'] }}</span>
                                        </li>
                                    @endforeach

                                        <li class="list-group-item d-flex justify-content-between bg-light">
                                            <small class="text-info">Total (USD)</small>
                                            <strong class="text-info">{{ $totalPrice }}</strong>
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 col-md-8 pt-2">
                            <p style="color:maroon; font-size:14px;">
                                Estimate Arrival Date:
                                {{ Carbon::now()->addDays(7)->format('d/m/Y') }} - {{ Carbon::now()->addDays(14)->format('d/m/Y') }}
                            </p>

                            <a class="btn btn-danger btn-sm" href="{{url('show_shopping_cart')}}">Back to Cart</a>
                        </div>
                        <div class="col-12 col-md-4">
                            <button type="submit" class="btn btn-primary form-control">Cash On Delivery</button>
                            <button type="submit" class="btn btn-success form-control mt-1">Pay Using Card</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<!-- ***** Footer Start ***** -->
@include('home.footer')
<!-- ***** Footer End ***** -->

</body>
</html>


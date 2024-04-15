<?php
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
    <form action="{{url('add_shoppingCart',$data->id)}}" method="post" style="padding: 50px">
        @csrf
        <div class="card shadow border-8 mt-4">
            <div class="card-header bg-secondary bg-gradient text-light py-4">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3 class="text-white text-uppercase">{{$data->title}}</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="py-3">
                    <div class="row">
                        <div class="col-6 col-md-2 offset-lg-1 pb-1">
                            <a href="{{url('/')}}" class="btn btn-outline-primary bg-gradient mb-5 fw-semibold btn-sm text-uppercase">
                                <small>Back to home</small>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-3 offset-lg-1 text-center mb-3">
                            <img width="200" height="280" src="/product/{{$data->image}}" class="card-img-top rounded">
                        </div>
                        <div class="col-12 col-lg-6 offset-lg-1">
                            <div class="row text-center ps-2">
                                <div class="p-1 col-3 col-lg-2 bg-white border-bottom">
                                    <div style="text-decoration-line: line-through" class="text-dark text-opacity-50 fw-semibold">Price</div>
                                </div>
                                <div class="p-1 col-3 col-lg-2 bg-white border-bottom">
                                    <div style="text-decoration-line: line-through" class="text-dark text-opacity-50 fw-semibold">{{$data->price}}$</div>
                                </div>
                            </div>
                            <div class="row text-center ps-2">
                                <div class="p-1 col-3 col-lg-2 bg-white text-warning fw-bold">Discount Price</div>
                                <div class="p-1 col-3 col-lg-2 bg-white text-warning fw-bold">{{$data->discount_price}}$</div>

                            </div>
                            <div class="row pl-2 my-3">
                                <p class="text-secondary lh-sm">{{$data->description}}</p>
                            </div>
                            <div class="row pl-2 mb-3">
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
									<span class="input-group-text bg-primary text-white border-0" id="inputGroup-sizing-default">
										Count
									</span>
                                        <input for="Count"  name="count" type="number" value="1" class="form-control text-end" aria-label="Sizing example input" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 pb-1">
                                    <button type="submit" class="btn btn-primary bg-gradient w-100 py-2 text-uppercase">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
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


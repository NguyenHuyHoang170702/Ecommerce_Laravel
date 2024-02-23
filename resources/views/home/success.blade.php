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

<div class="justify-content-center" style="padding-top: 10px; margin-top: 50px">
    <div class="container row pt-4" style="padding: 10px">
        <div class="col-12 text-center">
            <h1 class="text-primary text-center">Order Placed Successfully!</h1>
            <img src="https://haenglish.edu.vn/wp-content/uploads/2023/08/download.jpg" width="65%" />
        </div>
        <div class="col-12 text-center" style="color: maroon">
            <br />
           Your order has been placed successfully! <br />
        </div>
    </div>
</div>



<!-- ***** Footer Start ***** -->
@include('home.footer')
<!-- ***** Footer End ***** -->

</body>
</html>

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


<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Product For Men</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">

                        @if($productsForMen->isNotEmpty())
                            @foreach($productsForMen as $product)
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="{{ url('detail', $product->id) }}"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <img src="product/{{ $product->image }}" alt="" style="width: 340px; height: 400px;">
                                    </div>
                                    <div class="down-content">
                                        <h4>{{ $product->title }}</h4>
                                        <span style="text-decoration: line-through;">{{ $product->price }}VND</span>
                                        <span>{{ $product->discount_price }}VND</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Không có sản phẩm nào cho nam giới.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('home.footer')
<!-- ***** Footer End ***** -->
</body>
</html>

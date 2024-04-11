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
    <div style="padding: 50px">
        <div class="card shadow border-0 mt-4 p-3">
            <div class="card-header bg-primary bg-gradient ml-0 py-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="text-white py-2">Order Details</h2>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 ">

            </div>
            <table class="table">
                <thead class="table-primary">
                <tr>
                    <th scope="col">Product Title</th>
                    <th scope="col">Images</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orderDetails as $detail)
                    <tr>
                        <td>
                                <?php
                                $productName = \App\Models\Product::where('id', $detail->product_id)->value('title');
                                ?>
                            {{ $productName }}
                        </td>
                        <td><img src="/product/{{$detail->image}}" alt="" style="width: 100px; height: 100px"></td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--            end show--}}
        </div>
    </div>
    <!-- container-scroller -->
</div>



<!-- ***** Footer Start ***** -->
@include('home.footer')
<!-- ***** Footer End ***** -->

</body>
</html>


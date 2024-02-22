<?php
?>


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="{{URL::asset('images/logo.png')}}" />
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="submenu">
                            <a href="javascript:;">Pages</a>
                            <ul>
                                <li><a href="about.blade.php">About Us</a></li>
                                <li><a href="products.blade.php">Products</a></li>
                                <li><a href="single-product.blade.php">Single Product</a></li>
                                <li><a href="contact.blade.php">Contact Us</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:;">Features</a>
                            <ul>
                                <li><a href="#">Features Page 1</a></li>
                                <li><a href="#">Features Page 2</a></li>
                                <li><a href="#">Features Page 3</a></li>
                                <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('show_shopping_cart')}}"><i class="fa fa-shopping-cart"></i>(0)</a> </li>
                        @guest
                            <li><a class="btn btn-primary d-flex justify-content-center align-items-center" href="{{ route('login') }}">LOGIN</a></li>
                            <li><a class="btn btn-success d-flex justify-content-center align-items-center" href="{{ route('register') }}">REGISTER</a></li>
                        @else
                            <div class="btn-group" style="margin-right: 5px;">
                                <a class="btn btn-success" href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-success" type="submit" style="margin-left: 5px">Logout</button>
                                </form>
                            </div>
                        @endguest


                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

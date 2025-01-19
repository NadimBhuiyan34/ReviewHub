@props(['categories', 'electronics', 'furnitures', 'clothings', 'shops'])
<header class="header header-22">

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ route('home.index') }}" class="logo text-decoration-none">
                    <span class="d-none d-lg-block" style="font-size: 24px; font-weight: bold; font-family: 'Poppins', sans-serif; background: linear-gradient(to right, white, #2196f3); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
                        Review<span style="color: #f44336;">Hub</span>
                    </span>
                </a>
                
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-round">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q"
                                placeholder="Search product ..." required>

                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

           
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="wrap-container sticky-header">
        <div class="header-bottom">
            <div class="container">
                <div class="header-left">
                    <div class="dropdown category-dropdown" data-visible="true">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" data-display="static"
                            title="Browse Categories">
                            Browse Categories
                        </a>

                        <div class="dropdown-menu">
                            <nav class="side-nav">
                                <ul class="menu-vertical sf-arrows sf-js-enabled" style="touch-action: pan-y;">
                                    <li class="megamenu-container">
                                        <a class="sf-with-ul" href="#"><i
                                                class="icon-laptop"></i>Electronics</a>

                                        <div class="megamenu" style="display: none;">
                                            <div class="no-gutters">
                                                <div class="">
                                                    <div class="menu-col">
                                                        <div class="">
                                                            <div class="">
                                                                <div class="menu-title">All Electronics Product</div>
                                                                <!-- End .menu-title -->
                                                                <ul class="">
                                                                    @foreach ($electronics as $electronic)
                                                                        <li><a href="#">{{ $electronic->name }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>


                                                            </div><!-- End .col-md-6 -->


                                                        </div><!-- End .row -->
                                                    </div><!-- End .menu-col -->
                                                </div><!-- End .col-md-8 -->


                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu -->
                                    </li>
                                    <li class="megamenu-container">
                                        <a class="sf-with-ul" href="#"><i class="icon-laptop"></i>Furniture</a>

                                        <div class="megamenu" style="display: none;">
                                            <div class="no-gutters">
                                                <div class="">
                                                    <div class="menu-col">
                                                        <div class="">
                                                            <div class="">
                                                                <div class="menu-title">All Furniture Product</div>
                                                                <!-- End .menu-title -->
                                                                <ul class="">
                                                                    @foreach ($furnitures as $furniture)
                                                                    <li><a href="#">{{ $furniture->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                                </ul>


                                                            </div><!-- End .col-md-6 -->


                                                        </div><!-- End .row -->
                                                    </div><!-- End .menu-col -->
                                                </div><!-- End .col-md-8 -->


                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu -->
                                    </li>
                                    <li class="megamenu-container">
                                        <a class="sf-with-ul" href="#"><i class="icon-laptop"></i>Clothing</a>

                                        <div class="megamenu" style="display: none;">
                                            <div class="no-gutters">
                                                <div class="">
                                                    <div class="menu-col">
                                                        <div class="">
                                                            <div class="">
                                                                <div class="menu-title">All Clothing Product</div>
                                                                <!-- End .menu-title -->
                                                                <ul class="">
                                                                    @foreach ($clothings as $clothing)
                                                                        <li><a href="#">{{ $clothing->name }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>


                                                            </div><!-- End .col-md-6 -->


                                                        </div><!-- End .row -->
                                                    </div><!-- End .menu-col -->
                                                </div><!-- End .col-md-8 -->


                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu -->
                                    </li>

                                    @foreach ($categories as $category)
                                        <li><a href="#">{{ $category->name }}</a></li>
                                    @endforeach
                                    
                                </ul><!-- End .menu-vertical -->
                            </nav><!-- End .side-nav -->
                        </div><!-- End .dropdown-menu -->
                    </div>
                </div>
                <div class="header-center">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li>
                                <a href="{{route('home.index')}}" class="">Home</a>

                                
                            </li>
                            <li>
                                <a href="" class="sf-with-ul">Shop</a>

                                <div class="megamenu megamenu-md">
                                    <div class="row no-gutters">
                                        <div class="col-md-8">
                                            <div class="menu-col">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="menu-title">Shop</div>
                                                        <!-- End .menu-title -->
                                                        <ul>
                                                            @foreach ($shops as $shop)
                                                            <li><a href="category-list.html">{{ $shop->name }}</a></li>
                                                            @endforeach
                                                           
                                                            
                                                        </ul>

                                                         
                                                    </div><!-- End .col-md-6 -->

                                                   
                                                </div><!-- End .row -->
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-8 -->

                                        <div class="col-md-4">
                                            <div class="banner banner-overlay">
                                                <a href="category.html" class="banner banner-menu">
                                                    <img src="https://static.vecteezy.com/system/resources/previews/030/465/629/non_2x/clothing-shop-s-hangers-exhibit-modern-fashion-highlighting-the-boutique-s-stylish-ambiance-vertical-mobile-wallpaper-ai-generated-free-photo.jpg" alt="Banner">

                                                    <div class="banner-content banner-content-top">

                                                        <!-- End .banner-title -->
                                                    </div><!-- End .banner-content -->
                                                </a>
                                            </div><!-- End .banner banner-overlay -->
                                        </div><!-- End .col-md-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-md -->
                            </li>
                           
                            <li>
                                <a href="elements-list.html" class="">Products</a>

                                
                            </li>
                            <li>
                                <a href="elements-list.html" class="sf-with-ul">About Us</a>

                                
                            </li>
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .header-left -->

                {{-- <div class="header-right">
                    <div class="header-text">
                        <ul class="top-menu top-link-menu">
                            <li>
                                <ul>
                                    <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login /
                                            Registration</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- End .header-text -->
                </div><!-- End .header-right --> --}}
            </div><!-- End .container -->
        </div><!-- End .header-bottom -->
    </div><!-- End .wrap-container -->
</header><!-- End .header -->

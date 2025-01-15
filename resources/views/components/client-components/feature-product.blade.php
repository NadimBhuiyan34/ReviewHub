@props(['featured', 'seller'])
@php
    $featured = $featured->first(); // Get the first product as featured
    $otherProducts = $featured ? $seller->skip(1) : collect(); // Safely skip if $featured exists; otherwise, use an empty collection
@endphp
<div class="featured-back" style="background-image: url(assets/images/demos/demo-22/featured/background.jpg);">
    <div class="container">
        <div class="section-title">
            <ul class="nav nav-pills nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab-featured-link" data-toggle="tab" href="#tab-featured" role="tab" aria-controls="tab-featured" aria-selected="true"><span>Featured</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-best-link" data-toggle="tab" href="#tab-best" role="tab" aria-controls="tab-best" aria-selected="false"><span>Bestsellers</span></a>
                </li>
               
            </ul>

        
            <a class="link" href="#">All Featured Products</a>
        </div>

        <div class="row">
            @if ($featured)
            <div class="col-lg-4 col-md-4">
                <div class="product-lg">
                    <figure class="product-media">
                        <span class="product-label label-limited">limited time sale</span>
                        <a href="product.html">
                            <img src="{{ $featured->productDetail ? asset('storage/' . $featured->productDetail->image) : 'https://st4.depositphotos.com/2495409/19919/i/450/depositphotos_199193024-stock-photo-new-product-concept-illustration-isolated.jpg' }}" alt="Product image" class="product-image">
                        </a>

                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        {{-- <h3 class="save-price"><span>Save $64.00</span></h3> --}}
                        <h3 class="product-title"><a href="product.html">{{ $featured->name }}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="new-price">{{ $featured->productDetail->price }}</span>
                            
                        </div><!-- End .product-price -->
                        <div class="action">
                            <a href="category.html">shop now</a>
                        </div>
                    </div><!-- End .product-body -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
            </div>
            @else
            <p class="text-gray-500">No featured product available.</p>
            @endif
            <div class="col-lg-8 col-md-8">
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="tab-featured" role="tabpanel" aria-labelledby="tab-featured-link">
                        <div class="row products all">
                            @foreach ($otherProducts as $otherProduct)
                            <div class="col-lg-4 col-6">
                                <div class="product product-3 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-sale">Sale</span>
                                        <a href="product.html">
                                            <img src="{{ $otherProduct->productDetail ? asset('storage/' . $otherProduct->productDetail->image) : 'https://st4.depositphotos.com/2495409/19919/i/450/depositphotos_199193024-stock-photo-new-product-concept-illustration-isolated.jpg' }}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            {{-- <a href="#">Woodworking</a> --}}
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">{{ $otherProduct->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">{{ $otherProduct->productDetail->price }}</span>
                                            {{-- <span class="old-price">Was $40.99</span> --}}
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->

                                    <div class="product-footer">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-footer -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            @endforeach
                        </div><!-- End .row -->
                    </div><!-- .End .tab-pane -->


                    <div class="tab-pane fade" id="tab-best" role="tabpanel" aria-labelledby="tab-best-link">
                        <div class="row products">
                            @foreach ($seller as $product)
                            <div class="col-lg-4 col-6">
                                <div class="product product-3 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-sale">Sale</span>
                                        <a href="product.html">
                                            <img src="{{ $product->productDetail ? asset('storage/' . $product->productDetail->image) : 'https://st4.depositphotos.com/2495409/19919/i/450/depositphotos_199193024-stock-photo-new-product-concept-illustration-isolated.jpg' }}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            {{-- <a href="#">Woodworking</a> --}}
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">${{ $product->productDetail->price }}</span>
                                            {{-- <span class="old-price">Was $40.99</span> --}}
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->

                                    <div class="product-footer">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-footer -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            @endforeach
                            <div class="col-lg-4 col-6">
                                <div class="product product-3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-22/featured/product-4.jpg" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Power Tools</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">DEWALT Hammer Drill</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $79.00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->

                                    <div class="product-footer">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-footer -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            <div class="col-lg-4 col-6">
                                <div class="product product-3 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-22/featured/product-5.jpg" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Air Tools</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Makita XBU02PT1</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $302.20
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->

                                    <div class="product-footer">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-footer -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                       </div>
                    </div>

                  
                </div>

            </div>
            
        </div>

        <div class="mb-2"></div><!-- End .mb-6 -->
    </div><!-- End .container -->
</div>
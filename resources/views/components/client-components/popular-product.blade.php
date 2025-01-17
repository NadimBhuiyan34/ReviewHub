@props(['products'])

 

<div class="container popular">
    <hr class="mb-5">

    <div class="section-title">
        <div><p class="title"><span>Popular Products</span></p></div>
        
        <a class="link" href="#">See All Products</a>
    </div>

    <div class="row products">
        @foreach ($products as $product)
        
        <div class="col-6 col-md-4 col-lg-3 col-xl-4 col">
            <div class="product product-3 text-center">
                <figure class="product-media">
                    <span class="product-label label-sale">Sale</span>
                    
                    <a href="{{ route('allproducts.show', ['allproduct' => $product->id]) }}">
                        <img src="{{ $product->productDetail ? asset('storage/' . $product->productDetail->image) : 'https://st4.depositphotos.com/2495409/19919/i/450/depositphotos_199193024-stock-photo-new-product-concept-illustration-isolated.jpg' }}" alt="Product image" class="product-image">
                    </a>
                    
                    
                    
                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                    </div><!-- End .product-action-vertical -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="{{route('product.details')}}">{{ $product->name }}</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        <span class="new-price">{{ $product->productDetail ? $product->productDetail->price : 'নির্ধারিত দাম নেই' }}</span>

                        {{-- <span class="new-price">{{  $product->productDetail->model_no}}</span> --}}
                        <span class="new-price">{{  $product->stock}}</span>
                       
                    </div><!-- End .product-price -->
                </div><!-- End .product-body -->

                <div class="product-footer">
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div><!-- End .rating-container -->

                    <div class="product-nav product-nav-dots">
                        <a href="#" class="active" style="background: #af5f23;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #806f55;"><span class="sr-only">Color name</span></a>
                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                    </div><!-- End .product-nav -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to cart"></a>
                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"></a>
                    </div><!-- End .product-action -->
                </div><!-- End .product-footer -->
            </div><!-- End .product -->
        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
        @endforeach
        
    </div><!-- End .row -->
</div>

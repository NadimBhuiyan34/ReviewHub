<x-client-components.layout title="Product Details" :shops="$shops" :categories="$categories" :electronics="$electronics" :furnitures="$furnitures" :clothings="$clothings" >
    <x-slot:title>
        Product-Detail-ReviewHub
    </x-slot>
    @php
        $reviewNumber = $product->productReview->count();
        $reviewRating = $product->productReview->sum('rating') / $reviewNumber ;
        $positiveCount = $product->productReview->where('sentiment_type', 'positive')->count();
        $negativeCount = $product->productReview->where('sentiment_type', 'negative')->count();
       
    @endphp
    <main class="main">


        <main class="main mt-5">
         
            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="{{ $product->productDetail ? asset('storage/' . $product->productDetail->image) : 'https://st4.depositphotos.com/2495409/19919/i/450/depositphotos_199193024-stock-photo-new-product-concept-illustration-isolated.jpg' }}" data-zoom-image="assets/images/products/single/1-big.jpg" alt="product image">

                                          


                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                       
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="">
                                            
                                          
                                       
                                            <div class="stars flex">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($reviewRating))
                                                        <!-- Full Star -->
                                                        <i class="fas fa-star text-warning"></i>
                                                    @elseif ($i == ceil($reviewRating) && $reviewRating % 1 != 0)
                                                        <!-- Half Star -->
                                                        <i class="fas fa-star-half-alt text-warning"></i>
                                                    @else
                                                        <!-- Empty Star -->
                                                        <i class="far fa-star text-gray-300"></i>
                                                    @endif
                                                @endfor
                                            </div>

                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( {{$reviewNumber }} Reviews )</a>
                                      

                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        {{ $product->productDetail->price }} TK
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{{ $product->productDetail->description }} </p>
                                    </div><!-- End .product-content -->

                                    <div class="details-filter-row details-row-size">
                                        <label>Stock:</label>
                                        <p>{{ $product->stock }}</p>
 
                                    </div><!-- End .details-filter-row -->
                                    <div class="details-filter-row details-row-size">
                                        <label>Shop:</label>
                                        <p>{{ $product->shop->name}}</p>
 
                                    </div><!-- End .details-filter-row -->
                                    <div class="details-filter-row details-row-size">
                                        <label>Brand:</label>
                                        <p>{{ $product->brand->name}}</p>
 
                                    </div><!-- End .details-filter-row -->
                                    <div class="details-filter-row details-row-size">
                                        <label>Model NO:</label>
                                        <p>{{ $product->productDetail->model_no}}</p>
 
                                    </div><!-- End .details-filter-row -->

                                   
                                    <div class="product-details-action">
                                        <a href="{{ $product->productDetail->website_url }}" class="btn btn-sm btn-primary"><span>BUY NOW</span></a>

                                     
                                    </div><!-- End .product-details-action -->

                                        
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews ({{ $reviewNumber }})</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p>{{ $product->productDetail->description }} </p>
                                    
 
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                <div class="product-desc-content">
                                    <h3>Delivery & returns</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">

                               <div style="width: 100%; max-width: 100%; padding: 10px; box-sizing: border-box;">
                                    <canvas id="reviewChart"></canvas>
                                </div>
                                <h4 class="text-center">Read Review</h4>
                                <div style="max-height: 300px; overflow-y: auto;">
                                  
                                    <hr>
                                    @foreach ($product->productReview as $review)
                                        <div class="review">
                                            <div class="row no-gutters">
                                                <div class="col">
                                                    <div class="review-content">
                                                        <p>{{ $review->review }}</p>
                                                    </div><!-- End .review-content -->
                                
                                                    <div class="flex flex-row">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= floor($review->rating))
                                                                <!-- Full Star -->
                                                                <i class="fas fa-star text-warning"></i>
                                                            @elseif ($i == ceil($review->rating) && $review->rating % 1 != 0)
                                                                <!-- Half Star -->
                                                                <i class="fas fa-star-half-alt text-warning"></i>
                                                            @else
                                                                <!-- Empty Star -->
                                                                <i class="far fa-star text-gray-300"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div><!-- End .col-auto -->
                                            </div><!-- End .row -->
                                        </div><!-- End .review -->
                                    @endforeach
                                </div>

                                <div class="container mt-5">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h2 class="card-title text-center mb-4">Leave a Review</h2>
                                            <form action="{{ route('reviews.store') }}" method="POST">
                                                @csrf <!-- This generates the CSRF token input -->
                                                <!-- Review Text -->
                                                <div class="mb-3">
                                                    <label for="review" class="form-label">Your Review</label>
                                                    <textarea class="form-control" id="review" name="review" rows="4" placeholder="Write your review here..." required></textarea>
                                                </div>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            
                                                <!-- Star Rating -->
 
                                                <!-- Star Rating -->
                                                <div class="mb-3">
                                                
                                                    <select id="ratingSelect" class="form-select" name="rating" required>
                                                        <option value="" disabled selected>Choose your rating</option>
                                                        <option value="1">1 Star</option>
                                                        <option value="2">2 Stars</option>
                                                        <option value="3">3 Stars</option>
                                                        <option value="4">4 Stars</option>
                                                        <option value="5">5 Stars</option>
                                                    </select>
                                                </div>
                            
                                                <!-- Submit Button -->
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            
                               
                                
                                
                               
                              
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>

                        @foreach ($related_products as $product)
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-new">New</span>
                                <a href="{{ route('allproducts.show', $product->id) }}">
                                    <img src="{{ $product->productDetail ? asset('storage/' . $product->productDetail->image) : 'https://st4.depositphotos.com/2495409/19919/i/450/depositphotos_199193024-stock-photo-new-product-concept-illustration-isolated.jpg' }}" alt="Product image" class="product-image">
                                </a>

                              

                          
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                
                                <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    {{ $product->productDetail->price }} TK
                                </div><!-- End .product-price -->
                                {{-- <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 2 Reviews )</span>
                                </div><!-- End .rating-container --> --}}

                                
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        @endforeach
                      
                        

                       

                       
                       
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        {{-- <x-client-components.news-letter/> --}}
    </main>


     
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('reviewChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Positive Reviews', 'Negative Reviews', 'Neutral Reviews'],
            datasets: [{
                label: 'Review Counts',
                data: [{{ $positiveCount }}, {{ $negativeCount }}, {{ $reviewNumber - ($positiveCount+$negativeCount) }}],

                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)', // Light teal
                    'rgba(255, 99, 132, 0.6)', // Soft red
                    'rgba(255, 206, 86, 0.6)'   // Warm yellow
                ],

                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
               
                borderWidth: 1
            }]
        },
        options: {
            responsive: true, // Ensures the chart resizes with the container
            maintainAspectRatio: false, // Allows the chart to adjust height dynamically
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

    </script>
</x-client-components.layout>

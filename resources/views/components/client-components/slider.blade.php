@props(['sliders'])
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="intro-slider-container mt-2">
                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
                    data-owl-options='{
                        "dots": true,
                        "nav": true, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": true
                            }
                        }
                    }'>
                    @foreach ($sliders as $slider)
                        
                   
                    <div class="intro-slide banner-lg" style="background-image: url('{{ asset('storage/' . $slider->image) }}');">
                        <div class="intro">
                            <div class="title">
                                
                            </div>
                            <div class="content">
                                <h3>{{$slider->title}}</h3>
                            </div>
                            {{-- <div class="action">
                                <a href="category.html">discover now</a>
                            </div> --}}
                        </div>
                    </div><!-- End .intro-slide -->
                    @endforeach

                    
                </div><!-- End .intro-slider owl-carousel owl-simple -->

                <span class="slider-loader"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->
        </div>
        
    </div>
</div>
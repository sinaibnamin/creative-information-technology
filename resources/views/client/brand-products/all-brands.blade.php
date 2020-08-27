@extends('client.master')
@section('title')
    Creative Information Technology
@endsection
@section('home-content')

<style>
    
    .brand{
        background: #eee;
        /*border-bottom: 5px solid #fabe12;*/
        background: #eee;
        /*border-bottom: 5px solid #fabe12;*/
    }


   .brand .container-fluid{
        padding-right: 0px !important;
        padding-left: 0px !important;
    }
    
    .brand h2 {
        color: #074c9f;
        font-size: 26px;
        font-weight: 300;
        text-align: center;
        text-transform: uppercase;
        position: relative;
    }
    
    .brand h2 b {
        color: #fe0000;
    }   
    
    .brand h2::after {
    	content: "";
    	width: 100px;
    	position: absolute;
    	margin: 0 auto;
    	height: 4px;
    	background: rgba(0, 0, 0, 0.2);
    	left: 0;
    	right: 0;
    	bottom: -20px;
    }
    
</style>


    <section id="product" class="brand">
        <div class="container-fluid section-bg">
            <div class="row">
                <div class="col-md-12 m-2">
                    <h2 class="mb-4">Discover <b>Brands</b></h2>
                    <div>
                        <!-- Carousel indicators -->
                        <!--<ol class="carousel-indicators">-->
                        <!--	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
                        <!--	<li data-target="#myCarousel" data-slide-to="1"></li>-->
                        <!--	<li data-target="#myCarousel" data-slide-to="2"></li>-->
                        <!--</ol>   -->
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">

                            <div class="row text-center">

                                @foreach($brands as $brand)
                                    <div class="col-6 col-md-2 p-1">
                                        <div class="img-box bg-white m-2 p-2 image-box">
                                            <a href="{{ route('brand-product',['name'=>$brand->short]) }}" type="btn" class="text-dark no-decoration">
                                                {{--                                            <img src="assets/images/trending-1.png" class="img-responsive img-fluid p-3" alt="">--}}
                                                <img src="http://gadgetoy.com/creative/{{$brand->brand_image}}"
                                                     class="img-responsive img-fluid p-3" alt="">
                                                <h5 class="">{{$brand->brand_name}}</h5>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

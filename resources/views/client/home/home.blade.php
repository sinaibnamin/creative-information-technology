@extends('client.master')

@section('title')
    Creative Information Technology
@endsection

@section('home-content')

    @include('client.slider.slider')
    <!-- Featured Product -->

    <section id="product" class="featured category">
        <div class="container-fluid section-bg">
            <div class="row">
                <div class="col-md-12 m-2">
                    <h2>Discover <b>Categories</b></h2>
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

                                @foreach($categories as $category)
                                <div class="col-md-2 col-6 p-1">
                                    <div class="img-box bg-white m-2 p-2 image-box">
                                        <a href="{{ route('category-products',['name'=>\Illuminate\Support\Str::slug($category->short_name)]) }}" type="btn" class="text-dark no-decoration">
{{--                                            <img src="assets/images/trending-1.png" class="img-responsive img-fluid p-3" alt="">--}}
                                            <img src="{{$category->category_image}}" class="img-responsive img-fluid p-3" alt="">
                                            <h5 class="">{{$category->category_name}}</h5>
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



    <!-- products -->

    <!--  advertse area  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">

                <div class="advertise">
                    <!-- google sign in     -->
                    <div class="adv-1">
                        <img src="{{asset('/')}}assets/images/logo.png" alt="" />
                        <a>Sign up using google</a>

                    </div>
                </div>
            </div>

            <div class="col-sm-6">

                <div class="advertise">
                    <!-- google sign in     -->
                    <div class="adv-1">
                        <img src="{{asset('/')}}assets/images/logo.png" alt="" />
                        <a href="#">sign up using google</a>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <section id="product" class="featured discover-div p-5">

        <h3 class="discover-title"> Discover Zone </h3>

        <div class="container-fluid discover-container col-lg-12">
            <div class="row bg-white">



                @foreach($products as $product)
                
                <input type="hidden" value="{{$regular_price = $product->product_price}}">
                    <input type="hidden" value="{{$discount_taka = (float)$product->discount}}">
                    <input type="hidden" value="{{$discount_percent = $product->discount_percent}}">
                    <input type="hidden" value="{{$discount_price_taka = $regular_price-$discount_taka}}">
                    <input type="hidden"
                           value="{{$discount_price_percent = ($regular_price*(100-$discount_percent))/100}}">
                
                
                <div class="col-sm-12 p-3 border home-product discover-product col-lg-3">
                    @if($discount_percent!=null)
                    <span class="bg-danger rounded-right p-2 text-white">{{$discount_percent}}% OFF</span>
                     @endif

                    <div class="img-box ">
                        <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}" type="btn" class="text-dark nounderline nav-link">
                            <img src="{{$product->product_image}}" class="img-responsive img-fluid" alt="">
                        </a>
                    </div>

                    <div class="product-info">
                        <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}" type="btn" class="text-dark no-decoration">
                            <span class="text-info"> {{$product->product_name}} </span>
                        </a>

                        <div class="product-info mt-3">
                            <span class="font-weight-bold text-danger h5">৳{{$discount_price_percent}} </span>
                            @if($discount_percent!=null)
                            <span class="text-muted ml-4"> <del>৳{{$product->product_price}} </del></span>
                            @endif
                        </div>

                    </div>

                    <div class="star">
                        <span class="ion-ios-star"></span>
                        <span class="ion-ios-star"></span>
                        <span class="ion-ios-star"></span>
                        <span class="ion-ios-star-half"></span>
                        <span class="ion-ios-star-outline"></span>
                    </div>


                    <div class="font-weight-bold text-success text-right">In Stock </div>

                </div>
                @endforeach


            </div>
        </div>

    </section>


@endsection

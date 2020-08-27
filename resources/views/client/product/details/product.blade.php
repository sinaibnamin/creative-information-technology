@extends('client.master')

@section('title')
    {{$product->product_name}}
@endsection
@section('home-content')

<style>

    
    .product-det-head .drop-shadow {
        width: 38%;
        padding: 20px;
        margin: 0em auto 0em;
    }
    
    .nav-tabs .nav-link.active{
        background: #074c9f;
        color: white;
    }
    
    thead tr th:first-child,
    tbody tr td:first-child {
      width: 25%!important;
      /*min-width: 8em;*/
      /*max-width: 8em;*/
      word-break: break-all;
    }
    
    
    @media (max-width: 768px){
    .product-det-head{
        font-size: 20px;
    }
    
    .product-det-head .drop-shadow {
        width: auto;
        padding: 13px;
        margin: 0em 0em 0em;
    }
    
    .table{
        font-size: 12px;
    }
    
    thead tr th:first-child,
    tbody tr td:first-child {
      width: 39%!important;
      /*min-width: 8em;*/
      /*max-width: 8em;*/
      word-break: break-all;
    }
    
    .product-det-details{
        text-align: center;
    }
    
    .product-det-details .h5{
        font-size: 17px;
    }
    
    .product-det-det{
        font-size: 11px;
        text-align: justify;
    }
    
    .mobile-d-block .tab-pane p{
        font-size: 12px;
    }
    
    .mobile-d-block .bg-blue .h4{
        font-size: 17px;
    }
    
    .featured.product-details-img{
        background: #fff;
    }
        
    .featured.related{
        padding-left: 19px !important;
         padding-right: 3px !important;
         background: #fff;
        }

    .featured.product-tab{
        padding-left: 19px !important;
        padding-right: 3px !important;
         background: #fff;
    }
    
    .featured.product-tab .product-img-box{
        border: 1px solid #dee2e6 !important;
    }
    
    .nav-tab-mob .nav{
        font-size: 11px;
        font-weight: 600;
    }
    
    .nav-tab-mob .nav-link {
        padding: 13px 11px;
    }
    
}
        
    
    
    .btn-group.add-cart {
        position: fixed;
        bottom: -4px;
        right: 0%;
        z-index: 1000;
        display: flex;
        background: #007bff;
    }
    
    button.cart-btn.btn.btn-default.btn-block {
        font-size: 21px;
    }
    
    .cart-btn {
        background-color: #007bff;
        color: white;
        /* padding: 10px 127px; */
        border-radius: 4px;
        /* border-color: #46b8da; */
    }
    
    .add-cart span.ion-android-cart {
        font-size: 23px;
        color: white;
    }
    
</style>


    <div class="container-fluid featured product-details-img pl-3 pt-3">
        <div class="row">
      
        <div class="col-12 product-det-head bg-white text-center p-2 h3"> <h5 class="drop-shadow curled text-white"> <span> {{$product->product_name}}</span>	</h5></div>


        <div class="col-12 col-md-6 product-img-box bg-white border-right p-4">



            <!--Carousel Wrapper-->
            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" style="margin-bottom:5rem" data-ride="carousel">
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset($product->product_image)}}" alt="First slide">
                    </div>
                    @foreach($productImages as $productImage)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset($productImage->product_image)}}" alt="Second slide">
                    </div>
                    @endforeach
                    
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="d-block w-100" src="{{asset($product->product_image)}}"
                                                                                             class="img-fluid"></li>
                                                                                             @foreach($productImages as $productImage)
                    <li data-target="#carousel-thumb" data-slide-to="{{$productImage->id}}"><img class="d-block w-100" src="{{asset($productImage->product_image)}}"
                                                                             class="img-fluid"></li>
                                                                             
                    @endforeach
                </ol>
            </div>
            <!--/.Carousel Wrapper-->


        </div>






        <div class="col-12 col-md-6 product-det-details bg-white p-5">

                    <input type="hidden" value="{{$regular_price = $product->product_price}}">
                    <input type="hidden" value="{{$discount_taka = (float)$product->discount}}">
                    <input type="hidden" value="{{$discount_percent = $product->discount_percent}}">
                    <input type="hidden" value="{{$discount_price_taka = $regular_price-$discount_taka}}">
                    <input type="hidden" value="{{$discount_price_percent = ($regular_price*(100-$discount_percent))/100}}">
                    <input type="hidden" value="{{$save_taka = $regular_price-$discount_price_percent}}">


            <div class="col-12 font-weight-bold h5 text-blue mobile-d-none">{{$product->product_name}}</div>

            <div class="col-12 mt-3 mobile-d-none">
                @if($discount_percent!=null)
                <button type="button" class="btn btn-danger">{{$discount_percent}}% OFF</button>  
                <button type="button" class="btn btn-primary ml-3">Save ৳ {{$save_taka}} </button>
                @endif
            </div>
            
            <div class="row mobile-d-block desktop-d-none d-flex">
                <div class="col-12 mt-3">
                    @if($discount_percent!=null)
                    <button type="button" class="btn btn-danger">{{$discount_percent}}% OFF</button>  
                    @endif
                </div>
                <div class="col-12 mt-3">
                    @if($discount_percent!=null)
                    <button type="button" class="btn btn-primary">Save ৳ {{$save_taka}} </button>
                    @endif
                </div>
            </div>


            <div class="col-12 mt-3 product-det-det">{!! \Illuminate\Support\Str::limit($product->product_description,200) !!}</div>

            <div class="col-12 text-secondary mt-3">
                <i class="fa fa-check-square-o" aria-hidden="true"></i> 1 year waranty <br/>
                <i class="fa fa-check-square-o" aria-hidden="true"></i> Free delivery <br/>
                <i class="fa fa-check-square-o" aria-hidden="true"></i> Free delivery <br/><br/>
                
                <input type="hidden" value="{{$regular_price = $product->product_price}}">
                    <input type="hidden" value="{{$discount_taka = (float)$product->discount}}">
                    <input type="hidden" value="{{$discount_percent = $product->discount_percent}}">
                    <input type="hidden" value="{{$discount_price_taka = $regular_price-$discount_taka}}">
                    <input type="hidden"
                           value="{{$discount_price_percent = ($regular_price*(100-$discount_percent))/100}}">
                
                <span class="font-weight-bold text-danger h5">৳{{$discount_price_percent}} </span>
                            @if($discount_percent!=null)
                            <span class="text-muted ml-4"> <del>৳{{$product->product_price}} </del></span>
                            @endif
            </div>

            <!--<div class="col-12 mt-3">-->
                <div class="row mt-3">


                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" data-id="{{$product->id}}" type="button" onclick="decreaseValue(this)" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                          <i class="fa fa-minus"></i>
                                        </button>
                                    </span>
                            <!--<input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">-->
                            <input type="number" name="qty" id="qty-{{$product->id}}"
                               class="form-control input-number" value="1" min="1" max="100">
                            
                            
                            <span class="input-group-btn">
                                        <button type="button" data-id="{{$product->id}}" type="button" onclick="increaseValue(this)" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                        </div>
                    </div>
                      {{-- <input type="hidden" name="qty" id="qty-{{$product->id}}" value="1"
                                                           min="1"/> --}}
                                                           
                   <div class="col-12 col-md-5 mobile-d-none">
                        <button data-id='{{$product->id}}' id="cartbtn" type="button" onclick="addToCart(this)" class="col-12 btn details-add-btn blue"><i class="fa fa-shopping-cart" style="color:#dc3545"></i> &nbsp; Add to Cart</button>
                    </div>
                </div>
                
                    <div class="btn-group add-cart col-md-4 col-lg-2 mobile-d-block" role="group" aria-label="..." id="footerSupportedContent">
                        <button data-id="{{$product->id}}" onclick="addToCart(this)" type="button"  class="cart-btn btn btn-default btn-block">ADD TO CART &nbsp; &nbsp; <span class="ion-android-cart"><a href="{{route('show-cart')}}">{{Cart::content()->count()}}</a> </span></button>
                    </div>
                <!--</div>-->
            </div>


        </div>
    </div>
</div>
   



    <div class="container-fluid featured product-tab pl-3 p-3">
        <div class="row">


        <div class="col-12 bg-white border p-0">
            <section id="tabs">
                <div class="container">
                    <div class="row">
                        <!--spec,review,desc desktop display show,mobile hide-->
                        <div class="col-12 mobile-d-none">
                            <nav>
                                <div class="nav nav-tabs nav-fill border-grey mt-3" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link shadow-lg active" id="nav-spec-tab" data-toggle="tab" href="#nav-spec" role="tab" aria-controls="nav-spec" aria-selected="true">Specification</a>
                                    <a class="nav-item nav-link shadow-lg" id="nav-desc-tab" data-toggle="tab" href="#nav-desc" role="tab" aria-controls="nav-desc" aria-selected="false">Description</a>
                                    <a class="nav-item nav-link shadow-lg" id="nav-rev-tab" data-toggle="tab" href="#nav-rev" role="tab" aria-controls="nav-rev" aria-selected="false">Product Review</a>
                                </div>
                            </nav>
                            <div class=" tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane table table-bordered fade show active" id="nav-spec" role="tabpanel" aria-labelledby="nav-spec-tab">
                                    {!! $product->product_specification !!}
                                    <!--<table class="table table-bordered table-sm">-->
                                    <!--    <tbody>-->
                                    <!--    <tr>-->
                                    <!--        <td class="w-25">Model</td>-->
                                    <!--        <td class="w-75">RT-110</td>-->
                                    <!--    </tr>-->
                                       
                                    <!--    </tbody>-->
                                    <!--</table>-->
                                </div>
                                <div class="tab-pane fade" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                                    {!! $product->product_description !!}
                                </div>
                                <div class="tab-pane fade" id="nav-rev" role="tabpanel" aria-labelledby="nav-rev-tab">


                                    <div class="container">



                                        <div class="row">
                                            <div class="col-12">

                                                <div class="review-block">



                                                    @foreach($reviews as $review)
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                                                            <div class="review-block-name"><a href="#">{{$review->full_name}}</a></div>
                                                            <div class="review-block-date">{{$review->created_at}}</div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="review-block-rate star">
                                                                @if($review->rating==1)
                                                                <span class="ion-ios-star"></span>
                                                                <span class="ion-ios-star-outline"></span>
                                                                <span class="ion-ios-star-outline"></span>
                                                                <span class="ion-ios-star-outline"></span>
                                                                <span class="ion-ios-star-outline"></span>
                                                                @elseif($review->rating==2)
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                @elseif($review->rating==3)
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                @elseif($review->rating==4)
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                @elseif($review->rating==5)
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                @endif
                                                            </div>
                                                            <div class="review-block-title">{{$review->description}}</div>
                                                            <div class="review-block-description">{{$review->description}}</div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                    <hr/>
                                                </div>
                                            </div>


                                        </div>





                                        <div class="row">

                                            <div class="col-12 bg-blue p-3">
                                                <div class="col-12 h4 text-white text-center">    Post a Review  </div>
                                                <span
                                                    class="text-danger">{{$errors->has('description') ? $errors->first('description') : ' '}}</span>
                                                <span
                                                    class="text-danger">{{$errors->has('title') ? $errors->first('title') : ' '}}</span>
                                                <form action="{{route('product-review')}}" method="post">
                                                    @csrf
                                                    <div class="row form-group input-group col-12">


                                                        <div class="input-group-prepend col-12 m-1">
                                                            <span class="input-group-text"> <i class="fa fa-hand-o-right"></i> </span>

                                                            <input name="title" class="form-control" placeholder="Title" type="text">
                                                        </div>

                                                        <div class="input-group-prepend col-12 m-1">
                                                            <span class="input-group-text"> <i class="fa fa-hand-o-right"></i> </span>

                                                            <input type="hidden" name="product_id"
                                                                   value="{{$product->id}}">
                                                            <input type="hidden" name="client_id"
                                                                   value="{{Session::get('client_id')}}">
                                                            <textarea name="description" class="form-control" placeholder="Review"></textarea>
                                                        </div>

                                                        <div class="col-12 star-rating m-1 text-right star h3">
                                                            <span id="rating1" name="rating" class="fa fa-star-o pl" data-rating="1"></span>
                                                            <span id="rating1" class="fa fa-star-o pl" data-rating="2"></span>
                                                            <span id="rating1" class="fa fa-star-o pl" data-rating="3"></span>
                                                            <span id="rating1" class="fa fa-star-o pl" data-rating="4"></span>
                                                            <span id="rating1" class="fa fa-star-o pl" data-rating="5"></span>
                                                            <input id="rating" type="hidden" name="rating" class="rating-value" >
                                                        </div>

                                                        <div class="col-12 text-center"><button type="submit" class="btn btn-danger">Submit</button></div>

                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                            </div>

                                </div> <!-- /container -->




                            </div>
                            
                            <!--spec,review,desc desktop display show,mobile hide-->
                            
                            
                            
                            <!--spec,review,desc desktop display hide,mobile show-->
                   
                        <div class="col-12 mobile-d-block nav-tab-mob">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab-mob" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-spec-tab-mob" data-toggle="tab" href="#nav-spec-mob" role="tab" aria-controls="nav-spec-mob" aria-selected="true">Specification</a>
                                    <a class="nav-item nav-link" id="nav-desc-tab-mob" data-toggle="tab" href="#nav-desc-mob" role="tab" aria-controls="nav-desc-mob" aria-selected="false">Description</a>
                                    <a class="nav-item nav-link" id="nav-rev-tab-mob" data-toggle="tab" href="#nav-rev-mob" role="tab" aria-controls="nav-rev-mob" aria-selected="false">Product Review</a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent-mob">
                                <div class="tab-pane table table-bordered fade show" id="nav-spec-mob" role="tabpanel" aria-labelledby="nav-spec-tab-mob">
                                    {!! $product->product_specification !!}
                                    <!--<table class="table table-bordered table-sm">-->
                                    <!--    <tbody>-->
                                    <!--    <tr>-->
                                    <!--        <td class="w-25">Model</td>-->
                                    <!--        <td class="w-75">RT-110</td>-->
                                    <!--    </tr>-->
                                       
                                    <!--    </tbody>-->
                                    <!--</table>-->
                                </div>
                                <div class="tab-pane fade" id="nav-desc-mob" role="tabpanel" aria-labelledby="nav-desc-tab-mob">
                                    {!! $product->product_description !!}
                                </div>
                                <div class="tab-pane fade" id="nav-rev-mob" role="tabpanel" aria-labelledby="nav-rev-tab-mob">


                                    <div class="container">

                                        <div class="row">
                                            <div class="col-12">

                                                <div class="review-block">

                                                    @foreach($reviews as $review)
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                                                            <div class="review-block-name"><a href="#">{{$review->full_name}}</a></div>
                                                            <div class="review-block-date">{{$review->created_at}}</div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="review-block-rate star">
                                                                @if($review->rating==1)
                                                                <span class="ion-ios-star"></span>
                                                                <span class="ion-ios-star-outline"></span>
                                                                <span class="ion-ios-star-outline"></span>
                                                                <span class="ion-ios-star-outline"></span>
                                                                <span class="ion-ios-star-outline"></span>
                                                                @elseif($review->rating==2)
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                @elseif($review->rating==3)
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                @elseif($review->rating==4)
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                @elseif($review->rating==5)
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                    <span class="ion-ios-star"></span>
                                                                @endif
                                                            </div>
                                                            <div class="review-block-title">{{$review->description}}</div>
                                                            <div class="review-block-description">{{$review->description}}</div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                    <hr/>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">

                                            <div class="col-12 bg-blue p-3">
                                                <div class="col-12 h4 text-white text-center">    Post a Review  </div>
                                                <span
                                                    class="text-danger">{{$errors->has('description') ? $errors->first('description') : ' '}}</span>
                                                <span
                                                    class="text-danger">{{$errors->has('title') ? $errors->first('title') : ' '}}</span>
                                                <form action="{{route('product-review')}}" method="post">
                                                    @csrf
                                                    <div class="row form-group input-group col-12">


                                                        <div class="input-group-prepend col-12 m-1">
                                                            <span class="input-group-text"> <i class="fa fa-hand-o-right"></i> </span>

                                                            <input name="title" class="form-control" placeholder="Title" type="text">
                                                        </div>

                                                        <div class="input-group-prepend col-12 m-1">
                                                            <span class="input-group-text"> <i class="fa fa-hand-o-right"></i> </span>

                                                            <input type="hidden" name="product_id"
                                                                   value="{{$product->id}}">
                                                            <input type="hidden" name="client_id"
                                                                   value="{{Session::get('client_id')}}">
                                                            <textarea name="description" class="form-control" placeholder="Review"></textarea>
                                                        </div>

                                                        <div class="col-12 star-rating m-1 text-right star h3">
                                                            <span id="rating1" name="rating" class="fa fa-star-o pl" data-rating="1"></span>
                                                            <span id="rating1" class="fa fa-star-o pl" data-rating="2"></span>
                                                            <span id="rating1" class="fa fa-star-o pl" data-rating="3"></span>
                                                            <span id="rating1" class="fa fa-star-o pl" data-rating="4"></span>
                                                            <span id="rating1" class="fa fa-star-o pl" data-rating="5"></span>
                                                            <input id="rating" type="hidden" name="rating" class="rating-value" >
                                                        </div>

                                                        <div class="col-12 text-center"><button type="submit" class="btn btn-danger">Submit</button></div>

                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                            </div>

                                </div> <!-- /container -->




                            </div>
                            
                           
                            <!--spec,review,desc desktop display hide,mobile show-->




                        </div>

                    </div>
                </div>
            </section>
        </div>

    </div>


    <!-- Related Product -->




    <div class="container-fluid featured  related p-5 pt-0">
    
        <div class="row bg-white">
            
            @foreach($products as $product)
            
            <input type="hidden" value="{{$regular_price = $product->product_price}}">
                    <input type="hidden" value="{{$discount_taka = (float)$product->discount}}">
                    <input type="hidden" value="{{$discount_percent = $product->discount_percent}}">
                    <input type="hidden" value="{{$discount_price_taka = $regular_price-$discount_taka}}">
                    <input type="hidden"
                           value="{{$discount_price_percent = ($regular_price*(100-$discount_percent))/100}}">
            
            <div class="col-12 col-md-3 p-3 border home-product">
                            @if($discount_percent!=null)
							<span class="bg-danger rounded-right p-2 text-white">{{$discount_percent}}% OFF</span>
							@endif
					
								<div class="img-box text-center">
									<a href="" type="btn" class="text-dark nounderline nav-link">
										<img src="{{asset($product->product_image)}}" class="img-responsive img-fluid" alt="">
									
									</a>
								</div>
								
								<div class="product-info text-center">
									<a href="cart.html" type="btn" class="text-dark no-decoration">
										<span class="text-info"> {{$product->product_name}} </span>
									</a>
									
									<div class="product-info mt-3">
									    <span class="font-weight-bold text-danger h5">৳{{$discount_price_percent}} </span>
									    @if($discount_percent!=null)
									    <span class="text-muted ml-4"> <del>৳{{$product->product_price}} </del></span>
									    @endif
									</div>
									
								</div>
								
								<div class="star text-center">
                                        <span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star-half"></span>
										<span class="ion-ios-star-outline"></span>					
                                </div>
								
								
								<div class="font-weight-bold text-success text-right">In Stock </div>
								
								<!--<button type="button" class="col-12 btn border"><i class="fa fa-shopping-cart" style="color:blue"></i> &nbsp; Add to Cart</button>-->
								                        <input type="hidden" name="qty" id="qty-{{$product->id}}" value="1"
                                                           min="1"/>
                        <button data-id='{{$product->id}}' id="cartbtn" type="button" onclick="addToCart(this)" class="col-12 btn border"><i class="fa fa-shopping-cart" style="color:blue"></i> &nbsp; Add to Cart</button>
								
								
								
					</div>
					@endforeach
					
					<!--<div class="col-3 p-3 border home-product">-->
					<!--		<span class="bg-danger rounded-right p-2 text-white">Danger</span>-->
					
					<!--			<div class="img-box ">-->
					<!--				<a href="cart.html" type="btn" class="text-dark nounderline nav-link">-->
					<!--					<img src="assets/images/trending-1.png" class="img-responsive img-fluid" alt="">-->
					<!--				</a>-->
					<!--			</div>-->
								
					<!--			<div class="product-info">-->
					<!--				<a href="cart.html" type="btn" class="text-dark no-decoration">-->
					<!--					<span class="text-info"> Microsoft Xbox One S 1TB Gaming Console with 1x Wireless Controller and Gears 5 Game Bundle </span>-->
					<!--				</a>-->
									
					<!--				<div class="product-info mt-3">-->
					<!--				    <span class="font-weight-bold text-danger h5">৳9999 </span>-->
					<!--				    <span class="text-muted ml-4"> <del>৳9999 </del></span>-->
					<!--				</div>-->
									
					<!--			</div>-->
								
					<!--			<div class="star">-->
     <!--                                   <span class="ion-ios-star"></span>-->
					<!--					<span class="ion-ios-star"></span>-->
					<!--					<span class="ion-ios-star"></span>-->
					<!--					<span class="ion-ios-star-half"></span>-->
					<!--					<span class="ion-ios-star-outline"></span>					-->
     <!--                           </div>-->
								
								
					<!--			<div class="font-weight-bold text-success text-right">In Stock </div>-->
								
					<!--			<button type="button" class="col-12 btn border"><i class="fa fa-shopping-cart" style="color:blue"></i> &nbsp; Add to Cart</button>-->
								
								
					<!--</div>-->
					
					

        </div>

    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script>
        $("#rating1").click(function(){
            $("#rating").val("1");
        });
        $("#rating2").click(function(){
            $("#rating").val("2");
        });
        $("#rating3").click(function(){
            $("#rating").val("3");
        });
        $("#rating4").click(function(){
            $("#rating").val("4");
        });
        $("#rating5").click(function(){
            $("#rating").val("5");
        });
    </script>

    <script>

        $('#blah').hide();


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }

            $('#blah').show();
        }

        $("#file-upload").change(function () {
            readURL(this);
        });

    </script>

    <script src="{{asset('public/client/custom/cart.js')}}"></script>
    <script src="{{asset('public/client/custom/api.js')}}"></script>
    <script src="{{asset('/')}}public/assets/js/script.js"></script>


@endsection


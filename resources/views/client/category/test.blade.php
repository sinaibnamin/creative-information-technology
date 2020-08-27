@extends('client.master')

@section('title')
    title
@endsection

@section('home-content')


    <div class="row container-fluid featured pl-5 pt-3">
        @if($product1)
        <div class="col-12 bg-white text-center p-2 h3"> {{$product1->category->category_name}}	</div>
        @else
        <div class="col-12 bg-white text-center p-2 h3"> no product found	</div>
        @endif

        <div class="col-3 bg-white border p-0">

            <div class="col-12 border p-0">

                <div class="col-12 btn-blue p-2 text-center h5 m-0">Category </div>

                <div class="pt-2 pl-4">
                    @foreach($categories as $v_category)
                    <div class=""><input data-id='{{$v_category->id}}' class="form-check-input cate_filter" type="checkbox" aria-label="Checkbox for following text input cate_filter"> {{$v_category->category_name}} </div>
                    @endforeach
                </div>

            </div>


            <div class="col-12 border p-0 mt-4">
                <div class="col-12 btn-blue p-2 text-center h5 m-0">	Price </div>
                <div class="row p-2">
                    <div class="col-2"> Start </div>
                    <input type="text" class="col-3 form-control" id="start" name="start" aria-label="Text input with checkbox">
                    @if(!$product1->isEmpty())
                    <input type="hidden"  id="category_id"  value="{{$product->subcategory_id}}" name="category_id">
                    @endif
                    <div class="col-2"> End </div>
                    <input type="text" class="col-3 form-control" id="end" name="end"aria-label="Text input with checkbox">

                    <button type="button" onclick="category_product_price_filter(this)" class="btn btn-default"> <i class="fa fa-search"></i> </button>
                </div>
            </div>






        </div>



        <div class="col-9 bg-white">


            
            
            <div class="row bg-white productData">
                
                @foreach($products as $product)
            
            <input type="hidden" value="{{$regular_price = $product->product_price}}">
                    <input type="hidden" value="{{$discount_taka = (float)$product->discount}}">
                    <input type="hidden" value="{{$discount_percent = $product->discount_percent}}">
                    <input type="hidden" value="{{$discount_price_taka = $regular_price-$discount_taka}}">
                    <input type="hidden"
                           value="{{$discount_price_percent = ($regular_price*(100-$discount_percent))/100}}">


                <div class="col-3 p-3 border home-product">
                    @if($discount_percent!=null)
                    <span class="bg-danger rounded-right p-2 text-white">{{$discount_percent}}% OFF</span>
                    @endif

                    <div class="img-box ">
                        <a href="#" type="btn" class="text-dark nounderline nav-link">
                            <img src="{{asset($product->product_image)}}" class="img-responsive img-fluid" alt="">
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

                    <button type="button" class="col-12 btn border"><i class="fa fa-shopping-cart" style="color:blue"></i> &nbsp; Add to Cart</button>


                </div>
                @endforeach
            </div>
            
        </div>
        <div class="d-flex justify-content-center">
                                {{ $products->links() }}
                            </div>
    </div>


    <script src="{{asset('public/client/custom/cart.js')}}"></script>
<script src="{{asset('public/client/custom/api.js')}}"></script>
<script src="{{asset('public/client/custom/price_filter.js')}}"></script>
<script src="{{asset('public/client/custom/filter.js')}}"></script>

@endsection

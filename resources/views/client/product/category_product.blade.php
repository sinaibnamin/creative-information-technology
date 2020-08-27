
    <div class="col-12 bg-white">
                <div class="row bg-white productData" >
					 @foreach($filter as $product)
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
					
								<div class="img-box">
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
                        <input type="hidden" name="qty" id="qty-{{$product->id}}" value="1"
                                                           min="1"/>
                        <button data-id='{{$product->id}}' id="cartbtn" type="button" onclick="addToCart(this)" class="col-12 btn border"><i class="fa fa-shopping-cart" style="color:blue"></i> &nbsp; Add to Cart</button>
								<!--<button type="button" class="col-12 btn border"><i class="fa fa-shopping-cart" style="color:blue"></i> &nbsp; Add to Cart</button>-->
								
								
					</div>
				@endforeach
				</div>
			
 
</div>

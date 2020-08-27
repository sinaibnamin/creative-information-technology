<!-- Footer -->
<section id="footer-widget" class="footer-widget">
    <div class="container-fluid header-bg">
        <div class="row">
            <div class="col-sm-3">
                <h3>Our Popular Products</h3>
                <ul>
                    @foreach($popularProducts as $product)
                        <li><a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">{{$product->product_name}}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-sm-3">
                <h3>Important Link</h3>
                <ul>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="{{route('about')}}">About Us</a></li>
                    <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                    <li><a href="{{route('terms')}}">Terms & Condition</a></li>
                    <li><a href="{{route('return')}}">Return Policy</a></li>
                    <li><a href="{{route('payment')}}">Payment Policy</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h3>Our Latest Products</h3>
                <ul>
                    @foreach($latestProducts as $product)
                        <li><a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">{{$product->product_name}}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-3 col-sm-3">
                <h3>Our Services</h3>
                <div class="widget-img-box bg-white m-2">
                    <a class="test-popup-link" href="assets/images/widget-big-1.png">
                        <img class="widget-img" src="{{asset('/')}}public/assets/images/widget-1.png" alt="widget">
                    </a>
                    <a class="test-popup-link" href="assets/images/widget-big-2.png">
                        <img class="widget-img" src="{{asset('/')}}public/assets/images/widget-2.png" alt="widget">
                    </a>
                    <a class="test-popup-link" href="assets/images/widget-big-3.png">
                        <img class="widget-img" src="{{asset('/')}}public/assets/images/widget-3.png" alt="widget">
                    </a>
                    <a class="test-popup-link" href="assets/images/widget-big-4.png">
                        <img class="widget-img" src="{{asset('/')}}public/assets/images/widget-4.png" alt="widget">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer text-center">
    <p>&copy; Developed by <a href="https://cursorbd.com/">CURSOR LTD</a></p>
</footer>
<!-- Scripts -->

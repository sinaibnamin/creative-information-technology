@extends('client.master')
@section('home-content')

    <style>

        .cart-head-title {
            /*border: 1px solid #ccc;*/
            /*border-radius: 200px;*/
            font-size: 30px;
        }

        .input-group.qty-btn {
            display: block;
        }

        .qty-btn .btn {
            padding: 10px 10px;
        }

        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            /*margin-top: 30px;*/
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10%;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*inputs*/
        #msform input, #msform textarea {
            padding: 0px;
            border: 1px solid #ccc;
            border-radius: 0px;
            /*margin-bottom: 10px;*/
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 14px;
        }

        .msform textarea {
            padding: 9px !important;
        }

        #msform input:focus, #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #ee0979;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        /*buttons*/
        #msform .action-button {
            width: 100px;
            background: #0e509f;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #ee0979;
        }

        #msform .action-button-previous {
            width: 100px;
            background: #C5C5F1;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button-previous:hover, #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
        }

        .total-box .drop-shadow {
            padding: 9px;
        }

        /*headings*/
        .fs-title {
            font-size: 33px;
            text-transform: uppercase;
            text-align: center;
            color: #2C3E50;
            margin-bottom: 40px;
            letter-spacing: 2px;
            font-weight: normal;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /*progressbar-cart*/
        #progressbar-cart {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #progressbar-cart li {
            list-style-type: none;
            color: #0e509f;
            text-transform: uppercase;
            font-size: 17px;
            font-weight: 600;
            width: 33.33%;
            float: left;
            position: relative;
            letter-spacing: 1px;
        }

        #progressbar-cart li:before {
            content: counter(step);
            counter-increment: step;
            width: 24px;
            height: 24px;
            line-height: 26px;
            display: block;
            font-size: 15px;
            color: #333;
            background: white;
            border-radius: 25px;
            margin: 0 auto 10px auto;
        }

        /*progressbar-cart connectors*/
        #progressbar-cart li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: #127b3e;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1; /*put it behind the numbers*/
        }

        #progressbar-cart li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar-cart li.active:before, #progressbar-cart li.active:after {
            background: #0e509f;
            color: white;
        }


        /* Not relevant to this form */
        .dme_link {
            margin-top: 30px;
            text-align: center;
        }

        .dme_link a {
            background: #FFF;
            font-weight: bold;
            color: #0e509f;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 5px 25px;
            font-size: 12px;
        }

        .dme_link a:hover, .dme_link a:focus {
            background: #C5C5F1;
            text-decoration: none;
        }

        .table-responsive {
            min-height: .01%;
            overflow-x: auto;
        }

        @media screen and (max-width: 767px) {

            .cart-head-title {
                margin-top: -10px !important;
                margin-bottom: -10px;
                padding-left: 0px !important;
                font-size: 28px;

            }


            /*title shadow design*/
            .drop-shadow {
                width: 100%;
                padding: 0em;
                margin: 0em 0em 0em;
            }

            /*title shadow design*/
            #progressbar-cart {
                width: 100%;
                margin-bottom: 15px;
            }


            fieldset .input-group.qty-btn {
                display: block;
            }

            #msform fieldset {
                padding: 21px 21px;
                width: 100%;
                margin: 0px 0px;
                height: 65vh;
                overflow-y: scroll;
            }


            #msform .input-group.qty-btn input, #msform .input-group.qty-btn textarea {
                width: 100% !important;
                padding: 15px;
                margin-bottom: 7px;
                margin-top: 7px;
            }

            #msform fieldset .actions .btn {
                width: 25px;
                font-size: 10px;
            }

            .table-responsive {
                width: 100%;
                margin-bottom: 15px;
                overflow-y: hidden;
                -ms-overflow-style: -ms-autohiding-scrollbar;
                border: 1px solid #ddd;
            }

            .table-responsive thead,
            .table-responsive tbody {
                font-size: 11px;
                font-weight: 600;
            }

            .table > tbody > tr > td, .table > tfoot > tr > td {
                font-size: 9px;
            }

            .form-control.coupon-input {
                width: 17vh !important;
            }


            .total-box .drop-shadow {
                padding: 6px;
                margin: 0em 0em 0em;
                font-size: 12px;
            }

        }
    </style>


    <!-- MultiStep Form -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="cart-head-title title-design drop-shadow curled text-center d-block cart-div  mt-4 pt-3 pb-3">
                    <span>Your Happy Cart</span></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form id="msform" class='msform'>
                    <!-- progressbar-cart -->
                    <ul id="progressbar-cart" class="shadow-2dp">
                        <li class="active">Cart</li>
                        <li>Shipping</li>
                        <li>Payment</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <div class="col-12">
                            <h2 class="fs-title">Cart</h2>


                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                    <tr>
                                        <td class="">Image</td>
                                        <td class="">Product Name</td>
                                        <td class="">Quantity</td>
                                        <td class=""></td>
                                        <td class="">Unit Price</td>
                                        <td class="">Total price</td>
                                    </tr>
                                    </thead>
                                    @foreach($cart as $v_cart)
                                        <tbody>
                                        <tr class="tr-{{$v_cart->rowId}}">
                                            <td class=""><img src="{{$v_cart->options->image}}" height="42" width="42"
                                                              class="thumbnail"></td>
                                            <td class="" data-th="Product">{{$v_cart->name}}</td>
                                            <td class="">

                                                <div class="input-group qty-btn">
                                <span class="input-group-btn">
                                    <button data-id="{{$v_cart->rowId}}" type="button"
                                            class="quantity-left-minus btn btn-danger btn_loading btn-number"
                                            data-type="minus" id="decrease" onclick="decreaseValue(this)" data-field="">
                                        <!--<i class="fa fa-minus" aria-hidden="true"></i>-->
                                        <span class="cart_loading"></span>
                                    </button>
                                </span>

                                                    <input type="number" class="input-number w-25"
                                                           id="qty-{{$v_cart->rowId}}" name="qty"
                                                           value="{{$v_cart->qty}}">
                                                    <input type="hidden" class="form-control text-center"
                                                           id="rowId-{{$v_cart->rowId}}" name="rowId"
                                                           value="{{$v_cart->rowId}}">
                                                    <!--<input type="text" id="quantity" name="quantity" class="input-number w-25" value="10" min="1" max="100">-->

                                                    <span class="input-group-btn">
                                        <button data-id="{{$v_cart->rowId}}" type="button"
                                                class="quantity-right-plus btn btn-success btn_loading btn-number"
                                                data-type="plus" id="increase" onclick="increaseValue(this)"
                                                data-field="">
                                             <!--<i class="fas fa-plus"></i>-->
                                            <!--<i class="fa fa-plus" aria-hidden="true"></i>-->
                                             <span class="cart_loading"></span>
                                         </button>
                                    </span>
                                                </div>

                                            </td>
                                            {{--
                                            <td class="actions" data-th="">
                                                    <button data-id="{{$v_cart->rowId}}" type="button" class="btn btn-danger btn-md btn_loading" onclick="deleteCart(this)">
                                                       <i class="fa fa-trash" aria-hidden="true"></i>
                                                      <span class="cart_loading"></span>
                                                  </button>
                                            </td>
                                            --}}
                                            <td class="actions" data-th="">
                                                <button data-id="{{$v_cart->rowId}}" type="button"
                                                        class="btn btn-danger btn-sm btn_loading"
                                                        onclick="deleteCart(this)">
                                                    <i class="fa fa-trash"></i>
                                                    <span class="cart_loading"></span>
                                                </button>


                                            </td>
                                            <td class="">{{$v_cart->price}}</td>
                                            <td id="subtotal"
                                                class="text-center amount-<?php echo $v_cart->rowId ?>">{{$tot = $v_cart->price * $v_cart->qty }}
                                                BDT
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>


                            <div class="col-12 text-right total-box">
						    <span class="bg-blue text-white drop-shadow"> Total : 
						        <span class="final_amount_before">{{$total}}</span>
						    </span>
                            </div>


                            <div class="input-group col-2">
                                <span class="input-group-text" id="basic-addon1">Coupon Code</span><input type="text"
                                                                                                          class="form-control coupon-input"
                                                                                                          placeholder="">

                            </div>


                        </div>
                        @if(Session::get('client_id'))
                            <input type="button" name="next" class="next action-button js-btn-next" value="Next"/>
                    </fieldset>

                    <fieldset>
                        <div class="col-12">
                            <h2 class="fs-title">Shipping Address</h2>

                            <input type="checkbox" name="vehicle1" id="clientInfo" value="Bike">
                            <label for="vehicle1" style="color: red; font-size:140%;" >Auto Fill up form</label><br>

                            <input type="text" id="firstname" name="first_name" placeholder="First Name" class="p-2"/>
                            <input type="text" name="last_name" id="lastname" placeholder="Last Name" class="p-2"/>
                            <input type="text" id="phonenumber" name="phone_number" placeholder="Contact No."
                                   class="p-2"/>
                            <input type="text" id="txt_cart_address" name="address"
                                   placeholder="Address." class="p-2"/>
                        </div>

                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                        <input type="button" name="next" class="next action-button" value="Next Step"/>


                    </fieldset>

                    <fieldset>
                        <div class="col-12">
                            <h2 class="fs-title">Payment Information</h2>


                            <!--    <div class='radio' >Bkash</div>-->
                            <!--    <div class='radio'> Cash on delivery</div> <br>-->
                            <!--    </div>-->
                            <div class="radio-group">
                                <label for="cash">Cash</label><br>
                                <input type="radio" id="payment_type" name="payment_type" value="cash" checked>
                                <label for="bkash">Bkash</label><br>
                                <input type="radio" id="payment_type" name="payment_type" value="Bkash" checked>


                            </div>


                            <!--<div class="radio-group">-->
                            <!--    <div class='radio' id="payment_type" name="payment_type" data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>-->
                            <!--    <div class='radio' id="payment_type" name="payment_type" data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div> <br>-->
                            <!--</div> <label class="pay">Card Holder Name*</label> <input type="text" id="card-name" name="card-name" placeholder="" />-->
                            <!--<div class="row">-->
                            <!--    <div class="col-9"> <label class="pay">Card Number*</label> <input type="text" id="card-no" name="card-no" placeholder="" /> </div>-->
                            <!--    <div class="col-3"> <label class="pay">CVC*</label> <input type="password" name="cvcpwd" placeholder="***" /> </div>-->
                            <!--</div>-->
                            <!--<div class="row">-->
                            <!--    <div class="col-3"> <label class="pay">Expiry Date*</label> -->
                            <!--    <input type="date" name="expiredate" id="expiredate">-->

                            <!--    </div>-->
                            <!--<div class="col-9"> <select class="list-dt" id="month" name="expmonth">-->
                            <!--        <option selected>Month</option>-->
                            <!--        <option>January</option>-->
                            <!--        <option>February</option>-->
                            <!--        <option>March</option>-->
                            <!--        <option>April</option>-->
                            <!--        <option>May</option>-->
                            <!--        <option>June</option>-->
                            <!--        <option>July</option>-->
                            <!--        <option>August</option>-->
                            <!--        <option>September</option>-->
                            <!--        <option>October</option>-->
                            <!--        <option>November</option>-->
                            <!--        <option>December</option>-->
                            <!--    </select> <select class="list-dt" id="year" name="expyear">-->
                            <!--        <option selected>Year</option>-->
                            <!--    </select> </div>-->
                            <!--</div>-->

                        </div>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                        {{--                    <input type="submit" name="submit" onclick="orderCheckout(this)" class="submit action-button" id="popup-btn" value="Submit"/>--}}
                        <button class="submit action-button" onclick="orderCheckout(this)" type="button" title="Send">
                            Submit
                        </button>
                        <div id="popup-wrapper" class="popup-container">
                            <div class="popup-content">
                                <span id="close">&times;</span>
                                <p>Your information has been submitted.</p>
                                <a href="http://gadgetoy.com/creative" type="button" class="btn btn-sm btn-primary">
                                    Shop More</a>
                            </div>
                        </div>


                    </fieldset>
                </form>
            </div>
            <!-- /.MultiStep Form -->
        </div>
        @endif
    </div>




    <script src="{{asset('public/client/custom/cart.js')}}"></script>
    <script src="{{asset('public/client/custom/api.js')}}"></script>
@endsection
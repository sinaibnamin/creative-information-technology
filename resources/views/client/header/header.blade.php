<style>


/*login*/
.login-modal .modal-body{
    padding: 20px;
}

.close span {
    color: #770f12;
}

.close {
    float: right;
    font-size: 28px;
    font-weight: bold;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: 1;
}

.login-modal .modal-content{
    background-color: #060e32;
    color: white;
}
/*login*/

/*user dropdown*/
.drop-down.user-drop-down{
    display: inline-block;
    position: relative;
    z-index: 1000;
}

.drop-down__button{
  background: linear-gradient(to right,#0c1b63, #ed1d24);
  display: inline-block;
  line-height: 25px;
  padding: 0 13px;
  text-align: left;
  border-radius: 4px;
  box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.2);
  cursor: pointer;
}

.drop-down__name {
    font-size: 12px;
    text-transform: uppercase;
    color: #fff;
    font-weight: 400;
    letter-spacing: 2px;
}


.drop-down__menu-box {
    position: absolute;
    width: 100%;
    left: 0;
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.2);
     transition: all 0.3s;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -ms-transition: all 0.3s;
  -o-transition: all 0.3s;
   visibility: hidden;
  opacity: 0;
  margin-top: 5px;
  /*padding: 0px 23px 7px 0px;*/
}

.drop-down__menu {
    margin: 0;
    padding: 0 0px;
    list-style: none;
  
}
.drop-down__menu-box:before{
  content:'';
  background-color: transparent;
  border-right: 8px solid transparent;
  position: absolute;
  border-left: 8px solid transparent;
  border-bottom: 8px solid #fff;
  border-top: 8px solid transparent;
  top: -15px;
  right: 18px;

}

.drop-down__menu-box:after{
  content:'';
  background-color: white;
}

.drop-down__item .svg-inline--fa{
    color: #127b3e !important;
}

.drop-down__item {
    font-size: 14px;
    padding: 0px 1px;
    margin: 5px;
    text-align: left;
    font-weight: 500;
    color: #0c1b63;
    cursor: pointer;
    position: relative;
    /*border-bottom: 1px solid #e0e2e9;*/
}

.drop-down__item-icon {
    width: 15px;
    height: 15px;
    position: absolute;
    right: 0px;
    fill: #8995b6;
  
}

.drop-down__item:hover .drop-down__item-icon{
  fill: #3d6def;
}

.drop-down__item:hover{
  color: #3d6def;
}

.drop-down__item:last-of-type{
  border-bottom: 0;
}


.drop-down--active .drop-down__menu-box{
  visibility: visible;
  opacity: 1;
  /*margin-top: 15px;*/
}

.drop-down__item a{
    color: #0e509f;
}

/*.drop-down__item:hover .bg-blue{*/
    
/*}*/

.drop-down__item:before{
  content:'';
  position: absolute;
  width: 3px;
  height: 21px;
  background-color: #ed1d24;
  left: -13px;
  top: 50%;
  transform: translateY(-50%);
  display:none;
}

.drop-down__item:hover:before{
  display:block;
}
/*user dropdown*/

.ui-autocomplete {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  float: left;
  display: none;
  min-width: 672px !important;
  padding: 0px 10px;
  margin: 0 0 10px 25px;
  list-style: none;
  background-color: #f5f8f9;
  font-family: 'Ubuntu', sans-serif;
  text-transform: initial !important;
  font-size: 14px;
}

.ui-menu-item {
  border-bottom: 1px solid #b4c4d4 !important;
  padding-bottom: 10px !important;
  padding-top: 10px !important;
}

.ui-menu-item > a.ui-corner-all {
  display: block;
  clear: both;
  font-weight: normal;
  line-height: 25px;
  color: #0a0a0a;
  white-space: nowrap;
  text-decoration: none;
  text-transform: lowercase !important;
}

.ui-menu-item > a.ui-corner-all:first-letter {
  text-transform: uppercase;
}

.ui-state-hover,
.ui-state-active {
  color: #ffffff;
  text-decoration: none;
  background-color: #0088cc;
  padding-left: 0px !important;
  padding-right: 0px !important;
  border-radius: 0px;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  background-image: none;
}

.ui-state-highlight a {
  font-weight: bold;
  color: #002e5b !important;
}

.ui-state-highlight {
  font-weight: bold;
  color: #002e5b !important;
}

.navbar {
     background: #0c1b63 !important;
     box-shadow: none;
     margin-bottom: 0px;
}

.head-logo.mobile{
    height: 70px;
}

.logo-green.mobile{
    font-size: 13px;
}

.desktop-nav .dropdown-toggle::after{
    right: -2px;    
}

.badge.mobile{
    font-size: 13px;
    padding: 2px 5px;
}

#sidebar{
    background:#0d509f;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #ffffff;
}

#dismiss{
    background: none;
    color: #ed1d24;
}

.btn-info {
    color: #0e509f;
    background: none;
    border: none;
    font-size: 24px;
}


.btn-info:hover {
    color: #ed1d24 !important;
    background: none !important;
    border: none
}

.collapsible {
  background-color: #0e509f;
  color: white;
  cursor: pointer;
  padding: 4px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 20px;
}

#sidebar .active, .collapsible:hover {
  background-color: #093c79;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-right: 17px;
}

.collapsible.active:after {
  content: "\2212";
}

#sidebar ul ul button {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #0d509e;
}

#sidebar ul li button:hover {
    color: #ffffff;
    background: #0d509e;
    border: none;
}

button:focus {
    outline: none;
}

.show-mega-menu {
  padding: 0 0px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.1s ease-out;
}

ul.show-mega-menu li a {
    margin-left: 5px !important;
    background: #0d509e00 !important;
}

ul.show-mega-menu li{
    list-style-type: none;
}

ul.show-mega-menu li a:hover{
   background: none;
   color: white;
}

@media screen and (max-width: 767px){
    
    
    .drop-down__name {
        font-size: 9px;
        letter-spacing: 1px;
    }
    .drop-down__button {
        line-height: 22px;
        /*padding: 0px 5px;*/
    }
    
    
       
}

</style>
<div class="row pt-1">

    <div class="col-12 top-mobile-div">
        <div class="top-social-icon shadow-sm">
            <div class="text-center icons-design-default">
                <span class="col border-right"><a class="" href="{{route('about')}}">About Us</a></span>
                
                <span class="col border-right"><a class="" href="{{route('contact-us')}}"> Contact Us</a></span>
                
                <!--login-->
                @if(!Session::get('client_id'))
                    <span class="col border-right">
        
                         <a class="" href="#" data-toggle="modal" data-target="#exampleModal1" aria-haspopup="true"
                            aria-expanded="false">
                                  <span class="ion-log-in login-menu"> &nbsp; log in </span>
                                </a>
                            
        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
                             aria-hidden="true">
                        <div class="modal-dialog modal-sm login-modal" role="document">
                           <div class="modal-content curled">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Log In</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            
                                <div class="modal-body">
                                    <form action="{{route('login-process')}}" method="post">
                                        @csrf
                                        <!-- to error: add class "has-danger" -->
                                        <div class="form-group row">
                                            <label for="exampleInputEmail1" class="col-3 col-form-label">Email</label>
                                            <input type="email" name="email" class="form-control form-control-sm col-9" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp">
                                        </div>
                                
                                            <div class="form-group row">
                                            <label for="exampleInputPassword1" class="col-3 col-form-label">Password</label>
                                            <input type="password" name="password" class="form-control form-control-sm col-9" id="exampleInputPassword1">
                                            <!--<a href="#" style="float:left;font-size:12px;" class="pl-2">Forgot password?</a>-->
                                        </div>
                                
                                            <button type="submit" class="btn btn-primary btn-block btn-robot">Sign in</button>
                                
                                        <div class="sign-up">
                                            Don't have an account? <a href="{{route('client-register')}}">Create One</a>
                                        </div>
                                    </form>
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                        <!--login-->
                
                <span class="col"><a class="" href="{{route('client-register')}}"><i class='fa fa-user'></i>&nbsp; Sign Up</a></span>
                 @else
                <!--    <span class="col border-right"><a class="" href="{{route('client-profile')}}"><i class='fa fa-user'></i>&nbsp; Profile</a></span>-->
                <!--    <span class="col border-right"><a class="" href="{{route('order-list')}}"><i class='fa fa-user'></i>&nbsp; Order List</a></span>-->
                <!--    <span class="col border-right"><a class="" href="{{route('client-logout')}}"><i class='fa fa-user'></i>&nbsp; Logout</a></span>-->
                <!--    <span class="col border-right"><a href="{{route('client-forgot-password')}}">Password Change</a></span>-->
                
                     
                <span class="drop-down user-drop-down">
                 <div id="dropDown1" class="drop-down__button">
                   <span class="drop-down__name">Mohammad Ismail</span>
                 </div>
                 
                 <div class="drop-down__menu-box">
                   <ul class="drop-down__menu">
                     <li data-name="profile" class="drop-down__item"><a class="" href="{{route('client-profile')}}"><i class='fa fa-user'></i>&nbsp;Profile</a> 
                    </li>
                    
                     <li data-name="dashboard" class="drop-down__item"><a class="" href="{{route('order-list')}}"><i class='fa fa-list'></i>&nbsp;Order List</a> 
                     </li>
                     
                     <li data-name="activity" class="drop-down__item"><a class="" href="{{route('client-logout')}}"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Logout</a> 
                    </li>
                    
                     <li data-name="activity" class="drop-down__item"><a href="{{route('client-forgot-password')}}"><i class="fa fa-key" aria-hidden="true"></i>&nbsp;Password Change</a>
                    </li>
                   </ul>
                 </div>
               </span>
                
                @endif
                
                
            </div>
        </div>
    </div>


    <div class="col-7"></div>

    <div class="col-5 top-desktop-div mobile-d-none">

        <span class="col border-right"><a class="" href="{{route('about')}}">About Us</a></span>
        <span class="col border-right"><a class="" href="{{route('contact-us')}}"> Contact Us</a></span>
        @if(!Session::get('client_id'))
            <span class="col border-right">

                 <a class="" href="#" data-toggle="modal" data-target="#exampleModal2" aria-haspopup="true"
                    aria-expanded="false">
                          <span class="ion-log-in login-menu"> &nbsp; log in </span>
                        </a>
                    

                <!-- Modal -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
                     aria-hidden="true">
                <div class="modal-dialog modal-sm login-modal" role="document">
                    <div class="modal-content curled">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Log In</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('login-process')}}" method="post">
                                @csrf
                                <!-- to error: add class "has-danger" -->
                                <div class="form-group row">
                                    <label for="exampleInputEmail1" class="col-4 col-form-label">Email</label>
                                    <input type="email" name="email" class="form-control form-control-sm col-8" id="exampleInputEmail1"
                                           aria-describedby="emailHelp">
                                </div>
                        
                                    <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-4 col-form-label">Password</label>
                                    <input type="password" name="password" class="form-control form-control-sm col-8" id="exampleInputPassword1">
                                    <a href="{{route('forgot-password')}}" style="margin: 1px auto;font-size:14px;" class="pl-2 mt-4">Forgot password?</a>
                                </div>
                        
                                    <button type="submit" class="btn btn-primary btn-block btn-robot">Sign in</button>
                        
                                <div class="text-center sign-up mt-3">
                                    Don't have an account? <a href="{{route('client-register')}}">Create One</a>
                                </div>
                            </form>
        
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
        
            <span class="col border-right"><a class="" href="{{route('client-register')}}"><i class='fa fa-user'></i>&nbsp; Sign Up</a></span>
        @else
        <!--    <span class="col border-right"><a class="" href="{{route('client-profile')}}"><i class='fa fa-user'></i>&nbsp; Profile</a></span>-->
        <!--    <span class="col border-right"><a class="" href="{{route('order-list')}}"><i class='fa fa-user'></i>&nbsp; Order List</a></span>-->
        <!--    <span class="col border-right"><a class="" href="{{route('client-logout')}}"><i class='fa fa-user'></i>&nbsp; Logout</a></span>-->
        <!--    <span class="col border-right"><a href="{{route('client-forgot-password')}}">Password Change</a></span>-->
        
             
        <span class="drop-down user-drop-down">
         <div id="dropDown2" class="drop-down__button">
           <span class="drop-down__name">Mohammad Ismail</span>
         </div>
         
         <div class="drop-down__menu-box">
           <ul class="drop-down__menu">
             <li data-name="profile" class="drop-down__item"><a class="" href="{{route('client-profile')}}"><i class='fa fa-user'></i>&nbsp;Profile</a> 
            </li>
            
             <li data-name="dashboard" class="drop-down__item"><a class="" href="{{route('order-list')}}"><i class='fa fa-list'></i>&nbsp;Order List</a> 
             </li>
             
             <li data-name="activity" class="drop-down__item"><a class="" href="{{route('client-logout')}}"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Logout</a> 
            </li>
            
             <li data-name="activity" class="drop-down__item"><a href="{{route('client-forgot-password')}}"><i class="fa fa-key" aria-hidden="true"></i>&nbsp;Password Change</a>
            </li>
           </ul>
         </div>
       </span>
        
        @endif
        
    
       
    </div>

</div>


<div id="navbar-head" class="site-header-bg">
    <div class="container-fluid">
        <div class="row align-items-center">
            
            <!--mobile sidebar-->
            <div class="col-2 top-mobile-div">
                <div class="wrapper mobile-d-block">
                        <!-- Sidebar  -->
                        <nav id="sidebar">
                            <div id="dismiss">
                                <i class="fas fa-arrow-left"></i>
                            </div>
                
                            <div class="sidebar-header">
                                <a href="{{route('/')}}"><img src="{{asset('/')}}public/assets/images/head-logo.png" alt="logo"></a>
                          
                            </div>
                        
                            <!--mbl cat show-->
                                <ul class="list-unstyled components">
                                    
                                      @foreach($categories as $category)
                                    <li class="active">
                                        <a href="#SubMenu1" data-toggle="collapse" aria-expanded="false">{{$category->category_name}}</a>
                                        @foreach($subCategories as $subCategory)
                                    @if($subCategory->root_id==$category->id)
                                        <ul class="collapse list-unstyled" id="SubMenu1">
                                            
                                                  @foreach($subCategories as $subCategory)
                                        @if($subCategory->root_id==$category->id)
                                                    <!-- Dropdown menu links -->
                                            <!--<li><a href="#">Category 1.1</a></li>-->
                                            <li>
                                                <button type="button" href="{{ route('sub-category',['name'=>\Illuminate\Support\Str::slug($subCategory->short_name)]) }}" class="collapsible">{{$subCategory->category_name}}</button>
                                               
                                                @foreach($subSubCategories as $subSubCategory)
                                        @if($subSubCategory->root_id==$subCategory->id)
                                                <ul class="show-mega-menu">
                                                    @foreach($subSubCategories as $subSubCategory)
                                        @if($subSubCategory->root_id==$subCategory->id)
                                                    <li>
                                                        <a href="{{ route('sub-sub-category',['name'=>\Illuminate\Support\Str::slug($subSubCategory->short_name)]) }}">{{$subSubCategory->category_name}}</a>
                                                    </li>
                                                      @endif
                                                @endforeach
                                                    <!--<li>    -->
                                                    <!--    <a href="#">Category 1.1.2</a>-->
                                                    <!--</li>-->
                                                </ul>
                                                 @endif
                                             @endforeach
                                            </li>
                                          @endif
                                      @endforeach
                                            <!--<li>-->
                                            <!--    <a type="button" class="collapsible">Category 1.2</a>-->
                                            <!--    <ul class="show-mega-menu">-->
                                            <!--        <li>-->
                                            <!--            <a href="#">Category 1.2.1</a>-->
                                            <!--        </li>-->
                                            <!--        <li>    -->
                                            <!--            <a href="#">Category 1.2.2</a>-->
                                            <!--        </li>-->
                                            <!--    </ul>-->
                                            <!--</li>-->
                                            <!--<li>-->
                                            <!--   <a type="button" class="collapsible">Category 1.3</a>-->
                                            <!--    <ul class="show-mega-menu">-->
                                            <!--        <li>-->
                                            <!--            <a href="#">Category 1.3.1</a>-->
                                            <!--        </li>-->
                                            <!--        <li>    -->
                                            <!--            <a href="#">Category 1.3.2</a>-->
                                            <!--        </li>-->
                                            <!--    </ul>-->
                                            <!--</li>-->
                                        </ul>
                                         @endif
                                      @endforeach
                                    </li>
                                    @endforeach
                                    <!--<li>-->
                                    <!--    <a href="#SubMenu2" data-toggle="collapse" aria-expanded="false">Category2</a>-->
                                    <!--    <ul class="collapse list-unstyled" id="SubMenu2">-->
                                    <!--        <li>-->
                                    <!--            <a href="#">Page 1</a>-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <a href="#">Page 2</a>-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <a href="#">Page 3</a>-->
                                    <!--        </li>-->
                                    <!--    </ul>-->
                                    <!--</li>-->
                                    
                                    <!--<li>-->
                                    <!--    <a href="#Submenu3" data-toggle="collapse" aria-expanded="false">Category3</a>-->
                                    <!--    <ul class="collapse list-unstyled" id="Submenu3">-->
                                    <!--        <li>-->
                                    <!--            <a href="#">Page 1</a>-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <a href="#">Page 2</a>-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <a href="#">Page 3</a>-->
                                    <!--        </li>-->
                                    <!--    </ul>-->
                                    <!--</li>-->
                                    
                                    <!--<li>-->
                                    <!--    <a href="#Submenu4" data-toggle="collapse" aria-expanded="false">Category4</a>-->
                                    <!--    <ul class="collapse list-unstyled" id="Submenu4">-->
                                    <!--        <li>-->
                                    <!--            <a href="#">Page 1</a>-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <a href="#">Page 2</a>-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <a href="#">Page 3</a>-->
                                    <!--        </li>-->
                                    <!--    </ul>-->
                                    <!--</li>-->
                                    
                                    <!--brands-->
                                      <li>
                                        <a href="#SubMenuBrand" data-toggle="collapse" aria-expanded="false">Brand</a>
                                        <ul class="collapse list-unstyled" id="SubMenuBrand">
                                            
                                                  
                                                    <!-- Dropdown menu links -->
                                            <!--<li><a href="#">Category 1.1</a></li>-->
                                           
                                            <li>
                                                <a type="button" class="collapsible">Brand</a>
                                                
                                                <ul class="show-mega-menu">
                                                    <li>
                                                        <a href="{{route('all-brands')}}">All Brands</a>
                                                    </li>
                                                     @foreach($brands as $brand)
                                                    <li>    
                                                        <a href="{{ route('brand-product',['name'=>$brand->short]) }}">{{$brand->brand_name}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                
                                            </li>
                                             
                                            <!--<li>-->
                                            <!--    <a type="button" class="collapsible">Brand 2</a>-->
                                            <!--    <ul class="show-mega-menu">-->
                                            <!--        <li>-->
                                            <!--            <a href="#">Brand 2.1</a>-->
                                            <!--        </li>-->
                                            <!--        <li>    -->
                                            <!--            <a href="#">Brand 2.2</a>-->
                                            <!--        </li>-->
                                            <!--    </ul>-->
                                            <!--</li>-->
                                            <!--<li>-->
                                            <!--   <a type="button" class="collapsible">Brand 3</a>-->
                                            <!--    <ul class="show-mega-menu">-->
                                            <!--        <li>-->
                                            <!--            <a href="#">Brand 3.1</a>-->
                                            <!--        </li>-->
                                            <!--        <li>    -->
                                            <!--            <a href="#">Brand 3.2</a>-->
                                            <!--        </li>-->
                                            <!--    </ul>-->
                                            <!--</li>-->
                                        </ul>
                                    </li>
                                    <!--brands-->
                                  
                                </ul>
                            
                            <!--mbl cat show-->
                            
                
                         
                        </nav>
                
                        <!-- Page Content  -->
                        

                            <button type="button" id="sidebarCollapse" class="btn btn-info">
                                <i class="fas fa-align-left"></i>
                                <!--<span>Toggle Sidebar</span>-->
                            </button>
                      
                    
                
                    </div>
            </div>
            
            <!--mobile sidebar-->
            
            <div class="col-8 mobile-d-block">
               <a href="{{route('/')}}"> <img src="{{asset('/')}}public/assets/images/head-logo.png" class="head-logo mobile" ></a>
            </div>
            
            <div class="col-2 mobile-d-block">
                <a href="{{route('show-cart')}}" id="cart" class="logo-green mobile mt-2"> </a><span
                                class="badge mobile bg-green cart_qty">{{Cart::content()->count()}}</span><i class="fa fa-shopping-cart fa-lg logo-green"></i>
            </div>

            <div class="col-3 mobile-d-none">
                <img src="{{asset('/')}}public/assets/images/head-logo.png" class="head-logo">
            </div>
            


            <div class="col-3 mobile-d-none">
                <p class="logo-green font-weight-bold">24/7 Support</p>
                <span class="ion-android-call logo-green font-weight-bold"> +880-1717-586186 </span>
            </div>


            <div class="col-6 mobile-d-none">

                <form>
                    <!-- <span class="input-group-btn"> -->
                    <!-- </span> -->
                    <!--  <a href="#" id="cart" class="logo-green"><i class="fa fa-shopping-cart logo-green"></i> Cart <span class="badge bg-green">3</span></a> -->
                    <div class="input-group">
                        <button class="btn btn-default btn-blue" type="button">Search</button>
                        <input type="text" class="form-control search_key" placeholder="">
                        <a href="{{route('show-cart')}}" id="cart" class="logo-green mt-2 ml-2"><i
                                class="fa fa-shopping-cart logo-green"></i> Cart <span
                                class="badge bg-green cart_qty">{{Cart::content()->count()}}</span></a>
                    </div>


                </form>


            </div>

            <!--  <div class="col-4 ">


             </div> -->
        </div>
    </div>
</div>

<!-- Header -->


<div class="container-fluid main-header">

    <h3 style="color:white" class="text-center">{{Session::get('message')}}</h3>

    <nav class="navbar navbar-expand-lg navbar-light desktop-nav container-fluid mobile-d-none">
        <a href="{{route('/')}}"><img src="{{asset('/')}}public/assets/images/logo.png" class="nav-logo ml-2 mobile-d-none" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('/')}}">Home</a>
                </li>


                @foreach($categories as $category)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('category-products',['name'=>\Illuminate\Support\Str::slug($category->short_name)]) }}" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{$category->category_name}} </a>
                       
                       @foreach($subCategories as $subCategory)
                            @if($subCategory->root_id==$category->id)
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        @foreach($subCategories as $subCategory)
                            @if($subCategory->root_id==$category->id)
                            <li class="dropdown-submenu"><a class="dropdown-item "
                                                            href="{{ route('sub-category',['name'=>\Illuminate\Support\Str::slug($subCategory->short_name)]) }}">{{$subCategory->category_name}}</a>

                                @foreach($subSubCategories as $subSubCategory)
                                        @if($subSubCategory->root_id==$subCategory->id)
                                <ul class="dropdown-menu">


                                    
                                    @foreach($subSubCategories as $subSubCategory)
                                        @if($subSubCategory->root_id==$subCategory->id)
                                            <li><a class="dropdown-item"
                                                   href="{{ route('sub-sub-category',['name'=>\Illuminate\Support\Str::slug($subSubCategory->short_name)]) }}">{{$subSubCategory->category_name}}</a></li>
                                        @endif
                                    @endforeach
                                    


                                </ul>
                                 @endif
                                    @endforeach
                            </li>
                            @endif
                        @endforeach

                    </ul>
                    @endif
                        @endforeach
                </li>
                @endforeach


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> Brands </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        
                        <li class="dropdown-submenu" aria-labelledby="navbarDropdown"> 
                        <a class="dropdown-item" href="{{route('all-brands')}}">All Brands</a>
                        @foreach($brands as $brand)
                                <a class="dropdown-item"
                                   href="{{ route('brand-product',['name'=>$brand->short]) }}">{{$brand->brand_name}}</a>
                            @endforeach

                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    
    

</div> <!-- /.container -->

<div class="container-fluid">
    <div class="row">
      <div class="col mt-4 mb-4 mobile-d-search">
    
            <form>
                <div class="input-group">
                    
                    <input type="text" class="form-control search_key" placeholder="">
                    <button class="btn btn-default btn-blue" type="button">Search</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>

<div class="overlay"></div>
<div class="nutral"></div>
<script src="{{asset('public/client/custom/search.js')}}"></script>
<script src="{{asset('public/client/custom/api.js')}}"></script>

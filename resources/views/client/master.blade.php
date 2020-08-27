<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <title>
        @yield('title')
    </title>

    <!-- favicon -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/')}}public/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}public/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}public/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{asset('/')}}public/assets/favicon/site.webmanifest">


    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    
    <!-- CSS files -->

    <link href="{{asset('/')}}public/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="{{asset('/')}}public/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('/')}}public/assets/css/owl.carousel.theme.min.css" rel="stylesheet">
    <link href="{{asset('/')}}public/assets/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('/')}}public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}public/assets/css/main.css" rel="stylesheet">
    
    <!--css style for product search background-->


    <!-- Our Custom CSS -->
    <link rel="stylesheet" href=" {{asset('/')}}public/assets/css/style_sidenav.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" ></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" ></script>
    
    <!--for ajax support -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.8.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    
</head>
<body>

{{--start header  --}}
@include('client.header.header')
{{--end header  --}}

@yield('home-content')


{{-- footer start --}}
@include('client.footer.footer')
{{-- end footer --}}


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

{{-- script --}}
<script src="{{asset('/')}}public/assets/js/jquery-1.12.3.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{asset('/')}}public/assets/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}public/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('/')}}public/assets/js/owl.carousel.min.js"></script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>-->
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{asset('/')}}public/assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
                // $('.add-cart').removeClass('opacity-none');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                // $('.add-cart').addClass('opacity-none');
            });
        });
    </script>
    
    <script type="text/javascript">
        var coll = document.getElementsByClassName("collapsible");
        var i;
        
        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
              content.style.maxHeight = null;
            } else {
              content.style.maxHeight = content.scrollHeight + "px";
            } 
          });
        }
    </script>
    

<!--for jquery ui support-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



</body>
</html>

<!--header-->
@include('admin.header.header')
<!--/header-->

<body id="page-top">

<!--TopNav-->
@include('admin.navbar.navbar')
<!--TopNav-->

<div id="wrapper">

    <!-- Sidebar -->
@include('admin.sidebar.sidebar')
<!--/Sidebar-->
    <!-- admin home content -->
    @yield('admin-home')
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
@include('admin.logoutmodal.logoutmodal')
<!--/ Logout Modal-->

<!-- Bootstrap core JavaScript-->

@include('admin.endgame.endgame')

<!-- @include('admin.footer.footer') -->

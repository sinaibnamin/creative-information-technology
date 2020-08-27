@extends('admin.master')
@section('admin-home')
    <!--header-->
    <!--/header-->
    <body id="page-top">
    {{-- <div id="wrapper"> --}}
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Types</li>
            </ol>
            <h3 style='color:red' align='center'>{{Session::get('message')}}</h3>
            <!-- /Breadcrumbs-->
            <!-- DataTables Example -->
            <div class="card mb-12">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col">

                            <a href=''>

                                <a href=''>

                                    <a href="{{route('add-type')}}"
                                       class="btn btn-sm btn-outline-success">Add New Type
                                    </a>

                                </a>
                            </a>
                        </div>
                   
                    </div>



                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                            <thead class="">
                            <tr>
                                <th style="width: 20px;">No.</th>
                                <th style="width: 30px;">Name</th>
                                <th style="width: 20px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach ($types as $v_type)


                                <tr>
                                    <td>{{$i++}}</td>

                                <td>{{$v_type->type_name}}</td>
                                    <td>
                                        {{-- <a
                                            href=""
                                            class="btn btn-info" style="border-radius: 12px;">
                                            Details
                                        </a> --}}
                                        <a
                                    href="{{route('edit-type',['id'=> $v_type->id])}}"
                                            class="btn btn-primary mt-2" style="border-radius: 12px;" >
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>







        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

        <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

    </body>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <!--/ Logout Modal-->


    <!-- Bootstrap core JavaScript-->



    <script>

        function showProductDetail(product){

// $('#myModal').on('shown.bs.modal', function () {
// $('#myInput').trigger('focus')
// })
// Clearing Previous Data
//$('#product-detail').html('');
//console.log(product);
//$('#productDetailModal').modal('show');

        }


    </script>



@endsection

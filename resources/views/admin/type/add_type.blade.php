@extends('admin.master')
@section('admin-home')
    <body id="page-top">

    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Types</li>
                <li class="breadcrumb-item active">Add New</li>
            </ol>
            <!-- /Breadcrumbs-->
            <!-- Add Form -->
            <h3 style='color:red' align='center'>{{Session::get('message')}}</h3>

            <div class="col-md-6 offset-md-3">

            <form action="{{route('save-type')}}" method="Post">
                    @csrf
                    <br>
                    <div class="form-group">
                        <label for="type_name">Type Name</label>
                        <input id="type_name" name="type_name" class="form-control form-control-lg" type="text"
                               placeholder="Enter Type Name" required
                               style="border-radius: 20px;">
                    
                    </div>
                    </br>


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" style="border-radius: 20px;">
                            Save
                        </button>
                    </div>
                </form>

            </div>


            <!-- /Add Form -->


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

        <!-- Sticky Footer -->

    </div>
 
    </body>
 
@endsection

@extends('admin.master')
@section('admin-home')
    <body id="page-top">

    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Types</li>
                <li class="breadcrumb-item active">Edit Type</li>
            </ol>
            <!-- /Breadcrumbs-->
            <!-- Add Form -->
            <h3 style='color:red' align='center'>{{Session::get('message')}}</h3>

            <div class="col-md-6 offset-md-3">

            <form action="{{route('update-type')}}" method="Post">
                    @csrf
                    <br>
                    <div class="form-group">
                        <label for="type_name">Type Name</label>
                    <input id="type_name" name="type_name" value="{{$type->type_name}}" class="form-control form-control-lg" type="text"
                               placeholder="Enter Type Name" required
                               style="border-radius: 20px;">
                    <input type="hidden" name="id" value="{{$type->id}}">
                        <span
                    </div>
                    </br>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" style="border-radius: 20px;">
                            Update
                        </button>
                    </div>
                </form>

            </div>


            <!-- /Add Form -->


        </div>
    </div>
    </body>
@endsection

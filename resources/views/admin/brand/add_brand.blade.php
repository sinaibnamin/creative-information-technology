@extends('admin.master')
@section('admin-home')
    <body id="page-top">
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Brand</li>
                <li class="breadcrumb-item active">Add New</li>
            </ol>
            <!-- /Breadcrumbs-->
            <!-- Add Form -->
            <h3 style='color:red' align='center'>{{Session::get('message')}}</h3>

            <div class="col-md-6 offset-md-3">

            <form action="{{route('save-brand')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="form-group">
                        <label for="type_name">Brand Name</label>
                        <input required id="type_name" name="brand_name" class="form-control form-control-lg" type="text"
                               placeholder="Enter Brand Name" required
                               style="border-radius: 20px;"> 
                              <br/> 
                        <label>Short Name</label>
                        <input required name="short_name" class="form-control form-control-lg" type="text"
                               placeholder="Enter Short Name" required
                               style="border-radius: 20px;">        
                               <label for="type_name" class="mt-3">Brand Image</label>
                               <br/>
                               <input required type="file" name="brand_image"/>
                    </div>
                    </br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" style="border-radius: 20px;">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
@endsection

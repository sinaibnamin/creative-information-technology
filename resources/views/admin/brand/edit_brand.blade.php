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

            <form action="{{route('update-brand')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="form-group">
                        <label for="type_name">Brand Name</label>
                        <input id="type_name" name="brand_name" value="{{$brand->brand_name}}" class="form-control form-control-lg" type="text"
                               placeholder="Enter Brand Name" required
                               style="border-radius: 20px;">
                               
                               <label>Short Name</label>
                        <input required value="{{$brand->short}}" name="short_name" class="form-control form-control-lg" type="text"
                               placeholder="Enter Short Name" required
                               style="border-radius: 20px;"> 
                               
                               <label for="type_name" class="mt-3">Brand Image</label>
                               <br/>
                               
                               <img src="{{asset($brand->brand_image)}}" alt="" height="100" width="120">
                               <br/>
                               <br/>
                               <input type="file" name="brand_image"/>
                    <input type="hidden" name="id" value="{{$brand->id}}"/>
                    </div>
                    </br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" style="border-radius: 20px;">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
@endsection

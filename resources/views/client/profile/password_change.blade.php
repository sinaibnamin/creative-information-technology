@extends('client.master')
@section('title')
    Creative Information Technology
@endsection
@section('home-content')

    <div class="row container-fluid featured pl-5 pt-3">

        <div class="col-12 bg-white text-center p-2 h3"> Password Reset</div>


        <div class="col-12 bg-white border p-0">

            <div class="container">

                <hr>


                <form action="{{route('update-password')}}" class="form-horizontal"  method="post">
                    @csrf
                <div class="row">
                    <!-- left column -->



               

                <!-- edit form column -->
                    <div class="col-md-9 personal-info">
                            
                            <div class="form-group row">
                                <label class="col-2 control-label">Old Password</label>
                                <div class="col-8">
                                    <input name="oldpassword" required class="form-control" type="password" >
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 control-label">New Password</label>
                                <div class="col-8">
                                    <input name="new_password" required class="form-control" type="password">
                                     <input type="hidden" name="id" value="{{Session::get('client_id')}}">
                                </div>
                            </div>

                          

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Save Changes">

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <hr>


        </div>


        <div class="col-9 bg-white">


        </div>
    </div>


@endsection

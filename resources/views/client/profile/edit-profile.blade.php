@extends('client.master')
@section('title')
    Creative Information Technology
@endsection
@section('home-content')

    <div class="row container-fluid featured pl-5 pt-3">

        <div class="col-12 bg-white text-center p-2 h3"> Profile</div>


        <div class="col-12 bg-white border p-0">

            <div class="container">

                <hr>


                <form action="{{route('client-update-profile')}}" class="form-horizontal" role="form"
                      enctype="multipart/form-data" method="post">
                    @csrf
                <div class="row">
                    <!-- left column -->



                <div class="col-md-3">
                    <div class="text-center">
                        <img src="{{asset(Session::get('client_photo'))}}" class="avatar img-circle" alt="avatar">
                        <h6>Upload a different photo...</h6>

                        <input name="client_image" type="file" class="form-control">
                    </div>
                </div>

                <!-- edit form column -->
                    <div class="col-md-9 personal-info">



                            {{--                        ekahen chilo form ta--}}
                            <input type="hidden" name="id" value="{{Session::get('client_id')}}">
                            <div class="form-group row">
                                <label class="col-2 control-label">First name:</label>
                                <div class="col-8">
                                    <input name="first_name" class="form-control" type="text" value="{{Session::get('client_first_name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 control-label">Last name:</label>
                                <div class="col-8">
                                    <input name="last_name" class="form-control" type="text" value="{{Session::get('client_last_name')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 control-label">Email:</label>
                                <div class="col-lg-8">
                                    <input name="email" class="form-control" type="email" value="{{Session::get('client_email')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 control-label">NID Number:</label>
                                <div class="col-8">
                                    <input name="nid" class="form-control" type="text" value="{{Session::get('client_nid')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 control-label">City:</label>
                                <div class="col-8">
                                    <input name="city" class="form-control" type="text" value="{{Session::get('client_city')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 control-label">Present Address:</label>
                                <div class="col-8">
                                    <input name="present_address" class="form-control" type="text" value="{{Session::get('client_present_address')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 control-label">Permanent Address:</label>
                                <div class="col-8">
                                    <input name="permanent_address" class="form-control" type="text" value="{{Session::get('client_permanent_address')}}">
                                </div>
                            </div>
                            {{--
                            <div class="form-group row">
                                <label class="col-md-2 control-label">Password:</label>
                                <div class="col-md-8">
                                    <input name="password" class="form-control" type="password" value="{{Session::get('client_password')}}">
                                </div>
                            </div>
                            --}}

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

@extends('client.master')
@section('home-content')

    <div class="row container-fluid featured pl-5 pt-3">

    <div class="col-12 bg-white text-center p-2 h3"> Register</div>


    <div class="col-12 bg-white border p-0">


        <section>
            <div class="container col-md-4">
                <div class="row justify-content-center">
                    <div class="col-sm-12 card-body bg-danger">

                        <form action="{{route('registration-process')}}" method="post">
                            @csrf
                            <div class="form-group row align-items-center">
                                <div class="col mt-4">
                                    <input name="full_name" type="text" class="form-control" placeholder="Full Name">
                                    <span class="text-danger">{{$errors->has('full_name') ? $errors->first('full_name') : ' '}}</span>

                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-4">
                                <div class="col">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ' '}}</span>

                                </div>
                            </div>

                            <div class="form-group row align-items-center mt-4">
                                <div class="col">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ' '}}</span>

                                </div>
                            </div>

                            <div class="form-group row align-items-center mt-4">
                                <div class="col">
                                    <input type="text" name="contact_no" class="form-control" placeholder="Contact No">
                                    <span class="text-danger">{{$errors->has('contact_no') ? $errors->first('contact_no') : ' '}}</span>

                                </div>

                            </div>


                            <div class="form-group row align-items-center mt-4">
                                <div class="col text-center">
                                    <input type="submit" value="Register" class="btn btn-success">
                                </div>
                            </div>
                            <div class="sign-up">
                                Already have an account? <a href="{{route('client-login')}}">Login
                                    Here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    </div>
</div>
    
@endsection


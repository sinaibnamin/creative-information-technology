@extends('client.master')
@section('home-content')

    <div class="row container-fluid featured pl-5 pt-3">

    <div class="col-12 bg-white text-center p-2 h3"> Login</div>


    <div class="col-12 bg-white border p-0">


        <section>
            <div class="container col-md-4">
                <div class="row justify-content-center">
                    <div class="col-sm-12 card-body bg-danger">

                        <form action="{{route('login-process')}}" method="post">
                            @csrf

                            <div class="form-group row align-items-center mt-4">
                                <div class="col">
                                    <input type="email" name="email" class="form-control" placeholder="Email">

                                </div>
                            </div>

                            <div class="form-group row align-items-center mt-4">
                                <div class="col">
                                    <input type="password" name="password" class="form-control" placeholder="Password">

                                </div>
                            </div>



                            <div class="form-group row align-items-center mt-4">
                                <div class="col text-center">
                                    <input type="submit" value="Login" class="btn btn-success">
                                </div>
                            </div>
                            <div class="sign-up">
                                Need an account? <a href="{{route('client-register')}}">SignUp
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



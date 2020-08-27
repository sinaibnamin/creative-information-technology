@extends('client.master')
@section('home-content')

    <div class="row container-fluid featured pl-5 pt-3">

        <div class="col-12 bg-white text-center p-2 h3"> Forgot Password</div>


        <div class="col-12 bg-white border p-0">


            <section>
                <div class="container col-md-4">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 card-body bg-danger">

                            <form action="{{route('check-email-forgot-password')}}" method="post">
                                @csrf

                                <div class="form-group row align-items-center mt-4">
                                    <div class="col">
                                        <input type="email" name="email" class="form-control" placeholder="Email">

                                    </div>
                                </div>

                                <div class="form-group row align-items-center mt-4">
                                    <div class="col text-center">
                                        <input type="submit" value="Submit" class="btn btn-success">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>

@endsection



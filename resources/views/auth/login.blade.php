

@extends('layouts.login')


@section('loginContent')




    <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
        <div class="login  align-items-center py-2">
            <!-- Demo content-->
            <div class="container p-0">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                        <div class="card-sigin">
                            <div class="mb-5 d-flex"> <a href="index.html"><img src="{{asset('assets/backend/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
                            <div class="card-sigin">
                                <div class="main-signup-header">
                                    <h2>Welcome back!</h2>
                                    <h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>
                                    <form class="form" action="{{route('login')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Email</label>
                                             <input class="form-control" name="email" placeholder="Enter your email" type="email">
                                             @error('email')
                                             <span class="text-danger">{{$message}}</span>
                                             @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" placeholder="Enter your password" type="password">
                                            @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div><button type="submit" class="btn btn-main-primary btn-block">Sign In</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End -->
        </div>
    </div>

@endsection



@extends('layouts.login')


@section('content')





    <div class="row justify-content-center no-gutters vertical-align">
        <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url({{asset('assets/images/login-inner-bg.jpg')}});">
            <div class="login-fancy">
                <h2 class="text-white mb-20">Welcome Back !</h2>
                <ul class="list-unstyled  pos-bot pb-30">
                    <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                    <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                </ul>
            </div>
        </div>



        <div class="col-lg-4 col-md-6 bg-white">
            <div class="login-fancy pb-40 clearfix">
                <h3 class="mb-30">Sign In </h3>

                @include('partials.flash')

                <form class="form" action="{{route('login')}}" method="post">

                    @csrf

                    <div class="section-field mb-20">
                        <label class="mb-10" for="name">Email* </label>
                        <input id="email" class="web form-control" type="email" placeholder="Email" name="email">
                    </div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="section-field mb-20">
                        <label class="mb-10" for="Password">Password* </label>
                        <input id="password" class="Password form-control" type="password" placeholder="Password" name="password">
                    </div>
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="section-field">
                        <div class="remember-checkbox mb-30">
                            <input type="checkbox" class="form-control" name="remember_me" id="remember_me" />
                        </div>
                    </div>
                    <button href="#" class="button" type="submit">
                        <span>Log in</span>
                        <i class="fa fa-check"></i>
                    </button>
                </form>
            </div>
        </div>


    </div>


@endsection

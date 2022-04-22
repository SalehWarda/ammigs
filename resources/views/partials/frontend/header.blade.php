<header class="header header-static bg-black header-sticky">
    <div class="default-header menu-right">
        <div class="container container-1520">
            <div class="row">

                <!--Logo start-->
                <div class="col-12 col-md-3 col-lg-3 order-md-1 order-lg-1 mt-20 mb-20">
                    <div class="logo">
                        <a href="{{route('index')}}"><img src="{{asset('assets/frontend/images/logo-lg1.png')}}"></a>
                    </div>
                </div>
                <!--Logo end-->

                <!--Menu start-->
                <div class="col-lg-6 col-12 order-md-4 order-lg-2 d-flex justify-content-center">
                    <nav class="main-menu menu-style-2">
                        <ul >


                            <li><a href="{{route('index')}}">Home</a>

                            </li>
                            <li><a href="{{route('games')}}">Games</a>

                            </li>
                            <li><a href="{{route('about')}}">About</a>

                            </li>

                            <li><a href="forum.html">Contact</a>

                            </li>




                 <li></li>

                        </ul>
                    </nav>
                </div>
                <!--Menu end-->

                <!--Header Right Wrap-->
                <div class="col-12 col-md-9 order-md-2 order-lg-3 col-lg-3">
                    <div class="header-right-wrap">
                        <ul>

                            <li>

                                <div class="dropdown  nav-itemd-none d-md-flex">
                                    <div class="btn-group mb-1">
                                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if (App::getLocale() == 'ar')
                                                {{ LaravelLocalization::getCurrentLocaleName() }}
                                                <img src="{{ URL::asset('assets/backend/flags/EG.png') }}" alt="">
                                            @else
                                                {{ LaravelLocalization::getCurrentLocaleName() }}
                                                <img src="{{ URL::asset('assets/backend/flags/US.png') }}" alt="">
                                            @endif
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a class="dropdown-item" style="text-align: center; padding: 0px" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li></li>
                            <li><a href="{{route('getLogin')}}">LOGIN</a></li>

                        </ul>



                    </div>


                </div>




                <!--Header Right Wrap-->

            </div>

            <!--Mobile Menu start-->
            <div class="row">
                <div class="col-12 d-flex d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
            <!--Mobile Menu end-->

        </div>
    </div>
</header>


@extends('layouts.app')

@section('title')

    التفاصيل

@endsection

@section('content')


    <div class="blog-details-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-xs-50">
        <div class="container">
            <div class="row row-25">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-details">
                                <div class="blog-img">
                                    <a href="#"><img src="{{asset('assets/images/games/'.$game->firstMedia->file_name)}}"  alt="{{$game->name}}"" alt=""></a>
                                    <div class="meta-box">
                                        <ul class="meta meta-border-bottom">

                                            <li>{{$game->created_at->format('M d, Y')}}</li>
                                            <li><a href="#">{{$game->available_to}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h3>{{$game->name}}</h3>
                                    <p>{{$game->description}}</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area mt-sm-55 mt-xs-45">
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>featured games</h3>

                            @foreach(\App\Models\Game::latest()->take(2)->get() as $game)
                                <div class="single-featured-game mb-20">
                                    <div class="game-img">
                                        <a href="#"><img
                                                src="{{asset('assets/images/games/'.$game->firstMedia->file_name)}}"
                                                alt=""></a>
                                        <a class="game-title" href="#">{{$game->name}}</a>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>follow us</h3>
                            <div class="sidebar-social">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="icofont-youtube-play"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="icofont-instagram"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="icofont-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>popular/recomended</h3>
                            @foreach(\App\Models\Game::whereStatus(1)->take(2)->get() as $game)
                                <div class="popular-game mb-20">
                                    <div class="game-img">
                                        <a href="#"><img
                                                src="{{asset('assets/images/games/'.$game->firstMedia->file_name)}}"
                                                alt=""></a>
                                    </div>
                                    <div class="game-content">
                                        <h3><a href="#">{{$game->name}}</a></h3>
                                        <br>
                                        <span>{{$game->available_to}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>recent post</h3>
                            <div class="sidebar-rc-post">
                                <ul>

                                    @foreach(\App\Models\Game::latest()->take(4)->get() as $game)
                                        <li>
                                            <div class="rc-post-thumb">
                                                <a href="#"><img
                                                        src="{{asset('assets/images/games/'.$game->firstMedia->file_name)}}"
                                                        alt=""></a>
                                            </div>
                                            <div class="rc-post-content">
                                                <h3><a href="#">{{$game->name}}</a></h3>
                                                <div class="widget-date">{{$game->created_at->format('d M, Y')}}</div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

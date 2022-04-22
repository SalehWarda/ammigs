@extends('layouts.app')

@section('title')

    Home

@endsection

@section('content')


    <div class="blog-area section pt-100 pt-lg-80 pt-md-70 pt-sm-55 pt-xs-25 pb-xs-50">
        <div class="container container-1520">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <!--Section Title Start-->
                            <div class="section-title">
                                <ul class="nav categorie-tab-menu">
                                    <li><a class="active" data-toggle="tab" href="#all">all</a></li>

                                    @foreach($categories as $category)
                                        <li><a data-toggle="tab" href="#{{$category->name}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                    <li></li>
                                </ul>

                            </div>
                            <!--Section Title End-->
                        </div>
                    </div>
                    <div class="row row-7">
                        <div class="tab-content">
                            <div id="all" class="tab-pane fade show active">
                                <div class="row row-7">

                                    @foreach($games as $game)
                                        <div class="col-md-6">
                                            <!--Single Blog Post Start-->
                                            <div class="single-blog-post mb-30">
                                                <div class="blog-img">
                                                    <a href="{{route('games.details',$game->id)}}"><img
                                                            src="{{asset('assets/images/games/'.$game->firstMedia->file_name)}}"
                                                            alt="{{$game->name}}">
                                                    </a>
                                                </div>
                                                <div class="blog-content">
                                                    <h3><a href="{{route('games.details',$game->id)}}">{{$game->name}}</a></h3>
                                                    <p>{!! \Illuminate\Support\Str::limit($game->description, 145, '...') !!}</p>
                                                    <ul class="meta">
                                                        <li>{{$game->created_at->format('d M, Y')}}</li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!--Single Blog Post End-->
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @foreach($categories as $category)

                                <div id="{{$category->name}}" class="tab-pane fade">
                                    <div class="row row-7">

                                        @foreach($category->games as $game)
                                        <div class="col-md-6">
                                            <!--Single Blog Post Start-->
                                            <div class="single-blog-post mb-30">
                                                <div class="blog-img">
                                                    <a href="{{route('games.details',$game->id)}}"><img
                                                            src="{{asset('assets/images/games/'.$game->firstMedia->file_name)}}"
                                                            alt="{{$game->name}}">
                                                    </a>
                                                </div>
                                                <div class="blog-content">
                                                    <h3><a href="{{route('games.details',$game->id)}}">{{$game->name}}</a></h3>
                                                    <p>{!! \Illuminate\Support\Str::limit($game->description, 145, '...') !!}</p>
                                                    <ul class="meta">
                                                        <li>{{$game->created_at->format('d M, Y')}}</li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!--Single Blog Post End-->
                                        </div>
                                        @endforeach

                                    </div>
                                </div>

                            @endforeach


                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class=" text-center">
                                {!! $games->appends(request()->all())->links() !!}

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="sidebar-area mt-sm-55 mt-xs-45">
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>featured games</h3>

                            @foreach(\App\Models\Game::latest()->take(2)->get() as $game)
                                <div class="single-featured-game mb-20">
                                    <div class="game-img">
                                        <a href="{{route('games.details',$game->id)}}"><img
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
                                        <a href="{{route('games.details',$game->id)}}"><img
                                                src="{{asset('assets/images/games/'.$game->firstMedia->file_name)}}"
                                                alt=""></a>
                                    </div>
                                    <div class="game-content">
                                        <h3><a href="{{route('games.details',$game->id)}}">{{$game->name}}</a></h3>
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
                                                <a href="{{route('games.details',$game->id)}}"><img
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

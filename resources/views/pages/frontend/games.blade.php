
@extends('layouts.app')

@section('title')

    Home

@endsection

@section('content')


    <div class="games-area section pt-85 pt-lg-65 pt-md-55 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Game Toolbar Start-->
                    <div class="game-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
                        <div class="game-search-box">
                            <h3>All Games</h3>
                        </div>
                        <!--Toolbar Short Area Start-->

                        <!--Toolbar Short Area End-->
                    </div>
                    <!--Game Toolbar End-->
                </div>
            </div>
            <div class="row">

                @forelse($games as $game)
                    <div class="col-lg-4 col-md-6">
                        <!--Single Game Start-->
                        <div class="single-game mb-50">
                            <div class="game-img">
                                <a href="{{route('games.details',$game->id)}}"><img src="{{asset('assets/images/games/'.$game->firstMedia->file_name)}}"  alt="{{$game->name}}">
                                </a>
                            </div>
                            <div class="game-content ">
                                <h4><a href="">{{$game->name}}</a></h4>
                                <br>
                                <span>{{$game->available_to}}</span>
                            </div>
                        </div>
                        <!--Single Game End-->
                    </div>

                @empty
                @endforelse


            </div>

            <div class="row">
                <div class="col-12">
                    <div class=" text-center">
                        {!! $games->appends(request()->all())->links() !!}

                    </div>
                </div>
            </div>




        </div>
    </div>

@endsection

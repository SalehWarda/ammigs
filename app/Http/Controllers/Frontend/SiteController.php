<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\about;
use App\Models\Category;
use App\Models\Game;
use App\Models\Slider;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {

    $categories = Category::get();
    $games = Game::with('category','firstMedia')->paginate(8);
        return view('pages.frontend.index',compact('categories','games'));
    }


 public function games()
    {

        $games = Game::with('category','firstMedia')->paginate(12);
        return view('pages.frontend.games',compact('games'));
    }


    public function details($id)
    {
        $game = Game::findOrFail($id);
        return view('pages.frontend.game_details',compact('game'));
    }


    public function about()
    {
        $game = Game::get();
        $about = about::first();
        return view('pages.frontend.about',compact('game','about'));
    }

}

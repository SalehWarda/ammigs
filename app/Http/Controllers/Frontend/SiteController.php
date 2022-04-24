<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\about;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Cover;
use App\Models\Game;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {

        $data['covers'] = Cover::all();
        $data['about'] = About::first();
        $data['products'] = Product::all();
        $data['contacts'] = Contact::first();


        return view('pages.frontend.index',$data);
    }




}

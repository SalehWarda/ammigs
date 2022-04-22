<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\GameRequest;
use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GamesController extends Controller
{

    public function index()
    {
        //
        $games = Game::with(['category','firstMedia'])->paginate(10);
        return view('pages.backend.games.index',compact('games'));
    }


    public function create()
    {
        //
        $categories = Category::get(['id','name']);
        return view('pages.backend.games.create',compact('categories'));
    }


    public function store(GameRequest $request)
    {
        //
        $input['name'] = ['ar'=>$request->name_ar , 'en'=>$request->name_en];
        $input['description'] = ['ar'=>$request->description_ar , 'en'=>$request->description_en];
        $input['category_id'] = $request->category_id;
        $input['available_to'] = $request->available_to;
        $input['status'] = $request->status;

        $games = Game::create($input);

        $i=1;
        if($request->images && count($request->images) > 0){
            foreach ($request->images as $image){

                $fie_name = Str::slug($request->name_en).'_'.time().'_'.$i.'.'.$image->getClientOriginalExtension();
                $file_size= $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/images/games/'.$fie_name);
                Image::make($image->getRealPath())->resize(500,null,function ($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);

                $games->media()->create([
                    'file_name' => $fie_name,
                    'file_size' => $file_size,
                    'file_type'=>$file_type,
                    'file_status'=>true,
                    'file_sort'=>$i,
                ]);
                $i++;

            }
            toastr()->success('تم الإضافة بنجاح !');
            return redirect()->route('admin.games');


        }


    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $game = Game::findOrFail($id);
        $categories = Category::get(['id','name']);
        return view('pages.backend.games.edit',compact('game','categories'));
    }


    public function update(Request $request)
    {
        //
        $game = Game::findOrFail($request->id);

        $input['name'] = ['ar'=>$request->name_ar , 'en'=>$request->name_en];
        $input['description'] = ['ar'=>$request->description_ar , 'en'=>$request->description_en];
        $input['category_id'] = $request->category_id;
        $input['available_to'] = $request->available_to;
        $input['status'] = $request->status;

        $game->update($input);

        $i= $game->media()->count() +1;
        if($request->images && count($request->images) > 0){
            foreach ($request->images as $image){

                $fie_name = $request->name_en.'_'.time().'_'.$i.'.'.$image->getClientOriginalExtension();
                $file_size= $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/images/games/'.$fie_name);
                Image::make($image->getRealPath())->resize(500,null,function ($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);

                $game->media()->create([
                    'file_name' => $fie_name,
                    'file_size' => $file_size,
                    'file_type'=>$file_type,
                    'file_status'=>true,
                    'file_sort'=>$i,
                ]);
                $i++;

            }



        }

        toastr()->success('تم التعديل بنجاح !');
        return back();
    }

    public function destroy(Request $request)
    {
        //
        $game = Game::findOrFail($request->delete_game_id);

        if ($game->media()->count() > 0){

            foreach ($game->media as $media){

                if (File::exists('assets/images/games/' . $media->file_name)) {

                    unlink('assets/images/games/' . $media->file_name);

                }
                $media->delete();

            }





        }

        $game->delete();
        toastr()->error('تم الحذف بنجاح !');
        return redirect()->route('admin.games');
    }

    public function removeImage(Request $request)
    {


        $game = Game::findOrFail($request->game_id);
        $image = $game->media()->whereId($request->image_id)->first();
        if (File::exists('assets/images/games/'. $image->file_name)){
            unlink('assets/images/games/'. $image->file_name);
        }
        $image->delete();
        return true;
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoverRequest;
use App\Models\Cover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CoverController extends Controller
{

    public function index()
    {
        //
        $covers = Cover::paginate(8);
        return view('pages.backend.covers.index',compact('covers'));
    }


    public function create()
    {
        //
        return view('pages.backend.covers.create');

    }


    public function store(CoverRequest $request)
    {
        //
        $input['title'] = ['ar'=>$request->title_ar,'en' => $request->title_en];
        $input['description'] = ['ar' => $request->description_ar,'en' => $request->description_en];

        if ($image = $request->file('image')) {
            $file_name = Str::slug($request->title_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/images/cover/' . $file_name);

            Image::make($image->getRealPath())->resize(1090,null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }


        Cover::create($input);

        toastr()->success(trans('dashboard.Created_Successfully'));

        return redirect()->route('admin.covers');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $cover = Cover::findOrFail($id);
        return view('pages.backend.covers.edit',compact('cover'));
    }


    public function update(CoverRequest $request)
    {
        //
        $cover = Cover::findOrFail($request->id);

        $input['title'] = ['ar'=>$request->title_ar,'en' => $request->title_en];
        $input['description'] = ['ar' => $request->description_ar,'en' => $request->description_en];

        if ($image = $request->file('image')) {
            if ($cover->image != null && File::exists('/assets/images/cover/' . $cover->image)) {

                unlink('/assets/images/cover/' . $cover->image);
            }

            $file_name = Str::slug($request->title_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/images/cover/' . $file_name);

            Image::make($image->getRealPath())->resize(1090, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        $cover->update($input);

        toastr()->success(trans('dashboard.Updated_Successfully'));

        return back();
    }


    public function destroy(Request $request)
    {
        //
        $cover = Cover::findOrFail($request->delete_cover_id);
        if (File::exists('assets/images/cover/' . $cover->image)) {

            unlink('assets/images/cover/' . $cover->image);

        }
        $cover->delete();
        toastr()->error(trans('dashboard.Deleted_Successfully'));
        return back();

    }

    public function removeImage(Request $request)
    {


        $cover = Cover::findOrFail($request->cover_id);
        if (File::exists('assets/images/cover/'.$cover->image)) {

            unlink('assets/images/cover/'.$cover->image);
            $cover->image = null;
            $cover->save();

        }
        return true;
    }
}

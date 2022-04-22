<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{

    public function index()
    {
        //
        $sliders = Slider::paginate(10);
        return view('pages.backend.home.sliders.slider',compact('sliders'));

    }


    public function create()
    {
        //
        return view('pages.backend.home.sliders.create');

    }


    public function store(SliderRequest $request)
    {

        //



        $input['name'] =['ar'=>$request->name_ar, 'en'=>$request->name_en];
        $input['description']  =['ar'=>$request->description_ar, 'en'=>$request->description_en];

        if ($image = $request->file('image')) {
            $file_name = Str::slug($request->name_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/images/slider/' . $file_name);

         Image::make($image->getRealPath())->resize(500, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        Slider::create($input);

        toastr()->success('تم الإضافة بنجاح!');

        return back();

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $sliders = Slider::findOrFail($id);
        return view('pages.backend.home.sliders.edit',compact('sliders'));
    }



    public function update(SliderRequest $request)
    {
        //

        $slider = Slider::findOrFail($request->id);

        $input['name'] =['ar'=>$request->name_ar, 'en'=>$request->name_en];
        $input['description']  =['ar'=>$request->description_ar, 'en'=>$request->description_en];

        if ($image = $request->file('image')) {

            if ($slider->image != null && File::exists('/assets/images/slider/' . $slider->image)) {

                unlink('/assets/images/slider/' . $slider->image);
            }


            $file_name = Str::slug($request->name_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/images/slider/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        $slider->update($input);

        toastr()->success('تم التعديل بنجاح!');

        return back();
    }


    public function destroy(Request $request)
    {
        //
        $slider = Slider::findOrFail($request->delete_slider_id);
        if (File::exists('assets/images/slider/' . $slider->image)) {

            unlink('assets/images/slider/' . $slider->image);

        }
        $slider->delete();
        toastr()->error('تم الحذف بنجاح!');
        return back();

    }

    public function removeImage(Request $request)
    {


        $slider = Slider::findOrFail($request->slider_id);
        if (File::exists('assets/images/slider/' . $slider->image)) {

            unlink('assets/images/slider/' . $slider->image);
            $slider->image = null;
            $slider->save();

        }
        return true;
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Object_;

class ProductController extends Controller
{

    public function index()
    {
        //
        $products = Product::paginate(8);
        return view('pages.backend.products.index',compact('products'));
    }


    public function create()
    {
        //
        return view('pages.backend.products.create');

    }


    public function store(Request $request)
    {
        //
        $input['name'] = ['ar'=>$request->name_ar,'en' => $request->name_en];
        $input['description'] = ['ar' => $request->description_ar,'en' => $request->description_en];
        $input['app_store_link'] =  $request->app_store_link;
        $input['google_play_link'] =  $request->google_play_link;

        if ($image = $request->file('image')) {
            $file_name = Str::slug($request->name_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/images/products/' . $file_name);

            Image::make($image->getRealPath())->resize(1090,null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        Product::create($input);

        toastr()->success('تم الإضافة بنجاح!');

        return redirect()->route('admin.products');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        return view('pages.backend.products.edit',compact('product'));
    }


    public function update(Request $request)
    {
        //
        $product = Product::findOrFail($request->id);

        $input['name'] = ['ar'=>$request->name_ar,'en' => $request->name_en];
        $input['description'] = ['ar' => $request->description_ar,'en' => $request->description_en];
        $input['app_store_link'] =  $request->app_store_link;
        $input['google_play_link'] =  $request->google_play_link;

        if ($image = $request->file('image')) {
            if ($product->image != null && File::exists('/assets/images/products/' . $product->image)) {

                unlink('/assets/images/products/' . $product->image);
            }

            $file_name = Str::slug($request->name_en) . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/images/products/' . $file_name);

            Image::make($image->getRealPath())->resize(1090, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        $product->update($input);

        toastr()->success('تم التعديل بنجاح!');

        return back();
    }


    public function destroy(Request $request)
    {
        //
        $product = Product::findOrFail($request->delete_product_id);
        if (File::exists('assets/images/products/' . $product->image)) {

            unlink('assets/images/products/' . $product->image);

        }
        $product->delete();
        toastr()->error('تم الحذف بنجاح!');
        return back();

    }

    public function removeImage(Request $request)
    {


        $product = Product::findOrFail($request->cover_id);
        if (File::exists('assets/images/products/'.$product->image)) {

            unlink('assets/images/products/'.$product->image);
            $product->image = null;
            $product->save();

        }
        return true;
    }
}

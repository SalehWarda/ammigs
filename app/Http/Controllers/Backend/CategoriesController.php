<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        //
        $categories= Category::paginate(10);
        return view('pages.backend.categories.index',compact('categories'));
    }


    public function create()
    {
        //
//        return view('pages.backend.categories.create');

    }


    public function store(CategoryRequest $request)
    {
        //
        $input['name'] =['ar'=>$request->name_ar, 'en'=>$request->name_en];


        Category::create($input);

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

    }


    public function update(CategoryRequest $request)
    {
        //
        $category = Category::findOrFail($request->id);

        $input['name'] =['ar'=>$request->name_ar, 'en'=>$request->name_en];


        $category->update($input);

        toastr()->success('تم التعديل بنجاح!');

        return back();
    }


    public function destroy(Request $request)
    {
        //
        $category = Category::findOrFail($request->delete_category_id);

        $category->delete();
        toastr()->error('تم الحذف بنجاح!');
        return back();
    }
}

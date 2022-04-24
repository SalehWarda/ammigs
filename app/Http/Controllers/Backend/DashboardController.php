<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\about;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('pages.backend.index');
    }


    public function about()
    {
        $about = about::first();
        return view('pages.backend.about',compact('about'));
    }

    public function updateAbout(Request $request)
    {
        $about = about::findOrFail($request->id);
        $input['about']  =['ar'=>$request->about_ar, 'en'=>$request->about_en];



        if ($image = $request->file('image')) {

            if ($about->image != null && File::exists('/assets/images/about/' . $about->image)) {

                unlink('/assets/images/about/' . $about->image);
            }


            $file_name = "about". "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/images/about/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {

                $constraint->aspectRatio();
            })->save($path, 100);

            $input['image'] = $file_name;

        }
        $about->update($input);

        toastr()->success('تم التعديل بنجاح!');

        return back();
    }


    public function removeImage(Request $request)
    {


        $about = about::findOrFail($request->about_id);
        if (File::exists('assets/images/about/' . $about->image)) {

            unlink('assets/images/about/' . $about->image);
            $about->image = null;
            $about->save();

        }
        return true;
    }



    public function contacts()
    {
        $contacts = Contact::first();
        return view('pages.backend.contacts',compact('contacts'));
    }

    public function updateContacts(Request $request)
    {
        $contacts = Contact::findOrFail($request->id);
        $input['contact_description']  = ['ar'=>$request->contact_ar, 'en'=>$request->contact_en];
        $input['address']  = $request->address;
        $input['phone']  =$request->phone;
        $input['email']  =$request->email;




        $contacts->update($input);

        toastr()->success('تم التعديل بنجاح!');

        return back();
    }
}

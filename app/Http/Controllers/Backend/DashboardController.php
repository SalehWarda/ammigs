<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\about;
use App\Models\Contact;
use App\Models\service;
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

   public function services()
    {
        $service = Service::first();
        return view('pages.backend.services',compact('service'));
    }

    public function updateServices(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $input['service']  =['ar'=>$request->service_ar, 'en'=>$request->service_en];




        $service->update($input);

        toastr()->success(trans('dashboard.Updated_Successfully'));

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

        toastr()->success(trans('dashboard.Updated_Successfully'));

        return back();
    }
}

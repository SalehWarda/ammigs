<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminProfileRequest;
use App\Models\Setting;
use App\Traits\AttachmentLibraryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SettingController extends Controller
{

    use AttachmentLibraryTrait;
    //
    public function index(){

        $collection = Setting::all();

        $setting['setting'] = $collection->flatMap(function($collection){

            return [$collection->key => $collection->value];


        });

        return view('pages.backend.settings',$setting);
    }



    public function Update(Request $request){

        try {


            $info = $request->except('_token','logo');
            foreach($info as $key=>$value){

                Setting::where('key',$key)->update(['value'=>$value]);


            }



            if($request->hasfile('logo')){

                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('key','logo')->update(['value'=>$logo_name]);

                $this->fileupload($request,'logo','logo');
            }




            toastr()->success(trans('dashboard.Updated_Successfully'));
            return back();

        }  catch (\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }



    }

    public function account()
    {


        return view('pages.backend.account_settings');

    }


    public function updateAccount(AdminProfileRequest $request)
    {


        try {

            if ($request->validated())
            {
                $data['name'] = $request->name;
                $data['email'] = $request->email;

                if ($request->password != '')
                {
                    $data['password'] = bcrypt($request->password);

                }

                if ($image = $request->file('user_image')) {


                    if (auth()->user()->user_image != null && File::exists('assets/images/users/' . auth()->user()->user_image)) {

                        unlink('assets/images/users/' .  auth()->user()->user_image);
                    }

                    $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
                    $path = public_path('assets/images/users/' . $file_name);

                    \Intervention\Image\Facades\Image::make($image->getRealPath())->resize(300, null, function ($constraint) {

                        $constraint->aspectRatio();
                    })->save($path, 100);

                    $data['user_image'] = $file_name;

                }
                auth()->user()->update($data);

                toastr()->success(trans('dashboard.Updated_Successfully'));
                return redirect()->back();

            }

        }catch (\Exception $ex){

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);
        }
    }

    public function removeImage(Request $request)
    {


        if (File::exists('assets/images/users/'.auth()->user()->user_image)) {

            unlink('assets/images/users/'.auth()->user()->user_image);
            auth()->user()->user_image = null;
            auth()->user()->save();

        }
        return true;
    }

}

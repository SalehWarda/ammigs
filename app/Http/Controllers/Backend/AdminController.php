<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminsRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        //
        $users = Admin::paginate(10);
        return view('pages.backend.users.index',compact('users'));
    }


    public function create()
    {
        //
        return view('pages.backend.users.create');
    }


    public function store(AdminsRequest $request)
    {
        //
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['mobile'] = $request->mobile;
        $input['password'] = bcrypt($request->password) ;

        $user = Admin::create($input);

        toastr()->success(trans('dashboard.Created_Successfully'));
        return redirect()->route('admin.users');
    }


    public function show($id)
    {
        //

    }


    public function edit($id)
    {
        //
        $users = Admin::findOrFail($id);
        return view('pages.backend.users.edit',compact('users'));
    }


    public function update(AdminsRequest $request)
    {
        //

        try {

            $user = Admin::findOrFail($request->id);

            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['mobile'] = $request->mobile;

            if (trim($request->password != '')){
                $input['password'] = bcrypt($request->password) ;

            }


            $user->update($input);

            toastr()->success(trans('dashboard.Updated_Successfully'));
            return redirect()->back();

        } catch (\Exception $ex) {

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);


        }

    }

    public function destroy(Request $request)
    {
        //
        try {

            $user = Admin::findOrFail($request->delete_user);


            $user->delete();

            toastr()->error(trans('dashboard.Deleted_Successfully'));
            return redirect()->back();

        } catch (\Exception $ex) {

            return redirect()->back()->with([
                'message' => $ex->getMessage(),
                'alert-type' => 'danger',

            ]);

        }

    }
}

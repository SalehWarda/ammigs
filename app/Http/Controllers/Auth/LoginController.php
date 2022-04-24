<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function getLogin()
    {
        return view('auth.login');

    }

    public function login(LoginRequest $request)
    {

        //  1- Validation  via LoginRequest

        // 2- Check in DB



            if (auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])) {

                return redirect()->route('admin.dashboard');
            }else{

                return redirect()->back()->with([
                    'message' => 'There is something wrong with the Data',
                    'alert-type' => 'danger'

                ]);
            }



}


public function logout()
{

    $gaurd = $this->getGaurd();
    $gaurd->logout();

    return redirect()->route('getLogin');
}

private function getGaurd()
{
    return auth('admin');
}



}

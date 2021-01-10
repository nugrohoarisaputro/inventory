<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index()
    {
        return view('Auth.login');
    }

   
    protected function sendFailedLoginResponse($errors)
    {
        if(Cache::has('loginattempt'.csrf_token()))
        {
            Cache::decrement('loginattempt'.csrf_token());
        }
        else
        {
            Cache::remember('loginattempt'.csrf_token(), 5, function()
            {
                return 5;
            });
        }

        $chance = Cache::get('loginattempt'.csrf_token());

        return redirect()->back()
            ->withErrors(['msg' => $errors, 'chance' => $chance]);
    }

    /*
    *   Logout Method.
    *   The method will be called when
    *   user only and only pressing
    *   Logout button.
    *   if user attempt to manually
    *   use logout URL, it will fail
    */
    function logout(Request $request)
    {
        // dd($request);
        $jenis = session('jenis');
        $request->session()->flush();
        // dd($jenis);

        return redirect('login/self');
        
    }

}

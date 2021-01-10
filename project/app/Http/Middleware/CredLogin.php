<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use DB;
class CredLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if the session does not have 'authenticated' forget the user and redirect to login
        if ($request->session()->get('authenticated', false) === true)
        {
            if($request->session()->get('gantipassword') === 'ya'){
                // $request->session()->flush();
                $url = '';
                return new RedirectResponse(url('/newpass'));
                // return redirect()->route('passworddefaultbaru');
            }elseif($request->session()->get('gantipertanyaan') === 'ya'){
                return new RedirectResponse(url('/newsecurity'));
            }else{
                return $next($request);
                
            }
            
        }

        $request->session()->flush();

        if($request->session()->get('jenis')==='user'){
            return redirect('login');
        }else{
            return redirect('login');
        }

    }

   
}
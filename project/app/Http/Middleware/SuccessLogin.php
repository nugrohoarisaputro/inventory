<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Crypto;
use App\Http\Models\UnpackApproval;
use Illuminate\Http\RedirectResponse;

class SuccessLogin
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
            

            return redirect(route('home'));            
        }

        return $next($request);

    }
}
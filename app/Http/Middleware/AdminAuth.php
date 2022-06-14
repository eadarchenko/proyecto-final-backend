<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       if(Auth::check()){                //0=user,1=admin
           if(Auth::user()->isAdmin == 1) {

            return $next($request);

           } return response()->json([
            'message' => 'Unauthorized ,you are not admin'
        ]);
    }

       return response()->json([
        'message' => 'Please login first'
    ]);

    }
 }

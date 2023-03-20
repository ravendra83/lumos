<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->type==1){
                return $next($request);
            }else{
                return redirect('/')->with('message','Access denied as you are not admin!');
            }
        }else{
            return redirect('/')->with('message','login to access the admin panel');
        }
        return $next($request);
    }
}

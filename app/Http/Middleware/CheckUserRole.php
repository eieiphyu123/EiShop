<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {   $roles = explode('|',$role); //sting to arry ပြောင်း ဒါမျိူး | တခုတွေ့တိုင်း array ၁ခန်းဆောက်
        // var_dump($roles);
        // die();
        // array ထဲမှာ ရှိ မ၇ှိစစ်
        if(Auth::check() && in_array(Auth::user()->role, $roles)){
            return $next($request);
        }
        return redirect('/');
    }
}

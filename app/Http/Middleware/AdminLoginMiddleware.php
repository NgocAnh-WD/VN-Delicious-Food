<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
 
class AdminLoginMiddleware
{

public function handle($request, Closure $next)
{
if(Auth::check())
{
    $user = Auth::user();
    if(Auth::user()->role == 1){
        return redirect('/admin');
    }else{
       return $next($request); 
    }
}
}
}

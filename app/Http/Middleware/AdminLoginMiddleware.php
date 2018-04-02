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
    if($user->role == 1){
        return $next($request);
   
    }else{
        return redirect('/');
    }
}
}
}

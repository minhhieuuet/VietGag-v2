<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() ) {
            if(Auth::user()->role==1){
                return $next($request);    
            }
            else{
                 return redirect('admin/login')->with('error',"Tài khoản hoặc mật khẩu không đúng!");
            }
            
         }
         return redirect('admin/login')->with('error',"Tài khoản hoặc mật khẩu không đúng!");
        
    }
}

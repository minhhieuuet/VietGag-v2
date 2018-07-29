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
                // return redirect('admin')    
            }
            else{
                 return redirect()->back();
            }
            
         }
         return redirect('');
        
    }
}

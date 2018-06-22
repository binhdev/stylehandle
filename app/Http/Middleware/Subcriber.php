<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Subcriber
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
      if ( Auth::check() && Auth::user()->isSubcriber() )
      {
          return $next($request);
      }
       return redirect('home');
    }
}

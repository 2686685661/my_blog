<?php

namespace App\Http\Middleware;

use Closure;

class ParameterVerification
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

        $id = $request->route('id');


        if(!preg_match("/^\d*$/",$id)) {
            return redirect()->back();
        }



        return $next($request);
    }
}

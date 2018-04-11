<?php

namespace App\Http\Middleware;

use Closure;

class FormVerification
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


        if($request->input()!=null) {
            $forms = $request->input('Diary');

            $dia = $forms['diaryContent'];
            if(strpos($dia,'delete') !== false || strpos($dia,'update') !== false) {

                return redirect()->back()->withErrors('含有非法字符');
            }
        }
        return $next($request);
    }
}

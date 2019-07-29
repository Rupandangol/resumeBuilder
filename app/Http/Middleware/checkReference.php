<?php

namespace App\Http\Middleware;

use App\Model\Experience;
use Closure;

class checkReference
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
        $myId=Experience::where('cv_id',session('cv_user_id'))->first();
        if(!$myId){
            return redirect(route('page5'));
        }

        return $next($request);
    }
}

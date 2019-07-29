<?php

namespace App\Http\Middleware;

use App\Model\PersonalDetail;
use App\Model\PersonalProfile;
use Closure;

class checkSkill
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $myId = PersonalProfile::where('cv_id', session('cv_user_id'), false)->first();
        if (!$myId) {
            return redirect(route('page2'));
        }


        return $next($request);
    }
}

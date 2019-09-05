<?php

namespace App\Http\Middleware;

use App\Model\Skill;
use Closure;

class checkAchievement
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
        $myId = Skill::where('cv_id', session('cv_user_id'), false)->first();
        if (!$myId) {
            return redirect(route('page3'));
        }
        return $next($request);
    }
}

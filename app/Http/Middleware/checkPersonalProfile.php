<?php

namespace App\Http\Middleware;

use App\Model\PersonalDetail;
use Closure;

class checkPersonalProfile
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
        $myId = session('cv_user_id', false);

        if (!$myId) {
            return redirect(route('page1'));

        }
        return $next($request);

    }
}

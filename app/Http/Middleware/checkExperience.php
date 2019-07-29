<?php

namespace App\Http\Middleware;

use App\Model\AcademicQualification;
use Closure;

class checkExperience
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
        $myId = AcademicQualification::where('cv_id', session('cv_user_id'))->first();
        if (!$myId) {
            return redirect(route('page4'));
        }
        return $next($request);
    }
}

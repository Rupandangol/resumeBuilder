<?php

namespace App\Http\Middleware;

use App\Model\Reference;
use Closure;

class checkTemplate
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
        $myId = Reference::where('cv_id', session('cv_user_id'))->first();
        if (!$myId) {
            return redirect(route('page6'));
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackAffiliate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    if ($request->has('aff_id')) {
        $affiliate = User::where('unique_ref', $request->get('aff_id'))->first();
        if ($affiliate) {
            session(['affiliate_id' => $affiliate->unique_ref]);
        }
    }

    return $next($request);
}

}

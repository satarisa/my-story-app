<?php

namespace App\Http\Middleware;

use App\Models\BookDetail;
use Closure;
use Illuminate\Http\Request;

class CountryIsExistsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $country_name = $request->route()->parameter('country');
        $country = BookDetail::where('country', ucfirst($country_name))->first();
        if (empty($country)) {
            return redirect()->back();
        }
        return $next($request);
    }
}

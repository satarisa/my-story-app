<?php

namespace App\Http\Middleware;

use App\Models\BookDetail;
use Closure;
use Illuminate\Http\Request;

class TypeIsExistsMiddleware
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
        $type_name = $request->route()->parameter('type');
        $type = BookDetail::where('type', ucfirst($type_name))->first();
        if (empty($type)) {
            return redirect()->back();
        }
        return $next($request);
    }
}

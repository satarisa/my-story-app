<?php

namespace App\Http\Middleware;

use App\Models\BookDetail;
use Closure;
use Illuminate\Http\Request;

class GenreIsExistsMiddleware
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
        $genre_name = $request->route()->parameter('genre');
        $genre = BookDetail::where('genre', ucfirst($genre_name))->first();
        if (empty($genre)) {
            return redirect()->back();
        }
        return $next($request);
    }
}

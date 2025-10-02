<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Helpers;

class WishlistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Helpers::isWishlistEnabled()) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Wishlist is disabled'], 403);
            }
            return redirect()->route('home')->with('error', 'Wishlist is currently disabled');
        }
        
        return $next($request);
    }
}

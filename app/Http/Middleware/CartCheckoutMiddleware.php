<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Helpers;

class CartCheckoutMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Helpers::isCartCheckoutEnabled()) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Cart and checkout are disabled'], 403);
            }
            return redirect()->route('home')->with('error', 'Cart and checkout are currently disabled');
        }
        
        return $next($request);
    }
}

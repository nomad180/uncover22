<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PayingCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    /* public function handle($request, Closure $next)
    {
        if ($request->user() && !$request->user()->subscribed('cashier')) {
            // This user is a paying customer...
            return redirect('subscribe2');
        }

        return $next($request);
    }*/
    public function handle(Request $request, Closure $next)
    {
         if ($request->user() && $request->user()->pm_type === NULL) {
            // This user is a paying customer...
            return redirect('charge');
        }
        return $next($request);
    }
}

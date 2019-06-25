<?php

namespace App\Http\Middleware;

use Closure;

class AgeChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $age = $request->age;

        if ($age < 18) {
            return response('Kamu belum cukup umur');
        }

        return $next($request);
    }
}

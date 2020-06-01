<?php

namespace App\Http\Middleware;

use Closure;

class CheckMenuPermission
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
        $allowRoutes = ['/home'];
        $prefixRoute = $request->route()->getAction()['prefix'];

        if (in_array('application/json', explode(',', $request->header('accept')))) {
            return $next($request);
        }

        if (is_null($prefixRoute) || in_array($prefixRoute, $allowRoutes)) {
            return $next($request);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class AgregarPelicula
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
        if ($request->user()->id != 1) {
            abort(403, "No tienes permiso para administrar peliculas");
        }
        return $next($request);
    }
}

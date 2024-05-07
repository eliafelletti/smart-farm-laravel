<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $ctrl): Response
    {
        // Set della key per l'array globale dei livelli autorizzati
        $key = "levels_" . $ctrl;
        // Estrazione dell'array necessario ($ctrl based)
        $levels = session($key);

        // Autorizzazione user
        $user = $request->user();
        if( !in_array($user->level, $levels) ){
            return redirect('/home');
        }

        return $next($request);
    }
}

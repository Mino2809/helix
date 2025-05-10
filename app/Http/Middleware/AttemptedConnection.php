<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class AttemptedConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // Middleware pour verifier les tentatives à plusieurs reprises  , on stocke dans les caches chaque tentative
    //On a limité à 5 reprise
    public function handle(Request $request, Closure $next): Response
    {
        $key = 'login_attempts_' . $request->ip();
        $attempts = Cache::get($key, 0);

        if ($attempts >= 5) {
            return response()->json(['error' => 'Trop de tentatives de connexion. Veuillez réessayer plus tard.'], 429);
        }

        // Incrémenter le nombre de tentatives
        Cache::put($key, $attempts + 1, now()->addMinutes(15));

        return $next($request);
    }
}

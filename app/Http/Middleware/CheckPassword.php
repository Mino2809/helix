<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // Vérifier si le mot de passe respect les règles : contenir un majuscule ,contenir des caractères spéciaux , minimum 8 lettres
    public function handle(Request $request, Closure $next): Response
    {
        $password = $request->input('password');

        if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
            return response()->json(['error' => 'Le mot de passe doit contenir au moins une majuscule, 8 caractères, et un caractère spécial.'], 400);
        }
        return $next($request);
    }
}

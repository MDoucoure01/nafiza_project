<?php

namespace App\Http\Middleware;

use App\Models\School_session;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareDataSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Récupérer la session scolaire active
        $appActuSession = School_session::where('status', 1)->first();

        // Partager la variable avec la requête
        $request->merge(['appActuSession' => $appActuSession]);

        return $next($request);
    }
}

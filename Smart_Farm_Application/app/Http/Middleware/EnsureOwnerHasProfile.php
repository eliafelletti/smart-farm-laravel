<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Owner;
use App\Models\SmartFarm;

class EnsureOwnerHasProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve dello user loggato
        $user = $request->user();

        // Verifica che il livello sia solo quello necessario da verificare, viene 
        // demandata qui questa verifica dal middleware 'EnsureHasLevel' per il fatto
        // che UsedTechnology è accessibile a tutti i livelli
        if ( $user->level == 1 ){
            // Seleziono l'Owner dello user loggato
            $owner = Owner::where('mail', $user->email)->first();

            // Verifica che sia presente il profilo dell'Owner dello user loggato
            // (proprietario)
            if ( empty($owner) ){
                return redirect('/owner');
            }
        }
        
        return $next($request);
    }
}

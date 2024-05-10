<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Owner;
use App\Models\SmartFarm;

class EnsureOwnerHasSmartFarm
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
        
            // Seleziono la SmartFarm dell'owner loggato
            $smart_farm = SmartFarm::where('id_proprietario', $owner->id)->first();

            // Verifica che sia presente la SmartFarm dell'Owner dello user loggato
            // (proprietario)
            if ( empty($smart_farm) ){
                return redirect('/smart_farm');
            }
        }

        return $next($request);
    }
}

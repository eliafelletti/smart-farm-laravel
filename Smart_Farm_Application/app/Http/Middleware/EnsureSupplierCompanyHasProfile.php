<?php

namespace App\Http\Middleware;

use App\Models\SupplierCompany;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSupplierCompanyHasProfile
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
        if ( $user->level == 2 ){
            // Seleziono la SupplierCompany dello user loggato
            $supplier_cp = SupplierCompany::where('mail', $user->email)->first();

            // Verifica che sia presente il profilo della SupplierCompany dello user loggato
            // (azienda fornitrice)
            if ( empty($supplier_cp) ){
                return redirect('/supplier_company');
            }
        }
        
        return $next($request);
    }
}

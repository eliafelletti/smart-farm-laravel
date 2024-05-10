<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Owner;
use App\Models\SmartFarm;
use App\Models\SupplierCompany;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Rendere visibile all'interno della view app.blade.php la variabile $owner per fare
        // delle differenziazioni sulla navbar, variabile $owner selezionata a partire dall'utente
        // loggato
        View::composer(['layouts.app'], function($view){
            if ( !empty( Auth::user() ) ){
                $owner = Owner::where('mail', Auth::user()->email)->first();
                $view->with('owner_nav', $owner);

                if ( !empty($owner) ){
                    $view->with('smart_farm_nav', SmartFarm::where('id_proprietario', $owner->id)->first());
                }

                $supplier_company = SupplierCompany::where('mail', Auth::user()->email)->first();
                $view->with('supplier_cp_nav', $supplier_company);
            }
        });
    }
}

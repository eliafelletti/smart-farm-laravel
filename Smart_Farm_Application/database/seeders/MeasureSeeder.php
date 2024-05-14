<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Measure;
use App\Http\Controllers\RealizedMeasureController;

class MeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Measure::factory(10)->create();

        // Invocazione $metodo di RealizedMeasureController
        $controller = new RealizedMeasureController();
        $controller->store_factory_data();
    }
}

<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Pet;
class PetChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $dogCount = Pet::where('breed','Aspin')->count();
        $catCount = Pet::where('breed','Puskal')->count();

        return Chartisan::build()
            ->labels(['Aspin', 'Puskal'])
            ->dataset('Total:', [$dogCount, $catCount]);
    }
}
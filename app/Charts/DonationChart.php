<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Donation;

class DonationChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
        ->labels([
            '1', '2', '3',
            '4', '5', '6',
            '7', '8', '9',
            '10',
            '11', '12', '13',
            '14', '15', '16',
            '17', '18', '19',
            '20',
            '21', '22', '23',
            '24', '25', '26',
            '27', '28', '29',
            '30','31'
        ])
            ->dataset('Sample', [1, 2, 3])
            ->dataset('Sample 2', [3, 2, 1]);
    }
}
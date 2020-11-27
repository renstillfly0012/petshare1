<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Report;

class ReportChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $reportCount = array();
        for($i=0;$i<32;$i++)
        {
            $days = Report::whereDay('created_at', $i)
            ->get()
            ->count();
            array_push($reportCount, $days);
        }
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
            ->dataset('Incidents', [
                $reportCount[1],$reportCount[2],$reportCount[3],
                $reportCount[4],$reportCount[5],$reportCount[6],
                $reportCount[7],$reportCount[8],$reportCount[9],
                $reportCount[10],$reportCount[11],$reportCount[12],
                $reportCount[13],$reportCount[14],$reportCount[15],
                $reportCount[16],$reportCount[17],$reportCount[18],
                $reportCount[19],$reportCount[20],$reportCount[21],
                $reportCount[22],$reportCount[23],$reportCount[24],
                $reportCount[25],$reportCount[26],$reportCount[27],
                $reportCount[28],$reportCount[29],$reportCount[30],
                $reportCount[31]
                ]);
    }
}
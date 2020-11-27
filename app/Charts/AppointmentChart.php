<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Appointment;

class AppointmentChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        //getCount of Adopted
        $adoptCount = array();
        for($i=0;$i<32;$i++)
        {
            $days = Appointment::whereDay('requested_date', $i)
            ->where('appointment_type', 'Adoption')
            ->get()
            ->count();
            array_push($adoptCount, $days);
        }

        //getCount of Surrendered
        $surrenderCount = array();
        for($i=0;$i<32;$i++)
        {
            $days = Appointment::whereDay('requested_date', $i)
            ->where('appointment_type', 'Surrender')
            ->get()
            ->count();
            array_push($surrenderCount, $days);
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
            ->dataset('Adopted', [
                $adoptCount[1],$adoptCount[2],$adoptCount[3],
                $adoptCount[4],$adoptCount[5],$adoptCount[6],
                $adoptCount[7],$adoptCount[8],$adoptCount[9],
                $adoptCount[10],$adoptCount[11],$adoptCount[12],
                $adoptCount[13],$adoptCount[14],$adoptCount[15],
                $adoptCount[16],$adoptCount[17],$adoptCount[18],
                $adoptCount[19],$adoptCount[20],$adoptCount[21],
                $adoptCount[22],$adoptCount[23],$adoptCount[24],
                $adoptCount[25],$adoptCount[26],$adoptCount[27],
                $adoptCount[28],$adoptCount[29],$adoptCount[30],$adoptCount[31]
              
                ])
                ->dataset('Surrender', [
                    $surrenderCount[1],$surrenderCount[2],$surrenderCount[3],
                    $surrenderCount[4],$surrenderCount[5],$surrenderCount[6],
                    $surrenderCount[7],$surrenderCount[8],$surrenderCount[9],
                    $surrenderCount[10],$surrenderCount[11],$surrenderCount[12],
                    $surrenderCount[13],$surrenderCount[14],$surrenderCount[15],
                    $surrenderCount[16],$surrenderCount[17],$surrenderCount[18],
                    $surrenderCount[19],$surrenderCount[20],$surrenderCount[21],
                    $surrenderCount[22],$surrenderCount[23],$surrenderCount[24],
                    $surrenderCount[25],$surrenderCount[26],$surrenderCount[27],
                    $surrenderCount[28],$surrenderCount[29],$surrenderCount[30],$surrenderCount[31]
                    ]);
    }
}
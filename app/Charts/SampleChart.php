<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\User;
use App\Appointment;
use App\Pet;
use App\Report;
use App\Donation;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        //certain day
        $userCountCD = User::whereDay('created_at', now()->day);
        //today
        $userCountT = User::whereDate('created_at', today())
        ->get()
        ->count();
        //monthly
        $userCountM = User::whereYear('created_at', now()->year)
        ->whereMonth('created_at', now()->month)
        ->get()->count();
        //get all admin count by months
        $adminCount = array();

        for($i=1;$i<=12;$i++)
        {
            $month = User::whereYear('created_at', now()->year)
            ->whereMonth('created_at', $i)
            ->where('role_id', '1')
            ->get()->count();
            array_push($adminCount, $month);
        }
        //foster
        $fosterCount = array();

        for($i=1;$i<=12;$i++)
        {
        $month = User::whereYear('created_at', now()->year)
        ->whereMonth('created_at', $i)
        ->where('role_id', '2')
        ->get()->count();
        array_push($fosterCount, $month);
        }
        //vets
        $vetCount = array();

        for($i=1;$i<=12;$i++)
        {
        $month = User::whereYear('created_at', now()->year)
        ->whereMonth('created_at', $i)
        ->where('role_id', '3')
        ->get()->count();
        array_push($vetCount, $month);
        }
        
        //annual
        $userCountY = User::whereYear('created_at', now()->year)
        ->get()->count();


        // dd($userCountCD,$userCountT, $userCountM, $userCountY);

        return Chartisan::build()
            ->labels(['Jan', 'Feb', 'March', 'April', 'May'
            , 'Jun', 'Jul', 'Aug', 'Sep','Oct'
            ,'Nov','Dec'])
            ->dataset('Admin', [
                $adminCount[0],$adminCount[1],$adminCount[2],
                $adminCount[3],$adminCount[4],$adminCount[5],
                $adminCount[6],$adminCount[7],$adminCount[8],
                $adminCount[9],$adminCount[10],$adminCount[11]
            ])
            ->dataset('Foster', [ 
            $fosterCount[0],$fosterCount[1],$fosterCount[2],
            $fosterCount[3],$fosterCount[4],$fosterCount[5],
            $fosterCount[6],$fosterCount[7],$fosterCount[8],
            $fosterCount[9],$fosterCount[10],$fosterCount[11]
            ])
            ->dataset('Vet', [
                $vetCount[0],$vetCount[1],$vetCount[2],
                $vetCount[3],$vetCount[4],$vetCount[5],
                $vetCount[6],$vetCount[7],$vetCount[8],
                $vetCount[9],$vetCount[10],$vetCount[11]
            ]);
            
    }
}
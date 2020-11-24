<?php

use Illuminate\Database\Seeder;
use App\Medical_Histories;

class MedHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medhis = Medical_Histories::create([
            'pet_info_id' => 1,
            'pet_id' => 1,
            'date' => now(),
            'description' => 'Does not want to eat',
            'diagnosis' => 'Teeth Problems',
            'test_performed' => 'General',
            'test_results' => 'done',
            'action' => 'Monitor and provide water',
            'medications' => 'NA',
            'comments' => 'NA',
        ]);

        $medhis = Medical_Histories::create([
            'pet_info_id' => 2,
            'pet_id' => 2,
            'date' => now(),
            'description' => 'Deworming',
            'diagnosis' => 'Deworming',
            'test_performed' => 'Deworming',
            'test_results' => 'Done',
            'action' => 'NA',
            'medications' => 'NA',
            'comments' => 'NA',
        ]);
        $medhis = Medical_Histories::create([
            'pet_info_id' => 3,
            'pet_id' => 3,
            'date' => now(),
            'description' => 'Heartworm preventive',
            'diagnosis' => 'Heartworm preventive',
            'test_performed' => 'Heartworm preventive',
            'test_results' => 'done',
            'action' => 'NA',
            'medications' => 'NA',
            'comments' => 'NA',
        ]);

        $medhis = Medical_Histories::create([
            'pet_info_id' => 4,
            'pet_id' => 4,
            'date' => now(),
            'description' => 'Flea anbd Trick Treatment',
            'diagnosis' => 'Flea anbd Trick Treatment',
            'test_performed' => 'Flea anbd Trick Treatment',
            'test_results' => 'done',
            'action' => 'NA',
            'medications' => 'NA',
            'comments' => 'NA',
        ]);

        $medhis = Medical_Histories::create([
            'pet_info_id' => 5,
            'pet_id' => 5,
            'date' => now(),
            'description' => 'Does not want to eat',
            'diagnosis' => 'Teeth Problems',
            'test_performed' => 'General',
            'test_results' => 'done',
            'action' => 'NA',
            'medications' => 'NA',
            'comments' => 'NA',
        ]);


    }
}

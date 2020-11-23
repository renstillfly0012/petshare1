<?php

use Illuminate\Database\Seeder;
use App\Pet_Info;

class PetInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $petinfo = Pet_Info::create([
            'pet_owner_id' => 1,
            'pet_id' => 1,
            'pet_allergies' => 'None',
            'pet_existing_conditions' => 'None',
            'vet_id' => '3',
            'medical_history_id' => 1,
        ]);

        $petinfo = Pet_Info::create([
            'pet_owner_id' => null,
            'pet_id' => 2,
            'pet_allergies' => 'None',
            'pet_existing_conditions' => 'None',
            'vet_id' => '3',
            'medical_history_id' => 2,
        ]);

        $petinfo = Pet_Info::create([
            'pet_owner_id' => 3,
            'pet_id' => 3,
            'pet_allergies' => 'None',
            'pet_existing_conditions' => 'None',
            'vet_id' => '3',
            'medical_history_id' => 3,
        ]);

        $petinfo = Pet_Info::create([
            'pet_owner_id' => null,
            'pet_id' => 4,
            'pet_allergies' => 'None',
            'pet_existing_conditions' => 'None',
            'vet_id' => '3',
            'medical_history_id' => 4,
        ]);

        $petinfo = Pet_Info::create([
            'pet_owner_id' => 5,
            'pet_id' => 5,
            'pet_allergies' => 'None',
            'pet_existing_conditions' => 'None',
            'vet_id' => '3',
            'medical_history_id' => 5,
        ]);

        $petinfo = Pet_Info::create([
            'pet_owner_id' => null,
            'pet_id' => 6,
            'pet_allergies' => 'None',
            'pet_existing_conditions' => 'None',
            'vet_id' => '3',
            'medical_history_id' => null,
        ]);

        $petinfo = Pet_Info::create([
            'pet_owner_id' => 7,
            'pet_id' => 7,
            'pet_allergies' => 'None',
            'pet_existing_conditions' => 'None',
            'vet_id' => '3',
            'medical_history_id' => null,
        ]);

        $petinfo = Pet_Info::create([
            'pet_owner_id' => null,
            'pet_id' => 8,
            'pet_allergies' => 'None',
            'pet_existing_conditions' => 'None',
            'vet_id' => '3',
            'medical_history_id' => null,
        ]);

        $petinfo = Pet_Info::create([
            'pet_owner_id' => 9,
            'pet_id' => 9,
            'pet_allergies' => 'None',
            'pet_existing_conditions' => 'None',
            'vet_id' => '3',
            'medical_history_id' => null,
        ]);

        $petinfo = Pet_Info::create([
            'pet_owner_id' => null,
            'pet_id' => 10,
            'pet_allergies' => 'None',
            'pet_existing_conditions' => 'None',
            'vet_id' => '3',
            'medical_history_id' => null,
        ]);
    }
}

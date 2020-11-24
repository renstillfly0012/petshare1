<?php

use Illuminate\Database\Seeder;
use App\Pet;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // factory(Pet::class, 10)->create();
        
          
            $pet = Pet::create([
                'name' => 'PETCODE-1',
                'image' => 'petcode-1.jpg',
                'age' => 1,
                'breed' => 'Aspin',
                'status' => 'Available',
                'description' => 'Black',
                'qrcodePath' => 'QR_PET_ID_1.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-2',
                'image' => 'petcode-2.jpg',
                'age' => 2,
                'breed' => 'Aspin',
                'status' => 'Available',
                'description' => 'White',
                'qrcodePath' => 'QR_PET_ID_2.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-3',
                'image' => 'petcode-3.jpg',
                'age' => 3,
                'breed' => 'Aspin',
                'status' => 'Available',
                'description' => 'Brown',
                'qrcodePath' => 'QR_PET_ID_3.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-4',
                'image' => 'petcode-4.jpg',
                'age' => 4,
                'breed' => 'Aspin',
                'status' => 'Available',
                'description' => 'White and Black',
                'qrcodePath' => 'QR_PET_ID_4.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-5',
                'image' => 'petcode-5.jpg',
                'age' => 5,
                'breed' => 'Aspin',
                'status' => 'Available',
                'description' => 'White and Brown',
                'qrcodePath' => 'QR_PET_ID_5.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-6',
                'image' => 'petcode-6.jpg',
                'age' => 6,
                'breed' => 'Puskal',
                'status' => 'Available',
                'description' => 'Black',
                'qrcodePath' => 'QR_PET_ID_6.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-7',
                'image' => 'petcode-7.jpg',
                'age' => 7,
                'breed' => 'Puskal',
                'status' => 'Available',
                'description' => 'White',
                'qrcodePath' => 'QR_PET_ID_7.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-8',
                'image' => 'petcode-8.jpg',
                'age' => 7,
                'breed' => 'Puskal',
                'status' => 'Available',
                'description' => 'Brown',
                'qrcodePath' => 'QR_PET_ID_8.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-9',
                'image' => 'petcode-9.jpg',
                'age' => 9,
                'breed' => 'Puskal',
                'status' => 'Available',
                'description' => 'Black and White',
                'qrcodePath' => 'QR_PET_ID_9.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-10',
                'image' => 'petcode-10.jpg',
                'age' => 10,
                'breed' => 'Puskal',
                'status' => 'Available',
                'description' => 'White and Brown',
                'qrcodePath' => 'QR_PET_ID_10.png',
            ]);

        
           
    }
}

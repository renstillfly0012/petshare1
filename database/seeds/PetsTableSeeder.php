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
                'image' => 'https://picsum.photos/400/400',
                'age' => 1,
                'breed' => 'Aspin',
                'status' => 'Available',
                'description' => 'Black',
                'qrcodePath' => time().'.PET_ID_1.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-2',
                'image' => 'https://picsum.photos/400/400',
                'age' => 2,
                'breed' => 'Aspin',
                'status' => 'Available',
                'description' => 'White',
                'qrcodePath' => time().'.PET_ID_2.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-3',
                'image' => 'https://picsum.photos/400/400',
                'age' => 3,
                'breed' => 'Aspin',
                'status' => 'Available',
                'description' => 'Brown',
                'qrcodePath' => time().'.PET_ID_3.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-4',
                'image' => 'https://picsum.photos/400/400',
                'age' => 4,
                'breed' => 'Aspin',
                'status' => 'Available',
                'description' => 'White and Black',
                'qrcodePath' => time().'.PET_ID_4.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-5',
                'image' => 'https://picsum.photos/400/400',
                'age' => 5,
                'breed' => 'Aspin',
                'status' => 'Available',
                'description' => 'White and Brown',
                'qrcodePath' => time().'.PET_ID_5.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-6',
                'image' => 'https://picsum.photos/400/400',
                'age' => 6,
                'breed' => 'Puskal',
                'status' => 'Available',
                'description' => 'Black',
                'qrcodePath' => time().'.PET_ID_6.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-7',
                'image' => 'https://picsum.photos/400/400',
                'age' => 7,
                'breed' => 'Puskal',
                'status' => 'Available',
                'description' => 'White',
                'qrcodePath' => time().'.PET_ID_7.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-8',
                'image' => 'https://picsum.photos/400/400',
                'age' => 7,
                'breed' => 'Puskal',
                'status' => 'Available',
                'description' => 'Brown',
                'qrcodePath' => time().'.PET_ID_8.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-9',
                'image' => 'https://picsum.photos/400/400',
                'age' => 9,
                'breed' => 'Puskal',
                'status' => 'Available',
                'description' => 'Black and White',
                'qrcodePath' => time().'.PET_ID_9.png',
            ]);

            $pet = Pet::create([
                'name' => 'PETCODE-10',
                'image' => 'https://picsum.photos/400/400',
                'age' => 10,
                'breed' => 'Puskal',
                'status' => 'Available',
                'description' => 'White and Brown',
                'qrcodePath' => time().'.PET_ID_10.png',
            ]);

        
           
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Pet;
class FakePetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pet::truncate();
       factory(Pet::class, 1000)->create();
    }
}

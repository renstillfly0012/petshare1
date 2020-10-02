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
       factory(Pet::class, 10000)->create();
    }
}

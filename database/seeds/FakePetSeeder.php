<?php

use Illuminate\Database\Seeder;

class FakePetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(\App\Pet::class, 10)->create();
    }
}

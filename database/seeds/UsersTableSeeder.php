<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::truncate();

        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $fosterRole = Role::where('name', 'foster')->first();
        $vetRole = Role::where('name', 'vet')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => 'admin',
            // 'password' => Hash::make('admin'),
        ]);

        $foster = User::create([
            'name' => 'Foster User',
            'email' => 'foster@foster.com',
            'password' => 'foster',
        ]);

        $vet = User::create([
            'name' => 'Vet User',
            'email' => 'vet@vet.com',
            'password' => 'vet',
        ]);

        $admin->roles()->attach($adminRole);
        $foster->roles()->attach($fosterRole);
        $vet->roles()->attach($vetRole);
        
    }
}

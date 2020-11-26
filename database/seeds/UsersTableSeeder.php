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
            'status' => 'Activated',
            'role_id' => '1',
            // 'password' => Hash::make('admin'),
        ]);

        $foster = User::create([
            'name' => 'Foster User',
            'email' => 'foster@foster.com',
            'email_verified_at' => now(),
            'password' => 'foster',
            'status' => 'Activated',
            'role_id' => '2',
        ]);

        $vet = User::create([
            'name' => 'Vet User',
            'email' => 'vet@vet.com',
            'password' => 'vet',
            'role_id' => '3',
        ]);

        $foster2 = User::create([
            'name' => 'Manuel',
            'email' => 'manuel@manuel.com',
            'email_verified_at' => now(),
            'password' => 'manuel',
            'status' => 'Activated',
            'role_id' => '2',
        ]);


        $foster3 = User::create([
            'name' => 'Edward',
            'email' => 'edward@edward.com',
            'email_verified_at' => now(),
            'password' => 'edward',
            'status' => 'Activated',
            'role_id' => '2',
        ]);

        $admin2 = User::create([
            'name' => 'Rico',
            'email' => 'rico@rico.com',
            'email_verified_at' => now(),
            'password' => 'rico',
            'status' => 'Activated',
            'role_id' => '1',
        ]);
        $admin3 = User::create([
            'name' => 'Daniel',
            'email' => 'daniel@daniel.com',
            'email_verified_at' => now(),
            'password' => 'daniel',
            'status' => 'Activated',
            'role_id' => '1',
        ]);

       

        $admin->roles()->attach($adminRole);
        $admin2->roles()->attach($adminRole);
        $admin3->roles()->attach($adminRole);
        $foster->roles()->attach($fosterRole);
        $foster2->roles()->attach($fosterRole);
        $foster3->roles()->attach($fosterRole);
        $vet->roles()->attach($vetRole);
        
    }
}

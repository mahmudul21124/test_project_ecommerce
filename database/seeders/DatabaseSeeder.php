<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $adminRole = Role::create(['name' => 'admin']);
        // $customerRole = Role::create(['name' => 'customer']);

        // $admin = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('admin123'),
        // ]);
        // $admin->assignRole($adminRole);

        $this->call([
            RoleSeeder::class,
        ]);
    }
}

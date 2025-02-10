<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admincuy',
            'email' => 'admincuy@gmail.com',
            'password' => 'admincuy',
            'email_verified_at' => now(),
        ]);

        $user1 = User::create([
            'name' => 'somwancuy',
            'email' => 'somwancuy@gmail.com',
            'password' => 'somwancuy',
            'email_verified_at' => now(),
        ]);

        $user2 = User::create([
            'name' => 'somwanlah',
            'email' => 'somwanlah@gmail.com',
            'password' => 'somwanlah',
            'email_verified_at' => now(),
        ]);


        collect([
            [
                'name' => 'admin'
            ],
            [
                'name' => 'partner'
            ],
            [
                'name' => 'moderator'
            ],
            [
                'name' => 'loyalis'
            ],
            [
                'name' => 'member baru'
            ],
        ])->each(fn($role) => Role::create($role));

        $admin->assignRole(Role::find(1));
        $user1->assignRole(Role::find(2));
        $user2->assignRole(Role::find(3));
    }
}

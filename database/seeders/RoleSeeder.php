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

        $role1 = Role::create([
            'name' => 'admin'
        ]);
        $role2 = Role::create([
            'name' => 'moderator'
        ]);
        $role3 = Role::create([
            'name' => 'loyalis'
        ]);
        $role4 = Role::create([
            'name' => 'member baru'
        ]);

        $user1->roles()->attach($role1->id);
        $user1->roles()->attach($role2->id);
        $user1->roles()->attach($role3->id);
        $user1->roles()->attach($role4->id);

        $user2->roles()->attach($role1->id);
        $user2->roles()->attach($role2->id);
        $user2->roles()->attach($role3->id);
        $user2->roles()->attach($role4->id);
    }
}

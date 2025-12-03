<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = User::updateOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );

        $superAdminRole = Role::where('name', 'super-admin')->first();
        if ($superAdminRole) {
            $superAdmin->roles()->syncWithoutDetaching([$superAdminRole->id]);
        }

        User::factory()->count(5)->create()->each(function (User $user) use ($superAdminRole) {
            $roleIds = Role::where('name', '!=', 'super-admin')->inRandomOrder()->take(2)->pluck('id');
            $user->roles()->sync($roleIds);
        });
    }
}

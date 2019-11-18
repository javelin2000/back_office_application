<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() === 0){
            $user = User::create([
                'email' => 'admin@mail.com',
                'password' => Hash::make('secret'),
            ]);
            $user->roles()->attach(Role::getRoleByName(User::ROLE_ADMIN));
        }
    }
}

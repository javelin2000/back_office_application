<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<25;$i++){
            $client = factory( 'App\Models\Client' )->create();
            $client->roles()->attach(Role::getRoleByName(User::ROLE_USER));
        }
    }
}

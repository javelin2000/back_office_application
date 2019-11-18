<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    protected $roles = [
        "Administrator" , "User"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $roleName){
            Role::create(['name' => $roleName]);
        }

    }
}

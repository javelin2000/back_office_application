<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Role;
use Faker\Factory;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Models\User as AppUser;

class User extends TestCase
{
    public $user;
    public $faker;

    public function setUp():void
    {
        parent::setUp();
        AppUser::unsetEventDispatcher();
        $this->user = factory(AppUser::class)->create();
        $this->faker = Factory::create();

    }

    /**
     * User can see login form
     */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * User can't see login form whet authenticated
     */
    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $response = $this->actingAs($this->user)->get('/login');
        $response->assertRedirect('/home');
    }

    /**
     * User can see dashboard page
     */
    public function test_user_can_view_a_dashboard_page()
    {
        $this->user->roles()->attach(Role::getRoleByName(AppUser::ROLE_USER));

        $response = $this->actingAs($this->user)->get('/dashboard');
        $response->assertSuccessful();
        $response->assertViewIs('home');
    }

    /**
     * User can see update client page
     */
    public function test_user_can_view_a_update_client_page()
    {
        $this->user->roles()->attach(Role::getRoleByName(AppUser::ROLE_USER));
        $client = factory(Client::class)->create();

        $response = $this->actingAs($this->user)->get('/client/' . $client->id);
        $response->assertSuccessful();
        $response->assertViewIs('client');
    }

    /**
     * User can see update client page
     */
    public function test_user_can_use_update_client_form()
    {
        $this->user->roles()->attach(Role::getRoleByName(AppUser::ROLE_USER));
        $client = factory(Client::class)->create();
        $this->actingAs($this->user)->get('/client/' . $client->id);
        $data = $client->toArray();
        $data['name'] = $this->faker->firstName;
        $data['surname'] = $this->faker->lastName;
        $data["_token"] =  Session::token();
        $response = $this->actingAs($this->user)->put('/client/' . $client->id, $data);
        $this->assertDatabaseHas('Clients', [
            'id' => $client->id,
            'name' => $data['name'],
            'surname' => $data['surname'],
        ]);
        $response->assertSuccessful();
        $response->assertViewIs('client');
    }



    /**
     * Admin can view create user form
     */
    public function test_admin_can_view_a_create_user_form()
    {
        $this->user->roles()->attach(Role::getRoleByName(AppUser::ROLE_ADMIN));
        $response = $this->actingAs($this->user)->get('/create-user');
        $response->assertStatus(200);
        $response->assertViewIs('create-user');
    }

    /**
     * User without Admin role can't see create user form
     */
    public function test_user_cant_view_a_create_user_form()
    {
        $this->user->roles()->attach(Role::getRoleByName(AppUser::ROLE_USER));
        $response = $this->actingAs($this->user)->get('/create-user');
        $response->assertRedirect('/dashboard');

    }

    /**
     * Admin can create new user
     */
    public function test_admin_can_create_new_user()
    {
        $this->user->roles()->attach(Role::getRoleByName(AppUser::ROLE_ADMIN));
        $this->actingAs($this->user)->get('/create-user');
        $data = [
            'email' => $this->faker->unique()->safeEmail,
            'role' => '2',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            '_token' => Session::token(),
        ];
        $response = $this->actingAs($this->user)->post('/create-user', $data);
        $this->assertDatabaseHas('Users', [
            'email' => $data['email'],
        ]);
        $response->assertStatus(200);
    }
    /**
     * If User exist it will be updated
     */
    public function test_admin_can_update_exist_user()
    {
        $this->user->roles()->attach(Role::getRoleByName(AppUser::ROLE_ADMIN));

        $user = factory(AppUser::class)->create();
        $user->roles()->attach(Role::getRoleByName(AppUser::ROLE_ADMIN));

        $this->actingAs($this->user)->get('/create-user');
        $data = [
            'email' => $user->email,
            'role' => '2',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            '_token' => Session::token(),
        ];
        $response = $this->actingAs($this->user)->post('/create-user', $data);
//        $this->assertDatabaseHas('role_user', [
//            'user_id' => $user->id,
//            'role_id' => 2,
//        ]);
        $response->assertStatus(200);
    }

    /**
     * User without Admin role can't can create new user
     */
    public function test_user_cant_create_new_user_form()
    {
        $this->user->roles()->attach(Role::getRoleByName(AppUser::ROLE_USER));
        $this->actingAs($this->user)->get('/create-user');

        $response = $this->actingAs($this->user)->post('/create-user', [
            'email' => $this->faker->unique()->safeEmail,
            'role' => '2',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            '_token' => Session::token(),
        ]);
        $response->assertRedirect('/dashboard');
    }


}

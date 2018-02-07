<?php

namespace App\Containers\Authorization\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Models\UserModel;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * Class AuthorizationDefaultUsersSeeder_3
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class AuthorizationDefaultUsersSeeder_3 extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setUpFaker();
        // Default Users (with their roles) ---------------------------------------------
        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = true,
            'johndoe@example.com',
            'foobar',
            'John Doe',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['client']));

        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = true,
            'test@example.com',
            'foobar',
            'Mick Nolan',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['client']));

        for($i = 0; $i < 50; $i++){
            Apiato::call('User@CreateUserByCredentialsTask', [
                $isClient = true,
                $this->faker->email,
                $this->faker->password,
                $this->faker->name,
            ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['client']));
        }

        \DB::table('oauth_clients')->insert([
            'name'  =>  'TaskeR Password Grant Client',
            'secret'    =>  'p2pM0CzOLuosG8aKN0eVR2rAJLU5ASvEb85LBIqO',
            'redirect'  =>  'http://localhost',
            'personal_access_client'    =>  0,
            'password_client'   =>  1,
            'revoked'   =>  0,
            'created_at'    => date("Y-m-d H:i:s", time()),
            'updated_at'    =>  date("Y-m-d H:i:s", time()),
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Create users
        User::create(
            [
                'email'      => 'crisfalt@gmail.com',
                'password'   => bcrypt( 'test' ),
                'name' => 'Cristian Trujillo',
            ],
        );
        User::create(
            [
                'email'      => 'alberto@gmail.com',
                'password'   => bcrypt( 'test' ),
                'name' => 'Alberto',
            ],
        );

        Model::reguard();
    }
}

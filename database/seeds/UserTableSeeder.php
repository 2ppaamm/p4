<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        $user = User::create(array(
            'username' => 'pamelalim',
            'email' => 'pamelaliusm@gmail.com',
            'password' => Hash::make('Japherlim01'),
            'is_admin'=> True
        ));
        $user = User::create(array(
            'username' => 'susanbuck',
            'email' => 'susanbuck@fas.harvard.edu ',
            'password' => Hash::make('password'),
            'is_admin'=> True
        ));
        $faker = Faker::create();


        for ($i = 0; $i < 100; $i++)
        {
            $user = User::create(array(
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'is_admin'=>False
            ));
        }
    }

}
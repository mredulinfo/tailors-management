<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'durontomredul@gmail.com',
                'is_admin'=>'1',
                'password'=> bcrypt('mMm11111'),
            ],
            [
                'name'=>'User',
                'email'=>'mredulinfo@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('mMm11111'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

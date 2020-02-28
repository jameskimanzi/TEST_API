<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = [

            [

                'first_name'=>'Admin',
                'last_name'=>'Admin',
                'email'=>'admin@admin.com',
                'phone_no'=>'0712882613',
                'is_admin'=>'1',
                'active'=>'1',

                'password'=> bcrypt('123456'),

            ],



        ];



        foreach ($user as $key => $value) {

            User::create($value);

        }

    }

}

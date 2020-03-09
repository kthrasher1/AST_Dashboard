<?php


use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     *
     */



    public function run()
    {
        $users = [

            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'id' => 2,
                'name' => 'staff',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'id' => 3,
                'name' => 'student',
                'email' => 'student@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'id' => 4,
                'name' => 'unassigned',
                'email' => 'unassigned@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]

        ];

        DB::table('users')->insert($users);
    }
}

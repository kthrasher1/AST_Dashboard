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
                'user_id' => (string) Uuid::generate(4),
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'id' => 2,
                'user_id' => (string) Uuid::generate(4),
                'name' => 'staff',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'id' => 3,
                'user_id' => (string) Uuid::generate(4),
                'name' => 'student',
                'email' => 'student@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'id' => 4,
                'user_id' => (string) Uuid::generate(4),
                'name' => 'unassigned',
                'email' => 'unassigned@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'id' => 5,
                'user_id' => (string) Uuid::generate(4),
                'name' => 'staff-other',
                'email' => 'staff-other@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]

        ];

        DB::table('users')->insert($users);
    }
}

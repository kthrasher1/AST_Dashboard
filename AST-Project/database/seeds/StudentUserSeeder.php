<?php

use Illuminate\Database\Seeder;

class StudentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student_user = [
            ['user_id' => 3, 'student_id' => 1],
            ['user_id' => 4, 'student_id' => 2],
        ];

        foreach($student_user as $student_users){

            DB::table('student_user')->insert($student_users);
        }
    }
}

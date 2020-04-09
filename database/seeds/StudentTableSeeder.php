<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{

    public function run()
    {
        //
        $students = [

            [
                'id' => 1,
                'student_id' => 3,
                'ast_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],

            [
                'id' => 2,
                'student_id' => 4,
                'ast_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()

            ],

        ];

        foreach($students as $student){

            DB::table('students')->insert($student);
        }

    }
}

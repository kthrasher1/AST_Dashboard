<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{

    public function run()
    {
        //
        $students = [

            [
                'id' => 1, 'ast_id' => 1,
            ],

            [
                'id' => 2, 'ast_id' => 2,
            ],

        ];

        foreach($students as $student){

            DB::table('students')->insert($student);
        }

    }
}





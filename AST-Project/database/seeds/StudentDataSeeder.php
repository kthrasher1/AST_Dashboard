<?php

use Illuminate\Database\Seeder;

class StudentDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $students = [
            [
            'id' => 1,
            'student_id' => 3,
            'emotional_range' => 6,
            'issue_selection' => 'relationship,university,money',
            'created_at' => NOW(),
            'updated_at' => NOW(),
            'page_number' => 2
            ],
        ];

        foreach($students as $student){

            DB::table('student_data')->insert($student);
        }

    }
}

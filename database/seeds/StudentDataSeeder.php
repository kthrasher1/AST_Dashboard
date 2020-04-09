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
        $studentdata = [

            [
                'id' => 1,
                'student_id' => 1,
                'emotion_slider' => 3,
                'issue_selector' => 'relationship, university, homelife',
                'risk_level' => 2,
                'total_attendance' => 96,
                'module_1_grade' => 74,
                'module_1_attendance' => 78,
                'module_2_grade' => 72,
                'module_2_attendance' => 65,
                'module_3_grade' => 65,
                'module_3_attendance' => 56,
                'module_4_grade' => 64,
                'module_4_attendance' => 68,
                'module_5_grade' => 65,
                'module_5_attendance' => 57,
                'module_6_grade' => 65,
                'module_6_attendance' => 54,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ];

        foreach($studentdata as $studentsdata){

            DB::table('student_data')->insert($studentsdata);
        }
    }
}

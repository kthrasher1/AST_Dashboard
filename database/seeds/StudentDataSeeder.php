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
                'student_id' => 3,
                'emotion_slider' => 3,
                'issue_selector' => 'relationship, university, homelife',

                'risk_level' => 2,
                'total_attendance' => 66,

                'semester' => 1,

                'module_1_name' => 'Data Mining',
                'module_1_grade' => 74,
                'module_1_attendance' => 78,
                'module_1_semester' => 1,

                'module_2_name' => 'Software Engineering',
                'module_2_grade' => 72,
                'module_2_attendance' => 65,
                'module_2_semester' => 1,

                'module_3_name' => 'Sustainable Computing',
                'module_3_grade' => 65,
                'module_3_attendance' => 56,
                'module_3_semester' => 1,

                'module_4_name' => null,
                'module_4_grade' => null,
                'module_4_attendance' => null,
                'module_4_semester' => 2,

                'module_5_name' => null,
                'module_5_grade' => null,
                'module_5_attendance' => null,
                'module_5_semester' => 2,

                'module_6_name' => null,
                'module_6_grade' => null,
                'module_6_attendance' => null,
                'module_6_semester' => 2,

                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ];

        foreach($studentdata as $studentsdata){

            DB::table('student_data')->insert($studentsdata);
        }
    }
}

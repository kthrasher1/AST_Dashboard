<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
                'issue_selector_1' => 'homelife',
                'issue_selector_2' => 'university',
                'issue_selector_3' => 'relationship',
                'issue_selector_4' => null,
                'issue_selector_5' =>  null,
                'issue_selector_6' => null,
                'other_selector' => null,
                'module_issues_bool' => 0,
                'module_selector_1' => null,
                'module_selector_2' => null,
                'module_selector_3' => null,
                'module_expand_bool' => 0,
                'module_detail' => null,
                'other_issues' => null,
                'completed' => 1,

                'risk_level' => 2,

                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'id' => 2,
                'student_id' => 4,
                'emotion_slider' => 3,
                'issue_selector_1' => 'homelife',
                'issue_selector_2' => 'university',
                'issue_selector_3' => 'relationship',
                'issue_selector_4' => null,
                'issue_selector_5' =>  null,
                'issue_selector_6' => 'other',
                'other_selector' => "staff",
                'module_issues_bool' => 0,
                'module_selector_1' => null,
                'module_selector_2' => null,
                'module_selector_3' => null,
                'module_expand_bool' => 0,
                'module_detail' => null,
                'other_issues' => null,

                'completed' => 1,

                'risk_level' => 3,

                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ];

        foreach($studentdata as $studentsdata){

            DB::table('student_data')->insert($studentsdata);
        }
    }
}

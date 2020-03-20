<?php

use Illuminate\Database\Seeder;

class StaffStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff_student = [
            ['staff_id' => 1, 'student_id' => 1],
            ['staff_id' => 2, 'student_id' => 2]
        ];

        foreach($staff_student as $staff_students){

            DB::table('staff_student')->insert($staff_students);
        }
    }
}


<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         $staffs = [
            [
            'staff_id' => 2,
            'student_id' => 3,
            ],
        ];

        foreach($staffs as $staff){

            DB::table('staff')->insert($staff);
        }
    }
}

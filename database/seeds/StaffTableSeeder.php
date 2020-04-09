<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
         $staff =
            [

                [
                    'id' => 1,
                    'staff_id' => 2,
                    'created_at' => NOW(),
                    'updated_at' => NOW()

                ],

                [
                    'id' => 2,
                    'staff_id' => 5,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],

            ];

        foreach($staff as $staffs){

            DB::table('staff')->insert($staffs);
        }
    }
}

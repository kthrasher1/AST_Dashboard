<?php

use Illuminate\Database\Seeder;

class StaffUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff_user = [
            ['user_id' => 2, 'staff_id' => 1],
            ['user_id' => 5, 'staff_id' => 2],
        ];

        foreach($staff_user as $staff_users){

            DB::table('staff_user')->insert($staff_users);
        }
    }
}

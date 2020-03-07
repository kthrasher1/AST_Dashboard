<?php

use Illuminate\Database\Seeder;

class AssignedRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $assignRoles = [
            ['role_id' => 1, 'user_id' => 1],
            ['role_id' => 2, 'user_id' => 2],
            ['role_id' => 3, 'user_id' => 3],
            ['role_id' => 4, 'user_id' => 4],
        ];

        foreach($assignRoles as $assignRole){

            DB::table('role_user')->insert($assignRole);
        }

    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);

        $this->call(RoleTableSeeder::class);
        $this->call(AssignedRolesSeeder::class);

        $this->call(StaffTableSeeder::class);
        $this->call(StudentTableSeeder::class);

        $this->call(StaffStudentSeeder::class);

        $this->call(StaffUserSeeder::class);
        $this->call(StudentUserSeeder::class);

    }
}

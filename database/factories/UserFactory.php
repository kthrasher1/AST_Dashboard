<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Message;
use App\ModuleData;
use App\StudentData;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'student' => $faker->student,
        'staff' => $faker->staff,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Message::class, function (Faker $faker) {
    do{
        $from = rand(3,2);
        $to = rand(3,2);

    } while($from === $to);

    return[
        'to' => $to,
        'from' => $from,
        'read' => rand(true, false),
        'content' => $faker->sentence,
    ];

});



$factory->define(ModuleData::class, function (Faker $faker) {

    $CurrentData = ModuleData::all();
    $last = DB::table('module_data')->latest()->first();

    $studentId = 3;

    // dd($last);

    if($CurrentData->first() == null ){
        $date = Carbon::now()->subDays(120);
    }
    else {
        $Adddays = ModuleData::latest()->first();
        // dd($Adddays);
        $date = $Adddays->created_at->addDays(7);

    }


    $monthlyDate = \Carbon\Carbon::today()->subDays(60);
    $monthData = ModuleData::latest();
    $monthlyCheck = $monthData->where('created_at' , '>=', $monthlyDate)->first();

    $mod_1_att_weekly_sem_1 = 0;
    $mod_2_att_weekly_sem_1 = 0;
    $mod_3_att_weekly_sem_1 = 0;

    $total_weekly_att_sem_1 = 0;

    $all_mod_1_att = 0;
    $all_mod_2_att = 0;
    $all_mod_3_att = 0;

    $total_attendance = 0;

    if($monthlyCheck == null ){
        $semester = 1;

        $mod_grade_sem_1 = 58;

        $mod_1_grade = 54;
        $mod_2_grade = 72;
        $mod_3_grade = 56;


        $mod_1_att_weekly_sem_1 = rand(1, 100);
        $mod_2_att_weekly_sem_1 = rand(1,100);
        $mod_3_att_weekly_sem_1 = rand(1, 100);

        $total_weekly_att_sem_1 = ($mod_1_att_weekly_sem_1 + $mod_2_att_weekly_sem_1 + $mod_3_att_weekly_sem_1)/ 3;

        $all_mod_1_att = ModuleData::pluck('module_1_attendance_weekly')->all();
        $all_mod_2_att = ModuleData::pluck('module_2_attendance_weekly')->all();
        $all_mod_3_att = ModuleData::pluck('module_3_attendance_weekly')->all();

        $total = 0;

        for ($idx=0; $idx <= count($all_mod_1_att); $idx++) {
            $total += $all_mod_1_att[$idx];
        }

        $total_2 = 0;

        for ($idx=0; $idx <= count($all_mod_2_att); $idx++) {
            $total_2 += $all_mod_2_att[$idx];
        }

        $total_3 = 0;

        for ($idx=0; $idx <= count($all_mod_3_att); $idx++) {
            $total_3 += $all_mod_3_att[$idx];
        }

        if(count($all_mod_1_att) == 0 && count($all_mod_2_att) == 0  && count($all_mod_3_att) == 0){
            $total_attendance = 0;
        }
        else{
            $total_mod_1 = $total/count($all_mod_1_att);
            $total_mod_2 = $total_2/count($all_mod_2_att);
            $total_mod_3 = $total_3/count($all_mod_3_att);
        }

        $total_attendance = ($total_mod_1 + $total_mod_2 + $total_mod_3)/ 3;
        $total_grade = ( $mod_1_grade+  $mod_2_grade +  $mod_3_grade)/ 3;

    }
    else {
        $semester = 2;

        $mod_4_grade = 68;
        $mod_5_grade = 78;
        $mod_6_grade = 56;

        $mod_4_att_weekly_sem_2 = rand(1, 100);
        $mod_5_att_weekly_sem_2 = rand(1,100);
        $mod_6_att_weekly_sem_2 = rand(1, 100);

        $total_weekly_att_sem_2 = ($mod_4_att_weekly_sem_2 + $mod_5_att_weekly_sem_2 + $mod_6_att_weekly_sem_2)/ 3;

        $all_mod_1_att_sem_2 = ModuleData::pluck('module_1_attendance_weekly')->all();
        $all_mod_2_att_sem_2 = ModuleData::pluck('module_2_attendance_weekly')->all();
        $all_mod_3_att_sem_2 = ModuleData::pluck('module_3_attendance_weekly')->all();

        $total_sem_2 = 0;

        for ($idx=0; $idx <= count($all_mod_1_att_sem_2); $idx++) {
            $total_sem_2 += $all_mod_1_att_sem_2[$idx];
        }

        $total_2_sem_2 = 0;

        for ($idx=0; $idx <= count($all_mod_2_att_sem_2); $idx++) {
            $total_2_sem_2 += $all_mod_2_att_sem_2[$idx];
        }

        $total_3_sem_2 = 0;

        for ($idx=0; $idx <= count($all_mod_3_att_sem_2); $idx++) {
            $total_3_sem_2 += $all_mod_3_att_sem_2[$idx];
        }

        if(count($all_mod_1_att_sem_2) == 0 && count($all_mod_2_att_sem_2) == 0  && count($all_mod_3_att_sem_2) == 0){
            $total_attendance_sem_2 = 0;
        }
        else{

            $total_mod_4 = $total_sem_2/count($all_mod_1_att_sem_2);
            $total_mod_5 = $total_2_sem_2/count($all_mod_2_att_sem_2);
            $total_mod_6 = $total_3_sem_2/count($all_mod_3_att_sem_2);

        }


        $total_attendance_sem_2 = ($total_mod_4 + $total_mod_5 + $total_mod_6)/ 3;
        $total_grade_sem_2 = ( $mod_4_grade+  $mod_5_grade +  $mod_6_grade)/ 3;
    }

    return[
        'student_id' =>  $studentId,
        'semester' =>  $semester,

        //semester 1
        'module_1_name' => 'Data Mining',
        'module_1_grade' => $mod_1_grade,
        'module_1_attendance_weekly' =>  $mod_1_att_weekly_sem_1 ,
        'module_1_semester' => 1,

        'module_2_name' => 'Distributed Systems',
        'module_2_grade' => $mod_2_grade,
        'module_2_attendance_weekly' => $mod_2_att_weekly_sem_1 ,
        'module_2_semester' => 1,

        'module_3_name' => 'Software Engineering',
        'module_3_grade' => $mod_3_grade,
        'module_3_attendance_weekly' => $mod_3_att_weekly_sem_1 ,
        'module_3_semester' => 1,

        'total_grade_semester_1' => $total_grade,
        'weekly_attendance_semester_1' => $total_weekly_att_sem_1,
        'total_attendance_semester_1' => $total_attendance,

        //Semester 2

        'module_4_name' => 'Programming 1',
        'module_4_grade' => $mod_4_grade,
        'module_4_attendance_weekly' => $mod_6_att_weekly_sem_2,
        'module_4_semester' => 2,

        'module_5_name' => 'Visulisation',
        'module_5_grade' => $mod_5_grade,
        'module_5_attendance_weekly' => $mod_5_att_weekly_sem_2,
        'module_5_semester' => 2,

        'module_6_name' => 'Computer Vision',
        'module_6_grade' => $mod_6_grade,
        'module_6_attendance_weekly' => $mod_6_att_weekly_sem_2,
        'module_6_semester' => 2,

        'total_grade_semester_2' => $total_grade_sem_2,
        'weekly_attendance_semester_2' => $total_weekly_att_sem_2,
        'total_attendance_semester_2' => $total_attendance_sem_2,

        'created_at' => $date,
        'updated_at' => $date,

    ];

});



$factory->define(StudentData::class, function (Faker $faker) {

    $CurrentData = StudentData::all();

     if($CurrentData->first() == null){
        $date = Carbon::now()->subDays(60);
     }
     else {
        $CurrentData = StudentData::latest()->first();
        $date = $CurrentData->created_at->addDays(7);
     }


    $monthlyDate = \Carbon\Carbon::today()->subDays(30);
    $monthData = StudentData::latest();
    $monthlyCheck = $monthData->where('created_at' , '>=', $monthlyDate)->first();

    $otherBool = $faker->randomElement(['other', null ]);

    if($otherBool != null){
        $other_selector = $faker->sentence();
    }

    $moduleBool = rand(0,1);

    if($moduleBool == 1) {
        $moduleSelector_1 =  $faker->randomElement(['Data Mining', null ]);
        $moduleSelector_2 =  $faker->randomElement(['Distributed Systems', null ]);
        $moduleSelector_3 =  $faker->randomElement(['Software Engineering', null ]);
        $moduleExpandBool = rand(0,1);

        if($moduleExpandBool == 1)
        {
            $moduleDetail = $faker->sentence();
        }
    }

    $otherBool = rand(0,1);

    if($otherBool == 1){
        $otherIssues = $faker->sentence();
    }

    return[
        'student_id' => rand(3,4),
        'emotion_slider' => rand(1, 5),

        'issue_selector_1' =>  $faker->randomElement(['home', null ]),
        'issue_selector_2' => $faker->randomElement(['university', null ]),
        'issue_selector_3' => $faker->randomElement(['relationship', null ]),
        'issue_selector_4' => $faker->randomElement(['friends', null ]),
        'issue_selector_5' => $faker->randomElement(['travel', null ]),
        'issue_selector_6' => $faker->randomElement(['other', null ]),
        'other_selector' => $other_selector,
        'module_issues_bool' => $moduleBool,
        'module_selector_1' => $moduleSelector_1,
        'module_selector_2' => $moduleSelector_2,
        'module_selector_3' => $moduleSelector_3,
        'module_expand_bool' => $moduleExpandBool,
        'module_detail' => $moduleDetail,
        'other_issues' => $otherIssues,
        'completed' => 1,
        'risk_level' => rand(1,5),

        'created_at' => $date,
        'updated_at' => $date,

    ];

});

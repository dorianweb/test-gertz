<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::factory(10)->create();

        $dodo = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'dorian@mediacall.fr',
        ]);


        $id = DB::table('messages')->insertGetId([
            'first_name' => "dorian",
            'last_name' => "saez",
            'content' => "Culpa eiusmod reprehenderit laboris cupidatat. Excepteur reprehenderit sint sint esse adipisicing. Nisi officia nulla adipisicing do. Occaecat veniam minim cupidatat excepteur tempor voluptate id aliquip. Exercitation velit deserunt id consectetur commodo. Eiusmod commodo non esse magna. Amet enim tempor sint veniam magna nostrud excepteur.",
        ]);
        $idCourses = array();
        $idLessons = array();
        $lessons = [
            [
                'name' => 'developpeur back',
                'difficulty' => 7,
            ],
            [
                'name' => 'sport',
                'difficulty' => 5,
            ],
            [
                'name' => 'patisserie',
                'difficulty' => 7,
            ],
            [
                'name' => 'mathemaique',
                'difficulty' => 10,
            ],
            [
                'name' => 'design',
                'difficulty' => 4,
            ],
        ];

        $courses = [
            [
                'name' => 'developpeur back',
            ],
            [
                'name' => 'OPS',
            ],
            [
                'name' => 'cuisine',
            ],
            [
                'name' => 'menuiserie',
            ],
            [
                'name' => 'soldat',
            ],
        ];

        foreach ($lessons as $lesson) {

            $id = DB::table('lessons')->insertGetId([
                'name' => $lesson["name"],
                'difficulty' => $lesson["difficulty"],
            ]);
            array_push($idLessons, $id);
        }

        foreach ($courses as $course) {

            $id = DB::table('courses')->insertGetId([
                'name' => $course["name"],
            ]);

            array_push($idCourses, $id);
            DB::table('course_user')->insertGetId([
                'user_id' => $users[rand(0, count($users) - 1)]->id,
                'course_id' => $id,
                'state' => rand(1, 3),

            ]);

            $usedLessons = [];
            $index = rand(1, count($idLessons));
            for ($i = 0; $i <= rand(1, 3); $i++) {
                while (in_array($index, $usedLessons)) {
                    $index = rand(1, count($idLessons));
                }
                array_push($usedLessons, $id);

                $id = DB::table('course_lesson')->insertGetId([
                    'lesson_id' => $idLessons[$index - 1],
                    'course_id' => $id,
                ]);
                array_push($idLessons, $id);
            }
        }
    }
}

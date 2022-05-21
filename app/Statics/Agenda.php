<?php

namespace App\Statics;

use App\Models\User;

class Agenda
{
    public static function userSubscribedTo($user_id, $course_name)
    {
        $user = User::find($user_id)->load(['courses']);
        $result = false;
        $i = 0;
        while (!$result && $i <= count($user->courses) - 1) {

            if ($user->courses[$i]->name == $course_name) {
                $result = true;
            }
            $i++;
        }
        return $result;
    }
    public static function userAttends($user_id, $lesson_name)
    {
    }
    public static function userAttendsAll($user_id, $lessons_names)
    {
    }
    public static function userAttendsAtLeast($user_id, $lessons_names)
    {
    }
    public static function authSubscribedTo($course_name)
    {
    }

    public static function authAttends($lesson_name)
    {
    }

    public static function authAttendsAll($lessons_names)
    {
    }
    public static function authAttendsAtLeast($lessons_names)
    {
    }
}

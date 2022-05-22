<?php

namespace App\Statics;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Agenda
{
    public static function userSubscribedTo($user_id, $course_name)
    {
        //jetais parti sur des boucles while au precedent commit mais je voulais a tout prix utiliser les conditions de relation 
        //ducoup je part sur des boucles pour les prochaines histoire de pas abuser de l'exercice
        //je sais pas si cest opti mais en tout cas ca marche et sa reduit les erreurs liee au boucle
        $users = User::whereRelation('courses', 'name', $course_name)->get();
        $a = $users->first(function ($user) use ($user_id) {
            return $user->id == $user_id;
        });
        return !is_null($a);
    }

    public static function userAttends($user_id, $lesson_name)
    {
        $user = User::find($user_id)->load(['courses.lessons']);
        $result = false;
        if (is_null($user))
            return $result;

        $endLoop = false;
        $i = 0;
        while (!$endLoop) {
            $j = 0;
            $endChildLoop = false;
            if ($i >= $user->courses->count() - 1) {
                $endLoop = true;
            }

            while (!$endChildLoop) {
                if ($j >= $user->courses[$i]->lessons->count() - 1) {
                    $endChildLoop = true;
                }
                if ($user->courses[$i]->lessons[$j]->name == $lesson_name) {
                    $endChildLoop = true;
                    $endLoop = true;
                    $result = true;
                }
                $j++;
            }
            $i++;
        }
        return $result;
    }
    public static function userAttendsAll($user_id, $lessons_names)
    {
        $result = true;
        $endLoop = false;
        $i = 0;
        if (empty($lesson_names))
            return false;

        while ($endLoop == false) {
            if (!self::userAttends($user_id, $lessons_names[$i])) {
                $result = false;
                $endLoop = true;
            }
            $i++;
        }
        return $result;
    }
    public static function userAttendsAtLeast($user_id, $lessons_names)
    {
        $result = false;
        $endLoop = false;
        $i = 0;
        if (empty($lesson_names))
            return false;

        while ($endLoop == false) {
            if (self::userAttends($user_id, $lessons_names[$i])) {
                $result = true;
                $endLoop = true;
            }
            $i++;
        }
        return $result;
    }

    public static function authSubscribedTo($course_name)
    {
        return self::userSubscribedTo(Auth::id(), $course_name);
    }

    public static function authAttends($lesson_name)
    {
        return self::userAttends(Auth::id(), $lesson_name);
    }

    public static function authAttendsAll($lessons_names)
    {
        return self::userAttendsAll(Auth::id(), $lessons_names);
    }
    public static function authAttendsAtLeast($lessons_names)
    {
        return self::userAttendsAtLeast(Auth::id(), $lessons_names);
    }
    public static function  str_replace_all_but($to_keep = 'de', $replace_with, $string)
    {
        $arrString = str_split($string);
        if (gettype($to_keep) == 'string')
            $to_keep = str_split($to_keep);

        for ($i = 0; $i <= strlen($string) - 1; $i++) {
            if (!in_array($string[$i], $to_keep)) {
                $arrString[$i] = $replace_with;
            }
        }
        dd(join($arrString));
    }
}

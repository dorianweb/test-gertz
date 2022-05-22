<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Message;
use App\Models\User;
use App\Statics\Agenda;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show($id)
    {
        //need a view but no time for this
        return Message::find($id);
    }

    public function tested()
    {
        $user = User::find(2);
        // $user->courses()->sync([
        //     2 => ['state' => 1],
        //     3 => ['state' => 2],
        //     4 => ['state' => 2],
        // ]);
        // $lesson = Lesson::find(3);
        // $course = Course::find(3);
        // Agenda::userSubscribedTo($user->id, $course->name);
        // Agenda::userAttends($user->id, $lesson->name);
        // Agenda::userAttendsAll($user->id, $lesson->name);
        // Agenda::userAttendsAtLeast($user->id, $lesson->name);
        // Agenda::authAttends($lesson->name);
        // Agenda::authAttendsAll($lesson->name);
        // Agenda::authAttendsAtLeast($lesson->name);

        //je sais pas si je dois prendre le cas limite ou larray to keep contient des chaines de plusieur char ??
        //par defaut je vais implementer sans
        Agenda::str_replace_all_but('de', 'chat', 'dee de dz hth fyj ou ,nbn d');
    }
}

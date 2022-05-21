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
        $lesson = Lesson::find(1);
        $course = Course::find(2);
        Agenda::userSubscribedTo($user->id, $course->name);
        Agenda::userAttends($user->id, $lesson->name);
        Agenda::userAttendsAll($user->id, $lesson->name);
        Agenda::userAttendsAtLeast($user->id, $lesson->name);
        Agenda::authAttends($lesson->name);
        Agenda::authAttendsAll($lesson->name);
        Agenda::authAttendsAtLeast($lesson->name);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show($id)
    {
        //need a view but no time for this
        return Message::find($id);
    }
}

function test()
{
    $user_id = 2;
    $lesson_id = 1;
    $course_id = 3;
}

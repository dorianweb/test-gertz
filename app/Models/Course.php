<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    const STATE_NOT_APPLIED = 0;
    const STATE_ENDED = 1;
    const STATE_IN_PROGRESS = 2;
    const STATE_ABORTED = 3;
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

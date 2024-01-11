<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClassTeacherModel extends Model
{
    use HasFactory;

    protected $table = 'assign_class_teacher';

    static public function getAlreadyFirst($class_id, $teacher_id)
    {
        return self::where('class_id', '=', $class_id)->where('teacher_id', '=', $teacher_id)->first();
    }
}

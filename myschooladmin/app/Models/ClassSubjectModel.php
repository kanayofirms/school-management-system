<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClassSubjectModel extends Model
{
    use HasFactory;

    protected $table = 'class_subject';

    static public function getRecord()
    {
        return self::select('class_subject.*', 'class.name as class_name', 'subject.name as subject_name', 'users.name as created_by_name')
                    ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
                    ->join('class', 'class.id', '=', 'class_subject.class_id')
                    ->join('users', 'users.id', '=', 'class_subject.created_by')
                    ->orderBy('class_subject.id', 'desc')
                    ->paginate(20);
    }

    static public function getAlreadyFirst($class_id, $subject_id)
    {
        return self::where('class_id', '=', $class_id)->where('subject_id', '=', $subject_id)->first();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkModel extends Model
{
    use HasFactory;

    protected $table = 'homework';

    static public function getRecord()
    {
        $return = self::select('homework.*', 'class.name as class_name', 'subject.name 
        as subject_name', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'homework.created_by')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->where('homework.is_delete', '=', 0)
            ->orderBy('homework.id', 'desc')
            ->paginate(20);

        return $return;
    }
}

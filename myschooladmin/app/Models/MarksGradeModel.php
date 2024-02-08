<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksGradeModel extends Model
{
    use HasFactory;

    protected $table = 'marks_grade';

    static public function getRecord()
    {
        return MarksGradeModel::select('marks_grade.*', 'users.name as created_name')
                ->join('users', 'users.id', '=', 'marks_grade.created_by')
                ->get();
    }
}

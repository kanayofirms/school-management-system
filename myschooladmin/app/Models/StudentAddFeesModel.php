<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddFeesModel extends Model
{
    use HasFactory;

    protected $table = 'student_add_fees';

    static public function getSingle($id)
    {
        return self::find($id);
    }
}

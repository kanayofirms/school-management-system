<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';

    static public function getRecord()
    {
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'subject.created_by');

                    $return = $return->where('subject.is_delete', '=', 0)
                    ->orderBy('subject.id', 'desc')
                    ->paginate(20);

        return $return;
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeBoardModel extends Model
{
    use HasFactory;

    protected $table = 'notice_board';

    static public function getRecord()
    {
        return self::select('notice_board.*', 'users.name as created_by_name')
                ->join('users', 'users.id', '=', 'notice_board.created_by')
                ->orderBy('notice_board.id', 'desc')
                ->paginate(20);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkSubmitModel extends Model
{
    use HasFactory;

    protected $table = "homework_submit";

    static public function getRecordStudent($student_id)
    {
        $return = HomeworkSubmitModel::select('homework_submit.*')
                    ->join('homework', 'homework.id', '=', 'homework_submit.homework_id')
                    ->orderBy('homework_submit.id', 'desc')
                    ->paginate(20);

        return $return;
    }

    public function getDocument()
    {
        if(!empty($this->document_file) && file_exists('upload/homework/'.$this->document_file))
        {
            return url('upload/homework/'.$this->document_file);
        }
        else{
            return "";
        }
    }
}

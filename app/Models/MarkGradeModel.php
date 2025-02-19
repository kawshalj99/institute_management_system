<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class MarkGradeModel extends Model
{
    use HasFactory;

    protected $table = 'mark_grade';

    static public function getSingle($id)
    {
        return self::find($id);
    }
    
    static public function getRecord()
    {
        return MarkGradeModel::select('mark_grade.*', 'users.name as created_name')
                ->join('users', 'users.id', '=', 'mark_grade.created_by')
                ->get();
    }

    static public function getGrade($percent)
    {
        $return = MarkGradeModel::select('mark_grade.*')
                ->where('percent_from', '<=', $percent)
                ->where('percent_to', '>=', $percent)
                ->first();

        return !empty($return->name) ? $return->name : '';
    }
}

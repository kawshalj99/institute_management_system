<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class MarksRegisterModel extends Model
{
    use HasFactory;

    protected $table = 'mark_register';

    static public function CheckAlreadyMark($student_id, $exam_id, $class_id, $subject_id)
    {
        return MarksRegisterModel::where('student_id', '=', $student_id)->where('exam_id', '=', $exam_id)->where('class_id', '=', $class_id)->where('subject_id', '=', $subject_id)->first();
    }

    static public function getExam($student_id)
    {
        return MarksRegisterModel::select('mark_register.*', 'exam.name as exam_name')
                ->join('exam', 'exam.id', '=', 'mark_register.exam_id')
                ->where('mark_register.student_id', '=', $student_id)
                ->groupBy('mark_register.exam_id')
                ->get();


    }

    static public function getExamSubject($exam_id, $student_id)
    {
        return MarksRegisterModel::select('mark_register.*', 'exam.name as exam_name', 'subject.name as subject_name')
                ->join('exam', 'exam.id', '=', 'mark_register.exam_id')
                ->join('subject', 'subject.id', '=', 'mark_register.subject_id')
                ->where('mark_register.exam_id', '=', $exam_id)
                ->where('mark_register.student_id', '=', $student_id)
                ->get();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use App\Models\AssignClassTeacherModel;
use App\Models\MarksRegisterModel;
use App\Models\User;
use App\Models\MarkGradeModel;


class ExaminationsController extends Controller
{
    public function exam_list()
    {
        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = "Exam List";
        return view('admin.examinations.exam.list', $data);
    }

    public function exam_add()
    {
        $data['header_title'] = "Add New Exam";
        return view('admin.examinations.exam.add', $data);
    }

    public function exam_insert(Request $request)
    {
        $exam = new ExamModel;
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', "Exam Successfully Created");
    }

    public function exam_edit($id)
    {
        $data['getRecord'] = ExamModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Exam";
            return view('admin.examinations.exam.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    }

    public function exam_update($id, Request $request)
    {
        $exam = ExamModel::getSingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', "Exam Successfully Updated");
    }

    public function exam_delete($id)
    {
        $getRecord = ExamModel::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', "Exam Successfully Deleted");
        }
        else
        {
            abort(404);
        }
    }

    public function exam_schedule(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        $result = array();

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $getSubject = ClassSubjectModel::MySubject($request->get('class_id'));
            foreach($getSubject as $value)
            {
                $dataS = array();
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['subject_type'] = $value->subject_type;

                $ExamSchedule = ExamScheduleModel::getRecordSingle($request->get('exam_id'), $request->get('class_id'), $value->subject_id);

                if(!empty($ExamSchedule))
                {
                    $dataS['exam_date'] = $ExamSchedule->exam_date;
                    $dataS['start_time'] = $ExamSchedule->start_time;
                    $dataS['end_time'] = $ExamSchedule->end_time;
                    $dataS['hall_number'] = $ExamSchedule->hall_number;
                    $dataS['full_marks'] = $ExamSchedule->full_marks;
                    $dataS['passing_marks'] = $ExamSchedule->passing_marks;
                }
                else
                {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['hall_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_marks'] = '';
                }

                $result[] =$dataS;
            }
        }

        $data['getRecord'] = $result;

        $data['header_title'] = "Examination Schedule";
        return view('admin.examinations.exam_schedule',$data);
    }

    public function exam_schedule_insert(Request $request)
    {
        ExamScheduleModel::deleteRecord($request->exam_id, $request->class_id);

        if(!empty($request->schedule))
        {
            foreach($request->schedule as $schedule)
            {
                if(!empty($schedule['subject_id']) && !empty($schedule['exam_date']) && !empty($schedule['start_time']) && !empty($schedule['end_time']) && !empty($schedule['hall_number']) && !empty($schedule['full_marks']) && !empty($schedule['passing_marks']))
                {
                    $exam = new ExamScheduleModel;
                    $exam->exam_id = $request->exam_id;
                    $exam->class_id = $request->class_id;
                    $exam->subject_id = $schedule['subject_id'];
                    $exam->exam_date = $schedule['exam_date'];
                    $exam->start_time = $schedule['start_time'];
                    $exam->end_time = $schedule['end_time'];
                    $exam->hall_number = $schedule['hall_number'];
                    $exam->full_marks = $schedule['full_marks'];
                    $exam->passing_marks = $schedule['passing_marks'];
                    $exam->created_by = Auth::user()->id;
                    $exam->save();
                }
                

                
                
            }
        }

        return redirect()->back()->with('success', "Exam Schedule Successfully Created");
    }

    public function mark_register(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        }

        $data['header_title'] = "Marks Register";
        return view('admin.examinations.mark_register',$data);
    }

    public function mark_register_teacher(Request $request)
    {
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        $data['getExam'] = ExamScheduleModel::getExamTeacher(Auth::user()->id);

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        }

        $data['header_title'] = "Marks Register";
        return view('teacher.mark_register',$data);
    }

    public function submit_marks_register(Request $request)
    {
        $validation = 0;
        if(!empty($request->mark))
        {
            foreach($request->mark as $mark)
            {
                $getExamSchedule = ExamScheduleModel::getSingle($mark['id']);
                $full_marks = $getExamSchedule->full_marks;

                $assignment_marks = !empty($mark['assignment_marks']) ? $mark['assignment_marks'] : 0;
                $exam_marks = !empty($mark['exam_marks']) ? $mark['exam_marks'] : 0;
                
                $full_marks = !empty($mark['full_marks']) ? $mark['full_marks'] : 0;
                $passing_marks = !empty($mark['passing_marks']) ? $mark['passing_marks'] : 0;

                $total_mark = ($assignment_marks + $exam_marks)/2;

                if($full_marks >= $total_mark)
                {
                    $getMark = MarksRegisterModel::CheckAlreadyMark($request->student_id, $request->exam_id, $request->class_id, $mark['subject_id']);
                    if(!empty($getMark))
                    {
                        $save = $getMark;
                    }
                    else
                    {
                        $save = new MarksRegisterModel;
                        $save->created_by = Auth::user()->id;
                    }

                    
                    $save->student_id = $request->student_id;
                    $save->exam_id = $request->exam_id;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $mark['subject_id'];
                    $save->assignment_marks = $assignment_marks;
                    $save->exam_marks = $exam_marks;

                    $save->full_marks = $full_marks;
                    $save->passing_marks = $passing_marks;
                    
                    $save->save();
                }
                else
                {
                    $validation = 1;
                }

                
            }
        }
        if($validation == 0)
        {
            $json['message'] = "Mark Register Successfully Saved";    
        }
        else
        {
            $json['message'] = "Your total exceed thr Full Marks";
        }
        
        echo json_encode($json);
    }

    public function single_submit_marks_register(Request $request)
    {
        $id = $request->id;
        $getExamSchedule = ExamScheduleModel::getSingle($id);

        $full_marks = $getExamSchedule->full_marks;


        $assignment_marks = !empty($request->assignment_marks) ? $request->assignment_marks : 0;
        $exam_marks = !empty($request->exam_marks) ? $request->exam_marks : 0;

        $total_mark = ($assignment_marks + $exam_marks)/2;

        if($full_marks >= $total_mark)
        {
            $getMark = MarksRegisterModel::CheckAlreadyMark($request->student_id, $request->exam_id, $request->class_id, $request->subject_id);
            if(!empty($getMark))
            {
                $save = $getMark;
            }
            else
            {
                $save = new MarksRegisterModel;
                $save->created_by = Auth::user()->id;
            }

            
            $save->student_id = $request->student_id;
            $save->exam_id = $request->exam_id;
            $save->class_id = $request->class_id;
            $save->subject_id = $request->subject_id;
            $save->assignment_marks = $assignment_marks;
            $save->exam_marks = $exam_marks;

            $save->full_marks =$getExamSchedule->full_marks;
            $save->passing_marks = $getExamSchedule->passing_marks;
            
            $save->save();

            $json['message'] = "Mark Register Successfully Saved";
        }
        else
        {
            $json['message'] = "Your tota exceed the Full Marks";
        }
        
        
        echo json_encode($json);
        
    }

    public function mark_grade()
    {
        $data['getRecord'] = MarkGradeModel::getRecord();
        $data['header_title'] = "Manage Grade";
        return view('admin.examinations.mark_grade.list',$data);
    }

    public function mark_grade_add()
    {
        $data['header_title'] = "Add New Grade";
        return view('admin.examinations.mark_grade.add',$data);
    }

    public function mark_grade_insert(Request $request)
    {
        $mark = new MarkGradeModel;
        $mark->name = trim($request->name);
        $mark->percent_from = trim($request->percent_from);
        $mark->percent_to = trim($request->percent_to);
        $mark->created_by = Auth::user()->id;
        $mark->save();

        return redirect('admin/examinations/mark_grade')->with('success', "Grade Successfully Created");
       

    }

    public function mark_grade_edit($id)
    {
        $data['getRecord'] = MarkGradeModel::getSingle($id);
        $data['header_title'] = "Edit Grade";
        return view('admin.examinations.mark_grade.edit',$data);
    }

    public function mark_grade_update($id, Request $request)
    {
        $mark = MarkGradeModel::getSingle($id);
        $mark->name = trim($request->name);
        $mark->percent_from = trim($request->percent_from);
        $mark->percent_to = trim($request->percent_to);
        $mark->save();

        return redirect('admin/examinations/mark_grade')->with('success', "Grade Successfully Updated");
    }

    public function mark_grade_delete($id)
    {
        $mark = MarkGradeModel::getSingle($id);
        $mark->delete();

        return redirect('admin/examinations/mark_grade')->with('success', "Grade Successfully Deleted");
    }


    //student side

    public function MyExamTimetable(Request $request)
    {
        $class_id = Auth::user()->class_id;
        $getExam = ExamScheduleModel::getExam($class_id);
        $result = array();
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['name'] = $value->exam_name;
            $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id, $class_id);
            $resultS = array();
            foreach($getExamTimetable as $valueS)
            {
               $dataS = array();
               $dataS['subject_name'] = $valueS->subject_name;
               $dataS['exam_date'] = $valueS->exam_date;
               $dataS['start_time'] = $valueS->start_time;
               $dataS['end_time'] = $valueS->end_time;
               $dataS['hall_number'] = $valueS->hall_number;
               $dataS['full_marks'] = $valueS->full_marks;
               $dataS['passing_marks'] = $valueS->passing_marks;
               $resultS[] = $dataS;
             
            }

            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }

        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Timetable";
        return view('student.my_exam_timetable',$data);
    }

    public function myExamResult()
    {
        $result = array();
        $getExam = MarksRegisterModel::getExam(Auth::user()->id);
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id, Auth::user()->id);
            $dataSubject = array();
            foreach($getExamSubject as $exam)
            {
                $total_marks = ($exam['assignment_marks'] + $exam['exam_marks'])/2;
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['assignment_marks'] = $exam['assignment_marks'];
                $dataS['exam_marks'] = $exam['exam_marks'];
                $dataS['total_marks'] = $total_marks;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_marks'] = $exam['passing_marks'];
                $dataSubject[] = $dataS;
            }
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE;

        }

        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Result";
        return view('student.my_exam_result', $data);
    }

    //teacher side

    public function MyExamTimetableTeacher()
    {
        $result = array();
        $getClass = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        foreach($getClass as $class)
        {
            $dataC = array();
            $dataC['class_name'] = $class->class_name;

            $getExam = ExamScheduleModel::getExam($class->class_id);
            $examArray = array();
            foreach($getExam as $exam)
            {
                $dataE = array();
                $dataE['exam_name'] = $exam->exam_name;
                $getExamTimetable = ExamScheduleModel::getExamTimetable($exam->exam_id, $class->class_id);
                $subjectArray = array();
                foreach($getExamTimetable as $valueS)
                {
                    $dataS = array();
                    $dataS['subject_name'] = $valueS->subject_name;
                    $dataS['exam_date'] = $valueS->exam_date;
                    $dataS['start_time'] = $valueS->start_time;
                    $dataS['end_time'] = $valueS->end_time;
                    $dataS['hall_number'] = $valueS->hall_number;
                    $dataS['full_marks'] = $valueS->full_marks;
                    $dataS['passing_marks'] = $valueS->passing_marks;
                    $subjectArray[] = $dataS;
             
                }
                $dataE['subject'] = $subjectArray;
                $examArray[] = $dataE;
            }
            $dataC['exam'] = $examArray;

            $result[] = $dataC;
        }

        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Timetable";
        return view('teacher.my_exam_timetable',$data);
    }

    //parent side

    public function ParentMyExamTimetable($student_id)
    {
        $getStudent = User::getSingle($student_id);
        $class_id = $getStudent->class_id;
        $getExam = ExamScheduleModel::getExam($class_id);
        $result = array();
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['name'] = $value->exam_name;
            $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id, $class_id);
            $resultS = array();
            foreach($getExamTimetable as $valueS)
            {
               $dataS = array();
               $dataS['subject_name'] = $valueS->subject_name;
               $dataS['exam_date'] = $valueS->exam_date;
               $dataS['start_time'] = $valueS->start_time;
               $dataS['end_time'] = $valueS->end_time;
               $dataS['hall_number'] = $valueS->hall_number;
               $dataS['full_marks'] = $valueS->full_marks;
               $dataS['passing_marks'] = $valueS->passing_marks;
               $resultS[] = $dataS;
             
            }

            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }

        $data['getRecord'] = $result;
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Exam Timetable";
        return view('parent.my_exam_timetable',$data);
    }

    public function ParentMyExamResult($student_id)
    {
        $data['getStudent'] = User::getSingle($student_id);
        
        $result = array();
        $getExam = MarksRegisterModel::getExam($student_id);
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id, $student_id);
            $dataSubject = array();
            foreach($getExamSubject as $exam)
            {
                $total_marks = ($exam['assignment_marks'] + $exam['exam_marks'])/2;
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['assignment_marks'] = $exam['assignment_marks'];
                $dataS['exam_marks'] = $exam['exam_marks'];
                $dataS['total_marks'] = $total_marks;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_marks'] = $exam['passing_marks'];
                $dataSubject[] = $dataS;
            }
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE;

        }

        $data['getRecord'] = $result;
        $data['header_title'] = "Student Exam Result";
        return view('parent.my_exam_result', $data);
    }


    
}

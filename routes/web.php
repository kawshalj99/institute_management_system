<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\ExaminationsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\FeeCollectionController;






Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);





Route::group(['middleware' => 'admin'], function() {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    //teacher url

    Route::get('admin/teacher/list', [TeacherController::class, 'list']);
    Route::get('admin/teacher/add', [TeacherController::class, 'add']);
    Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
    Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);

    //student url

    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);

    //parent url

    Route::get('admin/parent/list', [ParentController::class, 'list']);
    Route::get('admin/parent/add', [ParentController::class, 'add']);
    Route::post('admin/parent/add', [ParentController::class, 'insert']);
    Route::get('admin/parent/edit/{id}', [ParentController::class, 'edit']);
    Route::post('admin/parent/edit/{id}', [ParentController::class, 'update']);
    Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete']);
    Route::get('admin/parent/my_student/{id}', [ParentController::class, 'myStudent']);
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'AssignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{student_id}', [ParentController::class, 'AssignStudentParentDelete']);

    // class url

    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);

    //subject url

    Route::get('admin/subject/list', [SubjectController::class, 'list']);
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);  
    
    //assign subject

    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);
    Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']);
    Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);  

    //class timetable

    Route::get('admin/class_timetable/list', [ClassTimetableController::class, 'list']);
    Route::post('admin/class_timetable/get_subject', [ClassTimetableController::class, 'get_subject']);
    Route::post('admin/class_timetable/add', [ClassTimetableController::class, 'insert_update']);
    

    //my account

    Route::get('admin/account', [UserController::class, 'MyAccount']);
    Route::post('admin/account', [UserController::class, 'UpdateMyAccountAdmin']);

    Route::get('admin/settings', [UserController::class, 'Settings']);
    Route::post('admin/settings', [UserController::class, 'UpdateSettings']);

    //change password

    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);

    //assign class to teacher

    Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
    Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
    Route::get('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'edit_single']);
    Route::post('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'update_single']); 
    Route::get('admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);

    //examination
    Route::get('admin/examinations/exam/list', [ExaminationsController::class, 'exam_list']);
    Route::get('admin/examinations/exam/add', [ExaminationsController::class, 'exam_add']);
    Route::post('admin/examinations/exam/add', [ExaminationsController::class, 'exam_insert']);
    Route::get('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_edit']);
    Route::post('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_update']);
    Route::get('admin/examinations/exam/delete/{id}', [ExaminationsController::class, 'exam_delete']);

    //exam schedule

    Route::get('admin/examinations/exam_schedule', [ExaminationsController::class, 'exam_schedule']);
    Route::post('admin/examinations/exam_schedule_insert', [ExaminationsController::class, 'exam_schedule_insert']);

    //mark register
    Route::get('admin/examinations/mark_register', [ExaminationsController::class, 'mark_register']);
    Route::post('admin/examinations/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);
    Route::post('admin/examinations/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register']);

    //manage grade 

    Route::get('admin/examinations/mark_grade', [ExaminationsController::class, 'mark_grade']);
    Route::get('admin/examinations/mark_grade/add', [ExaminationsController::class, 'mark_grade_add']);
    Route::post('admin/examinations/mark_grade/add', [ExaminationsController::class, 'mark_grade_insert']);
    Route::get('admin/examinations/mark_grade/edit/{id}', [ExaminationsController::class, 'mark_grade_edit']);
    Route::post('admin/examinations/mark_grade/edit/{id}', [ExaminationsController::class, 'mark_grade_update']);
    Route::get('admin/examinations/mark_grade/delete/{id}', [ExaminationsController::class, 'mark_grade_delete']);

    //attendance

    Route::get('admin/attendance/student', [AttendanceController::class, 'AttendanceStudent']);
    Route::post('admin/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);

    //attendance report

    Route::get('admin/attendance/report', [AttendanceController::class, 'AttendanceReport']);

    //communication

    Route::get('admin/communication/notice_board', [CommunicationController::class, 'NoticeBoard']);
    Route::get('admin/communication/notice_board/add', [CommunicationController::class, 'AddNoticeBoard']);
    Route::post('admin/communication/notice_board/add', [CommunicationController::class, 'InsertNoticeBoard']);
    Route::get('admin/communication/notice_board/edit/{id}', [CommunicationController::class, 'EditNoticeBoard']);
    Route::post('admin/communication/notice_board/edit/{id}', [CommunicationController::class, 'UpdateNoticeBoard']);
    Route::get('admin/communication/notice_board/delete/{id}', [CommunicationController::class, 'DeleteNoticeBoard']);

    Route::get('admin/communication/send_email', [CommunicationController::class, 'SendEmail']);
    Route::post('admin/communication/send_email', [CommunicationController::class, 'SendEmailUser']);

    Route::get('admin/communication/search_user', [CommunicationController::class, 'SearchUser']);

    //homework

    Route::get('admin/homework/homework', [HomeworkController::class, 'homework']);
    Route::get('admin/homework/homework/add', [HomeworkController::class, 'add']);
    Route::post('admin/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject']);
    Route::post('admin/homework/homework/add', [HomeworkController::class, 'insert']);

    Route::get('admin/homework/homework/edit/{id}', [HomeworkController::class, 'edit']);
    Route::post('admin/homework/homework/edit/{id}', [HomeworkController::class, 'update']);

    Route::get('admin/homework/homework/delete/{id}', [HomeworkController::class, 'delete']);
    Route::get('admin/homework/homework/submitted/{id}', [HomeworkController::class, 'submitted']);

    Route::get('admin/homework/homework_report', [HomeworkController::class, 'homework_report']);

    //fee collection

    Route::get('admin/fee_collection/collect_fee', [FeeCollectionController::class, 'collect_fee']);
    Route::get('admin/fee_collection/collect_fee/add_fee/{student_id}', [FeeCollectionController::class, 'collect_fee_add']);
    Route::post('admin/fee_collection/collect_fee/add_fee/{student_id}', [FeeCollectionController::class, 'collect_fee_insert']);


   
    

    
    
    


    
    

});

Route::group(['middleware' => 'teacher'], function() {

    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);

    Route::get('teacher/account', [UserController::class, 'MyAccount']);
    Route::post('teacher/account', [UserController::class, 'UpdateMyAccountTeacher']);

    Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject']);

    Route::get('teacher/my_student', [StudentController::class, 'MyStudent']);

    Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id}', [ClassTimetableController::class, 'MyTimetableTeacher']);

    Route::get('teacher/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetableTeacher']);

    Route::get('teacher/my_calendar', [CalendarController::class, 'MyCalendarTeacher']);

    Route::get('teacher/mark_register', [ExaminationsController::class, 'mark_register_teacher']);
    Route::post('teacher/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);
    Route::post('teacher/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register']);

    Route::get('teacher/attendance/student', [AttendanceController::class, 'AttendanceStudentTeacher']);
    Route::post('teacher/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);
    Route::get('teacher/attendance/report', [AttendanceController::class, 'AttendanceReportTeacher']);

    Route::get('teacher/my_notice_board', [CommunicationController::class, 'MyNoticeBoardTeacher']);

    Route::get('teacher/homework/homework', [HomeworkController::class, 'homeworkTeacher']);
    Route::get('teacher/homework/homework/add', [HomeworkController::class, 'addTeacher']);
    Route::post('teacher/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject']);
    Route::post('teacher/homework/homework/add', [HomeworkController::class, 'insertTeacher']);
    Route::get('teacher/homework/homework/edit/{id}', [HomeworkController::class, 'editTeacher']);
    Route::post('teacher/homework/homework/edit/{id}', [HomeworkController::class, 'updateTeacher']);
    Route::get('teacher/homework/homework/delete/{id}', [HomeworkController::class, 'delete']);

    Route::get('teacher/homework/homework/submitted/{id}', [HomeworkController::class, 'submittedTeacher']);
});

Route::group(['middleware' => 'student'], function() {

    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);

    Route::get('student/account', [UserController::class, 'MyAccount']);
    Route::post('student/account', [UserController::class, 'UpdateMyAccountStudent']);

    Route::get('student/my_subject', [SubjectController::class, 'MySubject']);

    Route::get('student/my_timetable', [ClassTimetableController::class, 'MyTimetable']);

    Route::get('student/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetable']);

    Route::get('student/my_calendar', [CalendarController::class, 'MyCalendar']);

    Route::get('student/my_exam_result', [ExaminationsController::class, 'myExamResult']);

    Route::get('student/my_attendance', [AttendanceController::class, 'MyAttendanceStudent']);

    Route::get('student/my_notice_board', [CommunicationController::class, 'MyNoticeBoardStudent']);

    Route::get('student/my_homework', [HomeworkController::class, 'HomeworkStudent']);

    Route::get('student/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomework']);

    Route::post('student/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomeworkInsert']);

    Route::get('student/my_submitted_homework', [HomeworkController::class, 'HomeworkSubmittedStudent']);

    Route::get('student/fee_collection', [FeeCollectionController::class, 'CollectFeeStudent']);

    Route::post('student/fee_collection', [FeeCollectionController::class, 'CollectFeeStudentPayment']);
    
    

});

Route::group(['middleware' => 'parent'], function() {

    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);

    Route::get('parent/account', [UserController::class, 'MyAccount']);
    Route::post('parent/account', [UserController::class, 'UpdateMyAccountParent']);

    Route::get('parent/my_student/subject/{student_id}', [SubjectController::class, 'ParentStudentSubject']);

    Route::get('parent/my_student/exam_timetable/{student_id}', [ExaminationsController::class, 'ParentMyExamTimetable']);

    Route::get('parent/my_student', [ParentController::class, 'myStudentParent']);

    Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id}/{student_id}', [ClassTimetableController::class, 'MyTimetableParent']);

    Route::get('parent/my_student/calendar/{student_id}', [CalendarController::class, 'MyCalendarParent']);

    Route::get('parent/my_student/exam_result/{student_id}', [ExaminationsController::class, 'ParentMyExamResult']);

    Route::get('parent/my_student/attendance/{student_id}', [AttendanceController::class, 'MyAttendanceParent']);

    Route::get('parent/my_notice_board', [CommunicationController::class, 'MyNoticeBoardParent']);

    Route::get('parent/my_student_notice_board', [CommunicationController::class, 'MyStudentNoticeBoardParent']);

    Route::get('parent/my_student/homework/{id}', [HomeworkController::class, 'HomeworkStudentParent']);

    Route::get('parent/my_student/submitted_homework/{id}', [HomeworkController::class, 'SubmittedHomeworkStudentParent']);

    Route::get('parent/my_student/fee_collection/{student_id}', [FeeCollectionController::class, 'CollectFeeParent']);


    
});
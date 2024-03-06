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
use App\Http\Controllers\CommunicateController;
use App\Http\Controllers\HomeworkController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);


Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    //teacher

    Route::get('admin/teacher/list', [TeacherController::class, 'list']);
    Route::get('admin/teacher/add', [TeacherController::class, 'add']);
    Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
    Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);

    // student

    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);


    //parent

    Route::get('admin/parent/list', [ParentController::class, 'list']);
    Route::get('admin/parent/add', [ParentController::class, 'add']);
    Route::post('admin/parent/add', [ParentController::class, 'insert']);
    Route::get('admin/parent/edit/{id}', [ParentController::class, 'edit']);
    Route::post('admin/parent/edit/{id}', [ParentController::class, 'update']);
    Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete']);
    Route::get('admin/parent/my-student/{id}', [ParentController::class, 'myStudent']);
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'assignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{student_id}', [ParentController::class, 'assignStudentParentDelete']);


    // class url

    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);

    // subject url

    Route::get('admin/subject/list', [SubjectController::class, 'list']);
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);

    // assign_subject

    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']);
    Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);

    Route::get('admin/class_timetable/list', [ClassTimetableController::class, 'list']);
    Route::post('admin/class_timetable/get_subject', [ClassTimetableController::class, 'get_subject']);
    Route::post('admin/class_timetable/add', [ClassTimetableController::class, 'insert_update']);


    Route::get('admin/account', [UserController::class, 'myAccount']);
    Route::post('admin/account', [UserController::class, 'updateMyAccountAdmin']);

    // change_password

    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);

    Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
    Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
    Route::get('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'edit_single']);
    Route::post('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'update_single']);
    Route::get('admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);


    Route::get('admin/examinations/exam/list', [ExaminationsController::class, 'exam_list']);
    Route::get('admin/examinations/exam/add', [ExaminationsController::class, 'exam_add']);
    Route::post('admin/examinations/exam/add', [ExaminationsController::class, 'exam_insert']);
    Route::get('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_edit']);
    Route::post('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_update']);
    Route::get('admin/examinations/exam/delete/{id}', [ExaminationsController::class, 'exam_delete']);

    Route::get('admin/examinations/exam_schedule', [ExaminationsController::class, 'exam_schedule']);
    Route::post('admin/examinations/exam_schedule_insert', [ExaminationsController::class, 'exam_schedule_insert']);

    Route::get('admin/examinations/marks_register', [ExaminationsController::class, 'marks_register']);
    Route::post('admin/examinations/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);
    Route::post('admin/examinations/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register']);

    Route::get('admin/examinations/marks_grade', [ExaminationsController::class, 'marks_grade']);
    Route::get('admin/examinations/marks_grade/add', [ExaminationsController::class, 'marks_grade_add']);
    Route::post('admin/examinations/marks_grade/add', [ExaminationsController::class, 'marks_grade_insert']);
    Route::get('admin/examinations/marks_grade/edit/{id}', [ExaminationsController::class, 'marks_grade_edit']);
    

    Route::get('admin/attendance/student', [AttendanceController::class, 'attendance_student']);
    Route::post('admin/attendance/student/save', [AttendanceController::class, 'attendance_student_submit']);

    Route::get('admin/attendance/report', [AttendanceController::class, 'attendance_report']);

    Route::get('admin/communicate/notice_board', [CommunicateController::class, 'notice_board']);
    Route::get('admin/communicate/notice_board/add', [CommunicateController::class, 'notice_board_add']);
    Route::post('admin/communicate/notice_board/add', [CommunicateController::class, 'notice_board_insert']);

    Route::get('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'notice_board_edit']);
    Route::post('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'notice_board_update']);
    Route::get('admin/communicate/notice_board/delete/{id}', [CommunicateController::class, 'notice_board_delete']);

    Route::get('admin/communicate/send_email', [CommunicateController::class, 'send_email']);
    Route::post('admin/communicate/send_email', [CommunicateController::class, 'send_email_user']);
    Route::get('admin/communicate/search_user', [CommunicateController::class, 'search_user']);

    // homework

    Route::get('admin/homework/homework', [HomeworkController::class, 'homework']);
    Route::get('admin/homework/homework/add', [HomeworkController::class, 'homework_add']);
    Route::post('admin/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject']); 

});

Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);

    Route::get('teacher/account', [UserController::class, 'myAccount']);
    Route::post('teacher/account', [UserController::class, 'updateMyAccountTeacher']);

    Route::get('teacher/my_student', [StudentController::class, 'myStudent']);

    Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'myClassSubject']);
    Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id}/', [ClassTimetableController::class, 'myTimetableTeacher']);

    Route::get('teacher/my_exam_timetable', [ExaminationsController::class, 'myExamTimetableTeacher']);

    Route::get('teacher/my_calendar', [CalendarController::class, 'myCalendarTeacher']);

    Route::get('teacher/marks_register', [ExaminationsController::class, 'marks_register_teacher']);
    Route::post('teacher/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);
    Route::post('teacher/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register']);

    Route::get('teacher/attendance/student', [AttendanceController::class, 'attendance_student_teacher']);
    Route::post('teacher/attendance/student/save', [AttendanceController::class, 'attendance_student_submit']);

    Route::get('teacher/attendance/report', [AttendanceController::class, 'attendance_report_teacher']);

    Route::get('teacher/my_notice_board', [CommunicateController::class, 'my_notice_board_teacher']);

});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);

    Route::get('student/my_subject', [SubjectController::class, 'mySubject']);
    Route::get('student/my_timetable', [ClassTimetableController::class, 'myTimetable']);

    Route::get('student/my_exam_timetable', [ExaminationsController::class, 'myExamTimetable']);


    Route::get('student/account', [UserController::class, 'myAccount']);
    Route::post('student/account', [UserController::class, 'updateMyAccountStudent']);

    Route::get('student/my_calendar', [CalendarController::class, 'myCalendar']);

    Route::get('student/my_exam_result', [ExaminationsController::class, 'myExamResult']);

    Route::get('student/my_attendance', [AttendanceController::class, 'my_attendance_student']);

    Route::get('student/my_notice_board', [CommunicateController::class, 'my_notice_board_student']);

});

Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);

    Route::get('parent/account', [UserController::class, 'myAccount']);
    Route::post('parent/account', [UserController::class, 'updateMyAccountParent']);

    Route::get('parent/my_student/subject/{student_id}', [SubjectController::class, 'parentStudentSubject']);

    Route::get('parent/my_student/exam_timetable/{student_id}', [ExaminationsController::class, 'ParentMyExamTimetable']);
    Route::get('parent/my_student/exam_result/{student_id}', [ExaminationsController::class, 'ParentMyExamResult']);

    Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id}/{student_id}', [ClassTimetableController::class, 'myTimetableParent']);


    Route::get('parent/my_student', [ParentController::class, 'myStudentParent']);

    Route::get('parent/my_student/calendar/{student_id}', [CalendarController::class, 'myCalendarParent']);

    Route::get('parent/my_student/attendance/{student_id}', [AttendanceController::class, 'myAttendanceParent']);

    Route::get('parent/my_notice_board', [CommunicateController::class, 'my_notice_board_parent']);

    Route::get('parent/my_student_notice_board', [CommunicateController::class, 'my_student_notice_board_parent']);
});

<?php

namespace App\Http\Controllers;

use App\ActiveSession;
use App\SchoolClass;
use App\UserDetail;
use Illuminate\Http\Request;
use App\Subject;
use TJGazel\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\ExamMarks;
use Yajra\DataTables\DataTables;
use App\StudentClassAllocation;
use App\TeacherClassAllocation;

class AdminMonitorController extends Controller
{
    public function index(){
        if(Auth::user()->user_type == '0' || Auth::user()->user_type == '5'){
            $classes = SchoolClass::all();
            return view('admin_monitor.index', compact('classes'));
        }else{
            Toastr::warning('Access Denied!', 'Warning',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }

    }

    public function show($id){
        if(Auth::user()->user_type == '0' || Auth::user()->user_type == '5'){
            $classID = $id;
            $session = ActiveSession::all()->first();
            $teacherAllocation = TeacherClassAllocation::where([
                ['school_class_id','=',$id],
                ['year','=', $session->year]
            ])->first();

            if(!empty($teacherAllocation)){
                $teacher = UserDetail::where('user_id','=', $teacherAllocation->user_id)->first();

                $class = SchoolClass::find($id);

                return view('admin_monitor.view', compact('teacher','class', 'classID'));
            }else{
                Toastr::warning('This Class has not been allocated yet!', 'Warning',['positionClass'=> 'toast-top-right']);
                return redirect()->back();
            }

        }else{
            Toastr::warning('Access Denied!', 'Warning',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }

    }

    public function studentMarks($id){

        if(Auth::user()->user_type == '0' || Auth::user()->user_type == '5'){
            $year = ActiveSession::all()->first();
            $data = UserDetail::where('user_id','=',$id)->first();
            $marks = ExamMarks::where([['student_id','=',$id], ['year','=',$year->year]])->get();

            return view('admin_monitor.student_marks', compact('marks','data'));
        }else{
            Toastr::warning('Access Denied!', 'Warning',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }


    }
}

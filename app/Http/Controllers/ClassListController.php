<?php

namespace App\Http\Controllers;

use App\StudentClassAllocation;
use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use App\TeacherClassAllocation;
use App\StudentIdentifier;
use App\SchoolClass;
use TJGazel\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class ClassListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userClassAllocation = TeacherClassAllocation::where('user_id','=',Auth::user()->id)->first();
        //dd($userClassAllocation->school_class_id);
        $userClass = SchoolClass::where('id','=',$userClassAllocation->school_class_id)->first();
        //dd($userClass);
        return view('classroom_management.class_list.index', compact('userClass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datatable(){
        $teacherClass = TeacherClassAllocation::where('user_id','=',Auth::user()->id)->first();
        //$userClass = SchoolClass::where('id','=',$userClassAllocation->school_class_id)->first();
        $data = StudentClassAllocation::where('school_class_id','=', $teacherClass->school_class_id)->get();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $url = '/mark_list/create/'.$data->user_id;
                $mark = "<a class='btn btn-action btn-warning' href='" . $url . "' title='View'><i class='fa fa-check'></i></a>&nbsp;";

                return $mark;
            })
            ->editColumn('student_number', function ($data) {
                return $data->user->detail->student_number->student_number;
            })

            ->editColumn('fullname', function ($data) {
                return $data->user->detail->fname.' '.$data->user->detail->oname.' '.$data->user->detail->sname;
            })

            ->editColumn('gender', function ($data) {
                return $data->user->detail->gender;
            })

            ->rawColumns(['action'])
            ->make(true);
    }
}

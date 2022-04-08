<?php

namespace App\Http\Controllers;

use App\ActiveSession;
use App\UserDetail;
use Illuminate\Http\Request;
use App\Subject;
use TJGazel\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\ExamMarks;
use Yajra\DataTables\DataTables;

class MarkListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = UserDetail::where('user_id','=', $id)->first();
        $subjects = Subject::all();
        return view('classroom_management.mark_list.create', compact('data', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year = ActiveSession::first();

        $data = new ExamMarks();

        //***Hack to display subject name - delete when producing for commercial uses - delete table field as well
        $subject = Subject::where('id','=', $request->subject_id)->first();
        //dd($subject->subject_name);
        $data->student_id = $request->student_id;
        $data->teacher_id = Auth::user()->id;
        $data->term = $request->term;
        $data->year = $year->year;
        $data->subject_id = $request->subject_id;
        $data->subject_name = $subject->subject_name;
        $data->mark = $request->mark;
        $data->created_by = Auth::user()->id;

        //dd($data);

        if($data->save()){
            Toastr::success('Mark added successfully!', 'Success',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }else{
            Toastr::warning('Problem adding mark!', 'Warning',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }
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
        //dd($id);
        $data = ExamMarks::find($id);

        if($data->delete()){
            Toastr::success('Mark deleted successfully!', 'Success',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }else{
            Toastr::warning('Problem deleting mark!', 'Warning',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }
    }

    public function datatable($id){
        $teacherID = Auth::user()->id;
        $year = ActiveSession::first();
        $currentYear = $year->year;
        $data = ExamMarks::where([
            ['teacher_id','=', $teacherID],
            ['student_id','=', $id],
            ['year','=', $currentYear]
        ])->get();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $url = '/mark_list/destroy/'.$data->id;
                $delete = "<a class='btn btn-action btn-danger' href='" . $url . "' title='View'><i class='fa fa-trash-o'></i></a>&nbsp;";

                return $delete;
            })
            ->editColumn('subject', function ($data) {
                return $data->subject_name;
            })

            ->editColumn('aggregate', function ($data) {
                if($data->mark <= '100' && $data->mark >= '90'){
                    return '1';
                }

                if($data->mark <= '89' && $data->mark >= '80'){
                    return '2';
                }

                if($data->mark <= '79' && $data->mark >= '70'){
                    return '3';
                }

                if($data->mark <= '69' && $data->mark >= '60'){
                    return '4';
                }

                if($data->mark <= '59' && $data->mark >= '50'){
                    return '5';
                }

                if($data->mark <= '49' && $data->mark >= '40'){
                    return '6';
                }

                if($data->mark <= '39' && $data->mark >= '30'){
                    return '7';
                }

                if($data->mark <= '29' && $data->mark >= '20'){
                    return '8';
                }

                if($data->mark <= '19'){
                    return '9';
                }

            })

            ->rawColumns(['action'])
            ->make(true);
    }
}

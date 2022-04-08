<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;
use TJGazel\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
use App\StudentClassAllocation;
use App\SchoolClass;
use Illuminate\Support\Facades\Auth;

class StudentAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('allocations.student_allocation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students= UserDetail::where('user_type','=', '1')->get();
        $classes = SchoolClass::where('active','=', '1')->get();
        return view('allocations.student_allocation.create', compact('students', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new StudentClassAllocation();
        $data->school_class_id = $request->class_id;
        $data->user_id = $request->student_id;
        $data->year = $request->year;
        $data->created_by = Auth::user()->id;

        if($data->save()){
            Toastr::success('Class Allocation successful!', 'Success',['positionClass'=> 'toast-top-right']);
            return redirect()->route('student_allocation.index');
        }else{
            Toastr::warning('Problem Allocating Class!', 'Warning',['positionClass'=> 'toast-top-right']);
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
        //
    }

    public function datatable(){
        $data = StudentClassAllocation::all();
        //dd($data[0]->user->name);
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $url_edit = url('student/' . $data->id . '/edit');
                $url = url('student/' . $data->id);
                $view = "<a class='btn btn-action btn-primary' href='" . $url . "' title='View'><i class='fa fa-eye'></i></a>&nbsp;";
                $edit = "<a class='btn btn-action btn-warning' href='" . $url_edit . "' title='Edit'><i class='fa fa-pencil-square-o'></i></a>&nbsp;";
                $delete = "<button data-url='" . $url . "' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='fa fa-trash-o'></i></button>&nbsp;";

                return $view . "" . $edit . "" . $delete;
            })

            ->editColumn('student_number', function ($data) {
                return $data->user->detail->student_number->student_number;
            })

            ->editColumn('fullname', function ($data) {
                return $data->user->detail->fname.' '.$data->user->detail->oname.' '.$data->user->detail->sname;
            })

            ->editColumn('class', function ($data) {
                return $data->school_class->grade.' '.$data->school_class->class_name;
            })

            ->rawColumns(['action'])
            ->make(true);
    }
}

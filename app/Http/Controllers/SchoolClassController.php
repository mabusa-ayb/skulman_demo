<?php

namespace App\Http\Controllers;

use App\SchoolClass;
use Illuminate\Http\Request;
use TJGazel\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('school_class.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school_class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new SchoolClass();
        $data->grade = $request->grade;
        $data->class_name = $request->class_name;
        $data->active = $request->active;
        $data->created_by = Auth::user()->id;

        if($data->save()){
            Toastr::success('Class added successfully!', 'Success',['positionClass'=> 'toast-top-right']);
            return redirect()->route('school_class.index');
        }else{
            Toastr::warning('Problem adding class!', 'Warning',['positionClass'=> 'toast-top-right']);
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
        $data = SchoolClass::find($id);
        return view('school_class.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SchoolClass::find($id);
        return view('school_class.edit', compact('data'));
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
        $data = SchoolClass::find($id);
        $data->grade = $request->grade;
        $data->class_name = $request->class_name;
        $data->active = $request->active;

        if($data->save()){
            Toastr::success('Class updated successfully!', 'Success',['positionClass'=> 'toast-top-right']);
            return redirect()->route('school_class.index');
        }else{
            Toastr::warning('Problem updating class!', 'Warning',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }
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

    public function datatable()
    {

        $data = SchoolClass::all();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {

                $url_edit = url('school_class/' . $data->id . '/edit');
                $url = url('school_class/' . $data->id);
                $view = "<a class='btn btn-action btn-primary' href='" . $url . "' title='View'><i class='fa fa-eye'></i></a>&nbsp;";
                $edit = "<a class='btn btn-action btn-warning' href='" . $url_edit . "' title='Edit'><i class='fa fa-pencil-square-o'></i></a>&nbsp;";
                //$delete = "<button data-url='" . $url . "' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='fa fa-trash-o'></i></button>&nbsp;";

                return $view . "" . $edit;
            })

            ->editColumn('status', function ($data) {
                if($data->active == '1'){
                    return 'Active';
                }else{
                    return 'Inactive';
                }
            })

            ->rawColumns(['action'])
            ->make(true);

    }
}

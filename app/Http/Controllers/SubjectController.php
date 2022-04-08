<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use TJGazel\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subjects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Subject();
        $data->subject_name = $request->name;
        $data->created_by = Auth::user()->id;

        if($data->save()){
            Toastr::success('Subject saved successfully!', 'Success',['positionClass'=> 'toast-top-right']);
            return redirect()->route('subject.index');
        }else{
            Toastr::warning('Problem saving subject!', 'Warning',['positionClass'=> 'toast-top-right']);
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
        $data = Subject::find($id);
        return view('subjects.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Subject::find($id);
        return view('subjects.edit', compact('data'));
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
        $data = Subject::find($id);
        $data->subject_name = $request->name;
        $data->created_by = Auth::user()->id;

        if($data->save()){
            Toastr::success('Subject updated successfully!', 'Success',['positionClass'=> 'toast-top-right']);
            return redirect()->route('subject.index');
        }else{
            Toastr::warning('Problem updating subject!', 'Warning',['positionClass'=> 'toast-top-right']);
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
        $data = Subject::all();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $url_edit = url('subject/' . $data->id . '/edit');
                $url = url('subject/' . $data->id);
                $view = "<a class='btn btn-action btn-primary' href='" . $url . "' title='View'><i class='fa fa-eye'></i></a>&nbsp;";
                $edit = "<a class='btn btn-action btn-warning' href='" . $url_edit . "' title='Edit'><i class='fa fa-pencil-square-o'></i></a>&nbsp;";
                $delete = "<button data-url='" . $url . "' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='fa fa-trash-o'></i></button>&nbsp;";

                return $view . "" . $edit . "" . $delete;
            })

            ->rawColumns(['action'])
            ->make(true);

    }
}

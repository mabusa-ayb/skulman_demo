<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;
use App\User;
use Illuminate\Support\Facades\Auth;
use TJGazel\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrators.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->position);
        //Create Student Login details
        $loginData = new User();
        $loginData->name = $request->fname.' '.$request->sname;
        $loginData->email = $request->staff_number.'@magwe-primary.ac.zw';
        $position = trim($request->position);

        if($position == 'Teacher'){
            $loginData->user_type = '2';
        }
        if($position == 'Clerk'){
            $loginData->user_type = '3';
        }
        if($position == 'Bursar'){
            $loginData->user_type = '4';
        }
        if($position == 'Headmaster'){
            $loginData->user_type = '5';
        }

        $loginData->password = Hash::make($request->national_id_number);

        //dd($loginData);

        if($loginData->save()) {

            $userDetails = new UserDetail();
            $userDetails->user_id = $loginData->id;
            $userDetails->fname = $request->fname;
            $userDetails->sname = $request->sname;
            $userDetails->oname = $request->oname;
            $userDetails->gender = $request->gender;
            $userDetails->dob = $request->dob;
            $userDetails->address = $request->address;
            $userDetails->birth_entry_number = $request->birth_entry_number;
            $userDetails->phone_number = $request->phone_number;
            $userDetails->next_of_kin = $request->next_of_kin;
            $userDetails->next_of_kin_relationship = $request->next_of_kin_relationship;
            $userDetails->next_of_kin_phone_number = $request->next_of_kin_phone_number;
            $userDetails->next_of_kin_address = $request->next_of_kin_address;
            $userDetails->created_by = Auth::user()->id;
            $userDetails->user_type = $loginData->user_type;
            $userDetails->staff_number = $request->staff_number;
            $userDetails->position = $request->position;
            $userDetails->national_id_number = $request->national_id_number;
            $userDetails->qualification = $request->qualification;
            $userDetails->specialization = $request->specialization;
            $userDetails->title = $request->title;

            if($userDetails->save()){
                Toastr::success('User Added successfully!', 'Success',['positionClass'=> 'toast-top-right']);
                return redirect()->route('administrator.index');
            }else{
                Toastr::warning('Problem Adding user!', 'Warning',['positionClass'=> 'toast-top-right']);
                return redirect()->back();
            }
        }else{
            Toastr::warning('Problem Adding user!', 'Warning',['positionClass'=> 'toast-top-right']);
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
        $data = UserDetail::find($id);
        return view('administrators.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = UserDetail::find($id);
        return view('administrators.edit', compact('data'));
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
        //dd($request->user_id);

        $loginData = User::where('id', $request->user_id)->first();
        $loginData->name = $request->fname.' '.$request->sname;
        $loginData->email = $request->staff_number.'@magwe-primary.ac.zw';
        $position = trim($request->position);

        if($position == 'Teacher'){
            $loginData->user_type = '2';
        }
        if($position == 'Clerk'){
            $loginData->user_type = '3';
        }
        if($position == 'Bursar'){
            $loginData->user_type = '4';
        }
        if($position == 'Headmaster'){
            $loginData->user_type = '5';
        }

        $loginData->password = Hash::make($request->national_id_number);

        //dd($loginData);

        if($loginData->save()) {

            $userDetails = UserDetail::find($id);
            $userDetails->fname = $request->fname;
            $userDetails->sname = $request->sname;
            $userDetails->oname = $request->oname;
            $userDetails->gender = $request->gender;
            $userDetails->dob = $request->dob;
            $userDetails->address = $request->address;
            $userDetails->birth_entry_number = $request->birth_entry_number;
            $userDetails->phone_number = $request->phone_number;
            $userDetails->next_of_kin = $request->next_of_kin;
            $userDetails->next_of_kin_relationship = $request->next_of_kin_relationship;
            $userDetails->next_of_kin_phone_number = $request->next_of_kin_phone_number;
            $userDetails->next_of_kin_address = $request->next_of_kin_address;
            $userDetails->created_by = Auth::user()->id;
            $userDetails->user_type = $loginData->user_type;
            $userDetails->staff_number = $request->staff_number;
            $userDetails->position = $request->position;
            $userDetails->national_id_number = $request->national_id_number;
            $userDetails->qualification = $request->qualification;
            $userDetails->specialization = $request->specialization;
            $userDetails->title = $request->title;

            if($userDetails->save()){
                Toastr::success('User Updated successfully!', 'Success',['positionClass'=> 'toast-top-right']);
                return redirect()->route('administrator.index');
            }else{
                Toastr::warning('Problem Updating user!', 'Warning',['positionClass'=> 'toast-top-right']);
                return redirect()->back();
            }
        }else{
            Toastr::warning('Problem Updating user!', 'Warning',['positionClass'=> 'toast-top-right']);
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

    public function datatable(){
        $data = UserDetail::where('user_type', '!=', 1)->where('user_type', '!=', 0)->get();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $url_edit = url('administrator/' . $data->id . '/edit');
                $url = url('administrator/' . $data->id);
                $view = "<a class='btn btn-action btn-primary' href='" . $url . "' title='View'><i class='fa fa-eye'></i></a>&nbsp;";
                $edit = "<a class='btn btn-action btn-warning' href='" . $url_edit . "' title='Edit'><i class='fa fa-pencil-square-o'></i></a>&nbsp;";
                //$delete = "<button data-url='" . $url . "' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='fa fa-trash-o'></i></button>&nbsp;";

                return $view . "" . $edit ;
            })
                ->editColumn('fullname', function ($data) {

                    return $data->fname . ' ' . $data->oname . ' ' . $data->sname;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}

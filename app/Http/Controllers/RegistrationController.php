<?php

namespace App\Http\Controllers;

use App\ActiveSession;
use App\ExamMarks;
use App\RegistrationStatus;
use App\StudentIdentifier;
use App\UserDetail;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use TJGazel\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registration.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Student number
        $activeSession = ActiveSession::all();
        $activeSession = $activeSession->first();
        $letters = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
        $randomChar = $letters[rand(0, strlen($letters)-1)];
        $studentNumber = 'MAG'.$activeSession->year.rand(1000, 9999).$randomChar;

        //dd($studentNumber);

        //Create Student Login details
        $loginData = new User();
        $loginData->name = $request->fname.' '.$request->sname;
        $loginData->email = $studentNumber.'@magwe-primary.ac.zw';
        $loginData->user_type = $request->user_type;
        $loginData->password = Hash::make($studentNumber);

        //dd($loginData);

        if($loginData->save()){

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
            $userDetails->enrollment_session = $activeSession->year;

            //dd($userDetails);
            if($userDetails->save()){
                $studentID = new StudentIdentifier();
                $studentID->student_number = $studentNumber;
                $studentID->student_id = $loginData->id;

                if($studentID->save()){
                    Toastr::success('User Added successfully!', 'Success',['positionClass'=> 'toast-top-right']);
                    return redirect()->route('registrations.show_all');
                }else{
                    Toastr::warning('Problem Adding user!', 'Warning',['positionClass'=> 'toast-top-right']);
                    return redirect()->route('registration.create');
                }
            }else{
                Toastr::warning('Problem Adding user!', 'Warning',['positionClass'=> 'toast-top-right']);
                return redirect()->route('registration.create');
            }

        }else{
            Toastr::warning('Problem Adding user!', 'Warning',['positionClass'=> 'toast-top-right']);
            return redirect()->route('registration.create');
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
        $data = UserDetail::where('id', $id)->first();
        return view('registration.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = UserDetail::where('id', $id)->first();
        return view('registration.edit', compact('data'));
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

        $data = UserDetail::find($id);
        $data->fname = $request->fname;
        $data->sname = $request->sname;
        $data->oname = $request->oname;
        $data->gender = $request->gender;
        $data->dob = $request->dob;
        $data->address = $request->address;
        $data->birth_entry_number = $request->birth_entry_number;
        $data->phone_number = $request->phone_number;
        $data->next_of_kin = $request->next_of_kin;
        $data->next_of_kin_relationship = $request->next_of_kin_relationship;
        $data->next_of_kin_phone_number = $request->next_of_kin_phone_number;
        $data->next_of_kin_address = $request->next_of_kin_address;
        $data->created_by = Auth::user()->id;

        if($data->save()){
            Toastr::success('User Updated successfully!', 'Success',['positionClass'=> 'toast-top-right']);
            return redirect()->route('registrations.show_all');
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

    public function showAll(){
        return view('registration.show-all');
    }

    public function datatable()
    {

        $data = UserDetail::where('user_type', '=', 1)->get();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                //$userData = UserDetail::where('user_id', '=', $data->id)->get();
                $url_edit = url('registration/' . $data->id . '/edit');
                $url = url('registration/' . $data->id);
                $regURL = url('/registrations/term_registration/' . $data->user_id);
                $view = "<a class='btn btn-action btn-primary' href='" . $url . "' title='View'><i class='fa fa-eye'></i></a>&nbsp;";
                $edit = "<a class='btn btn-action btn-warning' href='" . $url_edit . "' title='Edit'><i class='fa fa-pencil-square-o'></i></a>&nbsp;";
                $register = "<a class='btn btn-action btn-info' href='" . $regURL . "' title='Register'><i class='fa fa-hand-o-up'></i></a>&nbsp;";
                //$delete = "<button data-url='" . $url . "' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='fa fa-trash-o'></i></button>&nbsp;";

                return $view . "" . $edit . "". $register;
            })
            ->editColumn('studentNumber', function ($data) {
                return $data->student_number->student_number;
            })
            ->editColumn('fullname', function ($data) {

                return $data->fname . ' ' . $data->oname . ' ' . $data->sname;
            })
            ->rawColumns(['action'])
            ->make(true);

    }

    public function newRegistration(Request $request){

        if(!empty(RegistrationStatus::where([
            ['student_number','=', $request->student_number],
            ['term','=', $request->term],
            ['year','=', $request->year]])->get())){

            Toastr::danger('Registration Record Exists!', 'Danger',['positionClass'=> 'toast-top-right']);
            return redirect()->back();

        }else{
            $data = new RegistrationStatus();
            $data->student_number = $request->student_number;
            $data->term = $request->term;
            $data->year = $request->year;
            $data->status = 1;
            $data->created_by = Auth::user()->id;

            if($data->save()){
                Toastr::success('Student registered successfully!', 'Success',['positionClass'=> 'toast-top-right']);
                return redirect()->back();
            }else{
                Toastr::warning('Problem registering student!', 'Warning',['positionClass'=> 'toast-top-right']);
                return redirect()->back();
            }
        }
    }

    public function termRegistration($id){
        $data = UserDetail::where('user_id','=',$id)->first();
        return view('registration.term_registration', compact('data'));
    }

    public function storeTermRegistration(Request $request){
        $session = ActiveSession::all()->first();
        $data = new RegistrationStatus();
        //dd($request->user_id);
        $data->user_id = $request->user_id;
        $data->term = $request->term;
        $data->year = $session->year;
        $data->status = '1';
        $data->created_by = Auth::user()->id;

        if($data->save()){
            Toastr::success('Student registered successfully!', 'Success',['positionClass'=> 'toast-top-right']);
            return redirect()->route('registration.index');
        }else{
            Toastr::warning('Problem registering student!', 'Warning',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }
    }

    public function student($id){
        $session = ActiveSession::all()->first();
        $data = ExamMarks::where([
            ['student_id','=',$id],
            ['year','=',$session->year]
        ])->get();

        return view('registration.student_view', compact('data'));
    }

}

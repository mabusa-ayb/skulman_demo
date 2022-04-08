@extends('layouts.backend-layout')
@section('title', 'Add User')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('administrator.index') }}">Administrators</a></li>
                <li class="breadcrumb-item active" aria-current="page">New User</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Administrator Form</small>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('administrator.store')}}">
                @csrf

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Title</label>
                        <select class="form-control" name="title">
                            <option value="Mr">Mr.</option>
                            <option value="Miss">Miss.</option>
                            <option value="Ms">Ms.</option>
                            <option value="Mrs">Mrs.</option>
                            <option value="Dr">Dr.</option>
                            <option value="Fr">Fr.</option>
                            <option value="Rev">Rev.</option>
                            <option value="Sr">Sr.</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" name="fname" placeholder="Enter first name..." required>
                </div>

                <div class="form-group">
                    <label>Surname</label>
                    <input class="form-control" name="sname" placeholder="Enter first surname..." required>
                </div>

                <div class="form-group">
                    <label>Othername(s)</label>
                    <input class="form-control" name="oname" placeholder="Enter other name(s)...">
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Date of Birth</label>
                        <input class="form-control" type="date" id="birthday" name="dob" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Staff Number</label>
                    <input class="form-control" name="staff_number" placeholder="Enter Staff Number..." required>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Position</label>
                        <select class="form-control" name="position">
                            <option value="" selected>--Select Position --</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Clerk">Clerk</option>
                            <option value="Headmaster">Head Master</option>
                            <option value="Bursar">Bursar</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Highest Qualification</label>
                        <select class="form-control" name="qualification">
                            <option value="Certificate">Certificate</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Degree">Degree</option>
                            <option value="Post-Graduate Diploma">Post-Graduate Diploma</option>
                            <option value="Masters">Masters</option>
                            <option value="Doctorate">Doctorate</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Specialisation</label>
                        <select class="form-control" name="specialization">
                            <option value="Infant">Infants</option>
                            <option value="Junior">Juniors</option>
                            <option value="Senior">Seniors</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>National ID Number</label>
                        <input class="form-control" name="national_id_number" placeholder="Enter National ID Number..." required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" name="phone_number" placeholder="Enter phone number...">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label>Next Of Kin</label>
                    <input class="form-control" name="next_of_kin" placeholder="Enter Next of Kin name..." required>
                </div>

                <div class="form-group">
                    <label>Next Of Kin Relationship</label>
                    <input class="form-control" name="next_of_kin_relationship" placeholder="Enter Next of Kin relationship..." required>
                </div>

                <div class="form-group">
                    <label>Next Of Kin Phone number</label>
                    <input class="form-control" name="next_of_kin_phone_number" placeholder="Enter Next of Kin phone nunmber...">
                </div>

                <div class="form-group">
                    <label>Next of Kin Address</label>
                    <textarea class="form-control" name="next_of_kin_address" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-default">Add User</button>

                <button type="reset" class="btn btn-default">Reset Details</button>

            </form>
        </div>
        <div class="panel-footer">
            <small>Add User!</small>
        </div>
    </div>
@endsection

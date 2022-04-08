@extends('layouts.backend-layout')
@section('title', 'Register Student')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Register New Student</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registration.index') }}">Admissions</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Student</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Registration Form</small>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('registration.store')}}">
                @csrf
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
                        <select class="form-control" name="gender">
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
                    <label>Birth Entry Number (Optional)</label>
                    <input class="form-control" name="birth_entry_number" placeholder="Enter Birth entry number...">
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" name="phone_number" placeholder="Enter phone number...">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" rows="3" required></textarea>
                </div>

                <input type="hidden" name="user_type" value="1">

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

                <button type="submit" class="btn btn-default">Register</button>

                <button type="reset" class="btn btn-default">Reset Details</button>

            </form>
        </div>
        <div class="panel-footer">
            <small>Register!</small>
        </div>
    </div>
@endsection

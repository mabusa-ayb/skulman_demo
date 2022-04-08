@extends('layouts.backend-layout')
@section('title', 'Edit User')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('administrator.index') }}">Administrators</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->fname.' '.$data->oname.' '.$data->sname }}</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Administrator Form</small>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('administrator.update', $data->id)}}">
                @method('PUT')
                @csrf

                <input type="hidden" name="user_id" value="{{ $data->user_id }}">

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Title</label>
                        <select class="form-control" name="title">
                            <option value="Mr" {{ $data->title === 'Mr' ? 'selected' : '' }}>Mr.</option>
                            <option value="Miss" {{ $data->title === 'Miss' ? 'selected' : '' }}>Miss.</option>
                            <option value="Ms" {{ $data->title === 'Ms' ? 'selected' : '' }}>Ms.</option>
                            <option value="Mrs" {{ $data->title === 'Mrs' ? 'selected' : '' }}>Mrs.</option>
                            <option value="Dr" {{ $data->title === 'Dr' ? 'selected' : '' }}>Dr.</option>
                            <option value="Fr" {{ $data->title === 'Fr' ? 'selected' : '' }}>Fr.</option>
                            <option value="Rev" {{ $data->title === 'Rev' ? 'selected' : '' }}>Rev.</option>
                            <option value="Sr" {{ $data->title === 'Sr' ? 'selected' : '' }}>Sr.</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" name="fname" value="{{ $data->fname }}" required>
                </div>

                <div class="form-group">
                    <label>Surname</label>
                    <input class="form-control" name="sname" value="{{ $data->sname }}" required>
                </div>

                <div class="form-group">
                    <label>Othername(s)</label>
                    <input class="form-control" name="oname" value="{{ $data->oname }}">
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value="male" {{ $data->gender === 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $data->gender === 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Date of Birth</label>
                        <input class="form-control" type="date" id="birthday" name="dob" value="{{ $data->dob }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Staff Number</label>
                    <input class="form-control" name="staff_number" value="{{ $data->staff_number }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Position</label>
                        <select class="form-control" name="position">
                            <option value="Teacher" {{ $data->position === 'Teacher' ? 'selected' : '' }}>Teacher</option>
                            <option value="Clerk" {{ $data->position === 'Clerk' ? 'selected' : '' }}>Clerk</option>
                            <option value="Headmaster" {{ $data->position === 'Headmaster' ? 'selected' : '' }}>Head Master</option>
                            <option value="Bursar" {{ $data->position === 'Bursar' ? 'selected' : '' }}>Bursar</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Highest Qualification</label>
                        <select class="form-control" name="qualification">
                            <option value="Certificate" {{ $data->qualification === 'Certificate' ? 'selected' : '' }}>Certificate</option>
                            <option value="Diploma" {{ $data->qualification === 'Diploma' ? 'selected' : '' }}>Diploma</option>
                            <option value="Degree" {{ $data->qualification === 'Degree' ? 'selected' : '' }}>Degree</option>
                            <option value="Post-Graduate Diploma" {{ $data->qualification === 'Post-Graduate Diploma' ? 'selected' : '' }}>Post-Graduate Diploma</option>
                            <option value="Masters" {{ $data->qualification === 'Masters' ? 'selected' : '' }}>Masters</option>
                            <option value="Doctorate" {{ $data->qualification === 'Doctorate' ? 'selected' : '' }}>Doctorate</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Specialisation</label>
                        <select class="form-control" name="specialization">
                            <option value="Infant" {{ $data->specialization === 'Infant' ? 'selected' : '' }}>Infants</option>
                            <option value="Junior" {{ $data->specialization === 'Junior' ? 'selected' : '' }}>Juniors</option>
                            <option value="Senior" {{ $data->specialization === 'Senior' ? 'selected' : '' }}>Seniors</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>National ID Number</label>
                        <input class="form-control" name="national_id_number" value="{{ $data->national_id_number }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" name="phone_number" value="{{ $data->phone_number }}" required>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" rows="3" required>{{ $data->address }}</textarea>
                </div>

                <div class="form-group">
                    <label>Next Of Kin</label>
                    <input class="form-control" name="next_of_kin" value="{{ $data->next_of_kin }}" required>
                </div>

                <div class="form-group">
                    <label>Next Of Kin Relationship</label>
                    <input class="form-control" name="next_of_kin_relationship" value="{{ $data->next_of_kin_relationship }}" required>
                </div>

                <div class="form-group">
                    <label>Next Of Kin Phone number</label>
                    <input class="form-control" name="next_of_kin_phone_number" value="{{ $data->next_of_kin_phone_number }}" required>
                </div>

                <div class="form-group">
                    <label>Next of Kin Address</label>
                    <textarea class="form-control" name="next_of_kin_address" rows="3" required>{{ $data->next_of_kin_address }}</textarea>
                </div>

                <button type="submit" class="btn btn-default">Update</button>

                <button type="reset" class="btn btn-default">Reset Details</button>

            </form>
        </div>
        <div class="panel-footer">
            <small>Edit User!</small>
        </div>
    </div>
@endsection

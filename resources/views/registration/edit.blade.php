@extends('layouts.backend-layout')
@section('title', 'Register Student')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Student Record</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registration.index') }}">Admissions</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->student_number->student_number }}</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Update Record Form</small>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('registration.update', $data->id)}}">
            @method('PUT')
            @csrf
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
                    <input class="form-control" name="oname" value="{{ $data->oname }}" required>
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
                    <label>Birth Entry Number (Optional)</label>
                    <input class="form-control" name="birth_entry_number" value="{{ $data->birth_entry_number }}" required>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" name="phone_number" value="{{ $data->phone_number }}" required>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" rows="3" required>{{ $data->address }}</textarea>
                </div>

                <input type="hidden" name="user_type" value="1">

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
            <small>Update Record!</small>
        </div>
    </div>
@endsection

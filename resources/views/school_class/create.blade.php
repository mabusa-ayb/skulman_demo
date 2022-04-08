@extends('layouts.backend-layout')
@section('title', 'Add New Class')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">New Class</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('school_class.index') }}">Classes</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Class</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Classes Form</small>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('school_class.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Grade</label>
                        <select class="form-control" name="grade" required>
                            <option value="1">0ne</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Name</label>
                        <select class="form-control" name="class_name" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Status</label>
                        <select class="form-control" name="active" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div>

                <div>
                    <button type="submit" class="btn btn-default">Register</button>

                    <button type="reset" class="btn btn-default">Reset Details</button>
                </div>

            </form>
        </div>
        <div class="panel-footer">
            <small>Create Class!</small>
        </div>
    </div>
@endsection

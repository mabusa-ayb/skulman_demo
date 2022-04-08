@extends('layouts.backend-layout')
@section('title', 'View Class')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Class</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('school_class.index') }}">Classes</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->grade.' '.$data->class_name }}</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Classes Form</small>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('school_class.update', $data->id)}}">

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Grade</label>
                        <select class="form-control" name="grade" disabled>
                            <option value="1" {{ $data->grade === '1' ? 'selected' : '' }}>0ne</option>
                            <option value="2" {{ $data->grade === '2' ? 'selected' : '' }}>Two</option>
                            <option value="3" {{ $data->grade === '3' ? 'selected' : '' }}>Three</option>
                            <option value="4" {{ $data->grade === '4' ? 'selected' : '' }}>Four</option>
                            <option value="5" {{ $data->grade === '5' ? 'selected' : '' }}>Five</option>
                            <option value="6" {{ $data->grade === '6' ? 'selected' : '' }}>Six</option>
                            <option value="7" {{ $data->grade === '7' ? 'selected' : '' }}>Seven</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Name</label>
                        <select class="form-control" name="class_name" disabled>
                            <option value="A" {{ $data->class_name === 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $data->class_name === 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $data->class_name === 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $data->class_name === 'D' ? 'selected' : '' }}>D</option>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Status</label>
                        <select class="form-control" name="active" disabled>
                            <option value="1" {{ $data->class_name === '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $data->class_name === '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                </div>

                <div>
                    <a href="/school_class/{{ $data->id }}/edit" class="btn btn-default">Update</a>
                </div>

            </form>
        </div>
        <div class="panel-footer">
            <small>Create Class!</small>
        </div>
    </div>
@endsection

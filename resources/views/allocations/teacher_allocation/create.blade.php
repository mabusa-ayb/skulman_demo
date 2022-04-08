@extends('layouts.backend-layout')
@section('title', 'New Allocation')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">New Allocation</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('teacher_allocation.index') }}">Teacher Class Allocation</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Allocation</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Allocation Form</small>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('teacher_allocation.store')}}">
                @csrf

                <div class="form-group">
                    <label>Select Teacher</label>
                    <select class="form-control" name="teacher_id">
                        @foreach($teachers as $teacher)
                        <option value="{{ $teacher->user_id }}" selected>{{ $teacher->fname.' '.$teacher->oname.' '.$teacher->sname }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Class</label>
                        <select class="form-control" name="class_id">
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" selected>{{ $class->grade.' '.$class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Year</label>
                        <input class="form-control" name="year" placeholder="Enter Year..." required>
                    </div>
                </div>

                <button type="submit" class="btn btn-default">Allocate</button>

                <button type="reset" class="btn btn-default">Reset Details</button>

            </form>
        </div>
        <div class="panel-footer">
            <small>Class Allocation!</small>
        </div>
    </div>
@endsection

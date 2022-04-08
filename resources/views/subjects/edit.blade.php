@extends('layouts.backend-layout')
@section('title', 'Edit Subject')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Subject</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">Subjects</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->subject_name }}</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Subject Form</small>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('subject.update', $data->id)}}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label>Subject Name</label>
                    <input class="form-control" name="name" value="{{ $data->subject_name }}" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-default">Update Subject</button>

                    <button type="reset" class="btn btn-default">Reset Details</button>
                </div>

            </form>
        </div>
        <div class="panel-footer">
            <small>Create Class!</small>
        </div>
    </div>
@endsection

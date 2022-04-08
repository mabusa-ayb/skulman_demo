@extends('layouts.backend-layout')
@section('title', 'Add New Subject')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Term Registration - {{ $data->fname.' '.$data->oname.' '.$data->sname }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registration.index') }}">Admissions</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->fname.' '.$data->oname.' '.$data->sname }}</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Register {{ $data->fname.' '.$data->oname.' '.$data->sname }}</small>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('registration.term_registration_store')}}">
                @csrf

                <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                <div>
                    <div class="form-group">
                        <label>Term</label>
                        <select class="form-control" name="term" required>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-default">Register</button>
                </div>

            </form>
        </div>
        <div class="panel-footer">
            <small>Term Registration!</small>
        </div>
    </div>
@endsection

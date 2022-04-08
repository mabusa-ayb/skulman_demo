@extends('layouts.backend-layout')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('title', 'Class List')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Class List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $userClass->grade.$userClass->class_name }}</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Class List</small>
        </div>
        <div class="panel-body">
            <table id="list" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Student Number</th>
                    <th>Fullname</th>
                    <th>Gender</th>
                    <th>Marks</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Student Number</th>
                    <th>Fullname</th>
                    <th>Gender</th>
                    <th>Marks</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="panel-footer">
            <small>All Students!</small>
        </div>
    </div>
    <br>
@endsection

@push('js')
    <!-- DataTables -->
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- page script -->

    <script>

        $(function () {
            $("#list").DataTable({
                responsive: true,
                autoWidth: false,
                pagingType: 'full_numbers',
                stateSave:false,
                scrollY:true,
                scrollX:true,
                ajax:"{{ url('class_lists/datatable') }}",
                order:[0,'asc'],
                columns:[
                    {data:'student_number', name:'student_number'},
                    {data:'fullname', name:'fullname'},
                    {data:'gender', name:'gender'},
                    {data:'action', name:'action', searchable: false, sortable: false}
                ]
            });

        });

    </script>
@endpush

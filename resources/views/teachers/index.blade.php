@extends('layouts.backend-layout')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('title', 'Teachers')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Teachers</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Teachers</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('teacher.create') }}" class="btn btn-outline btn-primary"><i class="fa fa-plus-square"></i> Add New Class</a>
        </div>
        <div class="panel-body">
            <table id="teachers" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Staff Number</th>
                    <th>Fullname</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Staff Number</th>
                    <th>Fullname</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="panel-footer">
            <small>All Teachers!</small>
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
            $("#teachers").DataTable({
                responsive: true,
                autoWidth: false,
                pagingType: 'full_numbers',
                stateSave:false,
                scrollY:true,
                scrollX:true,
                ajax:"{{ url('teachers/datatable') }}",
                order:[0,'asc'],
                columns:[
                    {data:'staff_number', name:'staff_number'},
                    {data:'fullname', name:'fullname'},
                    {data:'action', name:'action', searchable: false, sortable: false}
                ]
            });

        });

    </script>
@endpush

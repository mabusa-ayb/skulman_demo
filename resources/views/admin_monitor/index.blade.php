@extends('layouts.backend-layout')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('title', 'Classes')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Classes</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Classes</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Classes</small>
        </div>
        <div class="panel-body">
            <div class="panel-body">
                <table id="classes" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($classes as $class)
                            <tr>
                                <td>{{ $class->grade.''.$class->class_name }}</td>
                                <td><a class='btn btn-action btn-primary' href='admin_monitor/{{ $class->id }}' title='View'><i class='fa fa-eye'></i></a></td>
                            </tr>

                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Class Name</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>

        <div class="panel-footer">
            <small>Add Marks!</small>
        </div>


    </div>
@endsection

@push('js')
    <!-- DataTables -->
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- page script -->


    <script>
        $(document).ready(function() {
            $('#classes').DataTable({
                responsive: true
            });
        });
    </script>



@endpush


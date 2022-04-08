@extends('layouts.backend-layout')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('title', 'Student Marks')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Student Marks</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_monitor.index') }}">Classes</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->fname.' '.$data->oname.' '.$data->sname }}</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>{{ $data->fname.' '.$data->oname.' '.$data->sname }}</small>
        </div>
        <div class="panel-body">
            <div class="panel-body">
                <table id="marks" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Mark</th>
                        <th>Term</th>
                        <th>Year</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($marks as $mark)
                        <tr>
                            <td>{{ $mark->subject_name }}</td>
                            <td>{{ $mark->mark }}</td>
                            <td>{{ $mark->term }}</td>
                            <td>{{ $mark->year }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                    <th>Subject</th>
                    <th>Mark</th>
                    <th>Term</th>
                    <th>Year</th>
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
            $('#marks').DataTable({
                responsive: true
            });
        });
    </script>



@endpush


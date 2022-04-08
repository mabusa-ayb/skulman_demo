@extends('layouts.backend-layout')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('title', 'Class')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Class {{ $class->grade.''.$class->class_name }} - {{ $teacher->title.', '.$teacher->fname.' '.$teacher->oname.' '.$teacher->sname }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_monitor.index') }}">Classes</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $class->grade.''.$class->class_name }}</li>

            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Class</small>
        </div>
        <div class="panel-body">
            <div class="panel-body">
                <table id="classes" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $session = App\ActiveSession::all()->first();
                        $studentAllocations = App\StudentClassAllocation::where([
                            ['school_class_id','=',$classID],
                            ['year','=', $session->year]
                        ])->get();
                    ?>
                    @foreach($studentAllocations as $studentAllocation)
                        <?php
                            $student = App\UserDetail::where('user_id','=', $studentAllocation->user_id)->first();
                        ?>
                        <tr>
                            <td>{{ $student->fname.' '.$student->oname.' '.$student->sname }}</td>
                            <td>
                                <a class='btn btn-action btn-primary' href='/admin_monitor/student/{{ $student->user_id }}' title='View'><i class='fa fa-eye'></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Fullname</th>
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


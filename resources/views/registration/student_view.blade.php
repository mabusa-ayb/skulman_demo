@extends('layouts.backend-layout')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('title', 'Marks')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Marks</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Marks</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Marks</small>
        </div>
        <div class="panel-body">
            <div class="panel-body">
                <table id="classes" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Term</th>
                        <th>Year</th>
                        <th>Mark</th>
                        <th>Aggregate</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $mark)
                        <tr>
                            <td>{{ $mark->subject_name }}</td>
                            <td>{{ $mark->term }}</td>
                            <td>{{ $mark->year }}</td>
                            <td>{{ $mark->mark }}</td>
                            <td>
                                <?php
                                    if($mark->mark <= '89' && $mark->mark >= '80'){
                                        echo '2';
                                    }

                                    if($mark->mark <= '79' && $mark->mark >= '70'){
                                        echo '3';
                                    }

                                    if($mark->mark <= '69' && $mark->mark >= '60'){
                                        echo '4';
                                    }

                                    if($mark->mark <= '59' && $mark->mark >= '50'){
                                        echo '5';
                                    }

                                    if($mark->mark <= '49' && $mark->mark >= '40'){
                                        echo '6';
                                    }

                                    if($mark->mark <= '39' && $mark->mark >= '30'){
                                        echo '7';
                                    }

                                    if($mark->mark <= '29' && $mark->mark >= '20'){
                                        echo '8';
                                    }

                                    if($mark->mark <= '19'){
                                        echo '9';
                                    }

                                ?>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Subject</th>
                        <th>Term</th>
                        <th>Year</th>
                        <th>Mark</th>
                        <th>Aggregate</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>

        <div class="panel-footer">
            <small>Marks!</small>
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


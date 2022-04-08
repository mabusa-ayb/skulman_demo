@extends('layouts.backend-layout')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('title', 'Add Marks')

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
                <li class="breadcrumb-item"><a href="{{ route('class_list.index') }}">Classes</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->fname.' '.$data->oname.' '.$data->sname }} ({{ $data->student_number->student_number }})</li>
            </ol>
        </nav>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <small>Marks Form</small>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('mark_list.store')}}">
                @csrf

                <input type="hidden" name="student_id" value="{{ $data->user_id }}">

                <div class="form-group">
                    <label>Subject</label>
                    <select class="form-control" name="subject_id" required>
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Mark</label>
                        <input class="form-control" name="mark" placeholder="Mark over 100..." required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Term</label>
                        <select class="form-control" name="term" required>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>


                <div>
                    <button type="submit" class="btn btn-default">Add Mark</button>

                    <button type="reset" class="btn btn-default">Reset Details</button>
                </div>

            </form>
        </div>

        <!-- Marks Table -->

        @include('inc.marksTable')
        <!--\ End Marks Table -->

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

        $(function () {
            $("#marks").DataTable({
                responsive: true,
                autoWidth: false,
                pagingType: 'full_numbers',
                stateSave:false,
                scrollY:true,
                scrollX:true,
                ajax:"{{ url('mark_lists/datatable/'.$data->user_id) }}",
                order:[0,'asc'],
                columns:[
                    {data:'subject', name:'subject'},
                    {data:'mark', name:'mark'},
                    {data:'aggregate', name:'aggregate'},
                    {data:'term', name:'term'},
                    {data:'year', name:'year'},
                    {data:'action', name:'action', searchable: false, sortable: false}
                ]
            });

        });

    </script>

@endpush


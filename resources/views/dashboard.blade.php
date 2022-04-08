@extends('layouts.backend-layout')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard - Magwe Skulman</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">

        <!-- Student Dashboard -->
        @can('isStudent')
            <?php
                $registrationStatus = App\RegistrationStatus::where('user_id','=',Auth::user()->id)
            ?>

                <!-- Term registration -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-check fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><i class="fa fa-plus-square-o"></i></div>
                                        <div>Term Registration!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    @if(!empty($registrationStatus))
                                        <span class="pull-left">You are Registered</span>
                                    @else
                                        <span class="pull-left">You are NOT Registered</span>
                                    @endif
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--\ Term Registration -->

        @endcan
        <!--\ End Student Dashboard -->

        @canany(['isAdmin','isHeadmaster', 'isClerk'])
            <!--Create new user -->
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user-plus fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><i class="fa fa-plus-circle"></i></div>
                                <div>Register Student!</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('registration.create') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Create Student Record</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- \ End Create new user -->

            <!-- View all Users -->
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><i class="fa fa-eye"></i></div>
                                <div>All Students!</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('registrations.show_all') }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Students</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!--\ End View all Users -->
        @endcanany

    </div>

@endsection

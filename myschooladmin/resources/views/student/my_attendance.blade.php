@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Attendance</h1>
                    </div>
                </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">My Attendance</h3>
                                </div>
                                <div class="card-body p-0" style="overflow: auto;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Attendance Type</th>
                                                <th>Attendance Date</th>
                                                <th>Created Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                    
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')


@endsection
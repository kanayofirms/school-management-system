@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Class Timetable ({{ $getClass->name }} - {{ $getSubject->name }}) <span style="color: #3180FF">({{ $getStudent->name }} {{ $getStudent->last_name }})</span></h1>
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
                                        <h3 class="card-title">
                                            {{ $getClass->name }} - {{ $getSubject->name }}
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Week</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Class Room</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                              @foreach ($getRecord as $valueW)
                                              <tr>
                                                <th>{{ $valueW['week_name'] }}</th>
                                                <td>{{ !empty($valueW['start_time']) ? date('h:i A', strtotime($valueW['start_time'])) : '' }}</td>
                                                <td>{{ !empty($valueW['end_time']) ? date('h:i A', strtotime($valueW['end_time'])) : '' }}</td>
                                                <td>{{ $valueW['class_room'] }}</td>

                                              </tr>
                                                  
                                              @endforeach
                                            </tbody>
                                        </table>         
                                    </div>
                                    
                                </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
    </div>
@endsection


  


@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Exam Timetable</h1>
                    </div>


                </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        @include('_message')

                            @foreach ($getRecord as $value) 
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $value['name'] }}</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Exam Date</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Class Room</th>
                                                    <th>Full Marks</th>
                                                    <th>Passing Marks</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                              @foreach ($value['exam'] as $valueS)
                                              <tr>
                                                <td>{{ $valueS['subject_name'] }}</td>
                                                <td>{{ $valueS['exam_date'] }}</td>     
                                                <td>{{ $valueS['start_time'] }}</td>     
                                                <td>{{ $valueS['end_time'] }}</td>     
                                                <td>{{ $valueS['class_room'] }}</td>
                                                <td>{{ $valueS['full_mark'] }}</td>     
                                                <td>{{ $valueS['passing_mark'] }}</td>     

                                              </tr>  
                                              @endforeach
                                            </tbody>
                                        </table>         
                                    </div>
                                    
                                </div>
                                @endforeach
                        



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



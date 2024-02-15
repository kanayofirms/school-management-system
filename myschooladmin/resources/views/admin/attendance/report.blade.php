@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Attendance Report</h1>
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
                                <h3 class="card-title">Search Attendance Report</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label>Class</label>
                                            <select class="form-control" name="class_id">
                                                <option value="">Select</option>
                                                @foreach ($getClass as $class)
                                                    <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} 
                                                        value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Attendance Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('attendance_date') }}" 
                                            name="attendance_date">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Attendance Type</label>
                                            <select class="form-control" name="attendance_type">
                                                <option value="">Select</option>
                                                <option value="1">Present</option>
                                                <option value="2">Late</option> 
                                                <option value="3">Absent</option>
                                                <option value="4">Half Day</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/attendance/report') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- @if(!empty(Request::get('class_id')) && !empty(Request::get('attendance_date')))

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Attendance List</h3>
                                </div>
                                <div class="card-body p-0" style="overflow: auto;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Attendance</th>
                                                <th>Attendance Date</th>
                                                <th>Created Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif --}}
                    
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')


@endsection
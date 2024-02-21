@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Attendance</h1>
                    </div>
                </div>
        </section>
        <section class="content">

            <div class="container-fluid">
                <div class="row">
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
                                            @forelse ($getRecord as $value)
                                                <tr>
                                                    <td>{{ $value->class_name }}</td>
                                                    <td>
                                                        @if ($value->attendance_type == 1)
                                                        Present
                                                        @elseif ($value->attendance_type == 2)
                                                        Late
                                                        @elseif ($value->attendance_type == 3)
                                                        Absent
                                                        @elseif ($value->attendance_type == 4)
                                                        Half Day
                                                        @endif
                                                    </td>
                                                    <td>{{ date('d-m-Y', strtotime($value->attendance_date)) }}</td>
                                                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="100%">Record not found</td>
                                                </tr>
                                            @endforelse
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
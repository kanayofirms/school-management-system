@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student List (Total: {{ $getRecord->Total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Add New student</a>

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

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Profile Pic</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Admission Number</th>
                                            <th>Roll Number</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Address</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>Local Government Area</th>
                                            <th>Hometown</th>
                                            <th>Religion</th>
                                            <th>Admission Date</th>
                                            <th>Blood Group</th>
                                            <th>Genotype</th>
                                            <th>Disability</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>
                                                    @if (!@empty($value->getProfile()))
                                                    <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; border-radius: 50%;">    
                                                    @endif
                                                </td>
                                                <td>{{ $value->name }} {{ $value->middle_name }} {{ $value->last_name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->admission_number }}</td>
                                                <td>{{ $value->roll_number }}</td>
                                                <td>{{ $value->admission_date }}</td>
                                                <td>{{ $value->class_id }}</td>
                                                <td>{{ $value->gender }}</td>
                                                <td>{{ $value->date_of_birth }}</td>
                                                <td>{{ $value->address }}</td>
                                                <td>{{ $value->country }}</td>
                                                <td>{{ $value->state }}</td>
                                                <td>{{ $value->local_govt_area }}</td>
                                                <td>{{ $value->hometown }}</td>
                                                <td>{{ $value->religion }}</td>
                                                <td>{{ $value->blood_group }}</td>
                                                <td>{{ $value->genotype }}</td>
                                                <td>{{ $value->disability }}</td>
                                                <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/student/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/student/delete/' . $value->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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

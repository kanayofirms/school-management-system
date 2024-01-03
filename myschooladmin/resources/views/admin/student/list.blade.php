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

                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Student</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{ Request::get('name') }}"
                                                name="name" placeholder="Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" value="{{ Request::get('last_name') }}"
                                                name="last_name" placeholder="Last Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="{{ Request::get('email') }}"
                                                name="email" placeholder="Email">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Admission No.</label>
                                            <input type="text" class="form-control" value="{{ Request::get('admission_number') }}"
                                                name="admission_number" placeholder="Admission Number">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Roll No.</label>
                                            <input type="text" class="form-control" value="{{ Request::get('roll_number') }}"
                                                name="roll_number" placeholder="Roll Number">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Class</label>
                                            <input type="text" class="form-control" value="{{ Request::get('class_id') }}"
                                                name="class_id" placeholder="Class">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">Select Gender</option>
                                                <option  {{ (Request::get('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                                <option  {{ (Request::get('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>State</label>
                                            <input type="text" class="form-control" value="{{ Request::get('state') }}"
                                                name="state" placeholder="State">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Religion</label>
                                            <input type="text" class="form-control" value="{{ Request::get('religion') }}"
                                                name="religion" placeholder="Religion">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Blood Group</label>
                                            <input type="text" class="form-control" value="{{ Request::get('blood_group') }}"
                                                name="blood_group" placeholder="Blood Group">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">Select Status</option>
                                                <option  {{ (Request::get('status') == 100) ? 'selected' : '' }} value="Male">Active</option>
                                                <option  {{ (Request::get('status') == 1) ? 'selected' : '' }} value="Female">Inactive</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Admission Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('admission_date') }}"
                                                name="admission_date">
                                        </div>


                                        <div class="form-group col-md-2">
                                            <label>Created Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('date') }}"
                                                name="date" placeholder="">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/student/list') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>



                        @include('_message')

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Profile Pic</th>
                                            <th>Student Name</th>
                                            <th>Parent Name</th>
                                            <th>Email</th>
                                            <th>Admission No.</th>
                                            <th>Roll No.</th>
                                            <th>Admission Date</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Address</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>Local Government Area</th>
                                            <th>Hometown</th>
                                            <th>Religion</th>
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
                                                <td>{{ $value->parent_name }} {{ $value->parent_last_name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->admission_number }}</td>
                                                <td>{{ $value->roll_number }}</td>
                                                <td>
                                                    @if (!@empty($value->admission_date))
                                                        {{ date('d-m-Y', strtotime($value->admission_date)) }}
                                                    @endif
                                                </td>
                                                <td>{{ $value->class_name }}</td>
                                                <td>{{ $value->gender }}</td>
                                                <td>
                                                    @if (!@empty($value->date_of_birth))
                                                        {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                                                    @endif
                                                </td>
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
                                                <td style="min-width: 150px;">
                                                    <a href="{{ url('admin/student/edit/' . $value->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ url('admin/student/delete/' . $value->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
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

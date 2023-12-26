@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Student</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <form method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>First Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}"
                                                name="name" required placeholder="First Name">
                                                <div style="color:red">
                                                    {{ $errors->first('name') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Middle Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('middle_name', $getRecord->middle_name) }}"
                                                name="middle_name" required placeholder="Middle Name">
                                                <div style="color:red">
                                                    {{ $errors->first('middle_name') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Last Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('last_name', $getRecord->last_name) }}"
                                                name="last_name" required placeholder="Last Name">
                                                <div style="color:red">
                                                    {{ $errors->first('last_name') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Admission Number <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('admission_number', $getRecord->admission_number) }}"
                                                name="admission_number" required placeholder="Admission Number">
                                                <div style="color:red">
                                                    {{ $errors->first('admission_number') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Roll Number <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('roll_number', $getRecord->roll_number) }}"
                                                name="roll_number" placeholder="Roll Number">
                                                <div style="color:red">
                                                    {{ $errors->first('roll_number') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Class <span style="color: red;">*</span></label>
                                            <select name="form-control" required name="class_id">
                                                <option value="">Select Class</option>
                                                @foreach ($getClass as $value)
                                                    <option {{ (old('class_id', $getRecord->class_id) == $value->id) ? 'selected' : ''}}  value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color:red">
                                                {{ $errors->first('class_id') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Gender <span style="color: red;">*</span></label>
                                            <select name="form-control" required name="gender">
                                                <option value="">Select Gender</option>
                                                <option  {{ (old('gender', $getRecord->gender) == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                                                <option  {{ (old('gender', $getRecord->gender) == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                                            </select>
                                            <div style="color:red">
                                                {{ $errors->first('gender') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Date of Birth <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" required value="{{ old('date_of_birth', $getRecord->date_of_birth) }}"
                                                name="date_of_birth">
                                                <div style="color:red">
                                                    {{ $errors->first('date_of_birth') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Address <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('address', $getRecord->address) }}"
                                                name="address" required placeholder="Address">
                                                <div style="color:red">
                                                    {{ $errors->first('address') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Country <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('country', $getRecord->country) }}"
                                                name="country" required placeholder="Country">
                                                <div style="color:red">
                                                    {{ $errors->first('country') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>State <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('state', $getRecord->state) }}"
                                                name="state" required placeholder="State">
                                                <div style="color:red">
                                                    {{ $errors->first('state') }}
                                                </div>
                                        </div>

                                        
                                        <div class="form-group col-md-6">
                                            <label>Local Government Area <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('local_govt_area', $getRecord->local_govt_area) }}"
                                                name="local_govt_area" required placeholder="Local Governmet Area">
                                                <div style="color:red">
                                                    {{ $errors->first('local_govt_area') }}
                                                </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Hometown <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('hometown', $getRecord->hometown) }}"
                                                name="hometown" placeholder="Hometown">
                                                <div style="color:red">
                                                    {{ $errors->first('hometown') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Religion <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('religion', $getRecord->religion) }}"
                                                name="religion" placeholder="Religion">
                                                <div style="color:red">
                                                    {{ $errors->first('religion') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Admission Date <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" required value="{{ old('admission_date', $getRecord->admission_date) }}"
                                                name="admission_date">
                                                <div style="color:red">
                                                    {{ $errors->first('admission_date') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Profile Picture <span style="color: red;"></span></label>
                                            <input type="file" class="form-control" name="profile_pic">
                                            <div style="color:red">
                                                {{ $errors->first('profile_pic') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Blood Group <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('blood_group', $getRecord->blood_group) }}"
                                                name="blood_group" placeholder="Blood Group">
                                                <div style="color:red">
                                                    {{ $errors->first('blood_group') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Genotype <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('genotype', $getRecord->genotype) }}"
                                                name="genotype" placeholder="Genotype">
                                                <div style="color:red">
                                                    {{ $errors->first('genotype') }}
                                                </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Disability <span style="color: red;">*</span></label>
                                            <select name="form-control" required name="disability">
                                                <option value="">Select Gender</option>
                                                <option  {{ (old('disability', $getRecord->disability) == 'No') ? 'selected' : ''}} value="No">No</option>
                                                <option  {{ (old('disability', $getRecord->disability) == 'Yes') ? 'selected' : ''}} value="Yes">Yes</option>
                                            </select>
                                            <div style="color:red">
                                                {{ $errors->first('disability') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Status <span style="color: red;">*</span></label>
                                            <select class="form-control" required name="status">
                                                <option value="">Select Status</option>
                                                <option {{ (old('status', $getRecord->status) == 0) ? 'selected' : '' }} value="0">Active</option>
                                                <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                            </select>
                                            <div style="color:red">
                                                {{ $errors->first('status') }}
                                            </div>
                                        </div>

                                    </div>

                                    <hr />
                                  
                                    <div class="form-group">
                                        <label>Email <span style="color: red;">*</span></label>
                                        <input type="email" class="form-control" value="{{ old('email', $getRecord->email) }}"
                                            name="email" required placeholder="Email">
                                        <div style="color:red">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" name="password" 
                                            placeholder="Password">
                                            <p>Do you want to change password? Please add new password</p>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

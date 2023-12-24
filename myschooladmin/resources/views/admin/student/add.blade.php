@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Student</h1>
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
                                            <input type="text" class="form-control" value="{{ old('name') }}"
                                                name="name" required placeholder="First Name">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Middle Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('middle_name') }}"
                                                name="middle_name" required placeholder="Middle Name">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Last Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('last_name') }}"
                                                name="last_name" required placeholder="Last Name">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Admission Number <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('admission_number') }}"
                                                name="admission_number" required placeholder="Admission Number">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Roll Number <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('roll_number') }}"
                                                name="roll_number" placeholder="Roll Number">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Class <span style="color: red;">*</span></label>
                                            <select name="form-control" required name="class_id">
                                                <option value="">Select Class</option>
                                                @foreach ($getClass as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Gender <span style="color: red;">*</span></label>
                                            <select name="form-control" required name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Date of Birth <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" required value="{{ old('date_of_birth') }}"
                                                name="date_of_birth">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Address <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('address') }}"
                                                name="address" required placeholder="Address">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Country <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('country') }}"
                                                name="country" required placeholder="Country">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>State <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('state') }}"
                                                name="state" required placeholder="State">
                                        </div>

                                        
                                        <div class="form-group col-md-6">
                                            <label>Local Government Area <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('local_govt_area') }}"
                                                name="local_govt_area" required placeholder="Local Governmet Area">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Hometown <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('hometown') }}"
                                                name="hometown" placeholder="Hometown">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Religion <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('religion') }}"
                                                name="religion" placeholder="Religion">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Admission Date <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" required value="{{ old('admission_date') }}"
                                                name="admission_date">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Profile Picture <span style="color: red;"></span></label>
                                            <input type="file" class="form-control" name="profile_pic">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Blood Group <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('blood_group') }}"
                                                name="blood_group" placeholder="Blood Group">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Genotype <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('genotype') }}"
                                                name="genotype" placeholder="Genotype">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Disability <span style="color: red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('disability') }}"
                                                name="disability" placeholder="Disability">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Status <span style="color: red;">*</span></label>
                                            <select class="form-control" required name="status">
                                                <option value="">Select Status</option>
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                        </div>

                                    </div>

                                    <hr />
                                  
                                    <div class="form-group">
                                        <label>Email <span style="color: red;">*</span></label>
                                        <input type="email" class="form-control" value="{{ old('email') }}"
                                            name="email" required placeholder="Email">
                                        <div style="color:red">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span style="color: red;">*</span></label>
                                        <input type="password" class="form-control" name="password" required
                                            placeholder="Password">
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

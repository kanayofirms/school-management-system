@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Account</h1>
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
                                            <input type="text" class="form-control"
                                                value="{{ old('name', $getRecord->name) }}" name="name" required
                                                placeholder="First Name">
                                            <div style="color:red">
                                                {{ $errors->first('name') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Middle Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('middle_name', $getRecord->middle_name) }}" name="middle_name"
                                                required placeholder="Middle Name">
                                            <div style="color:red">
                                                {{ $errors->first('middle_name') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Last Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('last_name', $getRecord->last_name) }}" name="last_name"
                                                required placeholder="Last Name">
                                            <div style="color:red">
                                                {{ $errors->first('last_name') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Gender <span style="color: red;">*</span></label>
                                            <select class="form-control" required name="gender">
                                                <option value="">Select Gender</option>
                                                <option
                                                    {{ old('gender', $getRecord->gender) == 'Male' ? 'selected' : '' }}
                                                    value="Male">Male</option>
                                                <option
                                                    {{ old('gender', $getRecord->gender) == 'Female' ? 'selected' : '' }}
                                                    value="Female">Female</option>
                                            </select>
                                            <div style="color:red">
                                                {{ $errors->first('gender') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Date of Birth <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" required
                                                value="{{ old('date_of_birth', $getRecord->date_of_birth) }}"
                                                name="date_of_birth">
                                            <div style="color:red">
                                                {{ $errors->first('date_of_birth') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Address <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('address', $getRecord->address) }}" name="address" required
                                                placeholder="Address">
                                            <div style="color:red">
                                                {{ $errors->first('address') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Country <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('country', $getRecord->country) }}" name="country" required
                                                placeholder="Country">
                                            <div style="color:red">
                                                {{ $errors->first('country') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>State <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('state', $getRecord->state) }}" name="state" required
                                                placeholder="State">
                                            <div style="color:red">
                                                {{ $errors->first('state') }}
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Local Government Area <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('local_govt_area', $getRecord->local_govt_area) }}"
                                                name="local_govt_area" required placeholder="Local Governmet Area">
                                            <div style="color:red">
                                                {{ $errors->first('local_govt_area') }}
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Hometown <span style="color: red;"></span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('hometown', $getRecord->hometown) }}" name="hometown"
                                                placeholder="Hometown">
                                            <div style="color:red">
                                                {{ $errors->first('hometown') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Religion <span style="color: red;"></span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('religion', $getRecord->religion) }}" name="religion"
                                                placeholder="Religion">
                                            <div style="color:red">
                                                {{ $errors->first('religion') }}
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Profile Picture <span style="color: red;"></span></label>
                                            <input type="file" class="form-control" name="profile_pic">
                                            <div style="color:red">
                                                {{ $errors->first('profile_pic') }}
                                            </div>
                                            @if (!@empty($getRecord->getProfile()))
                                                <img src="{{ $getRecord->getProfile() }}" style="width: auto;height: 50px;">
                                            @endif
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Blood Group <span style="color: red;"></span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('blood_group', $getRecord->blood_group) }}"
                                                name="blood_group" placeholder="Blood Group">
                                            <div style="color:red">
                                                {{ $errors->first('blood_group') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Genotype <span style="color: red;"></span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('genotype', $getRecord->genotype) }}" name="genotype"
                                                placeholder="Genotype">
                                            <div style="color:red">
                                                {{ $errors->first('genotype') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Disability <span style="color: red;">*</span></label>
                                            <select class="form-control" required name="disability">
                                                <option value="">Select Disability</option>
                                                <option
                                                    {{ old('disability', $getRecord->disability) == 'No' ? 'selected' : '' }}
                                                    value="No">No</option>
                                                <option
                                                    {{ old('disability', $getRecord->disability) == 'Yes' ? 'selected' : '' }}
                                                    value="Yes">Yes</option>
                                            </select>
                                            <div style="color:red">
                                                {{ $errors->first('disability') }}
                                            </div>
                                        </div>


                                    </div>

                                    <hr />

                                    <div class="form-group">
                                        <label>Email <span style="color: red;">*</span></label>
                                        <input type="email" class="form-control"
                                            value="{{ old('email', $getRecord->email) }}" name="email" required
                                            placeholder="Email">
                                        <div style="color:red">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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

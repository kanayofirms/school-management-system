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
                            <form method="post" action="">
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

                                    </div>
                                  
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{ old('email') }}"
                                            name="email" required placeholder="Email">
                                        <div style="color:red">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
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

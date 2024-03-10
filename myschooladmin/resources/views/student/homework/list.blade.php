@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>My Homework</h1>
                    </div>
                    </div>
                </div>
        </section>

        <section class="content">

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search My Homework</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                    
                                        <div class="form-group col-md-2">
                                            <label>Subject</label>
                                            <input type="text" class="form-control" value="{{ Request::get('subject_name') }}"
                                                name="subject_name" placeholder="Subject Name">
                                        </div>


                                        <div class="form-group col-md-2">
                                            <label>From Homework Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('from_homework_date') }}"
                                                name="from_homework_date">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>To Homework Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('to_homework_date') }}"
                                                name="to_homework_date">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>From Submission Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('from_submission_date') }}"
                                                name="from_submission_date">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>To Submission Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('to_submission_date') }}"
                                                name="to_submission_date">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>From Created Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('from_created_date') }}"
                                                name="from_created_date">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>To Created Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('to_created_date') }}"
                                                name="to_created_date">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('student/my_homework') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Homework List</h3>
                            </div>
                           
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Homework Date</th>
                                            <th>Submission Date</th>
                                            <th>Document</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right;">
                                                                    
                                </div>
                            </div>
                        </div>                        
                    </div>                   
                </div>              
            </div>
        </section>


        
    </div>
@endsection

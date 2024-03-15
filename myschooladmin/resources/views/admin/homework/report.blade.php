@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Homework Report</h1>
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
                                <h3 class="card-title">Search Homework Report</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label>Student First Name</label>
                                            <input type="text" class="form-control" value="{{ Request::get('first_name') }}"
                                                name="first_name" placeholder="Student First Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Student Middle Name</label>
                                            <input type="text" class="form-control" value="{{ Request::get('middle_name') }}"
                                                name="middle_name" placeholder="Student Middle Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Student Last Name</label>
                                            <input type="text" class="form-control" value="{{ Request::get('last_name') }}"
                                                name="last_name" placeholder="Student Last Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Class</label>
                                            <input type="text" class="form-control" value="{{ Request::get('class_name') }}"
                                                name="class_name" placeholder="Class Name">
                                        </div>
                                    
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
                                            <label>From Submitted Created Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('from_created_date') }}"
                                                name="from_created_date">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>To Submitted Created Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('to_created_date') }}"
                                                name="to_created_date">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/homework/homework_report') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Homework Report List</h3>
                            </div>
                           
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Homework Date</th>
                                            <th>Submission Date</th>
                                            <th>Document</th>
                                            <th>Description</th>
                                            <th>Created Date</th>
                                        
                                            <th>Submitted Document</th>
                                            <th>Submitted Description</th>
                                            <th>Submitted Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                           <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->first_name }} {{ $value->middle_name }} {{ $value->last_name }}</td>
                                            <td>{{ $value->class_name }}</td>
                                            <td>{{ $value->subject_name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->getHomework->homework_date)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->getHomework->submission_date)) }}</td>
                                            <td>
                                                @if(!@empty($value->getHomework->getDocument()))
                                                    <a href="{{ $value->getHomework->getDocument() }}" class="btn btn-primary" 
                                                        download="">Download</a>
                                                @endif
                                            </td>
                                            <td>{!! $value->getHomework->description !!}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->getHomework->created_at)) }}</td>


                                            <td>
                                                @if(!@empty($value->getDocument()))
                                                    <a href="{{ $value->getDocument() }}" class="btn btn-primary" 
                                                        download="">Download</a>
                                                @endif
                                            </td>
                                            <td>{!! $value->description !!}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                           </tr>
                                       @empty
                                           <tr>
                                            <td colspan="100%">Record not found</td>
                                           </tr>
                                       @endforelse
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}                                 
                                </div>
                            </div>
                        </div>                        
                    </div>                   
                </div>              
            </div>
        </section>


        
    </div>
@endsection

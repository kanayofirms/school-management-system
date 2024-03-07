@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Homework</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/homework/homework/add') }}" class="btn btn-primary">Add New Homework</a>
                    </div>
                </div>
        </section>

        <section class="content">

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                       

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
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @forelse ($getRecord as $value)
                                           <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->class_name }}</td>
                                            <td>{{ $value->subject_name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->homework_date)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->submission_date)) }}</td>
                                            <td>
                                                @if(!@empty($value->getDocument()))
                                                    <a href="{{ $value->getDocument() }}" class="btn btn-primary" 
                                                        download="">Download</a>
                                                @endif
                                            </td>
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

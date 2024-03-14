@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Submitted Homework</h1>
                    </div>
                
                </div>
        </section>

        <section class="content">

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Submitted Homework</h3>
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
                                            <label>From Created Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('from_created_date') }}"
                                                name="from_created_date">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>To Created Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('to_created_date') }}"
                                                name="to_created_date">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/homework/homework/submitted/'.$homework_id) }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Submitted Homework List</h3>
                            </div>
                           
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Document</th>
                                            <th>Description</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @forelse ($getRecord as $value)
                                           <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->first_name }} {{ $value->middle_name }} 
                                                {{ $value->last_name }}</td>
                                                <td>
                                                    @if(!@empty($value->getHomework->getDocument()))
                                                        <a href="{{ $value->getHomework->getDocument() }}" class="btn btn-primary" 
                                                            download="">Download</a>
                                                    @endif
                                                </td>
                                                <td>{!! $value->getHomework->description !!}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->getHomework->created_at)) }}</td>
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

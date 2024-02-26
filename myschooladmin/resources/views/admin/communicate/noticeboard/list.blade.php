@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notice Board</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/communicate/notice_board/add') }}" class="btn btn-primary">Add New Notice Board</a>
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
                                <h3 class="card-title">Admin List</h3>
                            </div>
                           
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Notice Date</th>
                                            <th>Publish Date</th>
                                            <th>Message To</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->notice_date)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->publish_on)) }}</td>
                                                <td>
                                                    @foreach ($value->getMessage as $message)
                                                        @if ($message->message_to == 2)
                                                            <div>Teacher</div>
                                                        @elseif ($message->message_to == 3)
                                                            <div>Student</div>
                                                        @elseif ($message->message_to == 4)
                                                            <div>Parent</div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $value->created_by_name }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td> 
                                                <td>
                                                    <a href="{{ url('admin/communicate/notice_board/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/communicate/notice_board/delete/' . $value->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">Record not found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float: right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()
                                     !!}
                                </div>
                            </div>
                        </div>                        
                    </div>                   
                </div>              
            </div>
        </section>


        
    </div>
@endsection

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
                        <a href="{{ url('admin/communicate/notice_board/add') }}" class="btn btn-primary">Add New Homework</a>
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

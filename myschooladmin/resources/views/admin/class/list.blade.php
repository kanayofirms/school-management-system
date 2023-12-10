@extends('layouts.app')


@section('content')


      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Add New admin</a>
            
          </div>
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">

            
                <div class="card"> 
                  <div class="card-header">
                    <h3 class="card-title">Search Admin</h3>
                  </div>  
                  <form method="get" action="">     
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-3">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Name">
                          </div>
                          
                      <div class="form-group col-md-3">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ Request::get('email') }}" name="email" placeholder="Email">  
                      </div>

                      <div class="form-group col-md-3">
                        <label>Date</label>
                        <input type="date" class="form-control" value="{{ Request::get('date') }}" name="date" placeholder="Email">  
                      </div>

                      <div class="form-group col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button> 
                        <a href="{{ url('admin/admin/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>  
                      </div>
                      
                    </div>
                    </div>
    
                  </form>
                </div>
                
    

            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- /.content -->
  </div>

@endsection

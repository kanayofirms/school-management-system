@extends('layouts.app')

@section('content')
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting</h1>
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            @include('_message')
            <!-- general form elements -->
            <div class="card card-primary">   
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    
                  <div class="form-group">
                    <label>Paypal Bussiness Email</label>
                    <input type="email" class="form-control" name="paystack_email" value="" 
                    placeholder="Paypal Bussiness Email">
                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Favicon Icon<span style="color: red;"></span></label>
                    <input type="file" class="form-control" name="favicon_icon"> 
                 </div>

                 <div class="form-group">
                  <label>Logo<span style="color: red;"></span></label>
                  <input type="file" class="form-control" name="logo"> 
               </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
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

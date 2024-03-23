@extends('layouts.app')

@section('content')
 
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin</h1>
          </div>
        
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">   
              <form method="post" action="" enctype="multipart/form-data>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" placeholder="Name">
                      </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" placeholder="Email">
                    <div style="color:red">
                      {{ $errors->first('email') }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password">
                    <p>Do you want to change password? Please add new password.</p>
                  </div>
                  
                {{ csrf_field() }}

                  <div class="form-group">
                    <label>Profile Picture <span style="color: red;"></span></label>
                    <input type="file" class="form-control" name="profile_pic">
                    <div style="color:red">
                        {{ $errors->first('profile_pic') }}
                    </div>
                    @if (!@empty($getRecord->getProfile()))
                        <img src="{{ $getRecord->getProfile() }}" style="width: auto;height: 50px;">
                    @endif
                </div>
                  
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            

          </div>
        </div>
      </div>
    </section>
  </div>

@endsection

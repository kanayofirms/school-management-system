@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>My Notice Board</h1>
            </div>
            
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            

        @foreach ($getRecord as $value)
        <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-body p-0">
                <div class="mailbox-read-info">
                  <h5>{{ $value->title }}</h5>
                  <h6><span class="mailbox-read-time float-right" style="font-weight: bold; color: #000; font-size: 16px;">{{ date('d-m-Y', strtotime($value->notice_date)) }}</span></h6>
                </div>
                <div class="mailbox-read-message">
                  {!! $value->message !!}
                </div>
              </div>
            </div>
          </div>
        @endforeach

        <div class="col-md-12">
            <div style="padding: 10px; float:right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
            </div>
        </div>
          
        </div>
        </div>
      </section>
</div>

@endsection
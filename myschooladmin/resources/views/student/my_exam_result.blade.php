@extends('layouts.app')


@section('content')

      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Exam Result</h1>
          </div>       
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          @foreach ($getRecord as $value)      
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $value['exam_name'] }}</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Subject Name</th>
                      <th>Attendance</th>
                      <th>CAT 1</th>
                      <th>CAT 2</th>
                      <th>Exam</th>
                      <th>Total Score</th>
                      <th>Passing Mark</th>
                      <th>Full Mark</th>
                      <th>Result</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($value['subject'] as $exam)
                       <tr>
                        <td>{{ $exam['subject_name'] }}</td>
                        <td>{{ $exam['attendance'] }}</td>
                        <td>{{ $exam['cat_one'] }}</td>
                        <td>{{ $exam['cat_two'] }}</td>
                        <td>{{ $exam['exam'] }}</td>
                        <td>{{ $exam['totalScore'] }}</td>
                        <td>{{ $exam['passing_mark'] }}</td>
                        <td>{{ $exam['full_mark'] }}</td>
                        <td>
                          @if ($exam['totalScore'] >= $exam['passing_mark'])
                              <span style="color: green; font-weight:bold;">Pass</span>
                          @else
                              <span style="color: red; font-weight:bold;">Fail</span>
                          @endif
                        </td>
                       </tr>
                    @endforeach
                  </tbody>
                </table>               
            </div>
          </div>
        </div>
        @endforeach
        <!-- /.row -->  
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>  
    <!-- /.content -->
  </div>

@endsection

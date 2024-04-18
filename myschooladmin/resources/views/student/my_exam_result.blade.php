@extends('layouts.app')


@section('content')

      <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Exam Result</h1>
          </div>       
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          @foreach ($getRecord as $value)      
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $value['exam_name'] }}</h3>
                <a class="btn btn-primary btn-sm" style="float:right;" target="_blank"
                href="{{ url('student/my_exam_result/print?exam_id='.$value['exam_id'].'$student_id='.Auth::
                user()->id) }}">Print</a>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead style="font-size: 12px; text-align:center; background-color:#3180FF; color:white;">
                    <tr>
                      <th colspan="12">ACADEMIC</th>
                    </tr>
                    <tr>
                      <th>SUBJECTS</th>
                      <th>RESUMPTION TEST</th>
                      <th>ASSIGNMENT</th>
                      <th>MID-TERM TEST</th>
                      <th>PROJECT</th>
                      <th>EXAM</th>
                      <th>TOTAL</th>
                      <th colspan="5">SUMMARY OF TERM'S WORK</th>
                    </tr>
                    <tr>
                      <th>SUBJECT NAME</th>
                      <th>MAX SCORE 10</th>
                      <th>MAX SCORE 10</th>
                      <th>MAX SCORE 10</th>
                      <th>MAX SCORE 10</th>
                      <th>MAX SCORE 60</th>
                      <th>MAX SCORE 100</th>
                      <th>CLASS HIGHEST SCORE</th>
                      <th>CLASS AVERAGE</th>
                      <th>POSITION</th>
                      <th>GRADE</th>
                      <th>REMARKS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $totalScore = 0;
                      $full_mark = 0;
                      // $resultValidation = 0;
                    @endphp
                    @foreach ($value['subject'] as $exam)
                    @php
                      $totalScore = $totalScore + $exam['totalScore'];
                      $full_mark = $full_mark + $exam['full_mark'];
                    @endphp
                       <tr>
                        <td style="width:300px;">{{ $exam['subject_name'] }}</td>
                        <td>{{ $exam['resumption_test'] }}</td>
                        <td>{{ $exam['assignment'] }}</td>
                        <td>{{ $exam['midterm_test'] }}</td>
                        <td>{{ $exam['project'] }}</td>
                        <td>{{ $exam['exam'] }}</td>
                        <td>{{ $exam['totalScore'] }}</td>
                        <td>{{ $exam['class_highest_score'] }}</td>
                        <td>{{ $exam['class_average'] }}</td>
                        <td>{{ $exam['position'] }}</td>         
                        <td>{{ $exam['getLoopGrade'] }}</td>
                        <td>
                          @if ($exam['totalScore'] >= 80)
                              <span style="color: green; font-weight:bold;">EXCELLENT</span>
                          @elseif ($exam['totalScore'] >= 75 && $exam['totalScore'] <= 79)
                              <span style="color: green; font-weight:bold;">VERY GOOD</span>
                          @elseif ($exam['totalScore'] >= 70 && $exam['totalScore'] <= 74)
                              <span style="color: yellow; font-weight:bold;">GOOD</span>
                          @elseif ($exam['totalScore'] >= 65 && $exam['totalScore'] <= 69)
                              <span style="color: blue; font-weight:bold;">CREDIT</span>
                          @elseif ($exam['totalScore'] >= 60 && $exam['totalScore'] <= 64)
                              <span style="color: blue; font-weight:bold;">CREDIT</span>
                          @elseif ($exam['totalScore'] >= 55 && $exam['totalScore'] <= 59)
                              <span style="color: blue; font-weight:bold;">CREDIT</span>
                          @elseif ($exam['totalScore'] >= 45 && $exam['totalScore'] <= 54)
                              <span style="color: blue; font-weight:bold;">PASS</span>
                          @elseif ($exam['totalScore'] >= 40 && $exam['totalScore'] <= 44)
                              <span style="color: blue; font-weight:bold;">PASS</span>
                          @else
                            {{-- @php
                              $resultValidation = 1;
                            @endphp --}}
                              <span style="color: red; font-weight:bold;
                              ">Fail</span>
                          @endif
                        </td> 
                       </tr>
                    @endforeach

                    <tr>
                      <td colspan="2">
                        <b>Grand Total : {{ $totalScore }}/{{ $full_mark }}</b>
                      </td>
                      <td colspan="2">
                        @php
                          $percent = ($totalScore * 100) / $full_mark;
                          $getGrade = App\Models\MarksGradeModel::getGrade($percent);
                        @endphp
                        <b>Percentage : {{ round($percent, 2) }}%</b>
                      </td> 
                      <td colspan="2">
                        <b>Grade : {{ $getGrade }}</b>
                      </td>
                      {{-- <td colspan="3">
                        <b>Result: 
                        @if ($resultValidation == 0)
                          <span style="color:green;">Pass</span>
                        @else
                          <span style="color:red;">Fail</span>
                        @endif
                      </b>
                      </td> --}}
                    </tr>
                  </tbody>
                </table>               
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>  
  </div>

@endsection

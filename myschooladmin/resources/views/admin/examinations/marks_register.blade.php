@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Marks Register</h1>
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
                                <h3 class="card-title">Search Marks Register</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Exam</label>
                                            <select class="form-control" name="exam_id" required>
                                                <option value="">Select</option>
                                                @foreach ($getExam as $exam)
                                                    <option {{ (Request::get('exam_id') == $exam->id) ? 'selected' : '' }} value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Class</label>
                                            <select class="form-control" name="class_id" required>
                                                <option value="">Select</option>
                                                @foreach ($getClass as $class)
                                                    <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/examinations/marks_register') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('_message')

                            {{ csrf_field() }}
                            <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                            <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">


                        @if(!@empty($getSubject) && !empty($getSubject->count()))
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Marks Register</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>STUDENT NAME</th>
                                            @foreach($getSubject as $subject)
                                            <th>{{ $subject->subject_name }} <br />
                                                ({{ $subject->subject_type }} : {{ $subject->passing_mark }} / {{ $subject->full_mark }})                                              
                                            
                                            </th>
                                            @endforeach
                                            <th>ACTION</th>                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if(!empty($getStudent) && !empty($getStudent->count()))
                                       @foreach($getStudent as $student)
                                       <form name="post" class="SubmitForm">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                                        <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                                        <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                                       <tr>
                                        <td>{{ $student->name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                                        @php
                                            $i = 1;
                                            $totalStudentMark = 0;
                                            $totalFullMark = 0;
                                            $totalPassingMark = 0;
                                            $pass_fail_vali = 0;
                                        @endphp
                                        @foreach ($getSubject as $subject)

                                        @php
                                            $totalMark = 0;
                                            $totalFullMark = $totalFullMark + $subject->full_mark;
                                            $totalPassingMark = $totalPassingMark + $subject->passing_mark;

                                            $getMark = $subject->getMark($student->id, Request::get('exam_id'), Request::get('class_id'), $subject->subject_id);
                                            
                                            if(!empty($getMark))
                                            {
                                                $totalMark = $getMark->attendance + $getMark->cat_one + $getMark->cat_two + $getMark->exam;
                                            }

                                            $totalStudentMark = $totalStudentMark+$totalMark;
                                        @endphp

                                        <td>
                                            <div style="margin-bottom: 10px;">
                                                Attendance
                                                <input type="hidden" name="mark[{{ $i }}][full_mark]" value="{{ $subject->full_mark }}">
                                                <input type="hidden" name="mark[{{ $i }}][passing_mark]" value="{{ $subject->passing_mark }}">
                                                <input type="hidden" name="mark[{{ $i }}][id]" value="{{ $subject->id }}">
                                                <input type="hidden" name="mark[{{ $i }}][subject_id]" value="{{ $subject->subject_id }}">
                                                <input type="text" name="mark[{{ $i }}][attendance]" style="width: 200px;" id="attendance_{{ $student->id }}{{ $subject->subject_id }}" placeholder="Enter Marks" value="{{ !empty($getMark->attendance) ? $getMark->attendance : '' }}" class="form-control">
                                            </div>

                                            <div style="margin-bottom: 10px;">

                                                CAT 1
                                                <input type="text" name="mark[{{ $i }}][cat_one]" style="width: 200px;" id="cat_one_{{ $student->id }}{{ $subject->subject_id }}" placeholder="Enter Marks" value="{{ !empty($getMark->cat_one) ? $getMark->cat_one : '' }}" class="form-control">
                                            </div>

                                            <div>
                                                CAT 2
                                                <input type="text" name="mark[{{ $i }}][cat_two]" style="width: 200px;" id="cat_two_{{ $student->id }}{{ $subject->subject_id }}" placeholder="Enter Marks" value="{{ !empty($getMark->cat_two) ? $getMark->cat_two : '' }}" class="form-control">
                                            </div>

                                            <div style="margin-bottom: 10px;">
                                                Exam
                                                <input type="text" name="mark[{{ $i }}][exam]" style="width: 200px;" id="exam_{{ $student->id }}{{ $subject->subject_id }}" placeholder="Enter Marks" value="{{ !empty($getMark->exam) ? $getMark->exam : '' }}" class="form-control">
                                            </div>

                                            <div style="margin-bottom: 10px;">
                                                <button type="button" class="btn btn-primary SaveSingleSubject" id="{{ $student->id }}" data-val="{{ $subject->subject_id }}" data-exam="{{ Request::get('exam_id') }}" 
                                                     data-schedule="{{ $subject->id }}" data-class="{{ Request::get('class_id') }}">Save</button>
                                            </div>
                                            @if(!@empty($getMark))
                                            <div style="margin-bottom: 10px;">
                                                <b>Total Mark :</b> {{ $totalMark }} <br />
                                                <b>Passing Mark :</b> {{ $subject->passing_mark }} <br >
                                                @php
                                                    $getLoopGrade = App\Models\MarksGradeModel::getGrade($totalMark);
                                                @endphp   
                                                @if (!@empty($getLoopGrade))
                                                <b>Grade :</b> {{ $getLoopGrade }} <br >
                                                @endif 
                                                @if($totalMark >= $subject->passing_mark)
                                                    Result : <span style="color: green; font-weight: bold;">Pass</span>
                                                @else
                                                    Result : <span style="color: red; font-weight: bold;">Fail</span>
                                                    @php
                                                        $pass_fail_vali = 1;
                                                    @endphp
                                                @endif
                                            </div>
                                            @endif
                                        </td> 
                                        @php
                                            $i++;
                                        @endphp                                         
                                        @endforeach
                                        <td style="min-width: 250px;">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            @if(!@empty($totalStudentMark))
                                                <br >
                                                <br >
                                                <b>Total Subject Mark :</b> {{ $totalFullMark }}
                                                <br >
                                                <b>Total Passing Mark :</b> {{ $totalPassingMark }}
                                                <br >
                                                <b>Total Student Mark :</b> {{ $totalStudentMark }}
                                                <br />
                                                @php
                                                    $percent = ($totalStudentMark * 100) / $totalFullMark;
                                                    $getGrade = App\Models\MarksGradeModel::getGrade($percent);
                                                @endphp
                                                <br >
                                                <b>Percentage :</b>{{ round($percent,2) }}%
                                                <br >
                                                @if (!empty($getGrade))
                                                <b>Grade : </b>{{ $getGrade }}
                                                <br >  
                                                @endif
                                                @if ($pass_fail_vali == 0)
                                                    Result :<span style="color: green; font-weight: bold;">Pass</span>
                                                @else
                                                Result :<span style="color: red; font-weight: bold;">Fail</span>
                                                @endif
                                            @endif
                                        </td>
                                       </tr>
                                    </form>
                                       @endforeach
                                       @endif
                                    </tbody>     
                                </table>
                            </div>
                        </div>
                        @endif

                      
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

@section('script')

<script type="text/javascript">
  $('.SubmitForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST", 
        url: "{{ url('admin/examinations/submit_marks_register') }}",
        data: $(this).serialize(),
        dataType: "json", 
        success: function(data) {
            alert(data.message);
        }
    });
  });

  $('.SaveSingleSubject').click(function(e) {
    var student_id = $(this).attr('id');
    var subject_id = $(this).attr('data-val');
    var exam_id = $(this).attr('data-exam');
    var class_id = $(this).attr('data-class');
    var id = $(this).attr('data-schedule');
    var attendance = $('#attendance_'+student_id+subject_id).val();
    var cat_one = $('#cat_one_'+student_id+subject_id).val();
    var cat_two = $('#cat_two_'+student_id+subject_id).val();
    var exam = $('#exam_'+student_id+subject_id).val();
    

    $.ajax({
        type: "POST", 
        url: "{{ url('admin/examinations/single_submit_marks_register') }}", 
        data: {
            "_token" : "{{ csrf_token() }}",
            id : id,
            student_id : student_id,
            subject_id : subject_id,
            exam_id : exam_id,
            class_id : class_id,
            attendance : attendance,
            cat_one : cat_one,
            cat_two : cat_two,
            exam : exam

        },
        dataType : "json",
        success : function(data) {
            alert(data.message);
        }
    });
  });

</script>

@endsection
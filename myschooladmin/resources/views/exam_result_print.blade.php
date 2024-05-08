<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Exam Result</title>
    <style type="text/css">
        @page {
            size: 8.3in 11.7in;
        }
        @page {
            size: A4;
        }

        .margin-bottom
        {
            margin-bottom: 3px;
        }

        @media print{
            @page {
                margin: 0px;
                margin-left: 20px;
                margin-right: 20px;
            }
        }          
    
        .table-bg {
            border-collapse: collapse;
            max-width: 83vw;
            font-size: 15px;
            text-align: center;
        }

        .table-sm {
            border-collapse: collapse;
            min-width: 13vw;
            font-size: 15px;   
            text-align: center;
            float: right;
        }

        .th {
            border: 1px solid white;
            padding: 10px;
        }
        .td {
            border: 1px solid #000;
            padding: 3px;
        }
        .text-container {
            text-align: left;
            padding-left: 5px;
        }

    </style>
        


</head>
<body>
    <div id="page">
        <table style="width: 90vw; text-align:center;">
            <tr>
                <td width="1vw"></td>
                <td width="3vw"><img style="width: 7vw;" 
                    src="http://localhost/school-management-system/myschooladmin/upload/setting/20240325012242vdvmvsmpov.jpg" 
                    alt=""></td>
                <td>
                    <h1>MODERN IDEAL COLLEGE, ENUGU</h1>
                    <h3>CAMPUSES: ABAKPA, EMENE, NIKE</h3> 
                    <h4>www.micenugu.edu.ng</h4>
                </td>
            </tr>
        </table>

        <table style="width:100vw">
            <tr>
                <td width="0.1vw"></td>
                <td width="70vw">
                    <table class="margin-bottom" style="width: 83vw; font-weight:bold;">
                        <tbody>
                            <tr>
                                <td width="10vw">NAME OF STUDENT</td>
                                <td style="border-bottom:1px solid; width:20vw;">{{ $getStudent->name }} {{ $getStudent->middle_name }} {{ $getStudent->last_name }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="margin-bottom" style="width: 80vw; font-weight:bold;">
                        <tbody>
                            <tr>
                                <td width="15vw">ADMISSION NO</td>
                                <td style="border-bottom:1px solid; width:10vw;">{{ $getStudent->admission_number }}</td>
                                <td width="7vw">CLASS</td>
                                <td style="border-bottom:1px solid; width:11vw;">{{ $getClass->class_name }}</td>
                                <td width="15vw">CLASS AVERAGE</td>
                                <td style="border-bottom:1px solid; width:7vw;"></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="margin-bottom" style="width: 80vw; font-weight:bold;">
                        <tbody>
                            <tr>
                                <td width="5vw;">SEX</td>
                                <td style="border-bottom:1px solid; width:8.3vw;">{{ $getStudent->gender }}</td>
                                <td width="8vw">NO. IN ClASS</td>
                                <td style="border-bottom:1px solid; width:7vw;">{{ $TotalClass }}</td>
                                <td width="8vw">CLASS LOWEST AVERAGE</td>
                                <td style="border-bottom:1px solid; width:3.4vw;"></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="margin-bottom" style="width: 80vw; font-weight:bold;">
                        <tbody>
                            <tr>
                                <td width="3vw;">YEAR</td>
                                <td style="border-bottom:1px solid; width:7vw;">{{ $getExam->name }}</td>
                                <td width="8vw;">TERM</td>
                                <td style="border-bottom:1px solid; width:6.3vw;">{{ $getExam->name }}</td>
                                <td width="8vw;">CLASS HIGHEST AVERAGE</td>
                                <td style="border-bottom:1px solid; width:3vw;"></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="margin-bottom" style="width: 80vw; font-weight:bold;">
                        <tbody>
                            <tr>
                                <td width="4vw;">AGE</td>
                                <td style="border-bottom:1px solid; width:16vw;">{{ $getStudent->getAge() }}</td>
                                <td width="3vw">POSITION</td>
                                <td style="border-bottom:1px solid; width:12.6vw;"></td>
                                <td width="4vw">AVERAGE</td>
                                <td style="border-bottom:1px solid; width:9.5vw;"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="50vw"></td>
                <td min-width="20vw" valign="top">
                    <img src="{{ $getStudent->getProfileDirect() }}" 
                        alt="" style="border-radius:1.5vw;" height="150vw;" width="150vw;">
                </td>
            </tr>
        </table>
        
        <br>

        <div>
            <table class="table-sm">
                <thead style="font-size: 15px; text-align:center; background-color:#3180FF; color:white;">
                    <tr>
                        <th class="th" colspan="6">SKILL & BEHAVIOUR</th>
                    </tr>
                        
                </thead>
                    <tbody style="font-weight: bold;">
                        <tr>
                            <td class="td"></td>
                            <td class="td">5</td>
                            <td class="td">4</td>
                            <td class="td">3</td>
                            <td class="td">2</td>
                            <td class="td">1</td>
                          </tr>
                          <tr>
                            <td class="td text-container">PUNCTUALITY</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">ATTENDANCE</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">PUNCTUALITY</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">INITIATIVE</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">PERSEVERENCE</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">ASSIGNMENT</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">ORGANISATION</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">NEATNESS</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">POLITENESS</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">HONESTY</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">SELF CONTROL</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">CO-OPERATION</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">RESPONSIBILITY</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">PUBLIC SPEAKING</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">HANDWRITING</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">DRAWING</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">PAINTING</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">SCULPTURE</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">MUSICAL</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">GAMES</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">SPORTS</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                          </tr>
                          <tr>
                            <td class="td text-container">GYMNASTICS</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                        </tr>
                        
                    </tbody>

                </table>

            </div>

            <div>
                <table class="table-bg">
                    <thead style="font-size: 15px; text-align:center; background-color:#3180FF; color:white;">
                      <tr>
                        <th class="th" colspan="12">ACADEMIC</th>
                      </tr>
                      <tr>
                        <th class="th">SUBJECTS</th>
                        <th class="th">RESUMPTION TEST</th>
                        <th class="th">ASSIGNMENT</th>
                        <th class="th">MID-TERM TEST</th>
                        <th class="th">PROJECT</th>
                        <th class="th">EXAM</th>
                        <th class="th">TOTAL</th>
                        <th class="th" colspan="5">SUMMARY OF TERM'S WORK</th>
                      </tr>
                      <tr>
                        <th class="th">SUBJECT NAME</th>
                        <th class="th">MAX SCORE 10</th>
                        <th class="th">MAX SCORE 10</th>
                        <th class="th">MAX SCORE 10</th>
                        <th class="th">MAX SCORE 10</th>
                        <th class="th">MAX SCORE 60</th>
                        <th class="th">MAX SCORE 100</th>
                        <th class="th">CLASS HIGHEST SCORE</th>
                        <th class="th">CLASS AVERAGE</th>
                        <th class="th">POSITION</th>
                        <th class="th">GRADE</th>
                        <th class="th">REMARKS</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                          $totalScore = 0;
                          $full_mark = 0;
                          // $resultValidation = 0;
                        @endphp
                        @foreach ($getExamMark as $exam)
                        {{-- @php
                          $totalScore = $totalScore + $exam['totalScore'];
                          $full_mark = $full_mark + $exam['full_mark'];
                        @endphp --}}
                           <tr>
                            <td class="td" style="width:200px; text-align:left; font-size:16px;">{{ $exam['subject_name'] }}</td>
                            <td class="td" style="width:100px;">{{ $exam['resumption_test'] }}</td>
                            <td class="td">{{ $exam['assignment'] }}</td>
                            <td class="td">{{ $exam['midterm_test'] }}</td>
                            <td class="td">{{ $exam['project'] }}</td>
                            <td class="td">{{ $exam['exam'] }}</td>
                            <td class="td">{{ $exam['totalScore'] }}</td>
                            <td class="td">{{ $exam['class_highest_score'] }}</td>
                            <td class="td">{{ $exam['class_average'] }}</td>
                            <td class="td">{{ $exam['position'] }}</td>         
                            <td class="td">{{ $exam['getLoopGrade'] }}</td>
                            <td class="td">
                              @if ($exam['totalScore'] >= 80)
                                  <span style="color: green; font-weight:bold;">EXCELLENT</span>
                              @elseif ($exam['totalScore'] >= 75 && $exam['totalScore'] <= 79)
                                  <span style="color: green; font-weight:bold;">VERY GOOD</span>
                              @elseif ($exam['totalScore'] >= 70 && $exam['totalScore'] <= 74)
                                  <span style="color: amber; font-weight:bold;">GOOD</span>
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
    
                        {{-- <tr>
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
                          <td colspan="3">
                            <b>Result: 
                            @if ($resultValidation == 0)
                              <span style="color:green;">Pass</span>
                            @else
                              <span style="color:red;">Fail</span>
                            @endif
                          </b>
                          </td>
                        </tr> --}}
                      </tbody>
                  </table>

            </div>

           

            <div style="text-align: center;">
                <h3>SENIOR SECONDARY SCHOOL<br>[GRADING KEY: 80-100(EXCELLENT); 75-79(VERY GOOD); 60-64(CREDIT); 45-54(PASS); 40-44(PASS); 0-39(FAIL)]</h3>
                <h3>JUNIOR SECONDARY SCHOOL<br>[GRADING KEY: 70-100(EXCELLENT); 60-69(VERY GOOD); 55-59(CREDIT); 40-54(PASS); 0-39(FAIL)]</h3>
            </div>
            
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


            <table style="width:100vw;">
                <tr>
                    <td width="0.1vw;"></td>
                    <td width="90vw;">
                        <table class="margin-bottom" style="width: 60vw; font-weight:bold;">
                            <tbody>
                                <tr>
                                    <td width="4vw;">FORM TEACHER/PHONE NO.</td>
                                    <td style="border-bottom:1px solid; width:2vw;"></td>
                                    <td width="4vw;">NEXT TERM BEGINS</td>
                                    <td style="border-bottom:1px solid; width:6vw;"></td>
                                </tr>
                            </tbody>
                        </table>
    
                        <table class="margin-bottom" style="width: 60vw; font-weight:bold;">
                            <tbody>
                                <tr>
                                    <td width="4vw;">FORM TEACHER'S REMARK</td>
                                    <td style="border-bottom:1px solid; width:4vw;"></td>
                                    <td width="4.3vw;">NEXT TERM SCHOOL FEES</td>
                                    <td style="border-bottom:1px solid; width:5.1vw;"></td>
                                </tr>
                            </tbody>
                        </table>
    
                        <table class="margin-bottom" style="width: 50vw; font-weight:bold;">
                            <tbody>
                                <tr>
                                    <td width="10vw;">PRINCIPAL/DATE</td>
                                    <td style="border-bottom:1px solid; width:20vw;"></td>
                                    
                                </tr>
                            </tbody>
                        </table>  
                    </td>
                </tr>
            </table>
            


            

           

            
    </div>

    <script type="text/javascript">
        // window.print();
    </script>
</body>
</html>
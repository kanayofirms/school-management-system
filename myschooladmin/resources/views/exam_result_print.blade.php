<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Exam Result</title>
    <style type="text/css" media="print">
        @page {
            size:  11.7in 8.3in;
        }
        @page {
            size: A4 landscape;
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
                size: landscape;
            
            },
            .table-bg,
            .table-sm {
                margin: 0px;
                
            }
        }          
    
        .table-bg {
            border-collapse: collapse;
            width: 80%;
            font-size: 15px;
            text-align: center;
        }

        .table-sm {
            border-collapse: collapse;
            width: 16%;
            font-size: 13px;   
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
        <table style="width: 90%; text-align:center;">
            <tr>
               
                <td style="line-height:2%;">
                    <h1>{!! $getSetting->school_name !!}</h1>
                    <h3>{!! $getSetting->location !!}</h3> 
                    <h4>{!! $getSetting->website !!}</h4>
                </td>
            </tr>
        </table>

        <table style="width:100%">
            <tr>
                <td width="0.1%"></td>
                <table class="margin-bottom" style="width: 55%; float: right;">
                    <tbody>
                        <tr>
                            {{-- <td width="2%"></td> --}}
                            <td><img style="width: 18%;" 
                            src="{{ $getSetting->getLogo() }}" 
                            alt="">
                            </td>
                        </tr>  
                    </tbody>
                </table>


                <td width="70%">
                    <table class="margin-bottom" style="width: 40%; font-weight:bold; font-size:15px;">
                        <tbody>
                            <tr>
                                <td width="10%">NAME OF STUDENT</td>
                                <td style="border-bottom:1px solid; width:30%;">{{ $getStudent->name }} 
                                    {{ $getStudent->middle_name }} {{ $getStudent->last_name }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="margin-bottom" style="width: 55%;">
                        <tbody>
                            <tr>
                                <td width="0.5%"></td>
                                <td width="10%" valign="top" style="float: right;">
                                    <img src="{{ $getStudent->getProfileDirect() }}" 
                                        alt="" style="border-radius:10%;" height="120px;" width="120px;">
                                </td>
                            </tr>  
                        </tbody>
                    </table>

                    <table class="margin-bottom" style="width: 40%; font-weight:bold; font-size:15px;">
                        <tbody>
                            <tr>
                                <td width="8%">ADMISSION NO</td>
                                <td style="border-bottom:1px solid; width:15%;">{{ $getStudent->admission_number }}</td>
                                <td width="4%">CLASS</td>
                                <td style="border-bottom:1px solid; width:16%;">{{ $getClass->class_name }}</td>
                                {{-- <td width="8%">CLASS AVERAGE</td>
                                <td style="border-bottom:1px solid; width:17%;">{{ Round($avgClass->avg('subject_average'),2) }}</td> --}}
                            </tr>
                        </tbody>
                    </table>

                    <table class="margin-bottom" style="width: 40%; font-weight:bold; font-size:15px;">
                        <tbody>
                            <tr>
                                <td width="3%;">SEX</td>
                                <td style="border-bottom:1px solid; width:5.9%;">{{ $getStudent->gender }}</td>
                                <td width="2.2%">NO. IN ClASS</td>
                                <td style="border-bottom:1px solid; width:5.1%;">{{ $TotalClass }}</td>
                                {{-- <td width="4%">CLASS LOWEST AVERAGE</td>
                                <td style="border-bottom:1px solid; width:5%;">{{ Round($avgClass->min('subject_average'),2) }}</td> --}}
                            </tr>
                        </tbody>
                    </table>

                    <table class="margin-bottom" style="width: 40%; font-weight:bold; font-size:15px;">
                        <tbody>
                            <tr>
                                <td width="2.1%;">YEAR</td>
                                <td style="border-bottom:1px solid; width:4.5%;">{{ $getExam->name }}</td>
                                <td width="0.5%;">TERM</td>
                                <td style="border-bottom:1px solid; width:4.8%;">{{ $getExam->name }}</td>
                                {{-- <td width="3%;">CLASS HIGHEST AVERAGE</td>
                                <td style="border-bottom:1px solid; width:4%;">{{ Round($avgClass->max('subject_average'),2) }}</td> --}}
                            </tr>
                        </tbody>
                    </table>

                    <table class="margin-bottom" style="width: 40%; font-weight:bold; font-size:15px;">
                        <tbody>
                            <tr>
                                <td width="3.7%;">AGE</td>
                                <td style="border-bottom:1px solid; width:7.2%;">{{ $getStudent->getAge() }}</td>
                                <td width="1%">POSITION</td>
                                <td style="border-bottom:1px solid; width:6.7%;">{{ $avgClass->search(fn($dt) =>$dt->student_id === $getStudent->id) + 1 }}</td>
                                {{-- <td width="1%">AVERAGE</td>
                                <td style="border-bottom:1px solid; width:9%;">{{ Round($avgClass->firstWhere('student_id', $getStudent->id)?->subject_average,2) }}</td> --}}
                            </tr>

                           

                            
                        </tbody>
                    </table>

   
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
                            <td class="td" style="width:200px; text-align:left; font-size:16px; font-weight:bold;">{{ $exam['subject_name'] }}</td>
                            <td class="td" style="width:100px; font-weight:bold;">{{ $exam['resumption_test'] }}</td>
                            <td class="td" style="width:100px; font-weight:bold;">{{ $exam['assignment'] }}</td>
                            <td class="td" style="width:100px; font-weight:bold;">{{ $exam['midterm_test'] }}</td>
                            <td class="td" style="width:100px; font-weight:bold;">{{ $exam['project'] }}</td>
                            <td class="td" style="width:100px; font-weight:bold;">{{ $exam['exam'] }}</td>
                            <td class="td" style="width:110px; font-weight:bold;">{{ $exam['totalScore'] }}</td>
                            <td class="td" style="width:145px; font-weight:bold;">{{ $exam['class_highest_score'] }}</td>
                            <td class="td" style="width:100px; font-weight:bold;">{{ $exam['class_average'] }}</td>
                            <td class="td" style="width:100px; font-weight:bold;">{{ $exam['position'] }}</td>         
                            <td class="td" style="width:100px; font-weight:bold;">{{ $exam['getLoopGrade'] }}</td>
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
                                  <span style="color: red; font-weight:bold;
                                  ">Fail</span>
                              @endif
                            </td> 
                           </tr>
                        @endforeach
    
                      </tbody>
                  </table>

            </div>

           <br>

            <div style="text-align: center; line-height: 2%; font-size:14px;">
                <h3>{!! $getSetting->exam_description !!}</h3>
            </div>
            
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            

            <table style="width:100%;">
                <tr>
                    <td width="0.1%;"></td>
                    <td width="100%;">
                        <table class="margin-bottom" style="width: 65%; font-weight:bold;">
                            <tbody>
                                <tr>
                                    <td width="1.5%;">FORM TEACHER/PHONE NO.</td>
                                    <td style="border-bottom:1px solid; width:2%;"></td>
                                    <td width="1.2%;">NEXT TERM BEGINS</td>
                                    <td style="border-bottom:1px solid; width:2%;"></td>
                                </tr>
                            </tbody>
                        </table>
    
                        <table class="margin-bottom" style="width: 65%; font-weight:bold;">
                            <tbody>
                                <tr>
                                    <td width="2.5%;">FORM TEACHER'S REMARK</td>
                                    <td style="border-bottom:1px solid; width:3.3%;"></td>
                                    <td width="2.3%;">NEXT TERM SCHOOL FEES</td>
                                    <td style="border-bottom:1px solid; width:3%;"></td>
                                </tr>
                            </tbody>
                        </table>
    
                        <table class="margin-bottom" style="width: 65%; font-weight:bold;">
                            <tbody>
                                <tr>
                                    <td width="2%;">PRINCIPAL/DATE</td>
                                    <td style="border-bottom:1px solid; width:20%;"></td>
                                    
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
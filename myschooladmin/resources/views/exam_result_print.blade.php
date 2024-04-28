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
            min-width: 80vw;
            font-size: 15px;
            text-align: center;
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
                        <h1>MODERN IDEAL COLLEGE, ENUGU <br>CAMPUSES : ABAKPA, EMENE, NIKE</h1>
                        <p>www.micenugu.edu.ng</p>
                    </td>
                </tr>
            </table>

            <table style="width:100vw">
                    <tr>
                        <td width="0.1vw"></td>
                        <td width="70vw">
                            <table class="margin-bottom" style="width: 83vw;">
                                <tbody>
                                    <tr>
                                        <td width="10vw">NAME OF STUDENT</td>
                                        <td style="border-bottom:1px solid; width:20vw;"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="margin-bottom" style="width: 80vw;">
                                <tbody>
                                    <tr>
                                        <td width="7vw">ADMISSION NO</td>
                                        <td style="border-bottom:1px solid; width:14vw;"></td>
                                        <td width="7vw">CLASS</td>
                                        <td style="border-bottom:1px solid; width:16vw;"></td>
                                        <td width="17vw">CLASS AVERAGE</td>
                                        <td style="border-bottom:1px solid; width:5vw;"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="margin-bottom" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="6%">SEX</td>
                                        <td style="border-bottom:1px solid; width:17%;"></td>
                                        <td width="5%">NO.IN ClASS</td>
                                        <td style="border-bottom:1px solid; width:14%;"></td>
                                        <td width="10%">CLASS HIGHEST AVERAGE</td>
                                        <td style="border-bottom:1px solid; width:7%;"></td>
                                        
                                    </tr>
                                </tbody>
                            </table>

                            <table class="margin-bottom" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="5%">YEAR</td>
                                        <td style="border-bottom:1px solid; width:17.9%;"></td>
                                        <td width="5%">TERM</td>
                                        <td style="border-bottom:1px solid; width:14.1%;"></td>
                                        <td width="10%">CLASS LOWEST AVERAGE</td>
                                        <td style="border-bottom:1px solid; width:7%;"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="margin-bottom" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="4%">AGE</td>
                                        <td style="border-bottom:1px solid; width:16%;"></td>
                                        <td width="3%">POSITION</td>
                                        <td style="border-bottom:1px solid; width:12.5%;"></td>
                                        <td width="4%">AVERAGE</td>
                                        <td style="border-bottom:1px solid; width:10%;"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="margin-bottom" style="width: 50%;">
                                <tbody>
                                    <tr>
                                        <td width="5%">TOTAL SCORE</td>
                                        <td style="border-bottom:1px solid; width:20%;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="5%"></td>
                        <td width="20%" valign="top">
                            <img src="http://localhost/school-management-system/myschooladmin/upload/profile/20231226114824emxqpx2ja4itvffoz2pg.jpg" 
                            alt="" style="border-radius:6px;" height="100px" width="100px">
                        </td>
                    </tr>
            </table>

            <br>

            <div>
                <table class="table-bg">
                    <thead style="font-size: 12px; text-align:center; background-color:#3180FF; color:white;">
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
                        <tr>
                          <td class="td text-container">Mathematics</td>
                          <td class="td">10</td>
                          <td class="td">5</td>
                          <td class="td">5</td>
                          <td class="td">67</td>
                          <td class="td">87</td>
                          <td class="td">5</td>
                          <td class="td">67</td>
                          <td class="td">87</td>
                          <td class="td">40</td>
                          <td class="td">100</td>
                          <td class="td">
                            <span style="color: green; font-weight:bold;">Pass</span>
                            </td>
                        </tr>   

                        <tr>
                          <td class="td text-container">Mathematics</td>
                          <td class="td">10</td>
                          <td class="td">5</td>
                          <td class="td">5</td>
                          <td class="td">67</td>
                          <td class="td">87</td>
                          <td class="td">5</td>
                          <td class="td">67</td>
                          <td class="td">87</td>
                          <td class="td">40</td>
                          <td class="td">100</td>
                          <td class="td">
                            <span style="color: green; font-weight:bold;">Pass</span>
                            </td>
                        </tr> 
                        
                        <tr>
                            <td class="td text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">40</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">100</td>
                            <td class="td">
                              <span style="color: green; font-weight:bold;">Pass</span>
                              </td>
                          </tr>   

                          <tr>
                            <td class="td text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">40</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">100</td>
                            <td class="td">
                              <span style="color: green; font-weight:bold;">Pass</span>
                              </td>
                          </tr>   

                          <tr>
                            <td class="td text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">40</td>
                            <td class="td">100</td>
                            <td class="td">
                              <span style="color: green; font-weight:bold;">Pass</span>
                              </td>
                          </tr>   

                          <tr>
                            <td class="td text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">40</td>
                            <td class="td">100</td>
                            <td class="td">
                              <span style="color: green; font-weight:bold;">Pass</span>
                              </td>
                          </tr>   

                          <tr>
                            <td class="td text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">40</td>
                            <td class="td">100</td>
                            <td class="td">
                              <span style="color: green; font-weight:bold;">Pass</span>
                              </td>
                          </tr>   

                          <tr>
                            <td class="td text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">40</td>
                            <td class="td">100</td>
                            <td class="td">
                              <span style="color: green; font-weight:bold;">Pass</span>
                              </td>
                          </tr>   

                          <tr>
                            <td class="td text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">40</td>
                            <td class="td">100</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">
                              <span style="color: green; font-weight:bold;">Pass</span>
                              </td>
                          </tr>   

                          <tr>
                            <td class="td text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">5</td>
                            <td class="td">67</td>
                            <td class="td">87</td>
                            <td class="td">40</td>
                            <td class="td">100</td>
                            <td class="td">
                              <span style="color: green; font-weight:bold;">Pass</span>
                              </td>
                          </tr> 
                          

                          
                    </tbody>
                  </table>

            </div>

            <div style="text-align: center; ">
                <h3>SENIOR SECONDARY SCHOOL</h3>
                <p>                
                    [GRADING KEY: 80-100(EXCELLENT); 75-79(VERY GOOD); 60-64(CREDIT); 45-54(PASS); 40-44(PASS); 0-39(FAIL)]
                </p>
                <h3>JUNIOR SECONDARY SCHOOL</h3>
                <p>                  
                    [GRADING KEY: 70-100(EXCELLENT); 60-69(VERY GOOD); 55-59(CREDIT); 40-54(PASS); 0-39(FAIL)]
                </p>
            </div>

            <table class="margin-bottom" style="width: 100%">
                <tbody>
                    <tr>
                        <td width="3%">FORM TEACHER/PHONE NO.</td>
                        <td style="border-bottom:1px solid; width:5%;"></td>
                        <td width="3%">NEXT TERM BEGINS</td>
                        <td style="border-bottom:1px solid; width:7%;"></td>
                    </tr>
                </tbody>
            </table>

            <table class="margin-bottom" style="width: 100%">
                <tbody>
                    <tr>
                        <td width="4%">FORM TEACHER'S REMARK</td>
                        <td style="border-bottom:1px solid; width:7.5%;"></td>
                        <td width="4.3%">NEXT TERM SCHOOL FEES</td>
                        <td style="border-bottom:1px solid; width:10%;"></td>
                    </tr>
                </tbody>
            </table>

            <table class="margin-bottom" style="width: 100%">
                <tbody>
                    <tr>
                        <td width="3.7%">PRINCIPAL/DATE</td>
                        <td style="border-bottom:1px solid; width:7.5%;"></td>
                        <td width="4%">NEXT TERM SCHOOL FEES</td>
                        <td style="border-bottom:1px solid; width:10%;"></td>
                    </tr>
                </tbody>
            </table>
    </div>

    <script type="text/javascript">
        // window.print();
    </script>
</body>
</html>
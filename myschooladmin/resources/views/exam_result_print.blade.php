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


    </style>
        
        {{-- 
    
        .table-bg {
            border-collapse: collapse;
            width: 100%;
            font-size: 15px;
            text-align: center;
        }
        .th {
            border: 1px solid #000;
            padding: 10px;
        }
        .td {
            border: 1px solid #000;
            padding: 3px;
        }
        .text-container {
            text-align: left;
            padding-left: 5px;
        } --}}

</head>
<body>
    <div id="page">
            <table style="width: 100%; text-align:center;">
                <tr>
                    <td width="5%"></td>
                    <td width="15%"><img style="width: 110px;" 
                        src="http://localhost/school-management-system/myschooladmin/upload/setting/20240325012242vdvmvsmpov.jpg" 
                        alt=""></td>
                    <td align="left">
                        <h1>MODERN IDEAL COLLEGE, ENUGU</h1>
                        <h3>CAMPUSES : ABAKPA, EMENE, NIKE</h3>
                        <h4>www.micenugu.edu.ng</h4>
                    </td>
                </tr>
            </table>

            <table style="width:100%">
                    <tr>
                        <td width="5%"></td>
                        <td width="70%">
                            <table class="margin-bottom" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="27%">Name Of Student : </td>
                                        <td style="border-bottom:1px solid; width:100%;"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="margin-bottom" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="23%">Admission No : </td>
                                        <td style="border-bottom:1px solid; width:100%;"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="margin-bottom" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="23%">Class : </td>
                                        <td style="border-bottom:1px solid; width:100%;"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="margin-bottom" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="28%">Academic Session : </td>
                                        <td style="border-bottom:1px solid; width:20%;"></td>
                                        <td width="11%">Term : </td>
                                        <td style="border-bottom:1px solid; width:80%;"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="margin-bottom" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="19%">Total Score : </td>
                                        <td style="border-bottom:1px solid; width:50%;"></td>
                                        <td width="16%">Average : </td>
                                        <td style="border-bottom:1px solid; width:50%;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="5%"></td>
                        <td width="20%" valign="top">
                            <img src="http://localhost/school-management-system/myschooladmin/upload/profile/20231226114824emxqpx2ja4itvffoz2pg.jpg" 
                            alt="" style="border-radius:6px;" height="100px" width="100px">
                            <br>
                            Gender : Male
                        </td>
                    </tr>
            </table>

            {{-- <br>
            <div>
                <table class="table-bg">
                    <thead>
                      <tr>
                        <th class="th">Subject Name</th>
                        <th class="th">Attendance</th>
                        <th class="th">CAT 1</th>
                        <th class="th">CAT 2</th>
                        <th class="th">Exam</th>
                        <th class="th">Total Score</th>
                        <th class="th">Passing Mark</th>
                        <th class="th">Full Mark</th>
                        <th class="th">Result</th>
  
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td class="td" "text-container">Mathematics</td>
                          <td class="td">10</td>
                          <td class="td">5</td>
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
                          <td class="td" "text-container">Mathematics</td>
                          <td class="td">10</td>
                          <td class="td">5</td>
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
                            <td class="td" "text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
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
                            <td class="td" "text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
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
                            <td class="td" "text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
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
                            <td class="td" "text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
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
                            <td class="td" "text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
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
                            <td class="td" "text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
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
                            <td class="td" "text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
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
                            <td class="td" "text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
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
                            <td class="td" "text-container">Mathematics</td>
                            <td class="td">10</td>
                            <td class="td">5</td>
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
                            <td colspan="2">
                              <b>Grand Total : 478/600</b>
                            </td>
                            <td colspan="2">
                                <b>Percentage : 79.67%</b>
                            </td> 
                            <td colspan="2">
                              <b>Grade : B</b>
                            </td>
                            <td colspan="3">
                              <b>Result: 
                                <span style="color:green;">Pass</span>
                                </b>
                            </td>
                          </tr>
                    </tbody>
                  </table>

            </div>

            <div>
                <p>
                    Merchants using SeerBit can receive payments in 13 currencies like GBP, CAD, and USD, 
                    so if you have international customers, SeerBit has you covered. 
                    There are no setup fees, but it charges 1.5% and 3.8% of the transaction fee 
                    for local and international transactions, respectively.
                </p>
            </div>

            <table class="margin-bottom" style="width: 50%">
                <tbody>
                    <tr>
                        <td width="10%">Signature : </td>
                        <td style="border-bottom:1px solid; width:40%;"></td>
                    </tr>
                </tbody>
            </table>
    </div> --}}

    <script type="text/javascript">
        // window.print();
    </script>
</body>
</html>
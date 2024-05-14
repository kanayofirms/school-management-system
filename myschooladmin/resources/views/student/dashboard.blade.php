@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   <div class="col-sm-12">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                               <h3>N{{ number_format($TotalPaidAmount, 2) }}</h3>

                                <p>Total Paid Amount</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ url('student/fees_collection') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                   
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>0</h3>

                                <p>Total Student</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ url('admin/student/list') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                       <div class="small-box bg-primary">
                           <div class="inner">
                               <h3>0</h3>

                               <p>Total Teacher</p>
                           </div>
                           <div class="icon">
                               <i class="ion ion-person-add"></i>
                           </div>
                           <a href="{{ url('admin/teacher/list') }}" class="small-box-footer">More info <i
                                   class="fas fa-arrow-circle-right"></i></a>
                       </div>
                   </div>

                   <div class="col-lg-3 col-6">
                       <div class="small-box bg-warning">
                           <div class="inner">
                               <h3>0</h3>

                               <p>Total Parent</p>
                           </div>
                           <div class="icon">
                               <i class="ion ion-person-add"></i>
                           </div>
                           <a href="{{ url('admin/parent/list') }}" class="small-box-footer">More info <i
                                   class="fas fa-arrow-circle-right"></i></a>
                       </div>
                   </div>

                   <div class="col-lg-3 col-6">
                       <div class="small-box bg-danger">
                           <div class="inner">
                               <h3>0</h3>

                               <p>Total Admin</p>
                           </div>
                           <div class="icon">
                               <i class="ion ion-person-add"></i>
                           </div>
                           <a href="{{ url('admin/admin/list') }}" class="small-box-footer">More info <i
                                   class="fas fa-arrow-circle-right"></i></a>
                       </div>
                   </div>

                   <div class="col-lg-3 col-6">
                       <div class="small-box bg-danger">
                           <div class="inner">
                               <h3>0</h3>

                               <p>Total Exam</p>
                           </div>
                           <div class="icon">
                               <i class="nav-icon fas fa-table"></i>
                           </div>
                           <a href="{{ url('admin/examinations/exam/list') }}" class="small-box-footer">More info <i
                                   class="fas fa-arrow-circle-right"></i></a>
                       </div>
                   </div>

                   <div class="col-lg-3 col-6">
                       <div class="small-box bg-warning">
                           <div class="inner">
                               <h3>0</h3>

                               <p>Total Class</p>
                           </div>
                           <div class="icon">
                               <i class="nav-icon fas fa-table"></i>
                           </div>
                           <a href="{{ url('admin/class/list') }}" class="small-box-footer">More info <i
                                   class="fas fa-arrow-circle-right"></i></a>
                       </div>
                   </div>

                   <div class="col-lg-3 col-6">
                       <div class="small-box bg-success">
                           <div class="inner">
                               <h3>0</h3>

                               <p>Total Subject</p>
                           </div>
                           <div class="icon">
                               <i class="nav-icon fas fa-table"></i>
                           </div>
                           <a href="{{ url('admin/subject/list') }}" class="small-box-footer">More info <i
                                   class="fas fa-arrow-circle-right"></i></a>
                       </div>
                   </div>

                   <div class="col-lg-3 col-6">
                       <div class="small-box bg-success">
                           <div class="inner">
                               <h3>0</h3>

                               <p>Total Users</p>
                           </div>
                           <div class="icon">
                               <i class="ion ion-person-add"></i>
                           </div>
                           <a href="#" class="small-box-footer">More info<i
                                   class="fas fa-arrow-circle-right"></i></a>
                       </div>
                   </div>
                </div>
            </div>
        </section>
    </div>

    
@endsection

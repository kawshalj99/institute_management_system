@extends('layout.app')

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
                <h3>LKR {{ number_format($TotalPaidAmount,2)}}</h3>

                <p>Total Paid Amount</p>
              </div>
              <div class="icon">
                <i class="nav-icon 	fas fa-credit-card"></i>
              </div>
              <a href="{{url('student/fee_collection')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$TotalSubjects}}</h3>

                <p>Total Subjects</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-book-open"></i>
              </div>
              <a href="{{ url('student/my_subject')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$TotalNotices}}</h3>

                <p>Notices</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-chalkboard"></i>
              </div>
              <a href="{{ url('student/my_notice_board')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$TotalHomework}}</h3>

                <p>Total Homework</p>
              </div>
              <div class="icon">
                <i class="nav-icon 	fas fa-archive"></i>
              </div>
              <a href="{{ url('student/my_homework')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$TotalSubmittedHomework}}</h3>

                <p>Total Submitted Homework</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-file"></i>
              </div>
              <a href="{{ url('student/my_submitted_homework')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$TotalAttendance}}</h3>

                <p>Total Attendance</p>
              </div>
              <div class="icon">
                <i class="nav-icon fa fa-tasks"></i>
              </div>
              <a href="{{ url('student/my_attendance')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

   
     
      </div>
    </section>
 
  </div>

  @endsection
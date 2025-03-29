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
              <a href="{{url('parent/my_student')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$TotalStudent}}</h3>

                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-user-graduate"></i>
              </div>
              <a href="{{ url('parent/my_student')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$TotalNotices}}</h3>

                <p>Notices</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-chalkboard"></i>
              </div>
              <a href="{{ url('parent/my_student_notice_board')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$TotalAttendance}}</h3>

                <p>Total Attendance</p>
              </div>
              <div class="icon">
                <i class="nav-icon fa fa-tasks"></i>
              </div>
              <a href="{{ url('parent/my_student')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$TotalSubmittedHomework}}</h3>

                <p>Total Submitted Homework</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-file"></i>
              </div>
              <a href="{{ url('parent/my_student')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="{{ url('parent/my_student')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
     
      </div>
    </section>
 
  </div>

  @endsection
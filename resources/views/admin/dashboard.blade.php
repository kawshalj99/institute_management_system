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
                <h3>LKR {{ number_format($getTotalFees,2)}}</h3>

                <p>Total Received Payements</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-money-check-alt"></i>
              </div>
              <a href="{{url('admin/fee_collection/collect_fee')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>LKR {{ number_format($getTotalTodayFees,2)}}</h3>

                <p>Today Received Payements</p>
              </div>
              <div class="icon">
                <i class="nav-icon 	fas fa-credit-card"></i>
              </div>
              <a href="{{url('admin/fee_collection/collect_fee')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="{{ url('admin/student/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$TotalTeacher}}</h3>

                <p>Total Teachers</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
              </div>
              <a href="{{ url('admin/teacher/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$TotalParent}}</h3>

                <p>Total Parents</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fas fa-user-friends"></i>
              </div>
              <a href="{{ url('admin/parent/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$TotalAdmin}}</h3>

                <p>Total Administrators</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-user-tie"></i>
              </div>
              <a href="{{ url('admin/admin/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$TotalExam}}</h3>

                <p>Total Exams</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-layer-group"></i>
              </div>
              <a href="{{ url('admin/examinations/exam/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$TotalClass}}</h3>

                <p>Total Class</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-school"></i>
              </div>
              <a href="{{ url('admin/class/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$TotalSubject}}</h3>

                <p>Total Subjects</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-book-open"></i>
              </div>
              <a href="{{ url('admin/subject/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
     
      </div>
    </section>
 
  </div>

  @endsection
@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Student List</h1>
          </div>

          <div class="col-sm-6" style="text-align: right;">
          </div>
          
        </div>
      </div>
    </section>

        


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

          @include('_message')


            <div class="card">
              <div class="card-header" >
                <h3 class="card-title">My Student Table</h3>
              </div>
              <div class="card-body p-0" style="overflow:auto;">
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="min-width: 100px;">Profile Picture</th>
                      <th style="min-width: 180px;">Student Name</th>
                      <th style="min-width: 150px;">Email</th>
                      <th>Admission Number</th>
                      <th style="min-width: 120px;">Admission Date</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th style="min-width: 120px;">Date of Birth</th>
                      <th>Mobile Number</th>
                      <th style="min-width: 120px;">Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                      <tr>
                        <td>
                          @if(!empty($value->getProfile()))
                          <img src="{{ $value->getProfile() }}" style="height:50px; width:50px; border-radius:50%;">
                          @endif
                        </td>
                        <td>{{ $value->name}} {{ $value->last_name}}</td>
                        <td>{{ $value->email}}</td>
                        <td>{{ $value->admission_number}}</td>
                        <td>
                          @if(!empty($value->admission_date))
                          {{ date('d-m-Y', strtotime($value->admission_date))}}
                          @endif
                        </td>
                        <td>{{ $value->roll_number}}</td>
                        <td>{{ $value->class_name}}</td>
                        <td>{{ $value->gender}}</td>
                        <td>
                          @if(!empty($value->date_of_birth))
                          {{ date('d-m-Y', strtotime($value->date_of_birth))}}
                          @endif
                        </td>
                        <td>{{ $value->mobile_number}}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 430px;">
                          <a style="margin-bottom: 5px;" class="btn btn-success btn-sm" href="{{ url('parent/my_student/subject/'.$value->id)}}">Subject</a>
                          <a style="margin-bottom: 5px;" class="btn btn-primary btn-sm" href="{{ url('parent/my_student/exam_timetable/'.$value->id)}}">Exam Timetable</a>
                          <a style="margin-bottom: 5px;" class="btn btn-secondary btn-sm" href="{{ url('parent/my_student/exam_result/'.$value->id)}}">Exam Result</a>
                          <a style="margin-bottom: 5px;" class="btn btn-warning btn-sm" href="{{ url('parent/my_student/calendar/'.$value->id)}}">Student Calendar</a>
                          <a style="margin-bottom: 5px;" class="btn btn-danger btn-sm" href="{{ url('parent/my_student/attendance/'.$value->id)}}">Attendance</a>
                          <a style="margin-bottom: 5px;" class="btn btn-success btn-sm" href="{{ url('parent/my_student/homework/'.$value->id)}}">Homework</a>
                          <a style="margin-bottom: 5px;" class="btn btn-primary btn-sm" href="{{ url('parent/my_student/submitted_homework/'.$value->id)}}">Submitted Homework</a>
                          <a style="margin-bottom: 5px;" class="btn btn-secondary btn-sm" href="{{ url('parent/my_student/fee_collection/'.$value->id)}}">Fee Collection</a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                  
                </div>
              </div>
              
            </div>
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
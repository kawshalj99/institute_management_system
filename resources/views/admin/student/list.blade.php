@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student List</h1>
          </div>

          <div class="col-sm-6" style="text-align: right;">
              <a href="{{url('admin/student/add')}}" class="btn btn-primary">Add New Student</a>
          </div>
          
        </div>
      </div>
    </section>

        
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Student</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-2">
                    <label>First Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('name')}}" name="name" placeholder="First Name">
                  </div> 
                  <div class="form-group col-md-2">
                    <label>Last Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('last_name')}}" name="last_name" placeholder="Last Name">
                  </div>  
                  <div class="form-group col-md-2">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{ Request::get('email')}}" name="email" placeholder="Email">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Admission Number</label>
                    <input type="text" class="form-control" value="{{ Request::get('admission_number')}}" name="admission_number" placeholder="Admission Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Roll Number</label>
                    <input type="text" class="form-control" value="{{ Request::get('roll_number')}}" name="roll_number" placeholder="Roll Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Class</label>
                    <input type="text" class="form-control" value="{{ Request::get('class')}}" name="class" placeholder="Class">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                      <option value="">Select Gender</option>
                      <option {{ (Request::get('gender')== 'Male')? 'selected' : ''}} value="Male">Male</option>
                      <option {{ (Request::get('gender')== 'Female')? 'selected' : ''}} value="Female">Female</option>
                      <option {{ (Request::get('gender')== 'other')? 'selected' : ''}} value="other">Other</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" value="{{ Request::get('mobile_number')}}" name="mobile_number" placeholder="Mobile Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Admission Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('admission_date')}}" name="admission_date" placeholder="Admission Date">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Create Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('date')}}" name="date" placeholder="date">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="">Select Status</option>
                      <option {{ (Request::get('status')== 100)? 'selected' : ''}} value="100">Active</option>
                      <option {{ (Request::get('status')== 1)? 'selected' : ''}} value="1">Inactive</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search</button>
                    <a href="{{ url('admin/student/list')}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
                  </div>
                  </div>
                </div>
              </form>
            </div>



          @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student Table</h3>
              </div>
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="min-width: 100px;">Profile Pic</th>
                      <th style="min-width: 180px;">Student Name</th>
                      <th style="min-width: 180px;">Parent Name</th>
                      <th style="min-width: 150px;">Email</th>
                      <th>Admission Number</th>
                      <th style="min-width: 120px;">Admission Date</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th style="min-width: 120px;">Date of Birth</th>
                      <th>Mobile Number</th>
                      <th>Status</th>
                      <th style="min-width: 120px;">Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($getRecord as $value)
                      <tr>
                        <td>{{ $value->id}}</td>
                        <td>
                          @if(!empty($value->getProfile()))
                          <img src="{{ $value->getProfile() }}" style="height:50px; width:50px; border-radius:50%;">
                          @endif
                        </td>
                        <td>{{ $value->name}} {{ $value->last_name}}</td>
                        <td>{{ $value->parent_name}} {{ $value->parent_last_name}}</td>
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
                        <td>{{ ($value->status == 0)? 'Active' : 'Inactive'}}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 150px;">
                          <a href="{{ url('admin/student/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ url('admin/student/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
        </div>

      </div>
    </section>
  </div>

@endsection
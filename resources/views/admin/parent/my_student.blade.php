@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Student List  ({{ $getParent->name}} {{ $getParent->last_name}})</h1>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Student</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-2">
                    <label>Student Id</label>
                    <input type="text" class="form-control" value="{{ Request::get('id')}}" name="id" placeholder="Student Id">
                  </div> 
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
                  
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search</button>
                    <a href="{{ url('admin/parent/my_student/'.$parent_id)}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
                  </div>
                  </div>
                </div>
              </form>
            </div>



          @include('_message')


@if(!empty($getSearchStudent))
            <div class="card">
              <div class="card-header" >
                <h3 class="card-title">Student Table</h3>
              </div>
              <div class="card-body p-0" style="overflow:auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getSearchStudent as $value)
                      <tr>
                        <td>{{ $value->id}}</td>
                        <td>
                          @if(!empty($value->getProfile()))
                          <img src="{{ $value->getProfile() }}" style="height:50px; width:50px; border-radius:50%;">
                          @endif
                        </td>
                        <td>{{ $value->name}} {{ $value->last_name}}</td>
                        <td>{{ $value->email}}</td>
                        
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 150px;">
                          <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id)}}" class="btn btn-primary btn-sm">Add to Parent</a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                
                </div>
              </div>
              
            </div>
@endif

            <div class="card">
              <div class="card-header" >
                <h3 class="card-title">Assigned Student Table</h3>
              </div>
              <div class="card-body p-0" style="overflow:auto;">
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th>Created Date</th>
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
                        <td>{{ $value->email}}</td>
                        <td>{{ $value->parent_name}}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 150px;">
                          <a href="{{ url('admin/parent/assign_student_parent_delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
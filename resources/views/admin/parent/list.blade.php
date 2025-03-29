@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent List</h1>
          </div>

          <div class="col-sm-6" style="text-align: right;">
              <a href="{{url('admin/parent/add')}}" class="btn btn-primary">Add New Parent</a>
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
                <h3 class="card-title">Search Parent</h3>
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
                    <label>Address</label>
                    <input type="text" class="form-control" value="{{ Request::get('address')}}" name="address" placeholder="Address">
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
                    <a href="{{ url('admin/parent/list')}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
                  </div>
                  </div>
                </div>
              </form>
            </div>



          @include('_message')

            <div class="card">
              <div class="card-header" >
                <h3 class="card-title">Parent Table</h3>
              </div>
              <div class="card-body p-0" style="overflow:auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="min-width: 100px;">Profile Pic</th>
                      <th style="min-width: 180px;">Name</th>
                      <th style="min-width: 150px;">Email</th>
                      <th>Gender</th>
                      <th>Mobile Number</th>
                      <th style="min-width: 150px;">Occupation</th>
                      <th style="min-width: 250px;">Address</th>
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
                            <img src="{{ $value->getProfile()}}" style="height:50px; width:50px; border-radius:50%;">
                            @endif
                        </td>
                        <td style="min-width: 200px;">{{ $value->name}} {{ $value->last_name}}</td>
                        <td>{{ $value->email}}</td>
                        <td>{{ $value->gender}}</td>
                        <td>{{ $value->mobile_number}}</td>
                        <td>{{ $value->occupation}}</td>
                        <td style="min-width: 200px;">{{ $value->address}}</td>
                        <td>{{ ($value->status == 0)? 'Active' : 'Inactive'}}</td>
                        <td style="min-width: 200px;">{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 250px;">
                          <a href="{{ url('admin/parent/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ url('admin/parent/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                          <a href="{{ url('admin/parent/my_student/'.$value->id)}}" class="btn btn-secondary btn-sm">My Student</a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
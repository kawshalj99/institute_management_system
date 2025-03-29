@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Student List</h1>
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
              <div class="card-header">
                <h3 class="card-title">My Student Table</h3>
              </div>
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="min-width: 100px;">Profile Pic</th>
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
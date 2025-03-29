@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Exam Timetable ({{ $getStudent->name}} {{ $getStudent->last_name}})</h1>
          </div>
          
        </div>
      </div>
    </section>

        
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @include('_message')
             @foreach($getRecord as $value) 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $value['name']}}</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                    <th>Subject Name</th>
                      <th>Exam Date</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Hall Number</th>
                      <th>Full Marks</th>
                      <th>Passing Marks</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($value['exam'] as $valueS)
                        <tr>
                            <td>{{ $valueS['subject_name']}}</td>
                            <td>{{ $valueS['exam_date']}}</td>
                            <td>{{ $valueS['start_time']? date('h:i A',strtotime($valueS['start_time'])) : ''}}</td>
                            <td>{{ $valueS['end_time']? date('h:i A',strtotime($valueS['end_time'])) : ''}}</td>
                            <td>{{ $valueS['hall_number']}}</td>
                            <td>{{ $valueS['full_marks']}}</td>
                            <td>{{ $valueS['passing_marks']}}</td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>  
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </section>
  </div>

@endsection


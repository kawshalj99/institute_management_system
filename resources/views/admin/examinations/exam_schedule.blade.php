@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Examination Schedule</h1>
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
                <h3 class="card-title">Search Exam Schedule</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-3">
                    <label>Exam</label>
                    <select  class="form-control getExam" name="exam_id" required>
                        <option value="">-- Select Exam --</option>
                        @foreach($getExam as $exam)
                            <option {{(Request::get('exam_id') == $exam->id) ? 'selected' : ''}} value="{{$exam->id}}">{{$exam->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label>Class</label>
                    <select  class="form-control getClass" name="class_id" required>
                        <option value="">-- Select Class --</option>
                        @foreach($getClass as $class)
                            <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}} value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                  
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search</button>
                    <a href="{{ url('admin/examinations/exam_schedule')}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
                  </div>
                  </div>
                </div>
              </form>
            </div>



          @include('_message')

            @if(!empty($getRecord))
            <form action="{{url('admin/examinations/exam_schedule_insert')}}" method="post">
              {{ csrf_field()}}
              <input type="hidden" name="exam_id" value="{{Request::get('exam_id')}}">
              <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Exam Schedule</h3>
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
                    @php
                        $i =1;
                    @endphp
                    @foreach($getRecord as $value)
                    <tr>
                       <td>{{ $value['subject_name']}}
                       <input type="hidden"  class="form-control" value="{{ $value['subject_id']}}" name="schedule[{{ $i}}][subject_id]">
                       </td>
                       <td>
                            <input type="date"  class="form-control" value="{{ $value['exam_date']}}" name="schedule[{{ $i}}][exam_date]">
                       </td>
                       <td>
                            <input type="time" class="form-control" value="{{ $value['start_time']}}" name="schedule[{{ $i}}][start_time]">
                       </td>
                       <td>
                            <input type="time" class="form-control" value="{{ $value['end_time']}}" name="schedule[{{ $i}}][end_time]">
                       </td>
                       <td>
                            <input type="text" class="form-control" value="{{ $value['hall_number']}}" name="schedule[{{ $i}}][hall_number]">
                       </td>
                       <td>
                            <input type="text" class="form-control" value="{{ $value['full_marks']}}" name="schedule[{{ $i}}][full_marks]">
                       </td>
                       <td>
                            <input type="text" class="form-control" value="{{ $value['passing_marks']}}" name="schedule[{{ $i}}][passing_marks]">
                       </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                  </tbody>
                </table>
                <div style="text-align:center; padding:20px;">
                    <button class="btn btn-primary">Submit</button>
                </div>
                
              </div>
            </div>
            </form>
            @endif
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Attendance <span> ({{$getStudent->name}} {{$getStudent->last_name}}) - Total : {{$getRecord->total()}}</span></h1>
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
                <h3 class="card-title">Search Attendance</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">

    

                <div class="form-group col-md-2">
                    <label>Attendance Type</label>
                    <select class="form-control" name="attendance_type" >
                      <option value="">Attendance Type</option>
                      <option {{(Request::get('attendance_type') == 1) ? 'selected' : ''}} value="1">Present</option>
                      <option {{(Request::get('attendance_type') == 2) ? 'selected' : ''}} value="2">Morning</option>
                      <option {{(Request::get('attendance_type') == 3) ? 'selected' : ''}} value="3">Evening</option>
                      <option {{(Request::get('attendance_type') == 4) ? 'selected' : ''}} value="4">Absent</option>
                    </select>
                    
                </div>

                <div class="form-group col-md-2">
                    <label>Attendance Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('attendance_date')}}" name="attendance_date">
                </div>

                <div class="form-group col-md-2">
                    <label>From Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('start_attendance_date')}}" name="start_attendance_date">
                </div>

                <div class="form-group col-md-2">
                    <label>To Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('end_attendance_date')}}" name="end_attendance_date">
                </div>

                  
                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search</button>
                    <a href="{{ url('parent/my_student/attendance/'.$getStudent->id)}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
                  </div>
                  </div>
                </div>
              </form>
            </div>

           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student Attendance List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Attendance Type</th>
                            <th>Attendance Date</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse($getRecord as $value)
                      <tr>
                        <td>{{$value->class_name}}</td>
                        <td>
                                @if($value->attendance_type == 1)
                                Present
                                @elseif($value->attendance_type == 2)
                                Morning
                                @elseif($value->attendance_type == 3)
                                Evening
                                @elseif($value->attendance_type == 4)
                                Absent
                                @endif
                        </td>
                        <td>{{date('d-m-Y', strtotime($value->attendance_date))}}</td>
                        <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="100%">Record not Found</td>
                      </tr>
                      @endforelse
                    </tbody>
                </table>
                @if(!empty($getRecord))
                <div style="padding: 10px; float: right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
                @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection

@section('script').

@endsection
@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Homework Report</h1>
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
                <h3 class="card-title">Search Homework Report</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                
                  <div class="form-group col-md-2">
                    <label>Student First Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('first_name')}}" name="first_name" placeholder="Student First Name">
                  </div> 
                  <div class="form-group col-md-2">
                    <label>Student Last Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('last_name')}}" name="last_name" placeholder="Student Last Name">
                  </div> 
                  <div class="form-group col-md-2">
                    <label>Class Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('class_name')}}" name="class_name" placeholder="Class Name">
                  </div> 
                  <div class="form-group col-md-2">
                    <label>Subject</label>
                    <input type="text" class="form-control" value="{{ Request::get('subject_name')}}" name="subject_name" placeholder="Subject Name">
                  </div>  
                  <div class="form-group col-md-2">
                    <label>Homework Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('homework_date')}}" name="homework_date" placeholder="date">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Submission Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('submission_date')}}" name="submission_date" placeholder="date">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Submitted Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('submitted_date')}}" name="submitted_date" placeholder="date">
                  </div>
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search</button>
                    <a href="{{ url('admin/homework/homework_report')}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
                  </div>
                  </div>
                </div>
              </form>
            </div>

            


          @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Homework Report </h3>
              </div>
              <div class="card-body p-0" style="overflow:auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Student Name</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Homework Date</th>
                      <th>Submission Date</th>
                      <th>Description</th>
                      <th>Document</th>
                      <th>Created Date</th>

                      <th>Submitted Document</th>
                      <th>Submitted Description</th>
                      <th>Submitted Date</th>

                    </tr>
                  </thead>
                  <tbody>
                  @forelse($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->first_name}} {{$value->last_name}}</td>
                      <td>{{$value->class_name}}</td>
                      <td style="min-width: 180px;">{{$value->subject_name}}</td>
                      <td>{{date('d-m-Y', strtotime($value->getHomework->homework_date))}}</td>
                      <td>{{date('d-m-Y', strtotime($value->getHomework->submission_date))}}</td>
                      <td style="min-width: 400px;">{{$value->getHomework->description}}</td>
                      <td>
                          @if(!empty($value->getDocument()))
                            <a href="{{$value->getHomework->getDocument()}}" class="btn btn-warning" download="">Download</a>
                          @endif
                      </td>
                      
                      <td style="min-width: 120px;">{{date('d-m-Y', strtotime($value->getHomework->created_at))}}</td>

                      <td>
                          @if(!empty($value->getDocument()))
                            <a href="{{$value->getDocument()}}" class="btn btn-secondary" download="">Download</a>
                          @endif
                      </td>
                      <td style="min-width: 400px;">
                        {{$value->description}}
                      </td>
                      <td style="min-width: 120px;">
                      @if( $value->created_at <= $value->getHomework->submission_date)
                                  <span style="color:green;font-weight:bold;">{{date('d-m-Y', strtotime($value->created_at))}}</span></br>
                      @else
                                  <span style="color:red;font-weight:bold;">{{date('d-m-Y', strtotime($value->created_at))}}</span></br>
                      @endif
                      </td>
                      
                    </tr>
                    @empty
                    <tr>
                      <td colspan="100%">Record not found</td>
                    </tr>
                    @endforelse
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
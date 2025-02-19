@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Student Homework List <span>({{$getStudent->name}} {{$getStudent->last_name}})</span></h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

        

    <!-- Main content -->
    <section class="content">


      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Homework</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                
                  <div class="form-group col-md-3">
                    <label>Subject</label>
                    <input type="text" class="form-control" value="{{ Request::get('subject_name')}}" name="subject_name" placeholder="Subject Name">
                  </div>  
                  <div class="form-group col-md-3">
                    <label>Homework Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('homework_date')}}" name="homework_date" placeholder="date">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Submission Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('submission_date')}}" name="submission_date" placeholder="date">
                  </div>
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search</button>
                    <a href="{{ url('parent/my_student/homework/'.$getStudent->id)}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
                  </div>
                  </div>
                </div>
              </form>
            </div>

            


          @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student Homework Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow:auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Homework Date</th>
                      <th>Submission Date</th>
                      <th>Description</th>
                      <th>Document</th>
                      <th>Created By</th>
                      <th>Created Date</th>

                    </tr>
                  </thead>
                  <tbody>
                  @forelse($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->class_name}}</td>
                      <td style="min-width: 180px;">{{$value->subject_name}}</td>
                      <td>{{date('d-m-Y', strtotime($value->homework_date))}}</td>
                      <td>{{date('d-m-Y', strtotime($value->submission_date))}}</td>
                      <td style="min-width: 400px;">{{$value->description}}</td>
                      <td>
                          @if(!empty($value->getDocument()))
                            <a href="{{$value->getDocument()}}" class="btn btn-warning" download="">Download</a>
                          @endif
                      </td>
                      <td>{{$value->created_by_name}}</td>
                      <td style="min-width: 120px;">{{date('d-m-Y', strtotime($value->created_at))}}</td>
                      
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
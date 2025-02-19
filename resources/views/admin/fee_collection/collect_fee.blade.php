@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Collect Fees</h1>
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
                <h3 class="card-title">Search Collect Fees</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-2">
                    <label>Class</label>
                    <select class="form-control" name="class_id">
                        <option value="">Select Class</option>
                        @foreach($getClass as $class)
                        <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}} value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group col-md-2">
                    <label>Student ID</label>
                    <input type="text" class="form-control" value="{{ Request::get('student_id')}}" name="student_id" placeholder="Student ID">
                </div> 
                  
                <div class="form-group col-md-2">
                    <label>Student First Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('first_name')}}" name="first_name" placeholder="Student First Name">
                </div> 

                <div class="form-group col-md-2">
                    <label>Student Last Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('last_name')}}" name="last_name" placeholder="Student Last Name">
                </div> 

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search</button>
                    <a href="{{ url('admin/fee_collection/collect_fee')}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
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
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                    <th>Student ID</th>
                      <th>Student Name</th>
                      <th>Class Name</th>
                      <th>Total Fee Amount (LKR)</th>
                      <th>Paid Amount (LKR)</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if(!empty($getRecord))
                        @forelse($getRecord as $value)
                          <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}} {{$value->last_name}}</td>
                            <td>{{$value->class_name}}</td>
                            <td>{{number_format($value->amount,2)}}</td>
                            <td>0.00</td>
                            <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                            <td>
                                <a href="{{url('admin/fee_collection/collect_fee/add_fee')}}" class="btn btn-success">Collect Fees</a>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="100%">Record not found</td>
                          </tr>
                        @endforelse
                      @else
                      <tr>
                        <td colspan="100%">Record not found</td>
                      </tr>
                      @endif
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                  @if(!empty($getRecord))
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                  @endif
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
@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Student Notice Board</h1>
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
                <h3 class="card-title">Search Notice</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-3">
                    <label>Title</label>
                    <input type="text" class="form-control" value="{{ Request::get('title')}}" name="title" placeholder="Title">
                  </div>  
                  
                  <div class="form-group col-md-3">
                    <label>Notice Date From</label>
                    <input type="date" class="form-control" value="{{ Request::get('notice_date_from')}}" name="notice_date_from" >
                  </div>
                  <div class="form-group col-md-3">
                    <label>Notice Date To</label>
                    <input type="date" class="form-control" value="{{ Request::get('notice_date_to')}}" name="notice_date_to" >
                  </div>


                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search</button>
                    <a href="{{ url('parent/my_student_notice_board')}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
                  </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        
        @foreach($getRecord as $value)
        <div class="col-md-12">
          <div class="card card-primary card-outline"> 
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>{{ $value->title}}</h5>
                <h6><span class="mailbox-read-time float-right" style="font-weight: bold; color: #000; font-size: 13px;">{{ date('d-m-Y', strtotime($value->notice_date))}}</span></h6>
              </div>

               
              </div>
              <div class="mailbox-read-message">
                {!! $value->message !!}
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="col-md-12">
          <div style="padding: 10px; float: right;">
              {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
          </div>
        </div>

      </div>
      </div>
    </section>
    
</div>

@endsection
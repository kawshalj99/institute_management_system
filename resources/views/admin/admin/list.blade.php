@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List</h1>
          </div>

          <div class="col-sm-6" style="text-align: right;">
              <a href="{{url('admin/admin/add')}}" class="btn btn-primary">Add New Admin</a>
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
                <h3 class="card-title">Search Admin</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-3">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('name')}}" name="name" placeholder="Name">
                  </div>  
                  <div class="form-group col-md-3">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{ Request::get('email')}}" name="email" placeholder="Email">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Date</label>
                    <input type="date" class="form-control" value="{{ Request::get('date')}}" name="date" placeholder="date">
                  </div>
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search</button>
                    <a href="{{ url('admin/admin/list')}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
                  </div>
                  </div>
                </div>
              </form>
            </div>



          @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Table</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($getRecord as $value)
                      <tr>
                        <td>{{ $value->id}}</td>
                        <td>{{ $value->name}}</td>
                        <td>{{ $value->email}}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>
                          <a href="{{ url('admin/admin/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                          <a href="{{ url('admin/admin/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
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
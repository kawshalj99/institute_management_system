@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Class</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control"name="name" value ="{{$getRecord->name}}" required placeholder="Class Name">
                  </div>  

                  <div class="form-group">
                    <label>Fee Amount (LKR)</label>
                    <input type="number" class="form-control"name="amount" value ="{{$getRecord->amount}}" required placeholder="Fee Amount LKR">
                  </div>  

                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option {{ ($getRecord->status == 0) ? 'selected':'' }} value="0">Active</option>
                        <option {{ ($getRecord->status == 1) ? 'selected':'' }} value="1">Inactive</option>
                    </select>
                  </div>  
                  
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



@endsection
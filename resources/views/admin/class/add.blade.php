@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Class</h1>
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
                    <input type="text" class="form-control"name="name" required placeholder="Class Name">
                  </div>  
                  <div class="form-group">
                    <label>Fee Amount (LKR)</label>
                    <input type="number" class="form-control"name="amount" required placeholder="Fee Amount LKR">
                  </div>  

                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
                  </div>  
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



@endsection
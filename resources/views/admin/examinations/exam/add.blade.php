@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Exam</h1>
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
                    <label>Exam Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name" required placeholder="Exam Name">
                  </div>  
                  <div class="form-group">
                    <label>Note <span style="color:red;">*</span></label>
                    <textarea name="note" class="form-control" placeholder="Note" required></textarea>
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
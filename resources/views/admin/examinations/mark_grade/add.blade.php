@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Grade</h1>
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
                    <label>Grade Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name" required placeholder="Grade Name">
                </div>  

                <div class="form-group">
                    <label>Percent From <span style="color:red;">*</span></label>
                    <input type="number" class="form-control" value="{{old('percent_from')}}" name="percent_from" required placeholder="Percent From">
                </div> 
                
                <div class="form-group">
                    <label>Percent To <span style="color:red;">*</span></label>
                    <input type="number" class="form-control" value="{{old('percent_to')}}" name="percent_to" required placeholder="Percent To">
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
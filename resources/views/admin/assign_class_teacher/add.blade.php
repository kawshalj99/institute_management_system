@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign New Class Teacher</h1>
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
                    <label>Class Name</label>
                    <select name="class_id" class="form-control" required>
                        <option value="">-- Select Class --</option>
                        @foreach($getClass as $class)
                        <option value="{{ $class->id}}">{{ $class->name}}</option>
                        @endforeach
                    </select>
                  </div> 
                  
                  <div class="form-group">
                    <label>Teacher Name</label>
                    
                    
                       @foreach($getTeacher as $teacher)
                        <div>
                        <label style="font-weight: normal;">
                            <input type="checkbox" value="{{ $teacher->id}}" name="teacher_id[]"> {{ $teacher->name}} {{ $teacher->last_name}}
                        </label>
                        </div>
                        @endforeach 

                        
                    
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
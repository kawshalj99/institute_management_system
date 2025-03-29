@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Admin</h1>
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
                    <label>Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name" required placeholder="Enter Name">
                  </div>  
                  <div class="form-group">
                    <label>Email <span style="color:red;">*</span></label>
                    <input type="email" class="form-control" value="{{old('email')}}" name="email" required placeholder="Enter Email">
                    <div  style="color:red;">{{ $errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label>Password <span style="color:red;">*</span></label>
                    <input type="password" class="form-control" name="password" required placeholder="Enter Password" id="myInput">
                  </div>
                  <input type="checkbox" onclick="myFunction()"> Show Password
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

  <script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>

@endsection
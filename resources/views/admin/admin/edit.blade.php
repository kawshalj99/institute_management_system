@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin</h1>
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
                    <input type="text" class="form-control" name="name" value="{{ old('name',$getRecord->name)}}" required placeholder="Enter Name">
                  </div>  
                  <div class="form-group">
                    <label>Email <span style="color:red;">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email',$getRecord->email)}}" required placeholder="Enter Email">
                    <div  style="color:red;">{{ $errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label>Password </label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" id="myInput">
                    <input type="checkbox" onclick="myFunction()"> Show Password
                    <p>Hint : If you need to change the password, Insert the new password into the Password input field</p>
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
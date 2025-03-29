@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          @include('_message')
            <div class="card card-primary">
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="old_password" required placeholder="Current Password">
                  </div>  

                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="new_password" required placeholder="New Password" id="myInput">
                  </div> 
                <div style="float:right;">
                  <input type="checkbox" onclick="myFunction()"> Show Password
                  </div>
            
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control"  name="c_password" required placeholder="Confirm Password" id="myInput1">
                  </div> 
                  
                  <div style="float:right;">
                  <input type="checkbox" onclick="myFunction1()"> Show Password
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

<script>
    function myFunction1() {
        var x = document.getElementById("myInput1");
        if (x.type === "password") {
            x.type = "text";
        } else {
             x.type = "password";
        }
    }
  </script>



@endsection
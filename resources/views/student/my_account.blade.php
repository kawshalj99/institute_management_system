@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Account</h1>
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
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label>First Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('name', $getRecord->name)}}" name="name" required placeholder="First Name">
                    <div  style="color:red;">{{ $errors->first('name')}}</div>
                    </div>  

                    <div class="form-group col-md-6">
                    <label>Last Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('last_name', $getRecord->last_name)}}" name="last_name" required placeholder="Last Name">
                    <div  style="color:red;">{{ $errors->first('last_name')}}</div>
                    </div>  

                    

                    <div class="form-group col-md-6">
                    <label>Gender <span style="color:red;">*</span></label>
                    <select class = "form-control" required name = "gender">
                      <option value="">-- Select Gender --</option>
                      <option {{(old('gender', $getRecord->gender) == "Male") ? 'selected' : ''}} value="Male">Male</option>
                      <option {{(old('gender', $getRecord->gender) == "Female") ? 'selected' : ''}} value="Female">Female</option>
                      <option {{(old('gender', $getRecord->gender) == "other") ? 'selected' : ''}} value="other">Other</option>
                    </select>
                    <div  style="color:red;">{{ $errors->first('gender')}}</div>
                    </div> 

                    <div class="form-group col-md-6">
                    <label>Date of Birth <span style="color:red;">*</span></label>
                    <input type="date" class="form-control" value="{{old('date_of_birth', $getRecord->date_of_birth)}}" name="date_of_birth" required placeholder="Roll Number">
                    <div  style="color:red;">{{ $errors->first('date_of_birth')}}</div>
                    </div> 

                    <div class="form-group col-md-6">
                    <label>Mobile Number <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('mobile_number', $getRecord->mobile_number)}}" name="mobile_number" required placeholder="Mobile Number">
                    <div  style="color:red;">{{ $errors->first('mobile_number')}}</div>
                    </div> 

                    <div class="form-group col-md-6">
                    <label>Profile Picture <span style="color:red;"></span></label>
                    <input type="file" class="form-control"  name="profile_pic" placeholder="Select Profile Picture">
                    <div  style="color:red;">{{ $errors->first('profile_pic')}}</div>
                    @if(!empty($getRecord->getProfile()))
                        <img src="{{$getRecord->getProfile()}}" style = "width: auto; height: 50px;">
                    @endif
                    </div> 


                    </div>

                    <hr>
                
                  <div class="form-group">
                    <label>Email <span style="color:red;"></span></label>
                    <input type="email" class="form-control" value="{{old('email', $getRecord->email)}}" name="email" placeholder="Enter Email" disabled>
                    <div  style="color:red;">{{ $errors->first('email')}}</div>
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
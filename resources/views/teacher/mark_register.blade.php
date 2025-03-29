@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mark Register</h1>
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
                <h3 class="card-title">Search Marks Register</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-3">
                    <label>Exam</label>
                    <select  class="form-control getExam" name="exam_id" required>
                        <option value="">-- Select Exam --</option>
                        @foreach($getExam as $exam)
                            <option {{(Request::get('exam_id') == $exam->exam_id) ? 'selected' : ''}} value="{{$exam->exam_id}}">{{$exam->exam_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label>Class</label>
                    <select  class="form-control getClass" name="class_id" required>
                        <option value="">-- Select Class --</option>
                        @foreach($getClass as $class)
                            <option {{(Request::get('class_id') == $class->class_id) ? 'selected' : ''}} value="{{$class->class_id}}">{{$class->class_name}}</option>
                        @endforeach
                    </select>
                </div>
                  
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search</button>
                    <a href="{{ url('admin/examinations/mark_register')}}" class="btn btn-success" style="margin-top: 31px;"> Clear </a>
                  </div>
                  </div>
                </div>
              </form>
            </div>



          @include('_message')
          
          @if(!empty($getSubject) && !empty($getSubject->count()))
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mark Register</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Student Name</th>
                      @foreach($getSubject as $subject)
                      <th>
                        {{ $subject->subject_name}} <br>
                        ({{ $subject->passing_marks}} / {{$subject->full_marks}})
                      </th>
                      @endforeach
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if(!empty($getStudent) && !empty($getStudent->count()))
                        @foreach($getStudent as $student)
                      <form name='post' class="SubmitForm">
                          {{ csrf_field()}}
                          <input type="hidden" name="student_id" value="{{ $student->id}}">
                          <input type="hidden" name="exam_id" value="{{ Request::get('exam_id')}}">
                          <input type="hidden" name="class_id" value="{{ Request::get('class_id')}}">
                      <tr>
                        <td>{{$student->name}} {{$student->last_name}}</td>
                        @php
                          $i = 1;
                          $totalStudentMark = 0;
                        @endphp
                        @foreach($getSubject as $subject)

                          @php
                            $totalMark = 0;  
                            $getMark = $subject->getMark($student->id, Request::get('exam_id'), Request::get('class_id'), $subject->subject_id);

                            if(!empty($getMark))
                            {
                              $totalMark = ($getMark->assignment_marks + $getMark->exam_marks)/2;
                            }

                            
                          @endphp
                          <td>
                            <div style="margin-bottom:10px;">
                              Assignment Marks
                              <input type="hidden" name="mark[{{$i}}][full_marks]" value="{{$subject->full_marks}}">
                              <input type="hidden" name="mark[{{$i}}][passing_marks]" value="{{$subject->passing_marks}}">

                              <input type="hidden" name="mark[{{$i}}][id]" value="{{$subject->id}}">
                              <input type="hidden" name="mark[{{$i}}][subject_id]" value="{{$subject->subject_id}}">
                              <input type="text" name="mark[{{$i}}][assignment_marks]" id="assignment_marks_{{$student->id}}{{$subject->subject_id}}" style="width:200px;" placeholder="Enter Marks" value="{{ !empty($getMark->assignment_marks) ? $getMark->assignment_marks : ''}}" class="form-control">
                            </div>
                            <div style="margin-bottom:10px;">
                              Exam Marks
                              <input type="text" name="mark[{{$i}}][exam_marks]" id="exam_marks_{{$student->id}}{{$subject->subject_id}}" style="width:200px;" placeholder="Enter Marks" value="{{ !empty($getMark->exam_marks) ? $getMark->exam_marks : ''}}" class="form-control">
                            </div>
                            @if(!empty($getMark))
                              <div style="margin-bottom:10px;">
                                <b>Total Mark :</b> {{$totalMark}}</br>
                                <b>Passing Mark :</b> {{$subject->passing_marks}}</br>
                                @if( $totalMark >= $subject->passing_marks)
                                  Status : <span style="color:green;font-weight:bold;">Pass</span></br>
                                @else
                                  Status : <span style="color:red;font-weight:bold;">Fail</span></br>
                                @endif

                                @php
                                  $getGrade = App\Models\MarkGradeModel::getGrade($totalMark);
                                @endphp
                                @if(!empty($getGrade))
                                <b>Grade : {{$getGrade}}</b></br>
                                @endif
                              </div>
                            @endif
                            <div style="margin-bottom:10px;">
                              <button type="button" class="btn btn-primary SaveSingleSubject" id="{{ $student->id }}" data-val="{{ $subject->subject_id }}" data-exam="{{Request::get('exam_id')}}" data-schedule="{{ $subject->id}}" data-class="{{Request::get('class_id')}}">Save</button>
                            </div>
                            
                          </td>
                          @php
                          $i++;
                        @endphp
                        @endforeach
                        <td>
                          <button type="submit" class="btn btn-success">Save</button>
                        </td>
                      </tr>
                      </form>
                        @endforeach
                      @endif
                  </tbody>
                </table>
               
                
              </div>
            </div>
          @endif
           
     
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection

@section('script').
<script type="text/javascript">
  $('.SubmitForm').submit(function(e){
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "{{url('teacher/submit_marks_register')}}",
        data: $(this).serialize(),
        dataType: "json",
        success: function(data){
            alert(data.message);
        }
      });
  });

  $('.SaveSingleSubject').click(function(e){
    var student_id = $(this).attr('id');
    var subject_id = $(this).attr('data-val');
    var exam_id = $(this).attr('data-exam');
    var class_id = $(this).attr('data-class');
    var id = $(this).attr('data-schedule');

    var assignment_marks = $('#assignment_marks_'+student_id+subject_id).val();
    var exam_marks = $('#exam_marks_'+student_id+subject_id).val();

    $.ajax({
        type: "POST",
        url: "{{url('teacher/single_submit_marks_register')}}",
        data: {
          "_token" : "{{ csrf_token() }}",
          id : id,
          student_id : student_id,
          subject_id : subject_id,
          exam_id : exam_id,
          class_id : class_id,
          assignment_marks : assignment_marks,
          exam_marks : exam_marks
        },
        dataType: "json",
        success: function(data){
            alert(data.message);
        }
      });
  });
  
</script>
@endsection
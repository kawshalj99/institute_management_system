@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Exam Result <span>({{$getStudent->name}} {{$getStudent->last_name}})</span></h1>
          </div>
        </div>
      </div>
    </section>

        
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @forelse($getRecord as $value)
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$value['exam_name']}}</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Assignment Marks</th>
                      <th>Exam Marks</th>
                      <th>Total Marks</th>
                      <th>Passing Marks</th>
                      <th>Full Marks</th>
                      <th>Status</th>
                      <th>Grade</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse($value['subject'] as $exam)
                     <tr>
                      <td>{{$exam['subject_name']}}</td>
                      <td>{{$exam['assignment_marks']}}</td>
                      <td>{{$exam['exam_marks']}}</td>
                      <td>{{$exam['total_marks']}}</td>
                      <td>{{$exam['passing_marks']}}</td>
                      <td>{{$exam['full_marks']}}</td>
                      <td>
                        @if($exam['total_marks'] >= $exam['passing_marks'])
                          <span style="color: green; font-weight: bold;">Pass</span>
                        @else
                          <span style="color: red; font-weight: bold;">Fail</span>
                        @endif
                      </td>
                      <td>
                      @php
                        $getGrade = App\Models\MarkGradeModel::getGrade($exam['total_marks']);
                      @endphp
                      @if(!empty($getGrade))
                        <b>{{$getGrade}}</b>
                      @endif
                      </td>
                     </tr>
                     @empty
                      <tr>
                        <td colspan="100%">Record not Found</td>
                      </tr>
                     @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @empty
            <tr>
              <td colspan="100%">Record not Found</td>
            </tr>
          @endforelse
        </div>
      </div>
    </section>
  </div>

@endsection
@extends('layout.app')

@section('content')

@section('style')
<style type="text/css">
.fc-daygrid-event {
  white-space: normal;
}
</style>
@endsection

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Calendar - ({{$getStudent->name}} {{$getStudent->last_name}})</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div id="calendar"></div>
          </div>
        </div>
      </div>
    </section>
  </div>



@endsection

@section('script')

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script scr="{{ url('public/assets/dist/fullcalendar/index.global.js')}}"></script>

<script type="text/javascript">
    var events = new Array();

    @foreach($getMyTimetable as $value)
        @foreach($value['week'] as $week)
            events.push({
                title: '{{ $value['name']}}',
                daysOfWeek: [{{$week['fullcalendar_day']}}],
                startTime: '{{$week['start_time']}}',
                endTime: '{{$week['end_time']}}',
                

            });

        @endforeach
    @endforeach

    @foreach($getExamTimetable as $valueE)
        @foreach($valueE['exam'] as $exam)
            events.push({
                title: '{{ $valueE['name']}} - {{ $exam['subject_name']}} ({{ $exam['start_time']}} to {{ $exam['end_time']}})',
                start: '{{ $exam['exam_date']}}',
                end: '{{ $exam['exam_date']}}',
                color: 'green',
                
                

            });

        @endforeach
    @endforeach


    var calendarID = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarID, {
        headerToolbar: {
            left:'prev,next today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay,listWeek'
        },
        initialDate: '<?=date('Y-m-d')?>',
        navLinks: true,
        editable: false,
        events: events,
        initialView: 'timeGridWeek'
    });

    calendar.render();
</script>
@endsection
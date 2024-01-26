@extends('layouts.app')
@section('style')

<style type="text/css">
.fc-daygrid-event {
    white-space: normal;
}
</style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Calendar <span style="color: #3180FF;">({{ $getStudent->name }} {{ $getStudent->middle_name }} {{ $getStudent->last_name }})</span> </h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div id="calendar"></div>
                    </div>     
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('script')
<script src="{{ url('public/dist/fullcalendar/index.global.js') }}"></script>
<script type="text/javascript">
    var events = new Array();

   
    
    var calendarID = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarID, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: '<?=date('Y-m-d')?>', 
        navLinks: true,
        editable: false,
        events: events,
        // initialView: 'dayGridMonth',
    });

    calendar.render();
</script>
@endsection
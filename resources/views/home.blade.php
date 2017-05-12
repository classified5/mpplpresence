@extends('admin_template')

@section('content')
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

 <link rel="stylesheet" href={{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }} >
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{ asset("/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css") }}>

<link rel="stylesheet" href={{ asset("/bower_components/admin-lte/plugins/fullcalendar/fullcalendar.min.css") }}>
  <link rel="stylesheet" href={{ asset("/bower_components/admin-lte/plugins/fullcalendar/fullcalendar.print.css") }} media="print">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src={{ asset("/bower_components/admin-lte/plugins/fullcalendar/fullcalendar.min.js") }}></script>


  <script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [
        {
          title: 'All Day Event',
          start: new Date(y, m, 1),
          backgroundColor: "#f56954", //red
          borderColor: "#f56954" //red
        },
        {
          title: 'Long Event',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2),
          backgroundColor: "#f39c12", //yellow
          borderColor: "#f39c12" //yellow
        },
        {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false,
          backgroundColor: "#0073b7", //Blue
          borderColor: "#0073b7" //Blue
        },
        {
          title: 'Lunch',
          start: new Date(y, m, d, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false,
          backgroundColor: "#00c0ef", //Info (aqua)
          borderColor: "#00c0ef" //Info (aqua)
        },
        {
          title: 'Birthday Party',
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false,
          backgroundColor: "#00a65a", //Success (green)
          borderColor: "#00a65a" //Success (green)
        },
        {
          title: 'Click for Google',
          start: new Date(y, m, 28),
          end: new Date(y, m, 29),
          url: 'http://google.com/',
          backgroundColor: "#3c8dbc", //Primary (light-blue)
          borderColor: "#3c8dbc" //Primary (light-blue)
        }
      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });
</script>


<style>
  .color-palette {
    height: 35px;
    line-height: 35px;
    text-align: center;
  }

  .color-palette-set {
    margin-bottom: 15px;
  }

  .color-palette span {
    display: none;
    font-size: 12px;
  }

  .color-palette:hover span {
    display: block;
  }

  .color-palette-box h4 {
    position: absolute;
    top: 100%;
    left: 25px;
    margin-top: -40px;
    color: rgba(255, 255, 255, 0.8);
    font-size: 12px;
    display: block;
    z-index: 7;
  }
</style>


<div class="row">
  <div class="col-md-12">
    <!-- Custom Tabs -->
    
       

      <!-- <div class="tab-content">
        @if (\Session::has('success'))
        <div class="callout callout-success">
          <h4>Sukses!!</h4>

          <p>User successfully submit his presence</p>
        </div>
        @elseif (\Session::has('noteligible'))
        <div class="callout callout-danger">
          <h4>Failed!!</h4>

          <p>User is not eligible</p>
        </div>

        @elseif (\Session::has('notfound'))
        <div class="callout callout-danger">
          <h4>Failed!!</h4>

          <p>User Not Found</p>
        </div>

        @endif -->

        @if (isset($status))
        @foreach ($status as $value)
        <div class="col-lg-8 callout callout-danger" style="margin-left:20%">
            Anda sudah absen {{$value[0]->jumlah}} kali pada mata kuliah {{$value[0]->nama_matkul}}
        </div>
        @endforeach
        @endif
         <div class="col-lg-3 col-xs-6" style="margin-left:300px;">
        
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{session('minggu')}}<sup style="font-size: 20px"></sup></h3>

              <p>Week</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6" style="">
        
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo date("d M Y");?><sup style="font-size: 20px"></sup></h3>

              <p>Date</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>


        <!--  <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
           
              <div id="calendar"></div>
            </div>
           
          </div>
          
        </div>
 -->
       <!--  -->

      
        <!-- /.tab-pane -->
       
        <!-- /.tab-pane -->

        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
   
    <!-- nav-tabs-custom -->
  </div>
  <!-- /.col -->

  <script>
    $(document).ready(function(){
      var info = <?php echo (isset($info) ? $info : NULL) ?>;
      if (info) {
        alert(<?php $info ?>);
      }
    })
  </script>


  <!-- /.col -->
</div>
@endsection
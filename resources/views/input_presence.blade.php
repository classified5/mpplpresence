@extends('admin_template')

@section('content')

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Input Presensi Kelas</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form action="{{ url('/detail_presence') }}" method="post">
      <input type="hidden" name="mata_kuliah" value="{{$idkelas}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        <div class="col-md-12">
         <div class="form-group">
          <label>Date:</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tanggal" class="form-control pull-right" id="datepicker">
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <div class="bootstrap-timepicker">
          <div class="form-group">
            <label>Jam Mulai</label>
            <div class="input-group">
              <input type="text" name="jam_mulai" class="form-control timepicker">
              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
        </div>
      </div>
      <div class="col-md-6">
        <div class="bootstrap-timepicker">
          <div class="form-group">
            <label>Jam Selesai</label>
            <div class="input-group">
              <input type="text" name="jam_selesai" class="form-control timepicker">
              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Deskripsi</label>              
          <textarea class="form-control" rows="3" name="deskripsi" placeholder="Enter ..."></textarea>
        </div>
      </div>
    
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.box-body -->
<div class="box-footer">

</div>
  <button type="submit" class="btn btn-block btn-success">Next</button>
</div>
</form>

<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    $(".select1").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 1, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd MM yyyy'
    }).datepicker("setDate", new Date());

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      minuteStep: 1,
      showInputs: false
    });
  });
</script>

@endsection
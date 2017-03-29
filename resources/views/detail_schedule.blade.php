@extends('admin_template')

@section('title', 'Detail Schedule')
@section('content')
 
          
    <!-- Content Header (Page header) -->
   <!--  <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section> -->




    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Schedule</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Kelas</th>
                  <th>Ruangan</th>
                  <th>Day</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  @if (Auth::user()->ID_ROLE === 2)
                    <th>Action</th>
                  @endif
              
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>APSI A</td>
                  <td>IF 101</td>
                  <?php  

                  $timestamp = strtotime('2016-12-13');


                  ?>
                  <td>{{ date('l', $timestamp) }}</td>
                  <td>07:00</td>
                  <td> 09:30</td>
                  @if (Auth::user()->ID_ROLE === 2)
                  <td><a href={{url('/edit_schedule') }} > <button type="button" style="width:60px; display: inline-block;" class="btn btn-block btn-success">Edit</button></a></td>
                  @endif
                </tr>
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    


<!-- 

<script src="{{ asset ("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>


<script src="{{ asset ("/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") }}"> </script>

<script src="{{ asset ("/bower_components/admin-lte/plugins/fastclick/fastclick.js") }}"></script>

<script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}"></script>

<script src="{{ asset ("/bower_components/admin-lte/dist/js/demo.js") }}"></script>
     -->
 <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

@endsection



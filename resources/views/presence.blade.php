@extends('admin_template')

@section('title', 'Presence')
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

        @if (Auth::user()->ID_ROLE === 3)
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Table</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Class Name</th>
                    <th>Lecturer</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Permit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                    <td>APSI A</td>
                    <td>Sarwosri</td>
                    <td>10</td>
                    <td>1</td>
                    <td>2</td>
                    <td><button type="button" style="width:60px; display: inline-block;" class="btn btn-block btn-success">Detail</button></td>
                    <!-- <td>detail</a></td> -->
                    </tr>
                    <tr>
                     <td>APSI B</td>
                    <td>Adhatus</td>
                    <td>5</td>
                    <td>1</td>
                    <td>2</td>
                    <td><a href="{{url('/historya') }}"> <button type="button" style="width:60px; display: inline-block;" class="btn btn-block btn-success">Detail</button></a></td>
                    </tr>

                    <tr>

                    <td>MBD A</td>
                    <td>Sarwosri</td>
                    <td>35</td>
                    <td>1</td>
                    <td>2</td>
                    <td><button type="button" style="width:60px; display: inline-block;" class="btn btn-block btn-success">Detail</button></td>
                    </tr>

                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          @else
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Table</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Class Name</th>
                    <th>Lecturer</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Permit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($listKelas as $kelas)
                    <td>{{$kelas->NAMA_KELAS}}</td>
                    <td>{{$kelas->NAMA}}</td>
                    <td>{{$kelas->present}}</td>
                    <td>{{$kelas->absent}}</td>
                    <td>{{$kelas->permit}}</td>
                    <td><a href="{{URL::to('presence/history/'.$kelas->ID_KELAS)}}"><button type="button" style="width:60px; display: inline-block;" class="btn btn-block btn-success">Detail</button></a></td>
                    <!-- <td>detail</a></td> -->
                  @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>`
          @endif
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



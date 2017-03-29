@extends('admin_template')

@section('title', 'History')
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
              <h3 class="box-title">Presence History</h3>
              
            </div>
            <?php $no = 1 ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2 " class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Type</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($list as $key)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$key->created_at}}</td>
                    <td>{{$key->NAME_TYPE}}</td>
                  </tr>
                  @endforeach
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
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });
</script>

@endsection
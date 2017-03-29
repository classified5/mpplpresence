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
                    <th>Student ID</th>
                    <th>Date</th>
                    <th>Type</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr>
                    <td>1</td>
                    <td>5114100186</td>
                    <td>2016-12-17 00:50:39</td>
                    <td>1</td>
                  </tr>


                  <tr>
                    <td>2</td>
                    <td>5114100136</td>
                    <td>2016-19-17 00:50:39</td>
                    <td>1</td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td>5114100112</td>
                    <td>2016-12-17 00:53:39</td>
                    <td>1</td>
                  </tr>

                  <tr>
                    <td>4</td>
                    <td>5114100116</td>
                    <td>2016-12-17 00:51:12</td>
                    <td>1</td>
                  </tr>

                  <tr>
                    <td>5</td>
                    <td>5114100001</td>
                    <td>2016-12-17 00:52:39</td>
                    <td>1</td>
                  </tr>
                  

                  <tr>
                    <td>6</td>
                    <td>5114100172</td>
                    <td>2016-12-17 00:50:39</td>
                    <td>2</td>
                  </tr>

                  <tr>
                    <td>7</td>
                    <td>5114100186</td>
                    <td>2016-19-17 00:12:39</td>
                    <td>3</td>
                  </tr>

                  <tr>
                    <td>8</td>
                    <td>5114100136</td>
                    <td>2016-26-17 00:08:39</td>
                    <td>3</td>
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
@extends('admin_template')

@section('title', 'List of available class')
@section('content')


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">


      <div class="box">
        <div class="box-header">
          <!-- <h3 class="box-title">Daftar kelas aktif</h3> -->
          <button type="button" style="width:100px; float:right;" class="btn btn-block btn-info" data-toggle="modal" data-target="#myModal">Generate</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Class Name</th>
                <th>Course ID</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($class as $temp)
              <tr>
                <td>{{ $temp->NAMA_KELAS }}</td>
                <td>{{ $temp->KODE_MK }}</td>
                <td>
                 <a href={{url('/detail_schedule') }} > <button type="button" style="width:60px; display: inline-block;" class="btn btn-block btn-success">Detail</button></a></td>
                  
                </tr>
                @endforeach
                
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

    <div class="example-modal" id="generate">
      <div class="modal modal-warning">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Warning Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body…</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>

      <div class="modal fade modal-warning" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Generate Schedule Succesful!</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>



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



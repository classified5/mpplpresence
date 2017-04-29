
@extends('admin_template')

@section('content')


<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Account Manager</h3>
  </div>

  <div id="example1_wrapper" class="box-body">
    <label>
      <a href="adduser" class="btn btn-primary">Tambah</a>
    </label>
    
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row col-sm-12">
        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
            <tr role="row">
              <th >Id User</th>
              <th >Role</th>
              <th >Nama</th>
              <th >Password</th>
              <th >Edit</th>
              <th >Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $row)
            <tr role="row">
              <td>{{$row->id_user}}</td>
              <td>{{$row->id_role}}</td>
              <td>{{$row->nama}}</td>
              <td>{{$row->password}}</td>
              <td>
                  <form method="post" action="edituser">
                    <!-- <input type="hidden" name="_token" value="{{!! csrf_token() !!}}"> -->
                    {{ csrf_field() }}
                    <input type="hidden" name="id_user" value="{{$row->id_user}}">
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </form>
              </td>
              <td><form method="post" action="deleteuser">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_user" value="{{$row->id_user}}">
                    <button type="submit" class="btn btn-primary">Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

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
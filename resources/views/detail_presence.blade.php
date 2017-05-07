@extends('admin_template')

@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Absen</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    @if(Session::has('info'))
      <div class="alert alert-success" role="alert">
        {{Session::get('info')}}
      </div>
    @endif  
    <div class="row col-sm-12">
      <form method="post" action="{{ url('/submit_presence') }}">
        {{ csrf_field() }}
        <input type="hidden" name="minggu" value="{{$minggu}}">
        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
            <tr role="row">
              <th style="width: 33%">NRP</th>
              <th style="width: 33%">Nama</th>
              <th >Status Absen</th>
            </tr>

            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 178.778px;">Engine version</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 129.889px;">CSS grade</th> --></tr>
          </thead>
          <tbody>
            <?php $count=0;?>
            @foreach ($user as $row)
            <tr role="row" class="odd">
              <?php $count++;?>
              <td class="sorting_1">{{$row->id_user}}</td>
              <input type="hidden" name="mata_kuliah" value="{{$row->kode}}">
              <input type="hidden" name="id_mengambil{{$count}}" value="{{$row->id_mengambil}}">
              <input type="hidden" name="id_user{{$count}}" value="{{$row->id_user}}">
              <td>{{$row->nama}}</td>
              <td><select class="form-control select2" name="status{{$count}}" style="width: 100%;">
                @if ($row->status_absen==1)
                  <option selected value="1">Masuk</option>
                  <option value="0">Absen</option>
                @else
                  <option value="1">Masuk</option>
                  <option selected value="0">Absen</option>
                @endif
              </select></td>
            </tr>
            @endforeach

          </tbody>
        </table>
        <input type="hidden" name="count" value="{{$count}}">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <!-- /.box-body -->
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
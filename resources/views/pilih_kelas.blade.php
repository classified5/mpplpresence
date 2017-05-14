@extends('admin_template')

@section('content')

<div class="box box-default">
  @if($id=='report') 
  <form action="{{ url('/report_presence') }}" method="get">
    @elseif ($id=='input')
    <form action="{{ url('/input_presence') }}" method="get">
      @endif
      <div class="box-header with-border">
        <h3 class="box-title">Pemilihan Kelas</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">

            <div class="form-group">
              @if($class!=null)
              <label>Kelas</label>
              <select class="form-control select2" style="width: 100%;" name="idkelas">
                @foreach ($class as $key)
                <option value="{{ $key->kode }}">{{ $key->nama_matkul }}</option>
                @endforeach
              </select>
              @else
              <label>Data Tidak Tersedia</label>
              @endif

            </div>
            <!-- /.form-group -->

            <!-- /.form-group -->
          </div>


          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer">

      </div>
      @if($class!=null)
      <input type="submit" value="Next"  class="btn btn-block btn-success"></input>
      @endif

    </form>
  </div>












  @endsection
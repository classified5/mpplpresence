@extends('admin_template')

@section('content')
    <div class='row'>
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Schedule</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Ruangan</label>
                 <select class="form-control select2" style="width: 100%;">
                    <option>IF 101</option>
                    <option>IF 102</option>
                    <option>IF 103</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jam Mulai</label>
                  <input type="time" class="form-control" id="exampleInputPassword1" placeholder="Enter Jam Mulai">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jam Selesai</label>
                  <input type="time" class="form-control" id="exampleInputPassword1" placeholder="Enter Jam selesai">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal</label>
                  <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Enter tanggal">
                </div>

                

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection
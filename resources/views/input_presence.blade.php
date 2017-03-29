@extends('admin_template')

@section('content')
    <div class='row'>
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Presence</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NRP</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter NRP">
                </div>
               
                <div class="form-group">
                  <label for="exampleInputPassword1">Kelas</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option>APSI A</option>
                    <option>APSI B</option>
                    <option>MBD</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">TIpe Absen</label>
                   <select class="form-control select2" style="width: 100%;">
                    <option>Present</option>
                    <option>Absent</option>
                    <option>Permit</option>
                  </select>
                </div>

                

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection
@extends('admin_template')

@section('content')
    <div class='row'>
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Role</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option>Student</option>
                    <option>Lecturer</option>
                    <option>Admin</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Alamat">
                </div>

                

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection
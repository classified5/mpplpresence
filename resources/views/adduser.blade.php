
@extends('admin_template')

@section('content')


<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action='adduser' method='post' role="form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">ID</label>
                  <input type="text" class="form-control" id="id" name='id'placeholder="Enter id" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" id="nama" name='nama' placeholder="Enter Nama" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="password" name='password' placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="role">Role</label>
                  <select name="role" class='form-control' required>
                    <option value="" disabled selected>Pilih role</option>
                    <option value="1">Dosen</option>
                    <option value="2">Mahasiswa</option>
                    <option value="3">Admin</option>
                  </select>
                  
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

          @endsection
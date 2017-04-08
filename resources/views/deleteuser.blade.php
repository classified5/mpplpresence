
@extends('admin_template')

@section('content')


<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Delete User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">#911818
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

          @endsection
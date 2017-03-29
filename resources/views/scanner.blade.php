@extends('admin_template')

@section('content')
<style>
  .color-palette {
    height: 35px;
    line-height: 35px;
    text-align: center;
  }

  .color-palette-set {
    margin-bottom: 15px;
  }

  .color-palette span {
    display: none;
    font-size: 12px;
  }

  .color-palette:hover span {
    display: block;
  }

  .color-palette-box h4 {
    position: absolute;
    top: 100%;
    left: 25px;
    margin-top: -40px;
    color: rgba(255, 255, 255, 0.8);
    font-size: 12px;
    display: block;
    z-index: 7;
  }
</style>

<h2 class="page-header">Scanner</h2>

<div class="row">
  <div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
      @if (Auth::user()->ID_ROLE === 1)
        <li class="active"><a href="#tab_1" data-toggle="tab">Student</a></li>
      @elseif (Auth::user()->ID_ROLE === 2)
        <li><a href="#tab_2" data-toggle="tab">Lecturer</a></li>
        <li><a href="#tab_3" data-toggle = "tab">Start Class</a></li>
        <li><a href="#tab_4" data-toggle = "tab">Stop Class</a></li>
        
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      @endif
      </ul>
      <div class="tab-content">
        @if (\Session::has('success'))
        <div class="callout callout-success">
          <h4>Sukses!!</h4>

          <p>User successfully submit his presence</p>
        </div>
        @elseif (\Session::has('noteligible'))
        <div class="callout callout-danger">
          <h4>Failed!!</h4>

          <p>User is not eligible</p>
        </div>

        @elseif (\Session::has('notfound'))
        <div class="callout callout-danger">
          <h4>Failed!!</h4>

          <p>User Not Found</p>
        </div>

        @endif

        <?php if (Auth::user()->ID_ROLE === 1): ?>
          <div class="tab-pane active" id="tab_1">
            <div class="box-header with-border">
              <h3 class="box-title">Student</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('/scanner') }}" method="post">


              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>NRP</label>
                  <select name ="ID_USER" class="form-control select2" style="width: 100%;">
                    <option value = "0" >-</option>
                    @foreach ($student as $temp2)
                    <option value = "{{$temp2->ID_USER}}" >{{ $temp2->ID_USER }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Class</label>
                  <select name ="ID_KELAS" class="form-control select2" style="width: 100%;">
                    <option value = "0" >-</option>
                    @foreach ($kelas as $temp)
                    <option value = "{{ $temp->ID_KELAS}}" >{{ $temp->NAMA_KELAS }}</option>
                    @endforeach


                  </select>
                </div>




                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        <?php endif ?>
        <!-- /.tab-pane -->
        <?php if (Auth::user()->ID_ROLE === 2): ?>
          <div class="tab-pane" id="tab_2">
            <div class="box-header with-border">
              <h3 class="box-title">Lecturer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label>NIP</label>
                  <select name ="ID_USER" class="form-control select2" style="width: 100%;">
                    <option value = "0" >-</option>
                    @foreach ($lecturer as $temp2)
                    <option value = "{{$temp2->ID_USER}}" >{{ $temp2->ID_USER }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Class</label>
                  <select  name ="ID_KELAS" class="form-control select2" style="width: 100%;">
                    @foreach ($kelas as $temp)
                    <option value = "{{$temp->ID_KELAS}}">{{ $temp->NAMA_KELAS }}</option>
                    @endforeach


                  </select>
                </div>




                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>

          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_3">
            <div class="box-header with-border">
              <h3 class="box-title">Start Class</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('/scanner') }}" method="post">


              {{ csrf_field() }}
              <div class="box-body">


                <div class="form-group">
                  <label>Class</label>
                  <select name ="ID_KELAS" class="form-control select2" style="width: 100%;">
                    <option value = "0" >-</option>
                    @foreach ($kelas as $temp)
                    <option value = "{{ $temp->ID_KELAS}}" >{{ $temp->NAMA_KELAS }}</option>
                    @endforeach


                  </select>
                </div>




                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Start</button>
                </div>
              </div>
            </form>
          </div>


          <div class="tab-pane" id="tab_4">
            <div class="box-header with-border">
              <h3 class="box-title">Stop Class</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('/scanner') }}" method="post">


              {{ csrf_field() }}
              <div class="box-body">


                <div class="form-group">
                  <label>Class</label>
                  <select name ="ID_KELAS" class="form-control select2" style="width: 100%;">
                    <option value = "0" >-</option>
                    @foreach ($kelas as $temp)
                    <option value = "{{ $temp->ID_KELAS}}" >{{ $temp->NAMA_KELAS }}</option>
                    @endforeach


                  </select>
                </div>




                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Stop</button>
                </div>
              </div>
            </form>
          </div>
        <?php endif ?>
        <!-- /.tab-pane -->
      </div> 

      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </div>
  <!-- /.col -->

  <script>
    $(document).ready(function(){
      var info = <?php echo (isset($info) ? $info : NULL) ?>;
      if (info) {
        alert(<?php $info ?>);
      }
    })
  </script>
  <!-- /.col -->
</div>
@endsection
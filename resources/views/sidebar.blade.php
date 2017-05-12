<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p> -->
                <!-- Status -->
              <!--   <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->

        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
       
            <li><a href="{{ route('home') }}"> <i class = "fa  fa-home"></i><span>Home</span></a></li>

            <li><a href="{{ route('home') }}"> <i class = "fa  fa-home"></i><span>Profile</span></a></li>
        
            <!-- Optionally, you can add icons to the links -->
            @if (Auth::user()->id_role == 1)

            <li><a href="{{ route('account-manager') }}"><i class="fa fa-user"></i><span>Account Manager</span></a></li>

            <li class="treeview">
                <a href="#"><span>Presensi</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    
                     <li><a href="{{ route('rekap') }}"><i class="fa fa-user"></i><span>Rekap</span></a></li>
                </ul>
            </li>
            
            @endif

            @if (Auth::user()->id_role == 2)
            
            <li class="treeview">
                <a href="#"><span>Presensi</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('pilihkelas','input') }}"><i class = "fa  fa-check-square"> </i><span>Input Presensi</span></a></li>
                     <li><a href="{{ route('pilihkelas','report') }}"><i class="fa fa-user"></i><span>Laporan Presensi</span></a></li>
                </ul>
            </li>

            @endif

            @if (Auth::user()->id_role == 3)

            <li><a href="{{ route('presencemahasiswa') }}"><i class="fa fa-user"></i><span>Rekap</span></a></li>

            @endif

            
        
           
<!-- 
            <li><a href="{{ route('reportpresencegraph') }}"><i class="fa fa-user"></i><span>Laporan Presensi (Grafik)</span></a></li>

            <li><a href="{{ route('account-manager') }}"><i class="fa fa-user"></i><span>Account Manager</span></a></li>
 -->

           
            <!-- <li><a href="{{ route('adduser') }}"><i class="fa fa-user"></i><span>Add User</span></a></li>

            <li><a href="{{ route('edituser') }}"><i class="fa fa-user"></i><span>Edit User</span></a></li>

            <li><a href="{{ route('deleteuser') }}"><i class="fa fa-user"></i><span>Delete User</span></a></li> -->
        
            <!-- <li class="treeview">
                <a href="#"><span>Scanner</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Link in level 2</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li> -->

            <!-- <li><a href="{{url('/scanner') }}"><i class ="fa fa-credit-card"></i><span>Profil</span></a></li> -->
            <!-- <li><a href="{{url('/schedule') }}"><i class="fa fa-calendar"></i><span>Schedule</span></a></li> -->

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
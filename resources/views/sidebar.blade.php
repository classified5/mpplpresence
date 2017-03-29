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
        @if (Auth::user()->ID_ROLE === 1 || Auth::user()->ID_ROLE === 2 || Auth::user()->ID_ROLE === 3)
            <li><a href="{{ url('/') }}"> <i class = "fa  fa-home"></i><span>Home</span></a></li>
        @endif
            <!-- Optionally, you can add icons to the links -->
        @if (Auth::user()->ID_ROLE === 1 || Auth::user()->ID_ROLE === 2 || Auth::user()->ID_ROLE === 3)
            <li><a href="{{url('/presence') }}"><i class = "fa  fa-check-square"> </i><span>Presence</span></a></li>
        @endif
        @if (Auth::user()->ID_ROLE === 3)
            <li><a href={{url('/user') }}><i class="fa fa-user"></i><span>User</span></a></li>
        @endif
            <!-- <li class="treeview">
                <a href="#"><span>Scanner</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Link in level 2</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li> -->

            <li><a href="{{url('/scanner') }}"><i class ="fa fa-credit-card"></i><span>Scanner</span></a></li>
            <li><a href="{{url('/schedule') }}"><i class="fa fa-calendar"></i><span>Schedule</span></a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
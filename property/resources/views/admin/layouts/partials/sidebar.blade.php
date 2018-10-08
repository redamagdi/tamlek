<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('images/112039_man_512x512.png')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Admins</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{route('users.create')}}"><i class="fa fa-circle-o"></i> Add new admin</a></li>
          <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> All admins</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Regions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('country.index')}}"><i class="fa fa-circle-o"></i> Country</a></li>
          <li><a href="{{route('state.index')}}"><i class="fa fa-circle-o"></i> State</a></li>
          <li><a href="{{route('city.index')}}"><i class="fa fa-circle-o"></i> City</a></li>
          <li><a href="{{route('region.index')}}"><i class="fa fa-circle-o"></i> Region</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Ads</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('page.index')}}"><i class="fa fa-circle-o"></i> Pages</a></li>
          <li><a href="{{route('ads.index')}}"><i class="fa fa-circle-o"></i> Ads</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Property</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('type.index')}}"><i class="fa fa-circle-o"></i> All type</a></li>
          <li><a href="{{route('feature.index')}}"><i class="fa fa-circle-o"></i> All feature</a></li>
          <li><a href="{{route('property.index')}}"><i class="fa fa-circle-o"></i> All property</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

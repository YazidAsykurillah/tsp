<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        
        {!! Html::image('img/admin-lte/user2-160x160.jpg', 'User Image', ['class'=>'img-circle']) !!}

      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-lock text-success"></i>{{ Auth::user()->roles->first()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">NAVIGATION</li>
      <li {{{ (Request::is('home') ? 'class=active' : '') }}}>
        <a href="{{ URL::to('home') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      @if(\Auth::user()->can('access-configuration'))
      <li class="treeview {{{ (Request::is('configuration*') ? 'active':'') }}}">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Configuration</span>
        </a>
        <ul class="treeview-menu">
          <li class="{{{ (Request::is('configuration/role*') ? 'active':'') }}}">
            <a href="{{ URL::to('configuration/role') }}">
              <i class="fa fa-circle-o"></i> Role
            </a>
          </li>
          <li class="{{{ (Request::is('configuration/permission*') ? 'active':'') }}}">
            <a href="{{ URL::to('configuration/permission') }}">
              <i class="fa fa-circle-o"></i> Permission
            </a>
          </li>
        </ul>
      </li>
      @endif
      

    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

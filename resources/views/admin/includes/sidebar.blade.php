<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Auth::user()->profile->pic }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->profile->first_name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-dashboard"></i> <span>Dashboard</span></li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ route('admin_setting.create') }}"><i class="fa fa-cog"></i> <span>General Setting</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Blog Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('blog.create') }}"><i class="fa fa-pencil"></i> Create Post</a></li>
            <li><a href="{{ route('blog.index') }}"><i class="fa fa-ellipsis-v"></i> Blog list</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
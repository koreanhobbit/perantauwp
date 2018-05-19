<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li {{ (Request::is('/' . Auth::user()->name . '/' . Auth::user()->id . '/dashboard') ? 'class="active"' : '') }}>
                <a href="{{ route('dashboard.index', ['name' => Auth::user()->name, 'user' => Auth::user()->id]) }}"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Dashboard</a>
            </li>

            <li {{ (Request::is('/' . Auth::user()->id . '/profile') ? 'class="active"' : '') }}>
                <a href="{{ route('customer.profile.index', ['user' => Auth::user()->id, 'name' => Auth::user()->name]) }}"> <i class="fa fa-user fa-fw"></i>&nbsp;Profile</a>
            </li>
            
            {{-- <li>
                <a href="#">
                    <i class="fa fa-user fa-fw"></i>&nbsp;Profile<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li {{ (Request::is('/' . Auth::user()->id . '/profile') ? 'class="active"' : '') }}>
                        <a href="{{ route('customer.profile.index', ['user' => Auth::user()->id]) }}"> <i class="fa fa-user"></i>&nbsp;Show Profile</a>
                    </li>
                    <li {{ (Request::is('/' . Auth::user()->id . '/profile/' . Auth::user()->id . 'edit') ? 'class="active"' : '') }}>
                        <a href="{{ route('customer.profile.edit', ['user' => Auth::user()->id]) }}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                    </li>
                </ul> --}}
                <!-- /.nav-second-level -->
            {{-- </li> --}}

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
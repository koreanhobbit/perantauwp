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
            <li {{ (Request::is('/' . Auth::user()->id . '/dashboard/' . Auth::user()->name . '/*') ? 'class="active"' : '') }}>
                <a href="{{ route('customer.dashboard.index', ['user' => Auth::user()->id, 'name' => Auth::user()->name]) }}"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Dashboard</a>
            </li>

            <li {{ (Request::is('/' . Auth::user()->id . '/profile/' . Auth::user()->name) . '/*' ? 'class="active"' : '') }}>
                <a href="{{ route('customer.profile.index', ['user' => Auth::user()->id, 'name' => Auth::user()->name]) }}"> <i class="fa fa-user fa-fw"></i>&nbsp;Profile</a>
            </li>
            
            <li>
                <a href="#">
                    <i class="fa fa-comments-o fa-fw"></i>&nbsp;Testimony<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li {{ (Request::is('/' . Auth::user()->id . '/testimony/' . Auth::user()->name . '/*') ? 'class="active"' : '') }}>
                        <a href="{{ route('customer.testimony.index', ['user' => Auth::user()->id, 'name' => Auth::user()->name]) }}"> <i class="fa fa-comment-o fa-fw"></i>&nbsp;Testimonies history</a>
                    </li>
                    <li {{ (Request::is('/' . Auth::user()->id . '/testimony/' . Auth::user()->name . '/*') ? 'class="active"' : '') }}>
                        <a href="{{ route('customer.testimony.create', ['user' => Auth::user()->id, 'name' => Auth::user()->name]) }}"><i class="fa fa-plus fa-fw"></i>&nbsp;Create Testimony</a>
                    </li>
                </ul>    
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
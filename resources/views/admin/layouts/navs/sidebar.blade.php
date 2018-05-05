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
            <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                <a href="{{ route('manage.index') }}"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Dashboard</a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-users fa-fw"></i>&nbsp;User Management<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li {{ (Request::is('/manage/user/*') ? 'class="active"' : '') }}>
                        <a href="{{ route('user.index') }}"> <i class="fa fa-user"></i>&nbsp;User</a>
                    </li>
                    <li {{ (Request::is('/manage/role/*') ? 'class="active"' : '') }}>
                        <a href="{{ route('role.index') }}"><i class="fa fa-user-secret"></i>&nbsp;Role</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-thumbs-up"></i>&nbsp;Permission</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            {{-- media management menu --}}
            <li>
                <a href="#">
                    <i class="fa fa-files-o fa-fw"></i>&nbsp;Media Management<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li {{ (Request::is('/manage/image/*') ? 'class="active"' : '') }}>
                        <a href="{{ route('image.index') }}"> <i class="fa fa-picture-o"></i>&nbsp;Images</a>
                    </li>
                    <li {{ (Request::is('/manage/file/*') ? 'class="active"' : '') }}>
                        <a href="{{ route('file.index') }}"> <i class="fa fa-file-pdf-o"></i>&nbsp;Files</a>
                    </li>
                    <li {{ (Request::is('/manage/scanned-file/*') ? 'class="active"' : '') }}>
                        <a href="{{ route('scannedfile.index') }}"> <i class="fa fa-file-image-o"></i>&nbsp;Scanned Files</a>
                    </li>
                </ul>
            </li>

            {{-- Forms --}}
            <li {{ (Request::is('/manage/service/form/*') ? 'class="active"' : '') }}>
                <a href="{{ route('form.index') }}">
                    <i class="fa fa-check-square-o"></i>&nbsp;Form
                </a>
            </li>

            {{-- Company Service --}}
             <li {{ (Request::is('/manage/service/*') ? 'class="active"' : '') }}>
                <a href="{{ route('service.index') }}">
                    <i class="fa fa-hand-o-right"></i>&nbsp;Service
                </a>
            </li>

            {{-- blog --}}
            <li {{ (Request::is('/manage/blog/*') ? 'class="active"' : '') }}>
                <a href="{{ route('blog.index') }}"><i class="fa fa-newspaper-o fa-fw"></i>&nbsp;Blog</a>
            </li>

            {{-- Product --}}
            <li {{ (Request::is('/manage/product/*') ? 'class="active"' : '') }}>
                <a href="{{ route('product.index') }}"><i class="fa fa-shopping-bag fa-fw"></i>&nbsp;Product</a>
            </li>

            {{-- General Settings --}}
           
            <li>
                <a href="#">
                    <i class="fa fa-gears"></i>&nbsp;Setting<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li {{ Request::is('/manage/setting/*') ? 'class="active"' : '' }}>
                        <a href="{{ route('setting.index', ['set' => 1]) }}"><i class="fa fa-gear"></i>&nbsp;Setting</a>
                    </li>
                    <li {{ Request::is('/manage/country/*') ? 'class="active"' : '' }}>
                        <a href="{{ route('country.index') }}"><i class="fa fa-flag"></i>&nbsp;Country</a>
                    </li>
                    <li {{ Request::is('/manage/partner/*') ? 'class="active"' : '' }}>
                        <a href="{{ route('partner.index') }}"><i class="fa fa-hand-spock-o"></i>&nbsp;Partner</a>
                    </li>
                </ul>
            </li>
            <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                <a href="{{ url ('charts') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                <!-- /.nav-second-level -->
            </li>
            <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                <a href="{{ url ('tables') }}"><i class="fa fa-table fa-fw"></i> Tables</a>
            </li>
            <li {{ (Request::is('*forms') ? 'class="active"' : '') }}>
                <a href="{{ url ('forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                        <a href="{{ url ('panels') }}">Panels and Collapsibles</a>
                    </li>
                    <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                        <a href="{{ url ('buttons' ) }}">Buttons</a>
                    </li>
                    <li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>
                        <a href="{{ url('notifications') }}">Alerts</a>
                    </li>
                    <li {{ (Request::is('*typography') ? 'class="active"' : '') }}>
                        <a href="{{ url ('typography') }}">Typography</a>
                    </li>
                    <li {{ (Request::is('*icons') ? 'class="active"' : '') }}>
                        <a href="{{ url ('icons') }}"> Icons</a>
                    </li>
                    <li {{ (Request::is('*grid') ? 'class="active"' : '') }}>
                        <a href="{{ url ('grid') }}">Grid</a>
                    </li>
                    <li {{ (Request::is('*progressbars') ? 'class="active"' : '') }}>
                        <a href="{{ url ('progressbars') }}">Progressbars</a>
                    </li>
                    <li {{ (Request::is('*collapse') ? 'class="active"' : '') }}>
                        <a href="{{ url ('collapse') }}">Collapse</a>
                    </li>
                    <li {{ (Request::is('*stats') ? 'class="active"' : '') }}>
                        <a href="{{ url ('stats') }}">Stats</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                        <a href="{{ url ('blank') }}">Blank Page</a>
                    </li>
                    <li>
                        <a href="{{ url ('login') }}">Login Page</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li {{ (Request::is('*documentation') ? 'class="active"' : '') }}>
                <a href="{{ url ('documentation') }}"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
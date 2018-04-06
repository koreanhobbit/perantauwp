@extends('admin.layouts.app')

@section('body')
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('admin.layouts.navs.menu')
            @include('admin.layouts.navs.sidebar')
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
            </div>
            @include('admin.layouts.flashMessage')
            <div class="row">
                @yield('section')
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@endsection

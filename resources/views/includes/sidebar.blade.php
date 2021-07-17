<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left info">
                <p>{{ __('lang.hello', ['name' => Auth::user()->name]) }} </p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="@if (Route::currentRouteName() == 'dashboard') active @endif">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>{{ __('lang.dashboard') }}</span>
                </a>
            </li>
            <li class="@if(\Request::routeIs('companies.*')) active @endif">
                <a href="{{ route('companies.index') }}">
                    <i class="fa fa-building-o"></i> <span>{{ __('lang.companies') }}</span>
                </a>
            </li>
            <li class="@if(\Request::routeIs('employees.*')) active @endif">
                <a href="{{ route('employees.index') }}">
                    <i class="fa fa-users"></i> <span>{{ __('lang.employees') }}</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

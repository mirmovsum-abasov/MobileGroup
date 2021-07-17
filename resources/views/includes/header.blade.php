<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="index.html" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        AdminLTE
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">

            <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="flag-icon flag-icon-{{ Lang::locale() }}"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right p-0">
                        <li>
                            <a href="/az" class="dropdown-item">
                                <i class="flag-icon flag-icon-az mr-2"></i> Azərbaycan
                            </a>
                        </li>
                        <li>
                            <a href="/us" class="dropdown-item">
                                <i class="flag-icon flag-icon-us mr-2"></i> English
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>{{ Auth::user()->name }} <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="{{ asset('assets/img/avatar3.png') }}" class="img-circle" alt="User Image"/>
                            <p>
                                {{ Auth::user()->name }}
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <form action="{{ route('logout') }}" method="POST" id="logout">
                                @csrf
                            </form>
                            <div onclick="document.getElementById('logout').submit()" class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">{{ __('lang.logout') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

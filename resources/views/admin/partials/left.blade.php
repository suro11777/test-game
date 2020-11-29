<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><a href="{{route('admin.home')}}"><img src="{{asset('images/logo.jpg')}}" alt="ov_e_uzum_darnal_milionater_xax" class="img-fluid rounded-circle"></a>
                <h2 class="h5">Game</h2><span>Game</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="{{route('admin.home')}}" class="brand-small text-center"> <strong>Game</strong><strong class="text-primary">Game</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">{{__("global.main")}}</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="{{route('admin.questions.index')}}"> <i class="fa fa-product-hunt"></i>{{__('questions')}}</a></li>

{{--                <li><a href="{{route('admin.questions.index')}}"><i class="fa fa-align-left"></i>{{__('global.left.questions')}}</a></li>--}}

            </ul>
        </div>

    </div>
</nav>

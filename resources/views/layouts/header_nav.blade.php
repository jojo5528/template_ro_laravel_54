<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item first"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('page.download') }}">Mini Client</a>
                        <a class="dropdown-item" href="{{ route('page.download') }}">Full Client</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{ route('page.info') }}" class="nav-link">Information</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Donate <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('page.donate') }}">Truemoney</a>
                        <a class="dropdown-item" href="{{ route('page.donate') }}">Truewallet</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{ route('page.vote') }}" class="nav-link">Vote</a></li>
            </ul>

            <!-- Right -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item border-0">
                    <a href="{{ env('APP_FB_GROUP_URL', '#!') }}" target="_blank" class="btn btn-lg btn-warning text-white rounded-pill mb-1">
                        <i class="fas fa-comments"></i> SOCIAL
                    </a>
                </li>
                <!-- Auth -->
                @guest
                    <li class="nav-item border-0">
                        <a class="btn btn-lg btn-warning text-white rounded-pill" href="{{route('login')}}">LOGIN</a>
                    </li>
                @else
                    <li class="nav-item dropdown border-0">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::user()->isGM()) <b class="badge badge-pill badge-danger">GM</b> @endif {{Auth::user()->userid}} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="fas fa-user"></i> MY ACCOUNT</a>
                            <a class="dropdown-item" href="{{ route('user.changepassword') }}"><i class="fas fa-user-edit"></i> CHANGE PASSWORD</a>
                            <a class="dropdown-item" href="{{ route('user.changemail') }}"><i class="fas fa-user-edit"></i> CHANGE EMAIL</a>

                            @if(Auth::user()->isGM())
                                <hr class="dropdown-divider">
                                <a class="dropdown-item text-info" href="{{ route('manage.guide') }}"><i class="fas fa-question-circle"></i> GUIDE</a>
                                <a class="dropdown-item" href="{{ route('manage.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASHBOARD</a>
                                <a class="dropdown-item" href="{{ route('manage.news') }}"><i class="fas fa-edit"></i> NEWS ARTICLES</a>
                                <a class="dropdown-item" href="{{ route('manage.page') }}"><i class="fas fa-edit"></i> PAGE ARTICLES</a>
                                <a class="dropdown-item" href="{{ route('manage.site') }}"><i class="fas fa-wrench"></i> SITE CONFIG</a>
                                <a class="dropdown-item" href="{{ route('manage.woe.index') }}"><i class="fas fa-wrench"></i> WOE SETTING</a>
                            @endif

                            <hr class="dropdown-divider">
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
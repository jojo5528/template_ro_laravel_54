<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item first"><a href="{{ route('home') }}" class="nav-link">หน้าแรก</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">สมัครไอดีเกมส์</a></li>
                <li class="nav-item"><a href="{{ route('page', 'download') }}" class="nav-link">ดาวน์โหลด</a></li>
		<li class="nav-item"><a href="{{ route('page', 'info') }}" class="nav-link">ข้อมูลเซิร์ฟเวอร์</a></li>
		<li class="nav-item"><a href="{{ route('page', 'donate') }}" class="nav-link">สนับสนุนเซิร์ฟเวอร์</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        เมนูเพิ่มเติม <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('page', 'zeny') }}">ตรวจสอบคนรวย</a>
                        <a class="dropdown-item" href="{{ route('page', 'level') }}">ดูอาชีพทั้งหมดในเซิร์ฟเวอร์</a>
                        <a class="dropdown-item" href="{{ route('page', 'share') }}">สะสมแต้ม Shared Facebook</a>
                        <a class="dropdown-item" href="http://147.50.241.181/worldmap.html" target="_blank">World Map 2.0</a>
                        <a class="dropdown-item" href="{{ route('page', 'vote') }}">ติดต่อ GM</a>
                    </div>
                </li>
               
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
                            <a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="fas fa-user"></i> ข้อมูลของฉัน</a>
                            <a class="dropdown-item" href="{{ route('user.changepassword') }}"><i class="fas fa-user-edit"></i> เปลี่ยนรหัสผ่าน</a>
                            <a class="dropdown-item" href="{{ route('user.changemail') }}"><i class="fas fa-user-edit"></i> เปลี่ยนอีเมลล์</a>
                            <a class="dropdown-item" href="{{ route('user.tmpay') }}"><i class="fad fa-money-bill-wave"></i> เติมเงิน TMPAY</a>

                            @if(Auth::user()->isGM())
                                <hr class="dropdown-divider">
                                <a class="dropdown-item text-info" href="{{ route('manage.guide') }}"><i class="fas fa-question-circle"></i> GUIDE</a>
                                <a class="dropdown-item" href="{{ route('manage.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASHBOARD</a>
                                <a class="dropdown-item" href="{{ route('manage.news') }}"><i class="fas fa-edit"></i> NEWS ARTICLES</a>
                                <a class="dropdown-item" href="{{ route('manage.page') }}"><i class="fas fa-edit"></i> PAGE ARTICLES</a>
                                <a class="dropdown-item" href="{{ route('manage.site') }}"><i class="fas fa-wrench"></i> SITE CONFIG</a>
                                <a class="dropdown-item" href="{{ route('manage.woe.index') }}"><i class="fas fa-wrench"></i> WOE SETTING</a>
                                <a class="dropdown-item" href="{{ route('manage.tmpay') }}"><i class="fad fa-money-bill-wave"></i> TMPAY</a>
                            @endif

                            <hr class="dropdown-divider">
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
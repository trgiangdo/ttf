<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div class="header-cover-1">
        <div class="container">
            <div class="row">
                <div class="col-md-2 hidden-xs hidden-sm">
                    <a href={{ url('/') }}>
                    <img class="logo" src="images/bkfet_logo.png" alt="" style="height: auto; width: 180px; border-radius: 20px;">
                    </a>
                </div>
                <div class="col-md-6">
                    <button type="button" class="menu-bars"><i class="fas fa-bars"></i></button>
                    <ul class="menu">
                        <li><a class="fix-a" href="/">TRANG CHỦ</a></li>
                        <li><a class="fix-a" href="/about">GIỚI THIỆU</a></li>
                        @auth
                            <li><a class="fix-a" href="/">LUYỆN TẬP</a></li>
                            <li><a class="fix-a" href="{{route('exam.index')}}">ĐỀ THI TOEIC</a></li>
                        @endauth
                        <li><a class="fix-a" href="/contact">LIÊN HỆ</a></li>
                    </ul>
                </div>
                <div class="col-md-1">
                    <li><a href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a></li>
                    <li><a href="{{ url('locale/vn') }}" ><i class="fa fa-language"></i> VN</a></li>
                </div>
                @guest
                    <div class="col-md-3">
                        <a href="{{ route('login') }}" class="fix-a sign in">Đăng nhập</a>
                        <a href="{{ route('register') }}" class="fix-a sign up">Đăng ký</a>
                    </div>
                @else
                    <img class="hidden-xs" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQI9-QX1Tr4gXxhEeSxIj_aH7xVupa3mIMyrMiAVP1cJ6Sh3qtS&s" alt="" style="width: 40px; height: 40px; border-radius: 50%">
                    <a href="/profile" class="fix-a sign up" style="margin-left: 60px; padding: 10px">{{Auth::user()->name}}</a>
                @endguest
            </div>
        </div>
    </div>
</header>
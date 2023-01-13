<div class="nav_content">
    <div class="container">
        <nav class="d-flex justify-content-between nav align-items-center">
            <div class="menu_icon">
                <i class="fa-solid fa-bars"></i>
            </div>
            <a href="{{ route('web.index') }}" class="logo text-decoration-none">
                {{-- <i class="fa-solid fa-book-bookmark ms-1"></i> --}}
                منصة الفاتح التعليمية
            </a>
            <ul>
                <li><a href="{{ route('web.index') }}" class="navLink active active_link">الرئيسية</a>
                </li>
                <li><a href="{{ url('/edu-platform/#categories') }}" class="navLink active">التصنيفات</a></li>
                {{-- <li><a href="{{ route('technical.support.show') }}" class="navLink active">الدعم الفنى</a></li> --}}
                <li class="d-none"><input type="color" id="coloc_controller"></li>
                @if (Auth('member')->check())
                <li><a href="{{ route('user.profile.form',auth()->guard('member')->user()->id) }}" class="navLink">الملف الشخصى</a></li>
                    <li><a href="{{ route('user.logout') }}" class="navLink">تسجيل خروج</a></li>
                @else
                    <li><a href="{{ route('user.login.form') }}" class="navLink">تسجيل الدخول</a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
<div class="nav_content sticky_navbar position-fixed top-0 left-0">
    <div class="container">
        <nav class="d-flex justify-content-between nav align-items-center">
            <div class="menu_icon">
                <i class="fa-solid fa-bars"></i>
            </div>
            <a href="{{ route('web.index') }}" class="logo text-decoration-none">
                {{-- <i class="fa-solid fa-book-bookmark ms-1"></i> --}}
                منصة الفاتح التعليمية
            </a>
            <ul>
                <li><a href="{{ route('web.index') }}" class="navLink active active_link">الرئيسية</a>
                </li>
                <li><a href="{{ url('/edu-platform/#categories') }}" class="navLink active">التصنيفات</a></li>
                {{-- <li><a href="{{ route('technical.support.show') }}" class="navLink active">الدعم الفنى</a></li> --}}
                <li class="d-none"><input type="color" id="coloc_controller"></li>
                @if (Auth('member')->check())
                <li><a href="{{ route('user.profile.form',auth()->guard('member')->user()->id) }}" class="navLink">الملف الشخصى</a></li>
                    <li><a href="{{ route('user.logout') }}" class="navLink">تسجيل خروج</a></li>
                @else
                    <li><a href="{{ route('user.login.form') }}" class="navLink">تسجيل الدخول</a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@isset($ads->img)
    <section class="ads text-center mb-3 mt-3" data-aos="fade-up">
        <div class="container">
            <div class="ad_img">
                <a href="{{ $ads->link }}" target="blank">
                    <img src="{{ asset('/uploads/img/' . $ads->img) }}" alt="">
                </a>
            </div>
        </div>
    </section>
@endisset


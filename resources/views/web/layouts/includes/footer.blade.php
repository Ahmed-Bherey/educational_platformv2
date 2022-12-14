</main>
<footer class="position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 footer_box">
                <div class="footer_box_content">
                    <h3 class="text-center">منصة الفاتح التعليمية</h3>
                    <p class="notes text-center">
                        تعليم مُتميز عالي الجودة بِكوادر تعليمية مُؤهلة لِبناء مُواطن مُعتزّ بِقيمه الوطنية ومُنافس عالمياً.
                    </p>
                    <div class="connection_icon d-flex justify-content-center align-items-center">
                        <div><p class="zoom">Zoom</p></div>
                        <div><p><i class="fa-brands fa-google"></i></p></div>
                        <div><p><i class="fa-brands fa-microsoft"></i></p></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 footer_box d-flex">
                <div class="footer_box_content">
                    <h3 class="text-center mb-3">منصة الفاتح التعليمية</h3>
                    <p class="notes text-center mb-3">
                        كن على تواصل دائم.
                    </p>
                    <div class="connection_icon d-flex justify-content-center align-items-center mb-3">
                        <div><p><i class="fa-brands fa-facebook-f"></i></p></div>
                        <div><p><i class="fa-brands fa-twitter"></i></p></div>
                        <div><p><i class="fa-brands fa-whatsapp"></i></p></div>
                        <div><p><i class="fa-brands fa-telegram"></i></p></div>
                        <div><p><i class="fa-brands fa-instagram"></i></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="copyright position-absolute">
        {{-- <p>
            Developed by <a href="https://api.whatsapp.com/send?phone=201221093210"
            class="text-decoration-none" target="blank">Ahmed Abdelwahab</a>
        </p> --}}
        <p class="text-center">
            جميع الحقوق محفوظة &copy; <a href="https://api.whatsapp.com/send?phone={{ $generalSetting->tel1 }}"
                class="text-decoration-none" target="blank">Ai
                Education</a>
        </p>
    </div>
</footer>

<!------------------------------- Start sidebar -------------------------->

<aside class="side_menu">
    <nav>
        <ul>
            <li><a href="{{ route('web.index') }}">الرئيسية</a></li>
            <li><a href="{{ url('/#categories') }}">التصنيفات</a></li>
            <li><a href="{{ route('web.subjectsAll') }}">اخر التحديثات</a></li>
            @if (Auth('member')->check())
                <li><a href="{{ route('web.drives') }}">المجلدات</a></li>
                <li><a href="{{ route('user.logout') }}">تسجيل خروج</a></li>
            @else
                <li><a href="{{ route('user.login.form') }}">تسجيل الدخول</a></li>
            @endif
        </ul>
    </nav>
</aside>

<!------------------------------- Start sidebar -------------------------->

<!------------------------------- Start Overlay Menu -------------------------->
<div class="overlay-menu"></div>
<!------------------------------- End Overlay Menu -------------------------->

<!------------------------------- Start Go To Top -------------------------->
<div class="go-top position-fixed end-0 bottom-0">
    <div class="container">
        <i class="fa-solid fa-arrow-up"></i>
    </div>
</div>
<!------------------------------- End Go To Top -------------------------->

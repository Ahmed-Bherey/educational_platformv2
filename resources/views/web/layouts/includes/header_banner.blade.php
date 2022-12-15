<div class="banner" data-aos="flip-up">
    <div class="banner_content">
        <h1 class="title mb-3">منصة الفاتح التعليمية</h1>
        <p class="mb-5">منصة علمية تهدف لتسهيل التعلم عن بعد، انضم الآن إلى أفضل صرح تعليمي</p>
        <div class="btns mb-5">
            <a href="{{ route('web.subjectsAll') }}" class="active">اخر التحديثات</a>
            <a href="{{ route('register.form') }}" class="register">اشترك الان</a>
        </div>
        <div class="pages">
            <a href="@isset($generalSetting->twitter){{ $generalSetting->twitter }}@endisset"><i
                    class="fa-brands fa-twitter"></i></a>
            <a href="mailto:@isset($generalSetting->email){{ $generalSetting->email }}@endisset"><i
                    class="fa-regular fa-envelope"></i></i></a>
            <a href="@isset($generalSetting->facebook){{ $generalSetting->facebook }}@endisset"><i
                    class="fa-brands fa-facebook-f"></i></a>
        </div>
    </div>
</div>
<div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
    <img src="{{ asset('public/web/img/hero-img.png') }}" class="img-fluid animated" alt="">
</div>
<svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
    viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
</svg>
<main>

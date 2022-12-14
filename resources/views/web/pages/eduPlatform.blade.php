@extends('web.layouts.includes.master')
@section('content')
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.error')
    {{-- <section class="leatest position-relative">
        <div class="container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($subjects as $key => $subject)
                        <div class="swiper-slide">
                            <div class="leatest_container">
                                <div class="row">
                                    <div class="col-12 col-md-6 leatest_img">
                                        <div class="img">
                                            <a href="{{ route('web.subject.details', $subject->id) }}">
                                                <img src="{{ asset('/public/' . Storage::url($subject->img)) }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-6 leatest_content text-center position-absolute">
                                            <p>
                                            <h3 class="mb-4">مين قال ان {{ $subject->name }} صعب؟</h3>
                                            <p class="fw-bold">انضم الى افضل منصة لشرح {{ $subject->name }}</p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section> --}}
    @isset($ad2s->img)
        <section class="ads text-center mb-3 mt-3" data-aos="fade-up">
            <div class="container">
                <div class="ad_img">
                    <a href="{{ $ad2s->link }}" target="blank">
                        <img src="{{ asset('/public/' . Storage::url($ad2s->img)) }}" alt="">
                    </a>
                </div>
            </div>
        </section>
    @endisset
    <section class="categories" data-aos="zoom-in-down" id="categories">
        <div class="container">
            <h2 class="text-right fw-bold mb-4 text-primary">التصنيفات</h2>
            <div class="row">
                @foreach ($categories as $key => $category)
                    <div class="col-12 col-md-6 col-lg-4 cat_box mb-5">
                        <div class="cat_box_content">
                            <div class="main_cat d-flex">
                                <span class="icon btn"
                                    @if ($category->icon_color != '') style="background-color: {{ $category->icon_color }}" @endif><i
                                        class="{{ $category->icon }}"></i></span>
                                <p class="btn text-center"
                                    @if ($category->color != '') style="background-color: {{ $category->color }}" @endif>
                                    {{ $category->name }}</p>
                            </div>
                            <div class="sub_cat">
                                @foreach (\App\Models\SubCategory::where('category_id', $category->id)->get() as $subCategory)
                                    <div class="d-flex">
                                        <span class="icon btn mb-1"
                                            @if ($subCategory->icon_color != '') style="background-color: {{ $subCategory->icon_color }}" @endif><i
                                                class="{{ $subCategory->icon }}"></i></span>
                                        <a href="{{ route('sub_cat_subjects', $subCategory->id) }}"
                                            class="btn mb-1 text-center"
                                            @if ($subCategory->color != '') style="background-color: {{ $subCategory->color }}" @endif>{{ $subCategory->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $categories->links() }}
    </section>
    @isset($ad3s->img)
        <section class="ads text-center mb-3 mt-3" data-aos="fade-up">
            <div class="container">
                <div class="ad_img">
                    <a href="{{ $ad3s->link }}" target="blank">
                        <img src="{{ asset('/public/' . Storage::url($ad3s->img)) }}" alt="">
                    </a>
                </div>
            </div>
        </section>
    @endisset
    {{-- <section class="subjects">
        <div class="container">
            <div class="main_subject mb-3">
                <div class="row gx-0">
                    <div class="col-12 col-lg-6 main_subject_content">
                        <a href="{{ route('web.subjects', $categoryFirst->id) }}" class="text-decoration-none">
                            <h1 class="main_subject_content_title mb-5">{{ $categoryFirst->name }}</h1>
                            <div class="head_title mb-5">
                                <ul>
                                    @foreach (\App\Models\CategoryTotal::where('category_id', $categoryFirst->id)->get() as $categorydesc)
                                        <li><span>{{ $categorydesc->desc }}</span><i class="fa-solid fa-circle-check"></i>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </a>
                        <a href="{{ route('web.subjects', $categoryFirst->id) }}" class="btn_sub">مشاهدة الان</a>
                    </div>
                    <div class="col-12 col-lg-6 main_subject_img">
                        <img src="{{ asset('/public/' . Storage::url($categoryFirst->img)) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="sub_subject">
                <div class="row">
                    @foreach ($categories as $key => $category)
                        <div class="col-12 col-md-6 col-lg-4 subject_box">
                            <div class="subject_box_img">
                                <img src="{{ asset('/public/' . Storage::url($category->img)) }}" alt="">
                            </div>
                            <div class="subject_box_content">
                                <a href="{{ route('web.subjects', $category->id) }}" class="text-decoration-none">
                                    <h1 class="main_subject_content_title mb-3">{{ $category->name }}</h1>
                                    <div class="head_title mb-5">
                                        <ul>
                                            @foreach (\App\Models\CategoryTotal::where('category_id', $category->id)->get() as $categorydesc)
                                                <li><span>{{ $categorydesc->desc }}</span><i
                                                        class="fa-solid fa-circle-check"></i>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </a>
                                <a href="{{ route('web.subjects', $category->id) }}" class="btn_sub">مشاهدة الان</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@extends('web.layouts.includes.main')
@section('content')
    <section class="supject_banner">
        <div class="container">
            <div class="subject_head">
                <h1 class="fw-bold">{{ $subject->name }}</h1>
            </div>
        </div>
    </section>
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
    <section class="subject_details">
        <div class="container">
            <div class="row">
                <h3 class="text-center mt-5">للتحميل اضغط <a href="{{ asset('/public/' . Storage::url($subject->file)) }}"
                        download="{{ $subject->name }}">هنا</a></h3>
            </div>
        </div>
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
@endsection

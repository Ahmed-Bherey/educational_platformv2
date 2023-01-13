@extends('web.layouts.includes.main')
@section('content')
    <div class="wrraber">
        <section class="supject_banner mb-5">
            <div class="container">
                <div class="subject_head">
                    <h1 class="fw-bold">{{ $sub_cat_subject->name }}</h1>
                </div>
            </div>
        </section>
        @isset($ad2s->img)
            <section class="ads text-center mb-3 mt-3" data-aos="fade-up">
                <div class="container">
                    <div class="ad_img">
                        <a href="{{ $ad2s->link }}" target="blank">
                            <img src="{{ asset('/uploads/img/' . $ad2s->img) }}" alt="">
                        </a>
                    </div>
                </div>
            </section>
        @endisset
        @if ($sub_cat_subjects->isEmpty())
            <h3 class="text-center text-danger">لم يتم اضافة دروس ل {{ $sub_cat_subject->name }} بعد</h3>
        @else
            <section class="subject_all position-relative" data-aos="fade-up">
                <div class="overflew position-fixed" id="overflew"></div>
                <div class="container">
                    <div class="row">
                        @foreach ($sub_cat_subjects as $key => $sub_cat_subject)
                            <div class="col-12 col-md-6 col-lg-4 subject_all_box">
                                <a href="{{ route('web.subject.details', $sub_cat_subject->id) }}">
                                    <div class="subject__all_box_content position-relative">
                                        <div class="subject__all_img imgBtn">
                                            <img src="{{ asset('/uploads/img/' . $sub_cat_subject->img) }}"
                                                alt="">
                                        </div>
                                        <div class="subject__all_title position-absolute text-end">
                                            <h3 class="title fw-bold text-center">
                                                <a href="#"
                                                    class="text-decoration-none">{{ $sub_cat_subject->name }}</a>
                                            </h3>
                                            <div class="d-flex justify-content-around btns">
                                                <a href="{{ route('download', $sub_cat_subject->id) }}"
                                                    class="btn btn-info fw-bold"><i class="fa-solid fa-download ms-2"></i>
                                                    <span>تحميل</span></a>
                                                <a href="{{ route('web.subject.content', $sub_cat_subject->id) }}"
                                                    class="btn btn-success fw-bold"><i
                                                        class="fa-solid fa-book-open-reader ms-2"></i>
                                                    <span>قراءة</span></a>
                                            </div>
                                            <p class="date fw-bold">{{ $sub_cat_subject->date }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        @isset($ad3s->img)
            <section class="ads text-center mb-3 mt-3" data-aos="fade-up">
                <div class="container">
                    <div class="ad_img">
                        <a href="{{ $ad3s->link }}" target="blank">
                            <img src="{{ asset('/uploads/img/' . $ad3s->img) }}" alt="">
                        </a>
                    </div>
                </div>
            </section>
        @endisset
    </div>
@endsection

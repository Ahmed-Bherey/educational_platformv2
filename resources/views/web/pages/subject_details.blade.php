@extends('web.layouts.includes.main')
@section('content')
    <section class="supject_banner">
        <div class="container">
            <div class="subject_head">
                <h1 class="fw-bold">{{ $subject->name }}</h1>
            </div>
        </div>
    </section>
    <div class="wrraber">
        <section class="subject_details">
            <div class="container">
                <div class="row flex-column">
                    <div class="subject_details_content" data-aos="fade-up">
                        <div class="video">
                            @if ($subject->video != null)
                                <video controls>
                                    <source src="{{ asset('/public/' . Storage::url($subject->video)) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <embed src="{{ asset('/public/' . Storage::url($subject->file)) }}" width="70%"
                                    height="300px" />
                            @endif
                        </div>
                    </div>
                    <div class="explain" data-aos="fade-up">
                        <p>
                            {{ $subject->explain }}
                        </p>
                        @isset($ad2s->img)
                            <section class="ads text-center mb-3 mt-3">
                                <div class="container">
                                    <div class="ad_img">
                                        <a href="{{ $ad2s->link }}" target="blank">
                                            <img src="{{ asset('/public/' . Storage::url($ad2s->img)) }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </section>
                        @endisset
                        <a href="{{ route('download', $subject->id) }}" class="btn btn-info fw-bold mb-3"><i
                                class="fa-solid fa-download ms-2"></i> <span>تحميل</span></a>
                        <a href="{{ route('web.subject.content', $subject->id) }}" class="btn btn-success fw-bold mb-3"><i
                                class="fa-solid fa-book-open-reader ms-2"></i>
                            <span>قراءة</span></a>
                        @isset($exam_id)
                            <a href="{{ route('web.subject.exam', $exam_id) }}" class="btn btn-danger fw-bold">الذهاب
                                للاختبار</a>
                        @endisset
                    </div>
                </div>

                <div class="subject_all position-relative" data-aos="fade-up">
                    <div class="overflew position-fixed" id="overflew"></div>
                    <div class="container">
                        <div class="row mb-3 align-items-center">
                            <div class="col-md-4">
                                <h3 class="text-right mb-4 text-primary">دروس مشابهة</h3>
                            </div>
                            <div class="col-md-6">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <h3 class="text-right mb-4 text-primary">دروس مشابهة</h3> --}}
                            @foreach ($sub_cat_subjects as $key => $sub_cat_subject)
                                <div class="col-12 col-md-6 col-lg-4 subject_all_box">
                                    <a href="{{ route('web.subject.details', $sub_cat_subject->id) }}">
                                        <div class="subject__all_box_content position-relative">
                                            <div class="subject__all_img imgBtn">
                                                <img src="{{ asset('/public/' . Storage::url($sub_cat_subject->img)) }}"
                                                    alt="">
                                            </div>
                                            <div class="subject__all_title position-absolute text-end">
                                                <h3 class="title fw-bold text-center">
                                                    <a href="#"
                                                        class="text-decoration-none">{{ $sub_cat_subject->name }}</a>
                                                </h3>
                                                <div class="d-flex justify-content-around btns">
                                                    <a href="{{ route('download', $sub_cat_subject->id) }}"
                                                        class="btn btn-info fw-bold"><i
                                                            class="fa-solid fa-download ms-2"></i> <span>تحميل</span></a>
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
    </div>
@endsection

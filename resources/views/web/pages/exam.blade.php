@extends('web.layouts.includes.main')
@section('content')
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.error')
    <div class="wrraber">
        <div class="exam_page">
            <section class="supject_banner">
                <div class="container">
                    <div class="subject_head">
                        <h1>اختبار  ({{ $exam->name }})</h1>
                    </div>
                </div>
            </section>
            <section class="exam_content">
                <div class="container">
                    <div class="exam_img mb-5">
                        <a href="{{ asset('/public/' . Storage::url($exam->img)) }}">
                            <img src="{{ asset('/public/' . Storage::url($exam->img)) }}" alt="">
                        </a>
                    </div>
                    <form action="{{ route('examAnser.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="exam_active">
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}" hidden id="date"
                                placeholder="التاريخ" name="date">
                            <input type="text" class="form-control" value="{{ auth()->guard('member')->user()->id }}"
                                id="name" placeholder="الطالب" hidden name="member_id">
                            <input type="text" class="form-control" value="{{ $exam->category_id }}" id="name"
                                placeholder="التصنيف الرئيسى" hidden name="category_id">
                            <input type="text" class="form-control" value="{{ $exam->subCategory_id }}" id="name"
                                placeholder="التصنيف الفرعى" hidden name="subCategory_id">
                            <input type="text" class="form-control" value="{{ $exam->subject_id }}" id="name"
                                placeholder="اسم الدرس" hidden name="subject_id">
                            <input type="text" class="form-control" value="{{ $exam->id }}" id="name"
                                placeholder="اسم الامتحان" hidden name="exam_id">
                            <div class="position-relative">
                                <label for="" class="position-absolute label">ملاحظات</label>
                                <textarea rows="1" placeholder="اكتب ملاحظاتك هنا ..." name="notes" id="notes"></textarea>
                            </div>
                            <div class="parent_heading form-floating mb-3">
                                <div class="heading d-flex" id="btn_img">
                                    <div class="icon"><i class="fa-regular fa-image"></i></div>
                                    <div class="heading_div" id="auther">
                                        اضغط هنا لارسال اجابتك
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating" hidden>
                                <input type="file" class="form-control" id="upload_img" placeholder="صورة التصنيف"
                                    name="img">
                                <label for="img" class="col-form-label n_ro3ya">صورة التصنيف</label>
                            </div>
                            <div class="col-4 mb-3">
                                <button class="btn btn-primary">ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            <section class="comment_section">
                <table class="table comments_table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الصورة الشخصية</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">التعليق</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($examAnswers as $key => $examAnswer)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td class="text-center">
                                    @if ($examAnswer->members->img == '')
                                        <img src="{{ asset('public/web/img/default_user.png') }}" alt=""
                                            height="50vh">
                                    @else
                                        <img src="{{ asset('/public/' . Storage::url($examAnswer->members->img)) }}"
                                            alt="" height="50vh">
                                    @endif
                                </td>
                                <td>{{ $examAnswer->members->username }}</td>
                                <td>{{ $examAnswer->notes }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $examAnswers->links() }}
            </section>
        </div>
    </div>

    <script>
        let btnImg = document.getElementById('btn_img'),
            imgFile = document.getElementById('upload_img');

        btnImg.addEventListener('click', () => {
            imgFile.click()
        })
    </script>
@endsection

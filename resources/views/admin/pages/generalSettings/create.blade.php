@extends('admin.layouts.includes.master')
@section('title')
    بيانات عامة
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <!-- Main content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title "><i class="fas fa-server  ml-2"></i>بيانات عامة</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal " action="{{ route('generalSetting.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body ">
                                    <div class="row g-4 mb-3">
                                        <div class="col-md-9 row g-3">
                                            <div class="col-md-6 form-floating">
                                                <input type="text" class="form-control"
                                                    @isset($generalSettings)
                                                value="{{ $generalSettings->name_ar }}" @endisset
                                                    id="name" placeholder="الاسم باللغة العربية" name="name_ar">
                                                <label for="ar-name" class="col-sm-4 col-form-label">اسم باللغة العربية
                                                    بالعربية</label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="text"
                                                    @isset($generalSettings)
                                                value="{{ $generalSettings->name_en }}" @endisset
                                                    class="form-control" id="name"
                                                    placeholder="الاسم باللغة الانجليزية" name="name_en">
                                                <label for="e-name" class="col-sm-4  col-form-label">اسم باللغة الانجليزية
                                                    بالانجليزية</label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="email"
                                                    @isset($generalSettings)
                                                value="{{ $generalSettings->email }}" @endisset
                                                    class="form-control" id="name" placeholder="البريد الاكترونى"
                                                    name="email">
                                                <label for="e-mail" class="col-sm-4  col-form-label"> البريد
                                                    الالكترونى</label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="text"
                                                    @isset($generalSettings)
                                                value="{{ $generalSettings->tel1 }}" @endisset
                                                    class="form-control" id="name" placeholder="تليفون الشركة"
                                                    name="tel1">
                                                <label for="tel" class="col-sm-4 col-form-label"> تليفون
                                                    الشركة </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="text"
                                                    @isset($generalSettings)
                                                value="{{ $generalSettings->tel2 }}" @endisset
                                                    class="form-control" id="name" placeholder="رقم تليفون اخر"
                                                    name="tel2">
                                                <label for="tel" class="col-sm-4 col-form-label">رقم تليفون اخر
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="text"
                                                    @isset($generalSettings)
                                                value="{{ $generalSettings->tel3 }}" @endisset
                                                    class="form-control" id="name" placeholder="رقم تليفون اخر"
                                                    name="tel3">
                                                <label for="tel" class="col-sm-4 col-form-label">رقم تليفون اخر
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="text"
                                                    @isset($generalSettings)
                                                value="{{ $generalSettings->facebook }}" @endisset
                                                    class="form-control" id="facebook" placeholder="صفحة الفيس بوك"
                                                    name="facebook">
                                                <label for="facebook" class="col-sm-4 col-form-label">صفحة الفيس بوك
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="text"
                                                    @isset($generalSettings)
                                                value="{{ $generalSettings->twitter }}" @endisset
                                                    class="form-control" id="twitter" placeholder="حساب تويتر"
                                                    name="twitter">
                                                <label for="twitter" class="col-sm-4 col-form-label">حساب تويتر
                                                </label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <input type="text"
                                                    @isset($generalSettings)
                                                value="{{ $generalSettings->address }}" @endisset
                                                    class="form-control" id="name" placeholder="عنوان الشركة"
                                                    name="address">
                                                <label for="address" class="col-sm-4 col-form-label"> عنوان
                                                    الشركة </label>
                                            </div>
                                            <div class="col-md-6 form-floating" hidden>
                                                <input type="file" class="form-control" id="upload_img"
                                                    placeholder="لوجو الموقع" name="logo">
                                                <label for="site" class="col-sm-4 col-form-label">لوجو الموقع</label>
                                            </div>
                                            <div class="col-md-6 form-floating">
                                                <div class="heading d-flex" id="btn_img">
                                                    <div class="icon"><i class="fa-regular fa-image"></i></div>
                                                    <div class="heading_div" id="auther">
                                                        لوجو الموقع
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-3 form-floating">
                                                <textarea class="form-control" rows="3" id="note" placeholder="الرؤية ..." name="vision">
@isset($generalSettings)
{{ $generalSettings->vision }}
@endisset
</textarea>
                                                <label for="note" class=" col-form-label">الرؤية</label>
                                            </div>
                                            <div class="col-sm-6 mt-3 form-floating">
                                                <textarea class="form-control" rows="3" id="note" placeholder="الرسالة ..." name="mission">
@isset($generalSettings)
{{ $generalSettings->mission }}
@endisset
</textarea>
                                                <label for="note" class=" col-form-label">الرسالة</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <img src=" @isset($generalSettings->logo) {{ asset('/public/' . Storage::url($generalSettings->logo)) }} @endisset"
                                                style="max-width: 100%;" id="imgshow">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn  bg-success"><i class="fa fa-check text-light"
                                                aria-hidden="true"></i></button>
                                    </div>
                                </div> <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <script>
        let btnImg = document.getElementById('btn_img'),
            imgFile = document.getElementById('upload_img');

        btnImg.addEventListener('click', () => {
            imgFile.click()
        })
    </script>
@endsection

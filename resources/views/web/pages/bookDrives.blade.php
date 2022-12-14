@extends('web.layouts.includes.main')
@section('content')
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.error')
    <div class="wrraber">
        <section class="supject_banner">
            <div class="container">
                <div class="subject_head">
                    <h1>منصة الكتب الجامعية</h1>
                </div>
            </div>
        </section>
        <div class="bookDrives_bage">
            <section class="drives">
                <div class="container">
                    <div class="row">
                        @foreach ($bookDrives as $key => $bookDrive)
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 drive_box" data-aos="fade-up">
                                <div class="drive_content mb-3">
                                    <div class="d-flex">
                                        <div class="drive_icon"><i class="fa-solid fa-book-open"></i></div>
                                        <a href="{{ route('web.bookDriveFile', $bookDrive->id) }}"
                                            class="text-decoration-none text-center">
                                            <div class="drive_name">{{ $bookDrive->name }}</div>
                                        </a>
                                        <div class="count">{{ $bookDrive->Book_drive_files->count() }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

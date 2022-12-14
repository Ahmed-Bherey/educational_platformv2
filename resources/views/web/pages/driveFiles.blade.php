@extends('web.layouts.includes.main')
@section('content')
    <div class="wrraber">
        <section class="supject_banner mb-5">
            <div class="container">
                <div class="subject_head">
                    <h1 class="fw-bold">{{ $drive->name }}</h1>
                </div>
            </div>
        </section>
        <div class="driveFile_page">
            @if ($driveFiles->isEmpty())
                <h3 class="text-center text-danger">لا يوجد ملفات لهذا المجلد</h3>
            @else
                <section class="driveFile">
                    <div class="container">
                        <div class="row">
                            @foreach ($driveFiles as $key => $driveFile)
                                <div
                                    class="col-12 col-md-6 col-lg-4 col-xl-3 driveFile_box mb-3 d-flex justify-content-center">
                                    <div class="driveFile_content text-center">
                                        <div class="driveFile_img">
                                            @if ($driveFile->file_type == 1)
                                                <i class="fa-regular fa-file-pdf"></i>
                                            @elseif($driveFile->file_type == 2)
                                                <i class="fa-regular fa-file-powerpoint"></i>
                                            @elseif($driveFile->file_type == 3)
                                                <i class="fa-regular fa-circle-play"></i>
                                            @elseif($driveFile->file_type == 4)
                                                <i class="fa-regular fa-file-excel"></i>
                                            @else
                                            <i class="fa-regular fa-file-word"></i>
                                            @endif
                                        </div>
                                        <div class="driveFile_info">
                                            <p>{{ $driveFile->name }}</p>
                                            <a href="{{ asset('/public/' . Storage::url($driveFile->file)) }}"
                                                class="btn btn-info fw-bold btn_download"
                                                download="{{ $driveFile->name }}"><i
                                                class="fa-solid fa-download ms-2"></i> <span>تحميل</span></a>
                                            <a href="{{ route('web.driveFiles.content', $driveFile->id) }}"
                                                class="btn btn-success fw-bold btn_read"><i
                                                class="fa-solid fa-book-open-reader ms-2"></i>
                                            <span>قراءة</span></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </div>
@endsection

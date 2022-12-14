@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title">اضافة كتاب جامعة</h3>
                            </div>
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('bookDriveFile.update', $bookDriveFile->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-md-9 row">
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="date" class="form-control"
                                                    value="{{ $bookDriveFile->date }}" id="date" placeholder="التاريخ"
                                                    name="date">
                                                <label for="date" class="col-form-label">التاريخ
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required="required" class="form-control" name="bookDrive_id"
                                                    id="bookDrive_id">
                                                    <option value="">اختر تصنيف الكتاب</option>
                                                    @foreach ($bookDrives as $key => $bookDrive)
                                                        <option value="{{ $bookDrive->id }}"
                                                            @if ($bookDriveFile->bookDrive_id == $bookDrive->id) selected @endif>
                                                            {{ $bookDrive->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="bookDrive_id" class="col-form-label">اختر تصنيف الكتاب</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="text" class="form-control"
                                                    value="{{ $bookDriveFile->name }}" id="name"
                                                    placeholder="اسم الكتاب" name="name">
                                                <label for="name" class="col-form-label">اسم الكتاب</label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <div class="heading d-flex" id="btn_img">
                                                    <div class="icon"><i class="fa-regular fa-image"></i></div>
                                                    <div class="heading_div" id="auther">
                                                        اضف صورة
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 form-floating" hidden>
                                                <input type="file" class="form-control" id="upload_img"
                                                    placeholder="صورة التصنيف" name="img">
                                                <label for="img" class="col-form-label n_ro3ya">صورة التصنيف</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <div class="heading d-flex" id="btn_file">
                                                    <div class="icon"><i class="fa-regular fa-file"></i></div>
                                                    <div class="heading_div" id="auther">
                                                        اضف ملف الشرح
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3" hidden>
                                                <input type="file" class="form-control" id="upload_file"
                                                    placeholder="اضف ملف الشرح" name="file">
                                                <label for="file" class="col-form-label">اضف ملف الشرح
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <textarea class="form-control" rows="1" placeholder="نبذة ..." name="notes" id="note">{{ $bookDriveFile->notes }}</textarea>
                                                <label for="note" class="col-form-label">نبذة
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <img src="{{ asset('/public/' . Storage::url($bookDriveFile->img)) }}"
                                                style="max-width: 100%;" id="imgshow">
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button type="reset" class="btn bg-secondary" onclick="history.back()" type="submit">
                                        <i class="fas fa-undo"></i>
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let btnFile = document.getElementById('btn_file'),
            uploadFile = document.getElementById('upload_file'),
            btnImg = document.getElementById('btn_img'),
            imgFile = document.getElementById('upload_img');

        btnFile.addEventListener('click', () => {
            uploadFile.click()
        })

        btnImg.addEventListener('click', () => {
            imgFile.click()
        })
    </script>
@endsection

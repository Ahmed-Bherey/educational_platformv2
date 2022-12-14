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
                                <h3 class="card-title header-title">اضافة ملف لمجلد</h3>
                            </div>
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('driveFile.update', $driveFile->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="date" class="form-control" value="{{ $driveFile->date }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="drive_id" id="drive_id">
                                                <option value="">اختر المجلد</option>
                                                @foreach ($drives as $key => $drive)
                                                    <option value="{{ $drive->id }}"
                                                        @if ($driveFile->drive_id == $drive->id) selected @endif>
                                                        {{ $drive->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="drive_id" class="col-form-label">اختر المجلد</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="file_type"
                                                id="file_type">
                                                <option value="">اختر نوع الملف</option>
                                                <option value="1" @if ($driveFile->file_type == 1) selected @endif>PDF
                                                </option>
                                                <option value="2" @if ($driveFile->file_type == 2) selected @endif>
                                                    Power Point
                                                </option>
                                                <option value="3" @if ($driveFile->file_type == 3) selected @endif>
                                                    Video</option>
                                                <option value="4" @if ($driveFile->file_type == 3) selected @endif>
                                                    Excel</option>
                                                <option value="5" @if ($driveFile->file_type == 3) selected @endif>
                                                    Word</option>
                                            </select>
                                            <label for="file_type" class="col-form-label">اختر نوع الملف</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $driveFile->name }}"
                                                id="name" placeholder="اسم الملف" name="name">
                                            <label for="name" class="col-form-label">اسم الملف</label>
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
                                            <textarea class="form-control" rows="1" placeholder="نبذة ..." name="notes" id="note">{{ $driveFile->notes }}</textarea>
                                            <label for="note" class="col-form-label">نبذة
                                            </label>
                                        </div>
                                        {{-- row 1 --}}
                                    </div>
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
        btnFile = document.getElementById('btn_file'),
            uploadFile = document.getElementById('upload_file');

        btnFile.addEventListener('click', () => {
            uploadFile.click()
        })
    </script>
@endsection

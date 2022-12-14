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
                            <form class="form-horizontal" action="{{ route('driveFile.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="drive_id" id="drive_id">
                                                <option value="">اختر المجلد</option>
                                                @foreach ($drives as $key => $drive)
                                                    <option value="{{ $drive->id }}">{{ $drive->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="drive_id" class="col-form-label">اختر المجلد</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="file_type"
                                                id="file_type">
                                                <option value="">اختر نوع الملف</option>
                                                <option value="1">PDF</option>
                                                <option value="2">Power Point</option>
                                                <option value="3">Video</option>
                                                <option value="4">Excel</option>
                                                <option value="5">Word</option>
                                            </select>
                                            <label for="file_type" class="col-form-label">اختر نوع الملف</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="اسم الملف" name="name">
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
                                            <textarea class="form-control" rows="1" placeholder="نبذة ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label">نبذة
                                            </label>
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
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float:right; font-weight:bold;">الملفات
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1"
                                                class="table table-bordered table-striped dataTable dtr-inline"
                                                aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>التاريخ</td>
                                                        <td>اسم المجلد</td>
                                                        <td>اسم الملف</td>
                                                        <td>نوع الملف</td>
                                                        <td>عمليات</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($driveFiles as $key => $driveFile)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $driveFile->date }}</td>
                                                            <td>{{ $driveFile->drives->name }}</td>
                                                            <td>{{ $driveFile->name }}</td>
                                                            <td>
                                                                @if ($driveFile->file_type == 1)
                                                                    PDF
                                                                @elseif($driveFile->file_type == 2)
                                                                    Power Point
                                                                @elseif($driveFile->file_type == 3)
                                                                    Video
                                                                @elseif($driveFile->file_type == 4)
                                                                    Excel
                                                                @else
                                                                    Word
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('driveFile.edit', $driveFile->id) }}"
                                                                    type="submit" class="btn bg-secondary"><i
                                                                        class="far fa-edit" aria-hidden="true"></i></a>
                                                                <a href="{{ route('driveFile.destroy', $driveFile->id) }}"
                                                                    type="submit"
                                                                    onclick="return confirm('Are you sure?')"
                                                                    class="btn btn-danger"><i
                                                                        class="fas fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                {{-- end table --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let btnFile = document.getElementById('btn_file'),
            uploadFile = document.getElementById('upload_file');

        btnFile.addEventListener('click', () => {
            uploadFile.click()
        })
    </script>
@endsection

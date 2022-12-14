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
                            <form class="form-horizontal" action="{{ route('bookDriveFile.store') }}" method="POST"
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
                                            <select required="required" class="form-control" name="bookDrive_id"
                                                id="bookDrive_id">
                                                <option value="">اختر تصنيف الكتاب</option>
                                                @foreach ($bookDrives as $key => $bookDrive)
                                                    <option value="{{ $bookDrive->id }}">{{ $bookDrive->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="bookDrive_id" class="col-form-label">اختر تصنيف الكتاب</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="text" class="form-control" id="name"
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
                                <h3 class="card-title" style="float:right; font-weight:bold;">الكتب الجامعية
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
                                                        <td>تصنيف الكتاب</td>
                                                        <td>اسم الكتاب</td>
                                                        <td>صورة الكتاب</td>
                                                        <td>عمليات</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bookDriveFiles as $key => $bookDriveFile)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $bookDriveFile->date }}</td>
                                                            <td>{{ $bookDriveFile->book_drives->name }}</td>
                                                            <td>{{ $bookDriveFile->name }}</td>
                                                            <td>
                                                                <img src="{{ asset('/public/' . Storage::url($bookDriveFile->img)) }}"
                                                                    id="imgshow" height="50vh">
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('bookDriveFile.edit', $bookDriveFile->id) }}"
                                                                    type="submit" class="btn bg-secondary"><i
                                                                        class="far fa-edit" aria-hidden="true"></i></a>
                                                                <a href="{{ route('bookDriveFile.destroy', $bookDriveFile->id) }}"
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

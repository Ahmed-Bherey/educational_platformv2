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
                                <h3 class="card-title header-title">الاعلان الثالث</h3>
                            </div>
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('ad3s.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="date" class="form-control"
                                                @isset($ad3s->date) value="{{ $ad3s->date }}" @endisset
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input required type="text" class="form-control"
                                                @isset($ad3s->name) value="{{ $ad3s->name }}" @endisset
                                                id="name" placeholder="اسم الاعلان" name="name">
                                            <label for="name" class="col-form-label">اسم الاعلان</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <div class="heading d-flex" id="btn_img">
                                                <div class="icon"><i class="fa-regular fa-image"></i></div>
                                                <div class="heading_div" id="auther">
                                                    أضف الاعلان
                                                </div>
                                            </div>
                                            @error('img')
                                                <p class="alert text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3" hidden>
                                            <input type="file" class="form-control" id="upload_img"
                                                placeholder="أضف الاعلان" name="img">
                                            <label for="img" class="col-form-label">أضف الاعلان
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input required type="text" class="form-control"
                                                @isset($ad3s->link) value="{{ $ad3s->link }}" @endisset
                                                id="link" placeholder="رابط الاعلان" name="link">
                                            <label for="link" class="col-form-label">رابط الاعلان</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <textarea class="form-control" rows="1" placeholder="ملاحظات ..." name="notes" id="note">
@isset($ad3s->notes)
{{ $ad3s->notes }}
@endisset
</textarea>
                                            <label for="note" class="col-form-label">ملاحظات
                                            </label>
                                        </div>
                                        <div class="col-sm-9 form-floating mb-3">
                                            <img src="@isset($ad3s->img) {{ asset('/public/' . Storage::url($ad3s->img)) }} @endisset"
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
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float:right; font-weight:bold;">الدروس
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
                                                        <td>اسم الاعلان</td>
                                                        <td>صورة الاعلان</td>
                                                        <td>رابط الاعلان</td>
                                                        <td>ملاحظات</td>
                                                        <td>عمليات</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="odd">
                                                        <td>1</td>
                                                        <td>
                                                            @isset($ad3s->date)
                                                                {{ $ad3s->date }}
                                                            @endisset
                                                        </td>
                                                        <td>
                                                            @isset($ad3s->name)
                                                                {{ $ad3s->name }}
                                                            @endisset
                                                        </td>
                                                        <td>
                                                            @isset($ad3s->img)
                                                                <img src="{{ asset('/public/' . Storage::url($ad3s->img)) }}"
                                                                    id="imgshow" height="50vh">
                                                            @endisset
                                                        </td>
                                                        <td>
                                                            @isset($ad3s->link)
                                                                {{ $ad3s->link }}
                                                            @endisset
                                                        </td>
                                                        <td>
                                                            @isset($ad3s->notes)
                                                                {{ $ad3s->notes }}
                                                            @endisset
                                                        </td>
                                                        <td>
                                                            @isset($ad3s)
                                                                <a href="{{ route('ad3s.destroy', $ad3s->id) }}" type="submit"
                                                                    onclick="return confirm('Are you sure?')"
                                                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                            @endisset
                                                        </td>
                                                    </tr>
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
        let btnImg = document.getElementById('btn_img'),
            imgFile = document.getElementById('upload_img');

        btnImg.addEventListener('click', () => {
            imgFile.click()
        })
    </script>
@endsection

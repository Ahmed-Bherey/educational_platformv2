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
                                <h3 class="card-title header-title">اضافة تصنيف فرعى</h3>
                            </div>
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('subCategory.update', $subCategory->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-md-9 row">
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="date" class="form-control" value="{{ $subCategory->date }}"
                                                    id="date" placeholder="التاريخ" name="date">
                                                <label for="date" class="col-form-label">التاريخ
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required class="form-control" name="category_id" id="category_id">
                                                    <option value="">اختر التصنيف الرئيسى</option>
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $category->id }}"
                                                            @if ($subCategory->category_id == $category->id) selected @endif>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="category_id" class="col-form-label">اختر التصنيف الرئيسى</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="text" class="form-control" value="{{ $subCategory->name }}"
                                                    id="name" placeholder="الاسم" name="name" required>
                                                <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <div class="heading d-flex" id="btn_img">
                                                    <div class="icon"><i class="fa-regular fa-image"></i></div>
                                                    <div class="heading_div" id="auther">
                                                        اضف صورة
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3" hidden>
                                                <input type="file" class="form-control" id="upload_img"
                                                    placeholder="اضف صورة" name="img">
                                                <label for="img" class="col-form-label">اضف صورة
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input required type="text" class="form-control"
                                                    value="{{ $subCategory->icon }}" id="icon"
                                                    placeholder="شعار التصنيف" name="icon">
                                                <label for="icon" class="col-form-label n_ro3ya">شعار التصنيف</label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="text" class="form-control"
                                                    value="{{ $subCategory->color }}" id="color" placeholder="لون التصنيف"
                                                    name="color">
                                                <label for="color" class="col-form-label n_ro3ya">لون التصنيف</label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="text" class="form-control" value="{{ $subCategory->icon_color }}" id="icon_color"
                                                    placeholder="لون الشعار" name="icon_color">
                                                <label for="icon_color" class="col-form-label n_ro3ya">لون الشعار</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <textarea class="form-control" rows="1" placeholder="ملاحظات ..." name="notes" id="note">{{ $subCategory->notes }}</textarea>
                                                <label for="note" class="col-form-label">ملاحظات
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <img src="{{ asset('/public/' . Storage::url($subCategory->img)) }}"
                                                style="max-width: 100%;" id="imgshow">
                                        </div>
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>

    <script>
        let btnImg = document.getElementById('btn_img'),
            imgFile = document.getElementById('upload_img');

        btnImg.addEventListener('click', () => {
            imgFile.click()
        })
    </script>
@endsection

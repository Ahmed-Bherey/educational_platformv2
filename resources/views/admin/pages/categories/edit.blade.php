@extends('admin.layouts.includes.master')
@section('title')
    اضافة تصنيف
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-info">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title">اضافة تصنيف</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('category.update', $category->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-md-9 row">
                                            <div class="col-sm-4 form-floating">
                                                <input required type="text" class="form-control"
                                                    value="{{ $category->name }}" id="name" placeholder="اسم التصنيف"
                                                    name="name">
                                                <label for="name" class="col-form-label n_ro3ya">اسم التصنيف</label>
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
                                            <div class="col-sm-4 form-floating">
                                                <textarea class="form-control" rows="1" placeholder="ملاحظات ..." name="notes" id="notes">{{ $category->notes }}</textarea>
                                                <label for="notes" class=" col-form-label n_ro3ya">ملاحظات </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input required type="text" class="form-control"
                                                    value="{{ $category->icon }}" id="icon" placeholder="شعار التصنيف"
                                                    name="icon">
                                                <label for="icon" class="col-form-label n_ro3ya">شعار التصنيف</label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="text" class="form-control"
                                                    value="{{ $category->color }}" id="color" placeholder="لون التصنيف"
                                                    name="color">
                                                <label for="color" class="col-form-label n_ro3ya">لون التصنيف</label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="text" class="form-control" value="{{ $category->icon_color }}" id="icon_color"
                                                    placeholder="لون الشعار" name="icon_color">
                                                <label for="icon_color" class="col-form-label n_ro3ya">لون الشعار</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <img src="{{ asset('/public/' . Storage::url($category->img)) }}"
                                                style="max-width: 100%;" id="imgshow">
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row">
                                        <table id="example2" class="col-md-9 table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>الوصف</th>
                                                    <th>العملية</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">
                                                @foreach ($categoryTotals as $key => $categoryTotal)
                                                    <tr>
                                                        <td style=" width: 50%;">
                                                            <input type="text" class="form-control"
                                                                value="{{ $categoryTotal->desc }}" id="desc"
                                                                placeholder="الوصف" name="data[desc][]">
                                                        </td>
                                                        <td class="d-flex justify-content-center">
                                                            <button type="button" class="btn bg-success" id="add">
                                                                <i class="fas fa-plus-square"></i>
                                                            </button>
                                                            <button type="button" class="btn bg-danger"
                                                                onclick='delet(this)'>
                                                                <i class="fas fa-trash-alt text-light"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn bg-secondary" type="reset">
                                        <i class="fas fa-undo"></i>
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end card table --}}
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

    <script>
        let add = document.getElementById('add'),
            tbody = document.getElementById('tbody');
        add.addEventListener(('click'), () => {
            var new_row = document.createElement('tr')
            // new_row.classList.add('row')
            // new_row.classList.add('mb-3')
            // new_row.classList.add('align-items-center')
            new_row.innerHTML =
                `
        <td style=" width: 50%;">
            <input type="text" class="form-control" id="desc" placeholder="الوصف"
        name="data[desc][]">
            </select>
        </td>
                <td>
                    <button type="button" class="btn bg-danger" onclick='delet(this)'>
                        <i class="fas fa-trash-alt text-light"></i>
                    </button>
                </td>`;
            tbody.appendChild(new_row)
        })

        function delet(ele) {
            ele.parentElement.parentElement.remove()
        }
    </script>
@endsection

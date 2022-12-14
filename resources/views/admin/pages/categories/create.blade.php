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
                            <form class="form-horizontal" action="{{ route('category.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input required type="text" class="form-control" id="name"
                                                placeholder="اسم التصنيف" name="name">
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
                                            <input required type="text" class="form-control" id="icon"
                                                placeholder="شعار التصنيف" name="icon">
                                            <label for="icon" class="col-form-label n_ro3ya">شعار التصنيف</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="color"
                                                placeholder="لون التصنيف" name="color">
                                            <label for="color" class="col-form-label n_ro3ya">لون التصنيف</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="icon_color"
                                                placeholder="لون الشعار" name="icon_color">
                                            <label for="icon_color" class="col-form-label n_ro3ya">لون الشعار</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="1" placeholder="ملاحظات ..." name="notes" id="notes"></textarea>
                                            <label for="notes" class=" col-form-label n_ro3ya">ملاحظات </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>الوصف</th>
                                                <th>العملية</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <tr>
                                                <td style=" width: 50%;">
                                                    <input type="text" class="form-control" id="desc"
                                                        placeholder="الوصف" name="data[desc][]">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn bg-success" id="add">
                                                        <i class="fas fa-plus-square"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                {{-- end card --}}
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">التصنيفات</h3>
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
                                                        <td>اسم التصنيف</td>
                                                        <td>عمليات</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $category)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $category->name }}</td>
                                                            <td>
                                                                <a href="{{ route('category.edit', $category->id) }}"
                                                                    type="submit" class="btn bg-secondary"><i
                                                                        class="far fa-edit" aria-hidden="true"></i></a>
                                                                <a href="{{ route('category.destroy', $category->id) }}"
                                                                    type="submit" onclick="return confirm('Are you sure?')"
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
                            </div>
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

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
                                <h3 class="card-title header-title">اضافة امتحان لدرس</h3>
                            </div>
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            @error('subject_id')
                                <p class="alert text-danger">{{ $message }}</p>
                            @enderror
                            <form class="form-horizontal" action="{{ route('exam.store') }}" method="POST"
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
                                            <select required="required" class="form-control" name="category_id"
                                                id="category_id">
                                                <option value="">اختر التصنيف الرئيسى</option>
                                                @foreach ($categories as $key => $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="category_id" class="col-form-label">اختر التصنيف الرئيسى</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="subCategory_id"
                                                id="subCategory_id">
                                                <option value="">اختر التصنيف الفرعى</option>
                                            </select>
                                            <label for="subCategory_id" class="col-form-label">اختر التصنيف الفرعى</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <select required="required" class="form-control" name="subject_id"
                                                id="subject_id">
                                                <option value="">اختر الدرس</option>
                                            </select>
                                            <label for="subject_id" class="col-form-label">اختر الدرس</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="اسم الامتحان" name="name">
                                            <label for="name" class="col-form-label">اسم الامتحان</label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <div class="heading d-flex" id="btn_img">
                                                <div class="icon"><i class="fa-regular fa-image"></i></div>
                                                <div class="heading_div" id="auther">
                                                    اضف الامتحان
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3" hidden>
                                            <input type="file" class="form-control" id="upload_img"
                                                placeholder="اضف الامتحان" name="img">
                                            <label for="img" class="col-form-label">اضف الامتحان
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating mb-3">
                                            <textarea class="form-control" rows="1" placeholder="ملاحظات ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label">ملاحظات
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
                                <h3 class="card-title" style="float:right; font-weight:bold;">الامتحانات
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
                                                        <td>التصنيف الرئيسى</td>
                                                        <td>التصنيف الفرعى</td>
                                                        <td>الدرس</td>
                                                        <td>اسم الامتحان</td>
                                                        <td>صورة الامتحان</td>
                                                        <td>عمليات</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($exams as $key => $exam)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $exam->date }}</td>
                                                            <td>{{ $exam->categories->name }}</td>
                                                            <td>{{ $exam->sub_categories->name }}</td>
                                                            <td>{{ $exam->subjects->name }}</td>
                                                            <td>{{ $exam->name }}</td>
                                                            <td>
                                                                <img src="{{ asset('/public/' . Storage::url($exam->img)) }}"
                                                                    id="imgshow" height="50vh">
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('exam.edit', $exam->id) }}"
                                                                    type="submit" class="btn bg-secondary"><i
                                                                        class="far fa-edit" aria-hidden="true"></i></a>
                                                                <a href="{{ route('exam.destroy', $exam->id) }}"
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
        let btnImg = document.getElementById('btn_img'),
            imgFile = document.getElementById('upload_img');

        btnImg.addEventListener('click', () => {
            imgFile.click()
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('category.ajax', ['id' => ':id']) }}';
                route = route.replace(':id', stateID);
                if (stateID) {
                    $.ajax({
                        beforeSend: function(x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#subCategory_id').empty();
                            $.each(data, function(key, value) {
                                $('#subCategory_id').append($(`<option>`, {
                                    value: value.id,
                                    text: value.name,
                                }));
                            });
                            $('#subCategory_id').trigger('change');
                        }
                    });
                } else {
                    $('select[name="subCategory_id"]').empty();
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="subCategory_id"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('subCategory.ajax', ['id' => ':id']) }}';
                route = route.replace(':id', stateID);
                if (stateID) {
                    $.ajax({
                        beforeSend: function(x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#subject_id').empty();
                            $.each(data, function(key, value) {
                                $('#subject_id').append($(`<option>`, {
                                    value: value.id,
                                    text: value.name,
                                }));
                            });
                            $('#subject_id').trigger('change');
                        }
                    });
                } else {
                    $('select[name="subject_id"]').empty();
                }
            });
        });
    </script>
@endsection

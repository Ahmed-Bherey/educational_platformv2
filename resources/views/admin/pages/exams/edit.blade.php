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
                            <form class="form-horizontal" action="{{ route('exam.update', $exam->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-md-9 row">
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="date" class="form-control" value="{{ $exam->date }}"
                                                    id="date" placeholder="التاريخ" name="date">
                                                <label for="date" class="col-form-label">التاريخ
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required="required" class="form-control" name="category_id"
                                                    id="category_id">
                                                    <option value="">اختر التصنيف الرئيسى</option>
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $category->id }}"
                                                            @if ($exam->category_id == $category->id) selected @endif>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="category_id" class="col-form-label">اختر التصنيف الرئيسى</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required="required" class="form-control" name="subCategory_id"
                                                    id="subCategory_id">
                                                    @if ($exam->subCategory_id != '')
                                                        <option value="{{ $exam->subCategory_id }}">
                                                            {{ $exam->sub_categories->name }}</option>
                                                    @endif
                                                </select>
                                                <label for="subCategory_id" class="col-form-label">اختر التصنيف
                                                    الفرعى</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required="required" class="form-control" name="subject_id"
                                                    id="subject_id">
                                                    @if ($exam->subject_id != '')
                                                        <option value="{{ $exam->subject_id }}">{{ $exam->subjects->name }}
                                                        </option>
                                                    @endif
                                                </select>
                                                <label for="subject_id" class="col-form-label">اختر الدرس</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="text" class="form-control" value="{{ $exam->name }}"
                                                    id="name" placeholder="اسم الامتحان" name="name">
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
                                                <textarea class="form-control" rows="1" placeholder="ملاحظات ..." name="notes" id="note">{{ $exam->notes }}</textarea>
                                                <label for="note" class="col-form-label">ملاحظات
                                                </label>
                                            </div>
                                        </div>
                                        {{-- row 1 --}}
                                        <div class="col-md-3">
                                            <img src="{{ asset('/uploads/img/' . $exam->img) }}"
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

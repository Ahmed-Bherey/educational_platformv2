@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
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
                                                        <td>الطالب</td>
                                                        <td>التصنيف الرئيسى</td>
                                                        <td>التصنيف الفرعى</td>
                                                        <td>الدرس</td>
                                                        <td>اسم الامتحان</td>
                                                        <td>صورة اجابة الامتحان</td>
                                                        <td>ملاحظات</td>
                                                        <td>عمليات</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($examAnsers as $key => $examAnser)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $examAnser->date }}</td>
                                                            <td>{{ $examAnser->members->username}}</td>
                                                            <td>{{ $examAnser->categories->name }}</td>
                                                            <td>{{ $examAnser->sub_categories->name }}</td>
                                                            <td>{{ $examAnser->subjects->name }}</td>
                                                            <td>{{ $examAnser->exams->name}}</td>
                                                            <td>
                                                                <img src="{{ asset('/uploads/img/' . $examAnser->img) }}"
                                                                    id="imgshow" height="50vh">
                                                            </td>
                                                            <td>{{$examAnser->notes}}</td>
                                                            <td>
                                                                <a href="{{ route('examAnser.edit', $examAnser->id) }}"
                                                                    type="submit" class="btn bg-secondary"><i
                                                                        class="far fa-edit" aria-hidden="true"></i></a>
                                                                <a href="{{ route('examAnser.destroy', $examAnser->id) }}"
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

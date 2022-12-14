@extends('web.layouts.includes.main')
@section('content')
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.error')
    <div class="profile_page_wrraber">
        <div class="row">
            <div class="col-4">
                <div class="profile_page">
                    <div class="profile_page_info">
                        <h3 class="text-center">معلومات الحساب</h3>
                        <div class="user_img text-center mb-3">
                            @if ($userProfile->img == '')
                                <img src="{{ asset('public/web/img/default_user.png') }}" alt="">
                            @else
                                <img src="{{ asset('/public/' . Storage::url($userProfile->img)) }}" alt="">
                            @endif
                        </div>
                        <div class="user_info">
                            <div class="username mb-3">
                                اسم المستخدم : {{ $userProfile->username }}
                            </div>
                            <div class="email mb-3">
                                الايميل : {{ $userProfile->email }}
                            </div>
                            <div class="job mb-3">
                                المهنة : {{ $userProfile->job }}
                            </div>
                            <div class="address mb-3">
                                العنوان : {{ $userProfile->address }}
                            </div>
                            <div class="active mb-3">
                                نوع الحساب :
                                @if ($userProfile->active == 1)
                                    <span class="text-success fw-bold">مفعل</span>
                                @else
                                    <span class="text-danger fw-bold">غير مفعل</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7 exam_table" style="margin: 50px auto">
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">الامتحانات
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
                                                        <td>التصنيف الرئيسى</td>
                                                        <td>التصنيف الفرعى</td>
                                                        <td>الدرس</td>
                                                        <td>اجابة الامتحان</td>
                                                        <td>ملاحظات</td>
                                                        <td>التقييم</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($examAnsers as $key => $examAnser)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $examAnser->categories->name }}</td>
                                                            <td>{{ $examAnser->sub_categories->name }}</td>
                                                            <td>{{ $examAnser->subjects->name }}</td>
                                                            <td>
                                                                <a
                                                                    href="{{ asset('/public/' . Storage::url($examAnser->img)) }}">
                                                                    <img src="{{ asset('/public/' . Storage::url($examAnser->img)) }}"
                                                                        id="imgshow" height="50vh">
                                                                </a>
                                                            </td>
                                                            <td>{{ $examAnser->notes }}</td>
                                                            <td>
                                                                @if ($examAnser->reponse == '')
                                                                    <p class="wating">بانتظار التقييم</p>
                                                                @else
                                                                    <p class="text-success">{{ $examAnser->reponse }}
                                                                    </p>
                                                                @endif
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
@endsection

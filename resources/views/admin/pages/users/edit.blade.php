@extends('admin.layouts.includes.master')
@section('title')
    اضافة مستخدم
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <!-- /.row -->
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title">اضافة مستخدم</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row ">
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $user->name }}"
                                                placeholder="الاسم" name="name" required>
                                            <label for="store" class="col-form-label">الاسم</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="email" class="form-control" value="{{ $user->email }}"
                                                placeholder="الايميل" name="email">
                                            <label for="store" class="col-form-label">الايميل</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="password" class="form-control" pattern="[A-Za-z0-9]{4,14}"
                                                placeholder="كلمة السر" name="password">
                                                <input type="password" class="form-control" value="{{$user->password}}"
                                                placeholder="كلمة السر" name="oldPassword" hidden>
                                            <label for="store" class="col-form-label">كلمة السر</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $user->adderess }}"
                                                placeholder="العنوان" name="adderess">
                                            <label for="store" class="col-form-label"> العنوان</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $user->tel }}"
                                                placeholder="تليفون" name="tel" pattern="[0-9]{11}"
                                                title="لابد من كتابة رقم الهاتف المكون من 11 رقم">
                                            <label for="store" class="col-form-label">تليفون</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $user->whatsapp }}"
                                                placeholder="واتساب" name="whatsapp" pattern="[0-9]{11}"
                                                title="لابد من كتابة رقم الهاتف المكون من 11 رقم">
                                            <label for="store" class="col-form-label">واتساب</label>
                                        </div>
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection

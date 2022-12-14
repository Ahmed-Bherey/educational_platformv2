@extends('admin.layouts.includes.master')
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
                                <h3 class="card-title header-title">الأعضاء</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.error')
                            <form class="form-horizontal" action="{{ route('member.update', $member->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row ">
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $member->username }}"
                                                placeholder="اسم المستخدم" name="username">
                                            <label for="store" class="col-form-label">اسم المستخدم</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="email" class="form-control" value="{{ $member->email }}"
                                                placeholder="الايميل" name="email">
                                            <label for="store" class="col-form-label">الاسم</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $member->job }}"
                                                placeholder="الوظيفة" name="job">
                                            <label for="store" class="col-form-label">الوظيفة</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $member->address }}"
                                                placeholder="العنوان" name="address">
                                            <label for="store" class="col-form-label">العنوان</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" value="{{ $member->tel }}"
                                                placeholder="رقم التليفون" name="tel">
                                            <label for="store" class="col-form-label">رقم التليفون</label>
                                        </div>
                                        <div class="form-check col-sm-3">
                                            <label class="switch switch-2-5" for="switch-2-5">
                                                <input type="checkbox" name="active" value="1" @if($member->active
                                                ==
                                                1)
                                                checked @endif id="switch-2-5">
                                                <span class="slider round slider-2-5"></span>
                                            </label>
                                            <label class="form-check-label" for="switch-2-5">
                                                تفعيل
                                            </label>
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

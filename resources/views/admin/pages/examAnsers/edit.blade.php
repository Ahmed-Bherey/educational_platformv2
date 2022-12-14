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
                            <form class="form-horizontal" action="{{ route('examAnser.update', $examAnsers->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-md-9 row">
                                            <div class="col-sm-4 form-floating mb-3" hidden>
                                                <input type="text" class="form-control" value="{{ Auth::user()->id }}"
                                                    id="name" placeholder="الادمن" name="user_id">
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <input type="date" class="form-control" value="{{ $examAnsers->date }}" readonly
                                                    id="date" placeholder="التاريخ" name="date">
                                                <label for="date" class="col-form-label">التاريخ
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required="required" class="form-control" name="member_id"
                                                    id="member_id">
                                                    @if($examAnsers->member_id != "")
                                                    <option value="{{$examAnsers->member_id}}">{{$examAnsers->members->username}}</option>
                                                    @endif
                                                </select>
                                                <label for="member_id" class="col-form-label">اسم الطالب</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required="required" class="form-control" name="category_id"
                                                    id="category_id">
                                                    @if($examAnsers->category_id != "")
                                                    <option value="{{$examAnsers->category_id}}">{{$examAnsers->categories->name}}</option>
                                                    @endif
                                                </select>
                                                <label for="category_id" class="col-form-label">التصنيف الرئيسى</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required="required" class="form-control" name="subCategory_id"
                                                    id="subCategory_id">
                                                    @if($examAnsers->subCategory_id != "")
                                                    <option value="{{$examAnsers->subCategory_id}}">{{$examAnsers->sub_categories->name}}</option>
                                                    @endif
                                                </select>
                                                <label for="subCategory_id" class="col-form-label">التصنيف الفرعى</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required="required" class="form-control" name="subject_id"
                                                    id="subject_id">
                                                    @if($examAnsers->subject_id != "")
                                                    <option value="{{$examAnsers->subject_id}}">{{$examAnsers->subjects->name}}</option>
                                                    @endif
                                                </select>
                                                <label for="subject_id" class="col-form-label">اسم الدرس</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <select required="required" class="form-control" name="exam_id"
                                                    id="exam_id">
                                                    @if($examAnsers->exam_id != "")
                                                    <option value="{{$examAnsers->exam_id}}">{{$examAnsers->exams->name}}</option>
                                                    @endif
                                                </select>
                                                <label for="exam_id" class="col-form-label">اسم الامتحان</label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <textarea class="form-control" rows="1" placeholder="ملاحظات ..." name="notes" id="note" readonly>{{ $examAnsers->notes }}</textarea>
                                                <label for="note" class="col-form-label">ملاحظات
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating mb-3">
                                                <textarea class="form-control" rows="1" placeholder="التقييم ..." name="reponse" id="note">{{ $examAnsers->reponse }}</textarea>
                                                <label for="note" class="col-form-label">التقييم
                                                </label>
                                            </div>
                                        </div>
                                        {{-- row 1 --}}
                                        <div class="col-md-3">
                                            <img src="{{ asset('/public/' . Storage::url($examAnsers->img)) }}"
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
@endsection

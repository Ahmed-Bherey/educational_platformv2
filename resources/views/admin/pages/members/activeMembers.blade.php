@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card border border-1 mt-3 bg-light">
                            <div class="card-header">
                                <h3 class="card-title " style="float:right; font-weight:bold;">الأعضاء المفعلين</h3>
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
                                                        <th>اسم المستخدم</th>
                                                        <th>الايميل</th>
                                                        <th>الوظيفة</th>
                                                        <th>العنوان</th>
                                                        <th>رقم التليفون</th>
                                                        <th>الصورة</th>
                                                        <th>الحالة</th>
                                                        <th>عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($activeMembers as $key => $activeMember)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $activeMember->username }}</td>
                                                            <td>{{ $activeMember->email }}</td>
                                                            <td>{{ $activeMember->job }}</td>
                                                            <td>{{ $activeMember->address }}</td>
                                                            <td>{{ $activeMember->tel }}</td>
                                                            <td>
                                                                @if ($activeMember->img == '')
                                                                    <img src="{{ asset('public/web/img/default_user.png') }}"
                                                                        alt="" height="50vh">
                                                                @else
                                                                    <img src="{{ asset('/uploads/img/' . $activeMember->img) }}"
                                                                        id="imgshow" height="50vh">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($activeMember->active == 1)
                                                                    <p class="text-success text-center fw-bold">مفعل</p>
                                                                @else
                                                                    <p class="text-danger text-center fw-bold">غير مفعل</p>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('member.edit', $activeMember->id) }}"
                                                                    type="submit" class="btn bg-secondary"><i
                                                                        class="far fa-edit" aria-hidden="true"></i></a>
                                                                <a href="{{ route('member.destroy', $activeMember->id) }}"
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
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

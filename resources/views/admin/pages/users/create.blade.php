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
                            <form class="form-horizontal" action="{{ route('users.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row ">
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" placeholder="الاسم" name="name"
                                                required>
                                            <label for="store" class="col-form-label">الاسم</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="email" class="form-control" placeholder="الايميل" name="email">
                                            <label for="store" class="col-form-label">الايميل</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="password" class="form-control" pattern="[A-Za-z0-9]{4,14}"
                                                placeholder="كلمة السر" name="password" required>
                                            <label for="store" class="col-form-label">كلمة السر</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" placeholder="العنوان" name="adderess">
                                            <label for="store" class="col-form-label"> العنوان</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" placeholder="تليفون" name="tel"
                                                pattern="[0-9]{11}" title="لابد من كتابة رقم الهاتف المكون من 11 رقم">
                                            <label for="store" class="col-form-label">تليفون</label>
                                        </div>
                                        <div class="col-sm-6 form-floating mb-3">
                                            <input type="text" class="form-control" placeholder="واتساب" name="whatsapp"
                                                pattern="[0-9]{11}" title="لابد من كتابة رقم الهاتف المكون من 11 رقم">
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
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card border border-1 mt-3 bg-light">
                            <div class="card-header">
                                <h3 class="card-title " style="float:right; font-weight:bold;">المستخدمين</h3>
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
                                                        <th>الاسم</th>
                                                        <th>الايميل</th>
                                                        <th>العنوان</th>
                                                        <th>تليفون</th>
                                                        <th>واتساب</th>
                                                        <th>عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $key => $user)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->adderess }}</td>
                                                            <td>0{{ $user->tel }}</td>
                                                            <td>{{ $user->whatsapp }}</td>
                                                            <td>
                                                                <a href="{{ route('users.edit', $user->id) }}"
                                                                    type="submit" class="btn bg-secondary"><i
                                                                        class="far fa-edit" aria-hidden="true"></i></a>
                                                                <a href="{{ route('users.destroy', $user->id) }}"
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection

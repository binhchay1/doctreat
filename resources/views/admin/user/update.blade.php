@extends('layouts.adminlte-custom')

@section('title', 'Cập nhật tài khoản | Diamond Pet')

@section('content_header')
    <div style="display: flex;justify-content: space-between;">
        <h1 class="m-0 text-dark"></h1>
    </div>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
@endpush

@section('content')
    @include('sweetalert::alert')
    <section class="content">
        <form action="{{ route('admin.update.user' , $user->id) }}" method="post">
            @csrf
            <div class="container-fluid">
                <div class="row form-area">
                    <div class="col-md-12 form-header text-center">
                        <h1 class="form-title fs-20 pd5">Cập nhật tài khoản : {{ $user->name }}</h1>
                    </div>
                    <div class="col-md-12 form-body">
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Tên nhân viên</label>
                            <div class="col-sm-10 col-form-input">
                                <input type="text" name="name" value="{{ old('name', $user->name ?? null) }}" class="form-control" style="width: 40%;">
                                @if ($errors->has('name'))
                                    <p class="help is-danger" style="color: red;">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10 col-form-input">
                                <input type="phone" name="phone" value="{{ old('phone', $user->phone ?? null) }}" class="form-control" style="width: 40%;">
                                @if ($errors->has('phone'))
                                    <p class="help is-danger" style="color: red;">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10 col-form-input">
                                <input type="email" name="email" value="{{ old('email', $user->email ?? null) }}" class="form-control" style="width: 40%;" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">CMT</label>
                            <div class="col-sm-10 col-form-input">
                                <input type="text" name="cmt" value="{{ old('cmt', $user->cmt ?? null) }}" class="form-control" style="width: 40%;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10 col-form-input">
                                <input type="text" name="address" value="{{ old('address', $user->address ?? null) }}" class="form-control" style="width: 40%;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 col-form-input">
                                <input type="checkbox" name="check_change_password" id="check_change_password" @if(old('check_change_password')) checked @endif> Thay đổi mật khẩu
                            </div>
                        </div>

                        <div class="form-group row change_password">
                            <label  class="col-sm-2 col-form-label">Mật khẩu</label>
                            <div class="col-sm-10 col-form-input">
                                <input type="password" name="password" value="" class="form-control" style="width: 40%;">
                                @if ($errors->has('password'))
                                    <p class="help is-danger" style="color: red;">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row change_password">
                            <label  class="col-sm-2 col-form-label">Xác nhận mật khẩu</label>
                            <div class="col-sm-10 col-form-input">
                                <input type="password" name="password_confirmation" value="" class="form-control" style="width: 40%;">
                                @if ($errors->has('password_confirmation'))
                                    <p class="help is-danger" style="color: red;">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12  form-footer pd20 d-inline-block text-right">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@stop

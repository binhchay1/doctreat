@extends('layouts.adminlte-custom')

@section('title', 'Tạo tài khoản | Diamond Pet')

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
    <form action="{{ route('admin.store.user') }}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="row form-area">
                <div class="col-md-12 form-header text-center">
                    <h1 class="form-title fs-20 pd5">Thêm tài khoản</h1>
                </div>
                <div class="col-md-12 form-body">
                    <div class="form-group row">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" style="width: 40%;">
                            @if ($errors->has('name'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" name="phone" value="{{ old('phone') }}" class="form-control" style="width: 40%;">
                            @if ($errors->has('phone'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" style="width: 40%;">
                            @if ($errors->has('email'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Giới tính</label>
                        <div class="col-sm-10 col-form-input">
                            <select class="form-select" name="gender" value="{{ old('gender') }}" style="width: 40%;">
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Chức vụ</label>
                        <div class="col-sm-10 col-form-input">
                            <select class="form-select" name="role" value="{{ old('role') }}" style="width: 40%;" id="select-role-create-users">
                                @foreach(config('role.role') as $key => $item)
                                @if($key == 1)
                                @continue
                                @endif
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('is_system_user'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('is_system_user') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mật khẩu</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="password" name="password" class="form-control" style="width: 40%;">
                            @if ($errors->has('password'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Xác nhận mật khẩu</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="password" name="password_confirmation" value="" class="form-control" style="width: 40%;">
                            @if ($errors->has('password_confirmation'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày sinh</label>
                        <div class="col-sm-10 col-form-input d-flex">
                            <div class="div-select-user">
                                <select class="form-control select-create-user" value="{{ old('year') }}" id="year" name="year" onchange="change_year(this)">
                                </select>
                                @if ($errors->has('year'))
                                <p class="help is-danger" style="color: red;">{{ $errors->first('year') }}</p>
                                @endif
                            </div>
                            <div class="div-select-user">
                                <select class="form-control select-create-user ml-2" value="{{ old('month') }}" id="month" name="month" onchange="change_month(this)">
                                </select>
                                @if ($errors->has('month'))
                                <p class="help is-danger ml-2" style="color: red;">{{ $errors->first('month') }}</p>
                                @endif
                            </div>
                            <div class="div-select-user">
                                <select class="form-control select-create-user ml-3" value="{{ old('day') }}" id="day" name="day">
                                </select>
                                @if ($errors->has('day'))
                                <p class="help is-danger ml-3" style="color: red;">{{ $errors->first('day') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row d-none" id="cmt-selection">
                        <label class="col-sm-2 col-form-label">CMT</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="text" name="cmt" class="form-control" style="width: 40%;">
                            @if ($errors->has('cmt'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('cmt') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-none" id="address-selection">
                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="text" name="address" class="form-control" style="width: 40%;">
                            @if ($errors->has('address'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-sm-12  form-footer pd20 d-inline-block text-right">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
            </div>
        </div>
    </form>
</section>
@stop
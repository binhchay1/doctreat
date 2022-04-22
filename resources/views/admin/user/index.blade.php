@extends('layouts.adminlte-custom')

@section('title', 'Tài khoản | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark">Tài khoản</h1>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
@endpush

@section('content')
<form action="" id="filter-user" method="get">
    <div class="d-flex">
        <div class="mb-2 ml-2">
            <label class=""> Tên</label>
            <input type="text" name="name" placeholder="Nhập tên" value="{{ old('name', request()->name ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class=""> Email</label>
            <input type="text" name="email" placeholder="Nhập email" value="{{ old('email', request()->email ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class=""> Số điện thoại</label>
            <input type="text" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone', request()->phone ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class=""> Chức vụ</label>
            <select class="form-control" name="role" value="{{ old('role', request()->role ?? null) }}">
                <option value="">ALL</option>
                @foreach(config('role.role') as $key => $item)
                <option value="{{ $key }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2 ml-2">
            <label class="w-100"> &nbsp;</label>
            <button type="submit" class="btn btn-primary pl-5 pr-5 pl-sm-3 pr-sm-3">Tìm kiếm</button>
            <a href="{{ route('admin.create.user') }}" type="submit" class="btn btn-warning ml-2 pl-5 pr-5 pl-sm-3 pr-sm-3">Tạo tài khoản</a>
        </div>
    </div>
</form>

@include('sweetalert::alert')
<section class="content mt-4 fnz-style-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 overflow-auto">
                <table class="table bg-white table-hover table-nowrap" id="user-table-list">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10px">STT</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Số điện thoại</th>
                            <th>Chức vụ</th>
                            <th>Ngày sinh</th>
                            <th>Ngày tạo</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)

                        <tr>
                            <td>{{ (($users->currentPage() - 1) * $users->perPage()) + $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender == 1 ? 'Nam' : 'Nữ' }}</td>
                            <td>
                                {{ isset($user->phone) ? $user->phone : "N/A"  }}
                            </td>
                            <td class="{{ \App\Enums\Role::processHtmlByRole($user->role) }}">{{ \App\Enums\Role::processKeyByRole($user->role) }}</td>
                            <td>{{ $user->dob }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @if(Auth::user()->id != $user->id)
                                <a href="{{ route('admin.update.user.view', $user->id)  }}" class="btn btn-success" role="button"><i class="fas fa-edit"></i></a>
                                <a href="javascript:void(0)" data-id="{{$user->id}}" data-name="{{$user->name}}" class="btn btn-md btn-danger delete_user ml-2"><i class="fas fa-lock"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($users->hasPages())
            <div class="col-12 clearfix text-right">
                {{ $users->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Modal -->
@include('include.modal_user_delete')
@stop

@push('js')
<script src="{{ asset('js/user.js') }}"></script>
@endpush
@extends('layouts.adminlte-custom')

@section('title', 'Dịch vụ | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark">Dịch vụ</h1>
</div>
@stop

@section('content')
@include('sweetalert::alert')

<form action="" id="filter-product" method="get">
    <div class="d-flex">
        <div class="mb-2 ml-2">
            <label class="">Tên</label>
            <input type="text" name="name" placeholder="Nhập tên" value="{{ old('name', request()->name ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class="">Bác sĩ</label>
            <input type="text" name="doctor" placeholder="Nhập loại" value="{{ old('type', request()->doctor ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class="w-100"> &nbsp;</label>
            <button type="submit" class="btn btn-primary pl-5 pr-5 pl-sm-3 pr-sm-3">Tìm kiếm</button>
            <a href="{{ route('admin.create.service') }}" type="submit" class="btn btn-warning ml-2 pl-5 pr-5 pl-sm-3 pr-sm-3">Tạo dịch vụ</a>
        </div>
    </div>
</form>

<section class="content mt-4 fnz-style-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 overflow-auto">
                <table class="table bg-white table-hover table-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Gía</th>
                            <th scope="col">Bác sĩ phụ trách</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($service->items() as $item)
                        @if(isset($item->user))
                        <tr>
                            <td>
                                {{ (($service->currentPage() - 1) * $service->perPage()) + $loop->iteration }}
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price, 2) }} VNĐ</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->status == 1 ? 'Đang hoạt động' : 'Đã tạm ngưng' }}</td>
                            <td>
                                <a href="{{ route('admin.update.service.view', $item->id)  }}" class="btn btn-success" role="button"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.delete.service', $item->id)  }}" class="btn btn-danger" role="button"><i class="fas fa-lock"></i></a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if ($service->hasPages())
        <div class="col-12 clearfix text-right">
            {{ $service->appends($_GET)->links("pagination::bootstrap-4") }}
        </div>
        @endif
    </div>
</section>

<!-- Modal -->
@include('include.modal_user_delete')
@stop
@extends('layouts.adminlte-custom')

@section('title', 'Kho hàng | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark">Kho hàng</h1>
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
            <label class="">Nội dung</label>
            <input type="text" name="description" placeholder="Nhập nội dung" value="{{ old('description', request()->description ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class="">Loại</label>
            <input type="text" name="type" placeholder="Nhập loại" value="{{ old('type', request()->type ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class="w-100"> &nbsp;</label>
            <button type="submit" class="btn btn-primary pl-5 pr-5 pl-sm-3 pr-sm-3">Tìm kiếm</button>
            <a href="{{ route('admin.create.storage') }}" class="btn btn-warning ml-2 pl-5 pr-5 pl-sm-3 pr-sm-3">Tạo đơn nhập kho</a>
            <a href="{{ route('admin.export.storage') }}" class="btn btn-danger ml-2 pl-5 pr-5 pl-sm-3 pr-sm-3">Tạo đơn xuất kho</a>
            <a href="{{ route('admin.history.storage') }}" class="btn btn-success ml-2 pl-5 pr-5 pl-sm-3 pr-sm-3">Kiểm tra đơn</a>
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
                            <th scope="col">Ảnh</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Loại</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->items() as $item)
                        @if(isset($item->storage))
                        <tr>
                            <td>
                                {{ (($product->currentPage() - 1) * $product->perPage()) + $loop->iteration }}
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price, 2) }} VNĐ</td>
                            <td>
                                <img src="{{ url($item->image) }}" width="150" height="100">
                            </td>
                            <td>
                                {{ $item->description }}
                            </td>
                            <td>
                                {{ $item->storage->quantity }}
                            </td>
                            <td>
                                {{ $item->type }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if ($product->hasPages())
        <div class="col-12 clearfix text-right">
            {{ $product->appends($_GET)->links("pagination::bootstrap-4") }}
        </div>
        @endif
    </div>
</section>

<!-- Modal -->
@include('include.modal_user_delete')
@stop
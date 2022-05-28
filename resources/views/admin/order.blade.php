@extends('layouts.adminlte-custom')

@section('title', 'Đơn hàng | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark">Đơn hàng</h1>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
@endpush

@section('content')
<form action="" id="filter-user" method="get">
    <div class="d-flex">
        <div class="mb-2 ml-2">
            <label class="">Mã</label>
            <input type="text" name="code" placeholder="Nhập mã" value="{{ old('code', request()->code ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class="">Tên</label>
            <input type="text" name="name" placeholder="Nhập tên" value="{{ old('name', request()->name ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class="">Số điện thoại</label>
            <input type="text" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone', request()->phone ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class="">Địa chỉ</label>
            <input type="text" name="address" placeholder="Nhập địa chỉ" value="{{ old('address', request()->address ?? null) }}" class="form-control">
        </div>
        <div class="mb-2 ml-2">
            <label class="w-100"> &nbsp;</label>
            <button type="submit" class="btn btn-primary pl-5 pr-5 pl-sm-3 pr-sm-3">Tìm kiếm</button>
        </div>
    </div>
</form>

@include('sweetalert::alert')
<section class="content mt-4 fnz-style-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 overflow-auto">
                <table class="table bg-white table-hover table-nowrap" id="order-table-list">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10px">STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <!-- <th>Tổng tiền</th> -->
                            <th>Trạng thái</th>
                            <th>Thanh toán</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $item)
                        @if(isset($item->payment))
                        <tr data-toggle="modal" data-code="{{ $item->payment_code }}" data-target="#orderModal">
                            <td>{{ (($order->currentPage() - 1) * $order->perPage()) + $loop->iteration }}</td>
                            <td>{{ $item->payment->payment_code }}</td>
                            <td>{{ $item->name_customer }}</td>
                            <td>{{ $item->phone_customer }}</td>
                            <td>{{ $item->address_customer }}</td>
                            <!-- <td>
                                {{ !$item->orderLine->isEmpty() ? $item->total : "N/A"  }}
                            </td> -->
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->payment->status_payment }}</td>
                            @if($item->status != "Giao hàng thất bại" and $item->status != "Đã giao hàng" and $item->payment->status_payment  != 'Thất Bại')
                            <td>
                                <a href="javascript:void(0)" class="btn btn-success edit_status_order" data-id="{{ $item->id }}"><i class="fas fa-edit"></i></a>
                            </td>
                            @else
                            <td>
                            </td>
                            @endif
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($order->hasPages())
            <div class="col-12 clearfix text-right">
                {{ $order->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Modal -->
@include('include.status_order')
@include('include.detail_order')
@stop
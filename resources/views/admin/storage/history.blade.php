@extends('layouts.adminlte-custom')

@section('title', 'Phiếu nhập kho | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark">Phiếu nhập kho</h1>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
@endpush

@section('content')

@include('sweetalert::alert')
<section class="content mt-4 fnz-style-table">
    <div class="container-fluid">
        @if(Auth::user()->role == 1)
        <div>
            <a href="{{ route('admin.export') }}?type=storage_history" class="btn btn-warning mb-3">Xuất excel</a>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12 overflow-auto">
                <table class="table bg-white table-hover table-nowrap" id="history-table-list">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10px">STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Gía</th>
                            <th>Số lượng nhập</th>
                            <th>Hóa đơn</th>
                            <th>Loại</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            @if(Auth::user()->role == 1)
                            <th>Chức năng</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($history as $item)
                        <tr>
                            <td>{{ (($history->currentPage() - 1) * $history->perPage()) + $loop->iteration }}</td>
                            <td>{{ $item->productClone->name }}</td>
                            <td>{{ $item->productClone->price }}</td>
                            <td>{{ $item->add_quantity }}</td>
                            <div id="lightbox"></div>
                            <td><img src="{{ $item->invoice }}"/ width="100" height="150"></td>
                            <td>{{ $item->type == 'export' ? 'Đơn xuất kho' : 'Đơn nhập kho' }}</td>
                            <td class="{{ \App\Enums\StatusStorage::processHtmlByStatus($item->status) }}">{{ \App\Enums\StatusStorage::processKeyByStatus($item->status) }}</td>
                            <td>{{ $item->created_at }}</td>
                            @if(Auth::user()->role == \App\Enums\Role::ADMIN)
                            @if($item->status == \App\Enums\StatusStorage::PENDING)
                            <td>
                                <a href="javascript:void(0)" data-id="{{ $item->id }}" data-quantity="{{ $item->add_quantity }}" data-product_id="{{ $item->product_id }}" class="btn btn-success edit_status" role="button"><i class="fas fa-edit"></i></a>
                            </td>
                            @else
                            <td></td>
                            @endif
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($history->hasPages())
            <div class="col-12 clearfix text-right">
                {{ $history->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Modal -->
@include('include.modal_edit_status')
@stop

@push('js')
<script src="{{ asset('js/user.js') }}"></script>
@endpush
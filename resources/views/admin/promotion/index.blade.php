@extends('layouts.adminlte-custom')

@section('title', 'Giảm giá | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark">Giảm giá</h1>
</div>
@stop

@section('content')
@include('sweetalert::alert')

<section class="content mt-4 fnz-style-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 overflow-auto card">
                <div class="row">
                    <!-- <div class="col-6 p-3">
                        <p class="h3">Mã tự động</p>
                        <div class="form-group">
                            <form method="post" action="{{ route('admin.create.promotion') }}">
                                @csrf
                                <label class="form-label" for="number">Số lượng</label>
                                <input type="number" class="form-control" id="number" name="number" min="0" required>
                                <label class="form-label" for="percent">Phần trăm giảm</label>
                                <input type="number" class="form-control" id="percent" name="percent" min="0" max="100" required>
                                <input type="hidden" class="form-control" id="type" name="type" value="auto">
                                <button class="btn btn-primary mt-3" type="submit">Tự động tạo</button>
                                @if(!$promotion_auto->isEmpty())
                                @if($promotion_auto[0]->status == 'on')
                                <a href="{{ route('change.status.code') }}?type=auto&status=off" class="btn btn-danger mt-3" type="button">Tắt</a>
                                @elseif($promotion_auto[0]->status == 'off')
                                <a href="{{ route('change.status.code') }}?type=auto&status=on" class="btn btn-success mt-3" type="button">Bật</a>
                                @endif
                                @endif
                            </form>
                            <ul class="list-group list-group-flush mt-4" style="max-height: 590px; overflow-y: auto;">
                                @foreach($promotion_auto as $auto)
                                <li class="list-group-item d-flex justify-content-between">
                                    <p class="mt-3">{{ $auto->promotion_code }}</p>
                                    <a href="{{ route('admin.delete.promotion') }}?id={{ $auto->id }}" class="btn btn-danger mt-2 mb-2" type="button">Xóa</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div> -->
                    <div class="col-6 p-3">
                        <p class="h3">Mã tự thêm</p>
                        <div class="form-group">
                            <form method="post" action="{{ route('admin.create.promotion') }}">
                                @csrf
                                <label class="form-label" for="code">Mã</label>
                                <input type="text" class="form-control" id="code" name="code" required>
                                <label class="form-label" for="percent">Phần trăm giảm</label>
                                <input type="number" class="form-control" id="percent" name="percent" min="0" max="100" required>
                                <input type="hidden" class="form-control" id="type" name="type" value="add">
                                <button class="btn btn-primary mt-3" type="submit">Tạo</button>
                            </form>
                            <ul class="list-group list-group-flush mt-4" style="max-height: 590px; overflow-y: auto;">
                                @foreach($promotion_add as $add)
                                <li class="list-group-item d-flex justify-content-between">
                                    <p class="mt-3">{{ $add->promotion_code }}</p>
                                    <p class="mt-3">{{ $add->percent }}</p>
                                    <!-- @if($add->status == 'on')
                                    <a href="{{ route('change.status.code') }}?type=add&status=off&id={{ $add->id }}" class="btn btn-danger mt-2 mb-2" type="button">Tắt</a>
                                    @elseif($add->status == 'off')
                                    <a href="{{ route('change.status.code') }}?type=add&status=on&id={{ $add->id }}" class="btn btn-success mt-3" type="button">Bật</a>
                                    @endif -->
                                    <a href="{{ route('admin.delete.promotion') }}?id={{ $add->id }}" class="btn btn-danger mt-2 mb-2" type="button">Xóa</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@stop
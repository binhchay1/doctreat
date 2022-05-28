@extends('layouts.website')

@section('content')
<section>
    <div class="container-fluid py-5">
        <div class="row g-5">
            <div class="col-lg-12">
                <h3 class="text-3xl text-bold">Danh sách giỏ hàng</h3>
                <div class="flex-1">
                    <table class="w-full table" cellspacing="0" id="cartTable">
                        <thead>
                            <tr class="h-12 uppercase">
                                <th class="col"></th>
                                <th class="col">Tên</th>
                                <th class="col">Số lượng</th>
                                <th class="col">Gía</th>
                                <th class="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                            <tr>
                                <td>
                                    <a href="#">
                                        <img src="{{ $item->attributes->image }}" class="rounded" width="150" height="100">
                                    </a>
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    <input type="hidden" name="id" value="{{ $item->id }}" id="id-cart-item">
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-6 text-center bg-gray-300" onfocusout="addQuantity()" id="number-of-quantity" min="0" max="{{ $item->stock }}"/>
                                    <span>(Còn {{ $item->stock }})</span>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                </td>
                                <td>
                                    ${{ number_format($item->price) }}
                                </td>
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-primary px-4">x</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    
                    <div class="d-flex flex-row-reverse flex-row">
                        <form method="post" action="{{ route('input.promotion.code') }}" class="form-horizontal">
                            @csrf
                            <input type="text" placeholder="Nhập mã giảm giá" name="promotion" value="{{ isset($_GET['code']) ? $_GET['code'] : '' }}" />
                            <button type="type" class="btn btn-success">Nhập</button>
                        </form>
                    </div>
                    <div class="d-flex flex-row-reverse mt-2">
                        <div style="margin-left: 10px">
                            @if(isset($_GET['code']) && isset($_GET['status']))
                            @if($_GET['status'] == 1)
                            <a class="btn btn-success" href="/confirm-order?code={{ $_GET['code'] }}&status={{ $_GET['status'] }}&percent={{ $_GET['percent'] }}">Thanh toán</a>
                            @else
                            <a class="btn btn-success" href="/confirm-order">Thanh toán</a>
                            @endif
                            @else
                            <a class="btn btn-success" href="/confirm-order">Thanh toán</a>
                            @endif
                        </div>
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="btn btn-primary">Xóa tất cả</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@extends('layouts.website')

@section('content')
<section>
    <div class="container-fluid py-5">
        <div class="row g-5">
            <div class="col-lg-12">
                <h3 class="text-3xl text-bold">Xác nhận đơn hàng</h3>
                <div class="flex-1">
                    <table class="w-full table" cellspacing="0" id="cartTable">
                        <thead>
                            <tr class="h-12 uppercase">
                                <th class="col"></th>
                                <th class="col">Tên</th>
                                <th class="col">Số lượng</th>
                                <th class="col">Gía</th>
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
                                    {{ $item->quantity }}
                                </td>
                                <td>
                                    ${{ $item->price }}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex flex-row-reverse">
                        @if(isset($_GET['code']) && isset($_GET['status']))
                        @if($_GET['status'] == 1)
                        <b class="h4">Total: ${{ number_format(((int) Cart::getTotal() - ((int) Cart::getTotal() * (int) $_GET['percent']) / 100), 3, ',') }}</b>
                        @else
                        <b class="h4">Total: ${{ Cart::getTotal() }}</b>
                        @endif
                        @else
                        <b class="h4">Total: ${{ Cart::getTotal() }}</b>
                        @endif
                    </div>

                    <form class="form-group" method="post" action="{{ route('create.pay') }}">
                        @csrf
                        <div class="d-flex flex-row-reverse flex-row">
                            <input type="text" id="promotion" name="promotion" value="{{ isset($_GET['code']) ? $_GET['code'] : '' }}" readonly />
                            <label for="promotion" class="mr-3" style="margin-right: 15px;">Mã giảm giá</label>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label">Tên khác hàng</label>
                                <input type="text" name="name" class="form-control" value="{{ Auth::check() ? Auth::user()->name : '' }}">
                                @if ($errors->has('name'))
                                <p class="help is-danger" style="color: red;">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="col-4">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ Auth::check() ? Auth::user()->phone : '' }}">
                                @if ($errors->has('phone'))
                                <p class="help is-danger" style="color: red;">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                            <div class="col-4">
                                <label class="form-label">Địa chỉ nhận hàng</label>
                                <input type="text" name="address" class="form-control" value="{{ Auth::check() ? Auth::user()->address : '' }}">
                                @if ($errors->has('address'))
                                <p class="help is-danger" style="color: red;">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse mt-2">
                            <div style="margin-left: 10px">
                                <button type="submit" class="btn btn-success">Xác nhận</button>
                            </div>
                            <div>
                                <button class="btn btn-success" onclick="history.back()">Quay lại</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@extends('layouts.website')

@section('content')
<section>
    <div class="container-fluid py-5">
        <div class="row g-5">
            <div class="col-lg-12">
                <h3 class="text-3xl text-bold">Hóa đơn</h3>
                <div>
                    <span>Cám ơn bạn đã mua hàng. Hóa đơn sẽ gửi về mail nếu bạn đã đăng nhập.</span>
                </div>
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
                                    ${{ number_format($item->price) }}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex flex-row-reverse">
                        @if(isset($_GET['total']))
                        @if(isset($_GET['promotion']) and isset($_GET['percent']))
                        Total: ${{ $_GET['total'] / 100 }} ({{ $_GET['promotion'] }}) - {{ $_GET['percent'] }}%
                        @else
                        Total: ${{ $_GET['total'] / 100 }}
                        @endif
                        @else
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Tên khác hàng</label>
                            <input type="text" name="name" class="form-control" value="{{ $data['name_customer'] }}" disabled>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" value="{{ $data['phone_customer'] }}" disabled>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Địa chỉ nhận hàng</label>
                            <input type="text" name="address" class="form-control" value="{{ $data['address_customer'] }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
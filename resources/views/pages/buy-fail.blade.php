@extends('layouts.website')

@section('content')
<section>
    <div class="container-fluid py-5">
        <div class="row g-5">
            <div class="col-lg-12">
                <h3 class="text-3xl text-bold">Lỗi giao dịch</h3>
                <div>
                    <span>Cám ơn bạn đã mua hàng. Rất tiếc hóa đơn thanh toán của bạn không thành công.</span>
                </div>
                <div class="text-center">
                    <h1 class="text-uppercase" style="font-size: 30px">Đơn hàng của bạn đã mua không thành công do: </h1>
                    <h2 class="text-uppercase mt-3 text-danger" style="font-size: 30px">- {{ $data->textError }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
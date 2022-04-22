@extends('layouts.website')

@section('content')
<section>
    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Sản phẩm</h6>
                <h1 class="display-5 text-uppercase mb-0">Sản phẩm cho mọi thú cưng</h1>
            </div>
            <div class="owl-carousel product-carousel">
                @foreach ($products as $product)
                @if (isset($product->storage))
                <div class="pb-5">
                    @if ($product->storage->quantity == 0)
                    <div class="out-stock">
                        <p class="text-center h3">Hết hàng</p>
                    </div>
                    @endif
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="{{ url($product->image) }}">
                        <h6 class="text-uppercase">{{ $product->name }}</h6>
                        <h5 class="text-primary mb-0">{{ $product->price }} VNĐ</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}" name="image">
                                <input type="hidden" value="1" name="quantity">
                                @if($product->storage->quantity > 0)
                                <button type="submit" class="btn btn-primary py-2 px-3"><i class="bi bi-cart"></i></button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5 justify-content-start">
                <div class="col-lg-7">
                    <div class="border-start border-5 border-dark ps-5 mb-5">
                        <h6 class="text-dark text-uppercase">Giảm giá duy nhất</h6>
                        <h1 class="display-5 text-uppercase text-white mb-0">Giảm 50% cho bất kì đơn đầu tiên nào của bạn</h1>
                    </div>
                    <p class="text-white mb-4">Hãy đăng ký/đăng nhập và vào mua bất kì sản phẩm nào đầu tiên của bạn với cửa hàng, đơn hàng đó sẽ được trừ trực tiếp 50% tổng hóa đơn của bạn.</p>
                    <a href="" class="btn btn-light py-md-3 px-md-5 me-3">Mua ngay</a>
                    <a href="" class="btn btn-outline-light py-md-3 px-md-5">Tìm hiểu thêm</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    @include('include.shop')
</section>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="js/pages/product.js"></script>
@endsection
@extends('layouts.website')

@section('content')
<section>
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <img src="{{ $product->image }}">
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2 id="name-modal">{{ $product->name }}</h2>
                        <h5 id="price-modal">$ {{ $product->price }}</h5>
                        <p>
                        <h4>Short Description:</h4>
                        <p id="description-modal">{{ $product->description }}</p>
                        @if(isset($product->storage))
                        @if($product->storage->quantity > 0)
                        <ul>
                            <li>
                                <div class="form-group quantity-box">
                                    <label class="control-label">Quantity</label>
                                    <input class="form-control" value="0" min="0" max="20" type="number">
                                </div>
                            </li>
                        </ul>
                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->image }}" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    <button type="submit" class="btn btn-primary py-2 px-3 hvr-hover">Add to cart</button>
                                </form>
                            </div>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
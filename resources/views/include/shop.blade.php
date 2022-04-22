@push('css')
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/custom.css">
@endpush

<!-- Start Shop Page  -->
<div class="shop-box-inner" id="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-8 text-center text-sm-left">
                            <div class="toolbar-sorter-right">
                                <span>Sắp xếp theo </span>
                                <select id="basic" class="select-picker show-tick form-control option-arrange" data-placeholder="$ VND">
                                    <option value="1">Tự động</option>
                                    <option value="2">Gía : Thấp → Cao</option>
                                    <option value="3">Gía : Cao → Thấp</option>
                                    <option value="4">Mua nhiều nhất</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 text-center text-sm-right">
                            <ul class="nav nav-tabs ml-auto">
                                <li>
                                    <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4" onclick="getDetail('{{ $product->id }}')">
                                        <div class="products-single fix">
                                            <div class="box-img-hover">
                                                <img src="{{ $product->image }}" class="img-fluid" alt="Image" height="150">
                                            </div>
                                            <div class="why-text">
                                                <h4>{{ $product->name }}</h4>
                                                <h5>${{ $product->price }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="list-view">
                                <div class="list-view-box">
                                    <div class="row">
                                        @foreach ($products as $product)
                                        @if(isset($product->storage))
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4" onclick="getDetail('{{ $product->id }}')">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <img src="{{ $product->image }}" class="img-fluid" alt="Image" style="height : 200px !important">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                            <div class="why-text full-width">
                                                <h4>{{ $product->name }}</h4>
                                                <h5>$ {{ $product->price }}</h5>
                                                <p>{{ $product->description }}</p>
                                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                    <input type="hidden" value="{{ $product->image }}" name="image">
                                                    <input type="hidden" value="1" name="quantity">
                                                    @if($product->storage->quantity > 0)
                                                    <button type="submit" class="btn btn-primary py-2 px-3">Thêm giỏ hàng</button>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categorie">
                    <div class="search-product">
                        <form action="{{ route('products.search') }}" method="post">
                            @csrf
                            <input class="form-control" placeholder="Tìm kiếm tên" type="text" name="name" value="{{ old('name') }}">
                            <button type="submit"> <i class="fa fa-search"></i> </button>
                        </form>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Loại sản phẩm</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" data-children=".sub-men" id="category-area">
                            @foreach($categories as $item)
                            <button class="list-group-item list-group-item-action" title="{{ $item->type }}"> {{ $item->type }} <small class="text-muted">({{ $item->total }})</button></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
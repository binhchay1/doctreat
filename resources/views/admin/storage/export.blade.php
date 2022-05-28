@extends('layouts.adminlte-custom')

@section('title', 'Tạo đơn | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark"></h1>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
@endpush

@section('content')
@include('sweetalert::alert')
<section class="content">
    <form action="{{ route('admin.exported.storage') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row form-area">
                <div class="col-md-12 form-header text-center">
                    <h1 class="form-title fs-20 pd5">Tạo xuất kho</h1>
                </div>
                <div class="col-md-12 form-body">
                    <div class="form-group row">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sản phẩm</label>
                        <div class="col-sm-10 col-form-input">
                            <select class="form-control" style="width: 40%; border-color:black;" name="product" id="select-product-export">
                                @foreach($product as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->price }} vnđ</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số lượng</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="number" onkeypress="return /[0-9]/i.test(event.key)" name="quantity" value="{{ old('quantity') }}" class="form-control" style="width: 40%;" min="0" id="quantity-product-export">
                            <p>(Số lượng còn lại : <span id="stock-product"></span>)</p>
                            @if ($errors->has('quantity'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('quantity') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hóa đơn</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="file" name="img" value="{{ old('img') }}" class="form-control" style="width: 40%;" required>
                            @if ($errors->has('img'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('img') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ghi chú</label>
                        <div class="col-sm-10 col-form-input">
                            <textarea name="note" value="{{ old('note') }}" class="form-control " style="width: 40%;"></textarea>
                        </div>
                    </div>
                </div>
               
                <div class="col-sm-12  form-footer pd20 d-inline-block text-right">
             
                    <button type="submit" class="btn btn-primary" id="create-export-storage">Tạo</button>
                </div>
            </div>
        </div>
    </form>
</section>
<script type="text/javascript">
    var products = <?php echo json_encode($product) ?>
</script>
@stop
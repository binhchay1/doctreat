@extends('layouts.adminlte-custom')

@section('title', 'Update user | Diamond Pet')

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
    <form action="{{ route('admin.update.products' , $product->id) }}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="row form-area">
                <div class="col-md-12 form-header text-center">
                    <h1 class="form-title fs-20 pd5">Cập nhật sản phẩm : {{ $product->name }}</h1>
                </div>
                <div class="col-md-12 form-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="text" name="name" value="{{ old('name', $product->name ?? null) }}" class="form-control" style="width: 40%;">
                            @if ($errors->has('name'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gía</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="text" name="price" value="{{ old('price', $product->price ?? null) }}" class="form-control" style="width: 40%;">
                            @if ($errors->has('price'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ảnh</label>
                        <div class="col-sm-10 col-form-input">
                            @if($product->image)
                            <img id="previewImg" class="logo-preview" src="{{ URL::to($product->image) }}">
                            @else
                            <img src="{{ asset("logo/company_logo_default.png") }}" class="p-0" alt="100x40" style="min-width: 100px; height: 40px;" />
                            @endif
                            <input type="file" class="form-control input-image-preview" name="img" onchange="previewFile(this)" value="{{ $product->image }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nội dung</label>
                        <div class="col-sm-10 col-form-input">
                            <textarea name="description" value="{{ old('description', $product->description ?? null) }}" class="form-control" style="width: 40%;"></textarea>
                            @if ($errors->has('description'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('description') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Loại</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="text" name="type" value="{{ old('type') }}" class="form-control" style="width: 40%;">
                            @if ($errors->has('type'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('type') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 form-footer pd20 d-inline-block text-right">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
</section>
@stop
@extends('layouts.adminlte-custom')

@section('title', 'Cập nhật dịch vụ | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark">Cập nhật dịch vụ</h1>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
@endpush

@section('content')
@include('sweetalert::alert')
<section class="content">
    <form action="{{ route('admin.update.service' , $service->id) }}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="row form-area">
                <div class="col-md-12 form-header text-center">
                    <h1 class="form-title fs-20 pd5">Cập nhật dịch vụ : {{ $service->name }}</h1>
                </div>
                <div class="col-md-12 form-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="text" name="name" value="{{ old('name', $service->name ?? null) }}" class="form-control" style="width: 40%;">
                            @if ($errors->has('name'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gía</label>
                        <div class="col-sm-10 col-form-input">
                            <input type="number" name="price" value="{{ old('price', $service->price ?? null) }}" class="form-control" style="width: 40%;" min="0">
                            @if ($errors->has('price'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bác sĩ phụ trách</label>
                        <div class="col-sm-10 col-form-input">
                            <select class="form-select" name="doctor" value="{{ old('doctor', $service->doctor_id ?? null) }}" style="width: 40%;">
                                @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12  form-footer pd20 d-inline-block text-right">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
</section>
@stop
@extends('layouts.adminlte-custom')

@section('title', 'Cấu hình | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark">Cấu hình</h1>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
@endpush

@section('content')

@include('sweetalert::alert')
<section class="content mt-4 fnz-style-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 overflow-auto">
                
            </div>
        </div>
    </div>
</section>

@stop
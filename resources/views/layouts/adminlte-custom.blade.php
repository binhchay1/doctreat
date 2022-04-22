@extends('adminlte::page')
@push('css')
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<link rel="icon" href="{{ asset('img/favicon.ico') }}" />
@endpush

@section('js')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>

<script src="{{ asset('js/sys-common.js') }}"></script>
<script src="{{ asset('js/sweetalert2@8.js') }}"></script>
@endsection

@section('footer')
<span class="clearfix d-flex bg-gray-light p-4 justify-content-center align-items-center">2022 &copy; Điều hành bởi &nbsp;<b class="fs-4 fst-italic"> Diamond Pet<b></span>
@endsection
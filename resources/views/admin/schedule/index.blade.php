@extends('layouts.adminlte-custom')

@section('title', 'Lịch hẹn | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark">Lịch hẹn</h1>
    <button class="btn btn-danger cancel_schedule">Báo bận</button>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('/css/calendar.css') }}">
@endpush

@section('content')
@include('sweetalert::alert')

<section class="content mt-4 fnz-style-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('include.info_schedule')
@include('include.info_cancel_schedule')
@include('include.modal_cancel_schedule')
@stop

@push('js')
<script>
    var schedule = <?php echo json_encode($data); ?>;
    var statusDate = <?php echo json_encode($statusDate); ?>;
    var allTimers = <?php echo json_encode($allTimers); ?>;
</script>
<script src="/js/adminlte/jquery-ui.min.js"></script>
<script src="/js/adminlte/adminlte.min.js"></script>
<script src="/js/adminlte/moment.min.js"></script>
<script src="/js/adminlte/main.js"></script>
<script src="/js/schedule.js"></script>
<script src="https://momentjs.com/downloads/moment.min.js"></script>
@endpush
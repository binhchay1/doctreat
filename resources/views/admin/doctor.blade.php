@extends('layouts.adminlte-custom')

@section('title', 'Khám bệnh | Diamond Pet')

@section('content_header')
<div style="display: flex;justify-content: space-between;">
    <h1 class="m-0 text-dark">Khám bệnh</h1>
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
            <div class="col-lg-6 overflow-auto">
                <div class="d-flex flex-row">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            @if(!$schedules->isEmpty() and $check == 1)
                            <h5 class="card-title">Vui lòng chọn lịch khám</h5>
                            <select class="form-control mt-5" id="schedule-select">
                                @foreach($schedules as $schedule)
                                @if(isset($schedule->user))
                                <option value="{{ $schedule->id }}">{{ $schedule->user->name }} - {{ $schedule->user->phone}}</option>
                                @endif
                                @endforeach
                            </select>
                            @else
                            <h5 class="card-title">Không có lịch khám ngày hôm nay</h5>
                            @endif
                        </div>
                    </div>
                    @if(!$schedules->isEmpty() and $check == 1)
                    <div class="card ml-4" style="width: 18rem;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-muted">Vui lòng chọn dịch vụ</h5>
                            <ul class="list-group mt-4" id="list-service-doctor-view" style="max-height: 99px;overflow: auto;">
                                @foreach($services as $service)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $service->name }}</span>
                                    <input type="checkbox" value="{{ $service->id }}" onchange="handleChange('{{ $service->id }}', this)" />
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>

                @if(!$schedules->isEmpty() and $check == 1)
                <div class="card" style="width: 75%;">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin khách hàng</h5>
                        <div class="mt-5">
                            <p class="card-text">Họ và tên : <span id="name-customer-doctor-view"></span></p>
                            <p class="card-text">Số điện thoại : <span id="phone-customer-doctor-view"></span></p>
                            <p class="card-text">Địa chỉ : <span id="address-customer-doctor-view"></span></p>
                            <p class="card-text">Ghi chú : <span id="note-doctor-view"></span></p>
                        </div>
                    </div>
                </div>
                @endif

                @if(!$schedules->isEmpty() and $check == 1)
                <div>
                    <a class="btn btn-primary" href="#" id="print-page">In hóa đơn</a>
                </div>
                @endif
            </div>

            @if(!$schedules->isEmpty() and $check == 1)
            <div class="col-lg-6">
                <iframe src="{{ URL::to('/') }}/admin/print-preview" width="100%" height="600" id="iframe-doctor-view" name="iframe-doctor-view"></iframe>
            </div>
            <iframe class="d-none" id="iframe-doctor-view-hidden" name="iframe-doctor-view-hidden"></iframe>
            @endif
        </div>
    </div>
</section>

<script>
    var schedules = <?php echo json_encode($schedules) ?>
</script>

@stop
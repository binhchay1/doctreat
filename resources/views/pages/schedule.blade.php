@extends('layouts.website')

@section('content')
<section class="bg-pentagon py-4">
    <div class="container py-3">
        <div class="row d-flex align-items-center gy-4">
            <div class="col-md-7">
                <h1 class="h2 mb-0 text-uppercase">Đặt lịch</h1>
            </div>
            <div class="col-md-5">
                <ol class="text-sm justify-content-start justify-content-lg-end mb-0 breadcrumb undefined">
                    <li class="breadcrumb-item"><a class="text-uppercase" href="/">Trang chính</a></li>
                    <li class="breadcrumb-item text-uppercase active">Đặt lịch</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container py-4">
        @if(!$doctors->isEmpty())
        <form method="post" action="{{ route('schedule.book') }}">
            @csrf
            <div class="gy-5 d-flex justify-content-between">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Chọn bác sĩ</h5>
                        <select class="form-control" style="background-color: white !important;" name="doctor_id" required>
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card ml-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Chọn ngày</h5>
                        <input type="date" id="date" name="date" class="form-control" name="date" value="{{ $date }}" onchange="changeDate()" required>
                    </div>
                </div>
                <div class="card ml-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Chọn thời gian</h5>
                        <select class="form-control" style="background-color: white !important;" name="hours" required>
                            @foreach ($timers as $time)
                            @if($time->active)
                            <option value="{{ $time->hours }}">{{ $time->hours }}</option>
                            @else
                            <option value="{{ $time->hours }}" disabled style="background-color: black">{{ $time->hours }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card ml-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Ghi chú</h5>
                        <textarea class="form-control" style="background-color: white !important; resize: none;" name="note"></textarea>
                        @if ($errors->has('note'))
                        <p class="help is-danger" style="color: red;">{{ $errors->first('note') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div>
                <p class="mt-2">Lịch báo bận của bác sĩ</p>
                <ul class="list-group">
                    @if($cancelSchedule->isEmpty())
                    <p>Trống</p>
                    @else
                    @foreach ($cancelSchedule as $cancel)
                    <li class="list-group-item d-flex align-items-center">
                        <span>{{ $cancel->reason }}</span>
                        <span class="badge bg-primary rounded-pill ml-3" style="margin: 10px;">{{ $cancel->hours }}</span>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div>
                <p class="mt-2">Lịch đã được đặt của bác sĩ</p>
                <ul class="list-group">
                    @if($schedules->isEmpty())
                    <p>Trống</p>
                    @else
                    @foreach ($schedules as $schedule)
                    <li class="list-group-item d-flex align-items-center">
                        <span>{{ $schedule->customer_phone }}</span>
                        <span class="badge bg-primary rounded-pill ml-3" style="margin: 10px;">{{ $schedule->hours }}</span>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>

            <div class="form-group mt-5 d-flex flex-row-reverse">
                <button class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
        @else
        <div class="gy-5 d-flex justify-content-center">
            <p class="text-center h2">Hiện tại không có dữ liệu nào về lịch của bác sĩ. Xin vui lòng quay lại sau!</p>
        </div>
        @endif
    </div>
</section>
<script src="{{ URL::to('js/pages/schedule.js') }}"></script>
@endsection
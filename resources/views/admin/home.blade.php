@extends('layouts.adminlte-custom')

@section('title', 'Diamond Pet')

@section('content_header')
<h1 class="m-0 text-dark">Trang chính</h1>
@stop

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-danger">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Doanh thu trong năm {{ date('Y') }} ( <span id="total-order"></span> VNĐ )
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="revenue-chart-canvas" height="300" style="height: 300px; display: block; width: 900px;" width="900" class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="sales-chart-canvas" height="300" style="height: 300px; display: block; width: 900px;" class="chartjs-render-monitor" width="900"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-info">
                    <div class="card-header border-0">
                        <h3 class="card-title">Danh sách sản phẩm bán được trong {{ date('m/Y') }}</h3>
                    </div>
                    <div class="card-body table-responsive p-0" style="overflow-y:auto;" id="table-scroll-product">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Số lượng bán được</th>
                                    <th>Tổng doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['product'] as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->totalQuantity }}</td>
                                    <td class="text-center">{{ number_format($product->totalPrice) }} vnđ</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-white">Doanh thu bác sĩ theo <span id="date-card-text"></span></h3>
                        <div class="card-tools d-flex">
                            <div class="dropdown">
                                <button type="button" class="btn btn-tool" data-date-format="yyyy" id="yearPicker">
                                    Theo năm
                                </button>
                            </div>
                            <div class="dropdown">
                                <button type="button" class="btn btn-tool" data-date-format="yyyy-mm" id="monthPicker">
                                    Theo tháng
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <div id="pieChart-area">
                            <div class="d-none" id="message-none">
                                <h3>Không có dữ liệu</h3>
                            </div>
                            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-success">
                    <div class="card-header border-0">
                        <h3 class="card-title">Danh sách lịch khám trong tháng </h3>
                    </div>
                    <div class="card-body table-responsive p-0" style="overflow-y:auto;" id="table-scroll-schedule">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>Tên bác sĩ</th>
                                    <th>Thời gian</th>
                                    <th>Trạng Thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['schedule'] as $schedule)
                               
                                <tr>
                                    <td>{{ $schedule->customer_name }}</td>
                                    <td>{{ $schedule->doctor_name }}</td>
                                    <td>{{ $schedule->timer }}</td>
                                    @if($schedule->status == 1)
                                    <td>Đã Được Chấp thuận</td>
                                    @elseif($schedule->status == 2)
                                    <td>Bị Từ Chối</td>
                                    @else
                                    <td>Chưa Kiểm Tra</td>
                                    @endif
                                </tr>
                              
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ URL::to('/js/dashboard.js') }}"></script>
@endpush
<style>
    .card-primary:not(.card-outline)>.card-header,
    .card-primary:not(.card-outline)>.card-header a {
        color: black;
    }

    #table-scroll-schedule {
        max-height: 295px;
        overflow: auto;
    }

    #table-scroll-schedule th {
        background-color: #f4f6f9;
        position: sticky;
        top: 0;
        z-index: 1;
        box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
    }

    #table-scroll-product {
        max-height: 340px;
        overflow: auto;
    }

    #table-scroll-product th {
        background-color: #f4f6f9;
        position: sticky;
        top: 0;
        z-index: 1;
        box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
    }
</style>

@stop
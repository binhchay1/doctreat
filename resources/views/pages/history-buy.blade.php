@extends('layouts.website')

@section('content')
<link rel="stylesheet" href="{{ asset('css/pages/history-buy.css')}}"></link>
<section class="bg-pentagon py-4">
    <div class="container py-3">
        <div class="row d-flex align-items-center gy-4">
            <div class="col-md-7">
                <h1 class="h2 mb-0 text-uppercase">Hồ sơ</h1>
            </div>
            <div class="col-md-5">
                <!-- Breadcrumb-->
                <ol class="text-sm justify-content-start justify-content-lg-end mb-0 breadcrumb undefined">
                    <li class="breadcrumb-item"><a class="text-uppercase" href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item text-uppercase active">Hồ sơ </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT SECTION-->
<section class="py-5">
    <div class="container py-4">
        <div class="row gy-5">
            <div class="col-lg-9">
                <p class="lead mb-4">Lịch sử mua hàng.</p>
                <div>
                    <div class="float-right">
                        <label for="time-picker">Tìm kiếm </label>
                        <input type="date" class="form-control" id="time-picker-history" onchange="setDataTicket(this.value)">
                    </div>
                </div>
                <!-- PROFILE DETAIL FORM-->
                <div style="margin-top: 100px">
                    @foreach($data as $key => $value)
                    <div id="{{ $key }}">
                        <div>
                            <p class="form-group h5">{{ $key }}</p>
                        </div>
                        <hr class="new4">

                        <div class="row">
                            @foreach($value as $history)
                            <div class="card mt-5 col-md-5" style="border: 0;">
                                <div class="card-body">
                                    <article class="card fl-left" style="width: 400px">
                                        <section class="date" style="width: 25%"><a href="/invoice-check?payment_code={{ $history->code }}"><time><span style="font-size: 15px !important">Chi tiết </span></time></a></section>
                                        <section class="card-cont">
                                            <small>{{ Auth::user()->name }}</small>
                                            <h3 style="text-decoration-line: none; font-size: 13px !important;"></span></h3>
                                            <div class="even-date"> <i class="fa fa-phone"></i> <span id="date-ticket" class="ml-2" style="margin-left: 5px;"> {{ $history->phone_customer }}</span> <span id="time-ticket" class="ml-2"></span> </time></div>
                                            <div class="even-info"> <i class="fa fa-map-marker"></i>
                                                <div class="ml-2">
                                                    <p style="padding: 0px;"><span>{{ $history->address_customer }}</span></p>
                                                </div>
                                            </div>
                                            <div class="even-info"> <i class="fa fa-barcode"></i>
                                                <div class="ml-2">
                                                    <p style="padding: 0px;"><span id="code-ticket" style="margin-left: 5px;">{{ $history->code }}</span></p>
                                                </div>
                                            </div>
                                            <div class="even-info"> <i class="fa fa-dollar-sign"></i>
                                                <div class="ml-2">
                                                    <p style="padding: 0px;"><span id="cost-ticket">{{ number_format($history->cost * $history->total_buy) }} VNĐ</span></p>
                                                    </br>
                                                    <p style="padding: 0px;"><span id="cost-ticket"> </span></p>
                                                </div>
                                            </div>

                                        </section>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <div class="d-none text-center h2 mt-5" id="empty-history" style="margin-bottom: 118px">
                        <hr class="mb-5 mt-5">
                        <p>Không có dữ liệu</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <h3 class="h4 text-uppercase lined mb-4">Quản lý tài khoản</h3>
                <nav class="nav flex-column nav-pills">
                    <a class="nav-link text-sm" href="/profile"> <i class="me-2 fas fa-user"></i><span>Thông tin cá nhân</span></a>
                    <a class="nav-link text-sm active" href="/history"> <i class="me-2 fas fa-list"></i><span>Lịch sử mua hàng</span></a>
                </nav>
            </div>
        </div>
    </div>
</section>

<script>
    var data = <?php echo json_encode($data) ?>;
</script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="js/pages/history-buy.js"></script>
@endsection
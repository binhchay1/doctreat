@extends('layouts.website')

@section('content')
<!-- HEADING BREADCRUMB-->
<section class="bg-pentagon py-4">
    <div class="container py-3">
        <div class="row d-flex align-items-center gy-4">
            <div class="col-md-7">
                <h1 class="h2 mb-0 text-uppercase">Đặt lịch</h1>
            </div>
            <div class="col-md-5">
                <!-- Breadcrumb-->
                <ol class="text-sm justify-content-start justify-content-lg-end mb-0 breadcrumb undefined">
                    <li class="breadcrumb-item"><a class="text-uppercase" href="/">Trang chính</a></li>
                    <li class="breadcrumb-item text-uppercase active">Đặt lịch</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT SECTION-->
<section class="py-5">
    <div class="container py-4">
        <p class="text-center h2">Cám ơn bạn đã dịch vụ của chúng tôi.</p>
        <p class="text-center h4">Chúng tôi sẽ liên hệ bạn sớm nhất khi bác sĩ đã đồng ý với lịch hẹn của bạn. Chúng tôi sẽ gửi mọi thông tin qua mail của bạn!</p>
    </div>
</section>

@endsection
@extends('layouts.website')

@section('content')
<section>
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Liên hê</h6>
                <h1 class="display-5 text-uppercase mb-0">Hãy để lại thông tin. Chúng tôi sẽ liên hệ sớm nhất</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-7">
                    <form>
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control bg-light border-0 px-4" placeholder="Nhập tên" style="height: 55px;">
                                @if ($errors->has('name'))
                                <p class="help is-danger" style="color: red;">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <input type="email" name="email" class="form-control bg-light border-0 px-4" placeholder="Nhập email" style="height: 55px;">
                                @if ($errors->has('email'))
                                <p class="help is-danger" style="color: red;">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <input type="text" name="title" class="form-control bg-light border-0 px-4" placeholder="Nhập tiêu đề" style="height: 55px;">
                                @if ($errors->has('title'))
                                <p class="help is-danger" style="color: red;">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-light border-0 px-4 py-3" name="message" rows="9" placeholder="Nhập nội dung"></textarea>
                                @if ($errors->has('message'))
                                <p class="help is-danger" style="color: red;">{{ $errors->first('message') }}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Gửi thông tin</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="bg-light mb-5 p-5">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Cơ sở</h6>
                                <span>Hòa Lạc campus, Sơn Tây, Hà Nội</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Email</h6>
                                <span>diamondPetdiamond@gmail.com</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Số điện thoại</h6>
                                <span>0934-232-323</span>
                            </div>
                        </div>
                        <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17848.32743157646!2d105.51312841440846!3d20.98643670383723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345b74d5000dd9%3A0x78f00cc4a35484b9!2zSMOyYSBM4bqhYywgVGjhuqFjaCBUaOG6pXQsIEhhbm9pLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1648183078195!5m2!1sen!2s" width="420" height="210" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

</section>
@endsection
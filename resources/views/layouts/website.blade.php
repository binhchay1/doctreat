<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Diamond Pet') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/plus/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/pages/style.css" rel="stylesheet">

</head>

<body>
    <div class="wide" id="all">
        <!-- Register Start -->
        <header class="nav-holder make-sticky">
            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0 position-fixed w-100 d-flex flex-row-reverse">
                @if (Route::has('login'))
                <ul class="list-inline mb-0">
                    @auth
                    <li class="list-inline-item">
                        <div class="user-panel d-flex">
                            <div class="info dropdown">
                                <a class="d-block dropdown-toggle nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/profile">Hồ sơ</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item">{{ __('Đăng xuất') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <a href="/cart" class="btn btn-primary">
                            <span class="badge rounded-pill bg-danger">
                                {{ Cart::getTotalQuantity() }}
                            </span>
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                    @else
                    <li class="list-inline-item"><a href="{{ route('login') }}" class="text-xs text-uppercase fw-bold text-reset"><i class="fas fa-door-open me-2"></i><span class="d-none d-md-inline-block ">Đăng nhập</span></a></li>
                    @if (Route::has('register'))
                    <li class="list-inline-item"><a href="{{ route('register') }}" class="text-xs text-uppercase fw-bold text-reset"><i class="fas fa-user me-2"></i><span class="d-none d-md-inline-block">Đăng ký</span></a></li>
                    <li class="list-inline-item">
                        <a href="/cart" class="btn btn-primary">
                            <span class="badge rounded-pill bg-danger">
                                {{ Cart::getTotalQuantity() }}
                            </span>
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                    @endif
                    @endauth
                </ul>
                @endif
            </nav>
        </header>
        <!-- Register End -->

        <!-- Topbar Start -->
        <div class="container-fluid border-bottom border-top d-none d-lg-block pt-4">
            <div class="row gx-0">
                <div class="col-lg-4 text-center py-2 mt-2">
                    <div class="d-inline-flex align-items-center">
                        <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h6 class="text-uppercase mb-1">Cơ sở</h6>
                            <span>Hòa Lạc campus, Sơn Tây, Hà Nội</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center border-start border-end py-2 mt-2">
                    <div class="d-inline-flex align-items-center">
                        <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h6 class="text-uppercase mb-1">Email</h6>
                            <span>diamondPetdiamond@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center py-2 mt-2">
                    <div class="d-inline-flex align-items-center">
                        <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h6 class="text-uppercase mb-1">Số điện thoại</h6>
                            <span>0934-232-323</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar Sticky-->
        <div>
            <!-- Navbar Start -->
            <div class="d-flex navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
                <a href="/" class="navbar-brand ms-lg-5 mt-2">
                    <h1 class="m-0 text-uppercase text-dark"><i class="bi bi-shop fs-1 text-primary me-3"></i>Diamond Pet</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="/" class="nav-item nav-link" id="main">Trang chính</a>
                        <a href="/about" class="nav-item nav-link" id="about">Giới thiệu</a>
                        <a href="/service" class="nav-item nav-link" id="service">Dịch vụ</a>
                        <a href="/product" class="nav-item nav-link" id="product">Sản phẩm</a>
                        @if(Auth::check())
                        <a href="/schedule" class="nav-item nav-link" id="schedule">Đặt lịch</a>
                        @endif
                        <a href="/contact" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5 position-static">Liên hệ <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Navbar End -->
        </div>

        @if(session('success'))
        <div class="position-relative" id="alert-pages">
            <div class="alert alert-success position-fixed top-0 end-0" role="alert" id="alert-success">{{ session('success') }}</div>
        </div>
        @endif

        <div>
            @yield('content')
        </div>

        <footer>
            <!-- Footer Start -->
            <div class="container-fluid bg-light mt-5 py-5">
                <div class="container pt-5">
                    <div class="row g-5">
                        <div class="col-lg-5 col-md-6">
                            <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Thông tin liên lạc</h5>
                            <p class="mb-4">Hãy liên lạc với chúng tôi ngay để có được những tư vấn hữu ích nhất</p>
                            <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Hòa Lạc campus, Sơn Tây, Hà Nội</p>
                            <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>diamondPetdiamond@gmail.com</p>
                            <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>0934-232-323</p>
                        </div>
                        <div class="col-lg-2 col-md-0">

                        </div>
                        <div class="col-lg-5 col-md-6">
                            <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Nhận thông tin</h5>
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control p-3" placeholder="Nhập email">
                                    <button class="btn btn-primary">Đăng ký</button>
                                </div>
                            </form>
                            <h6 class="text-uppercase mt-4 mb-3">Theo dõi chúng tôi</h6>
                            <div class="d-flex">
                                <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-linkedin"></i></a>
                                <a class="btn btn-outline-primary btn-square" href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-12 text-center text-body">
                            <a class="text-body" href="">Nội dung và điều khoản</a>
                            <span class="mx-1">|</span>
                            <a class="text-body" href="">Bảo mật</a>
                            <span class="mx-1">|</span>
                            <a class="text-body" href="">Dịch vụ khách hàng</a>
                            <span class="mx-1">|</span>
                            <a class="text-body" href="">Thanh toán</a>
                            <span class="mx-1">|</span>
                            <a class="text-body" href="">Hỗ trợ</a>
                            <span class="mx-1">|</span>
                            <a class="text-body" href="">Câu hỏi</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid bg-dark text-white-50 py-4">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-md-6 text-center text-md-start">
                            <p class="mb-md-0">&copy; <a class="text-white" href="#">Diamond Pet</a>. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <p class="mb-0">Thiết kế bởi <a class="text-white" href="https://htmlcodex.com">HTML Codex</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </footer>
    </div>
    <!-- JavaScript files-->
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/pages/main.js"></script>
</body>

</html>
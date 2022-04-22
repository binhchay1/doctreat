@extends('layouts.website')

@section('content')
<!-- HERO SLIDER SECTION-->
<section>
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-uppercase text-dark mb-lg-4">Diamond Pet</h1>
                    <h1 class="text-uppercase text-white mb-lg-4">Gía trị kim cương cho thú cưng của bạn</h1>
                    <p class="fs-4 text-white mb-lg-4">Tất cả những bạn cần, cửa hàng cho tôi đều có. Chúng tôi luôn cố mang cho các bạn 1 trải nghiệm với giá trị kim cương nhất</p>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="" class="btn btn-outline-light border-2 py-md-3 px-md-5 me-5">Tìm hiểu thêm</a>
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/watch?v=v09wHpigryk" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                        <h5 class="font-weight-normal text-white m-0 ms-4 d-none d-sm-block">Xem giới thiệu</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Video giới thiệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe width="1237" height="696" src="https://www.youtube.com/embed/v09wHpigryk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-primary text-uppercase">Về chúng tôi</h6>
                        <h1 class="display-5 text-uppercase mb-0">Chúng tôi luôn giữ tất cả thú nuôi thật hạnh phúc</h1>
                    </div>
                    <h4 class="text-body mb-4">Với các chuyên gia hàng đầu trong việc chăm sóc và nuôi dưỡng thú nuôi chúng tôi tin rằng chúng tôi luôn mang đến các bạn 1 sản phẩm tốt nhất</h4>
                    <div class="bg-light p-4">
                        <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100 active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">Sứ mệnh</button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false">Tầm nhìn</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                                <p class="mb-0">Chúng tôi luôn đảm bảo rằng tất cả dịch vụ và sản phẩm chúng tôi cung cấp đến khách hàng xứng đáng với giá trị mà khách hàng phải nhận được.</p>
                            </div>
                            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                                <p class="mb-0">Chúng tôi luôn muốn mở rộng và phát triển đến cả mọi người kể cả là những khách hàng khó tính nhất.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Dịch vụ</h6>
                <h1 class="display-5 text-uppercase mb-0">Dịch vụ của chúng tôi là tốt nhất</h1>
            </div>
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-house display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Trông giữ</h5>
                            <p>Chúng tôi mang đến khách hàng 1 dịch vụ trông giữ cả tháng với đầy đủ dịch vụ đi kèm khác</p>
                            <a class="text-primary text-uppercase" href="" data-toggle="modal" data-target="#descriptionLabel" data-title="Trông giữ" data-type="keep">Tìm hiểu thêm<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-food display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Cho ăn</h5>
                            <p>Chúng tôi mang đến khách hàng 1 dịch vụ cho ăn nhanh và ngon nhất cho các thú cưng của bạn</p>
                            <a class="text-primary text-uppercase" href="" data-toggle="modal" data-target="#descriptionLabel" data-title="Cho ăn" data-type="feat">Tìm hiểu thêm<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-grooming display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Chải lông</h5>
                            <p>Chúng tôi mang đến khách hàng 1 dịch vụ chải lông hoàn toàn khác biệt với sự nhẹ nhàng và tuyệt vời nhất</p>
                            <a class="text-primary text-uppercase" href="" data-toggle="modal" data-target="#descriptionLabel" data-title="Chải lông" data-type="groom">Tìm hiểu thêm<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-cat display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Huấn luyện</h5>
                            <p>Chúng tôi mang đến khách hàng 1 dịch vụ huấn luyện bài bản và kĩ thuật nhất với các thầy giáo đã có hơn 5 năm kinh nghiệm trong lĩnh vực</p>
                            <a class="text-primary text-uppercase" href="" data-toggle="modal" data-target="#descriptionLabel" data-title="Huấn luyện" data-type="training">Tìm hiểu thêm<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-dog display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Thể dục</h5>
                            <p>Chúng tôi mang đến khách hàng 1 dịch vụ thể dục chuyên nghiệp với những bài tập từ khó đến cao</p>
                            <a class="text-primary text-uppercase" href="" data-toggle="modal" data-target="#descriptionLabel" data-title="Thể dục" data-type="gym">Tìm hiểu thêm<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-vaccine display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Làm đẹp</h5>
                            <p>Chúng tôi mang đến khách hàng 1 dịch vụ làm đẹp hoàn hảo nhất với các dụng cụ chuyên nghiệp</p>
                            <a class="text-primary text-uppercase" href="" data-toggle="modal" data-target="#descriptionLabel" data-title="Làm đẹp" data-type="salon">Tìm hiểu thêm<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Sản phẩm</h6>
                <h1 class="display-5 text-uppercase mb-0">Sản phẩm cho mọi thú cưng</h1>
            </div>
            <div class="owl-carousel product-carousel">
                @foreach ($products as $product)
                <div class="pb-5">
                @if (isset($product->storage))
                    @if ($product->storage->quantity == 0)
                    <div class="out-stock">
                        <p class="text-center h3">Hết hàng</p>
                    </div>
                    @endif
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="{{ url($product->image) }}" alt="">
                        <h6 class="text-uppercase">{{ $product->name }}</h6>
                        <h5 class="text-primary mb-0">{{ $product->price }} VNĐ</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}" name="image">
                                <input type="hidden" value="1" name="quantity">
                                @if($product->storage->quantity > 0)
                                <button type="submit" class="btn btn-primary py-2 px-3"><i class="bi bi-cart"></i></button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5 justify-content-start">
                <div class="col-lg-7">
                    <div class="border-start border-5 border-dark ps-5 mb-5">
                        <h6 class="text-dark text-uppercase">Giảm giá duy nhất</h6>
                        <h1 class="display-5 text-uppercase text-white mb-0">Giảm 50% cho bất kì đơn đầu tiên nào của bạn</h1>
                    </div>
                    <p class="text-white mb-4">Hãy đăng ký/đăng nhập và vào mua bất kì sản phẩm nào đầu tiên của bạn với cửa hàng, đơn hàng đó sẽ được trừ trực tiếp 50% tổng hóa đơn của bạn.</p>
                    <a href="" class="btn btn-light py-md-3 px-md-5 me-3">Mua ngay</a>
                    <a href="" class="btn btn-outline-light py-md-3 px-md-5">Tìm hiểu thêm</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Đội ngũ</h6>
                <h1 class="display-5 text-uppercase mb-0">Tất cả đều có trên 5 năm kinh nghiệm</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="text-uppercase">Asley Waston</h5>
                        <p class="m-0">Chuyên viên</p>
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="text-uppercase">Alethea Jack</h5>
                        <p class="m-0">Chuyên viên</p>
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="text-uppercase">Trancy Coil</h5>
                        <p class="m-0">Đào tạo</p>
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="text-uppercase">Crystal Amet</h5>
                        <p class="m-0">Đào tạo</p>
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-5.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="text-uppercase">Edana Mist</h5>
                        <p class="m-0">Làm đẹp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-testimonial py-5" style="margin: 45px 0;">
        <div class="container py-5">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel bg-white p-5">
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-4">
                                <img class="img-fluid mx-auto" src="img/testimonial-1.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                                    <i class="bi bi-chat-square-quote text-primary"></i>
                                </div>
                            </div>
                            <p>"Tôi phải đánh giá thật sự khác biệt hoàn toàn sau khi tôi được tham gia trải nghiệm tất cả các dịch vụ ở đây. Nó thật sự quá hoàn hảo."</p>
                            <hr class="w-25 mx-auto">
                            <h5 class="text-uppercase">Marry Bone</h5>
                            <span>Giáo sư</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-4">
                                <img class="img-fluid mx-auto" src="img/testimonial-2.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                                    <i class="bi bi-chat-square-quote text-primary"></i>
                                </div>
                            </div>
                            <p>"Tôi đã đi rất nhiều cửa hàng ở quanh khu vực tôi sống và đây là lần đầu tiên tôi phải ngạc nhiên về độ chuyên nghiệp của nhân viên ở đây. Qúa sức tưởng tượng!"</p>
                            <hr class="w-25 mx-auto">
                            <h5 class="text-uppercase">Jack Smith</h5>
                            <span>Khách hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Bài viết</h6>
                <h1 class="display-5 text-uppercase mb-0">Bài viết gần nhất của chúng tôi</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="blog-item">
                        <div class="row g-0 bg-light overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100" src="img/blog-1.jpg" style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="bi bi-bookmarks me-2"></i>Diamond Pet</small>
                                        <small><i class="bi bi-calendar-date me-2"></i>24 - 4, 2022</small>
                                    </div>
                                    <h5 class="text-uppercase mb-3">Hãy sử dụng dịch vụ của chúng tôi ngay hôm nay!</h5>
                                    <p>Hãy sử dụng dịch vụ của chúng tôi ngay hôm nay để cảm thấy an tâm nhất!</p>
                                    <a class="text-primary text-uppercase" href="">Tìm hiểu thêm<i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="blog-item">
                        <div class="row g-0 bg-light overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100" src="img/blog-2.jpg" style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="bi bi-bookmarks me-2"></i>Diamond Pet</small>
                                        <small><i class="bi bi-calendar-date me-2"></i>04 - 04, 2021</small>
                                    </div>
                                    <h5 class="text-uppercase mb-3">Hãy dành cho những chú thú cưng 1 đặc quyền!</h5>
                                    <p>Nhắc đến những đặc quyền chắc hẳn chúng ta sẽ nghĩ đến sự quý phái. Vâng đúng vậy!</p>
                                    <a class="text-primary text-uppercase" href="">Tìm hiểu thêm<i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
</section>

@include('include.description')
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="js/pages/service.js"></script>
@endsection
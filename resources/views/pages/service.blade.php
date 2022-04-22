@extends('layouts.website')

@section('content')
<section>
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
                            <p>Chúng tôi mang đến khách hàng 1 dịch vụ huấn luyện bài bản và kĩ thuật nhất. Các thầy giáo đã có hơn 5 năm kinh nghiệm trong lĩnh vực</p>
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

    <div class="container py-5">
        <div class="col-md-12">
            <div class="service-item bg-light d-flex p-4 flex-column">
                <p class="text-success text-bold h3 text-center">Chúng tôi hiện tại đang phục vụ thêm các dịch vụ theo lịch với bác sĩ riêng</p>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Tên dịch vụ</th>
                            <th scope="col">Gía tiền</th>
                            <th scope="col">Bác sĩ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        @if(isset($service->user))
                        <tr>
                            <td class="text-center">{{ $service->name }}</td>
                            <td class="text-center">{{ $service->price }}</td>
                            <td class="text-center">{{ $service->user->name }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>

@include('include.description')
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="js/pages/service.js"></script>
@endsection
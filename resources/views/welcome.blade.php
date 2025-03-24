 @extends('layouts.template')


@section('title')
    โหลดมาสเตอร์ โลจิสติกส์
@stop

@section('stylesheet')

<style>

</style>

@stop('stylesheet')



@section('content')

 <!-- Hero Area -->

    <div id="home-3" class="hero-area">
        <div class="single-slide-item hero-area-bg-6">
            <div class="overlay"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 wow fadeInUp animated" data-wow-delay=".2s">
                        <div class="hero-area-content">
                            <div class="section-title">
                                <h1>เราคือบริษัทจัดส่งพัสดุชั้นนำของประเทศไทย</h1>
                                <p>โหลดมาสเตอร์ โลจิสติกส์ ผู้ให้บริการจัดส่งพัสดุในประเทศไทยอันดับ 1 มีบริการอันหลากหลายรองรับความต้องการของลูกค้าทุกกลุ่มอย่างครบถ้วน
                                บริการจัดส่งและพัสดุในประเทศตั้งแต่ลูกค้าองค์กรไปจนถึงบุคคลทั่วไป </p>
                            </div>
                            <div class="slide-action">
                                <img src="{{ url('home/assets/img/icon/process/1.png') }}" alt="" >
                                <img src="{{ url('home/assets/img/icon/process/2.png') }}" alt="" >
                                <img src="{{ url('home/assets/img/icon/process/3.png') }}" alt="" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Promo Area  -->

    <div class="promo-area">
        <div class="container">
            <div class="row gx-0">
                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <div class="quick_contact">
                        <div class="contact-icon"><i class="las la-phone-volume"></i></div>
                        <div class="contact-body">
                            <h6>เรียกรถเข้ารับพัสดุ </h6>
                            <p> <a href="mailto:loadmasterlogisticsth@gmail.com">loadmasterlogisticsth@gmail.com</a></p>
                            <p>phone: <a href="tel:992688272500">+668 0591 8159</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                    <div class="quick_contact">
                        <div class="contact-icon"><i class="las la-map-marked-alt"></i></div>
                        <div class="contact-body">
                            <h6>ที่อยู่บริษัท </h6>
                            <p>305 ซอย พระรามที่ 2 ซ.38 บางมด <br> จอมทอง กรุงเทพมหานคร 10150</p>

                        </div>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-5 offset-lg-1 col-lg-5">
                    <div class="promo-wrapper">
                        <div class="promo-inner">
                            <div class="promo-icon"><img src="{{ url('home/assets/img/icon/courier.png') }}" alt=""></div>
                            <div class="promo-content">
                                <h3 class="promo-heading">บริการขนส่งพัสดุ รวดเร็ว ทันใจ!</h3>
                                <p class="promo-desc">โหลดมาสเตอร์ ให้บริการจัดส่งพัสดุและขนส่งด่วนถึงปลายทางของคุณอย่างปลอดภัย</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Service Section  -->

    <div class="service-area gray-bg section-padding">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-7">
                <div class="section-title">
                        <p>เราพร้อมให้บริการขนส่งพัสดุที่รวดเร็ว ปลอดภัย และได้มาตรฐาน</p>
                        <h2>ส่งพัสดุของคุณถึงที่หมาย ด้วยบริการที่ดีที่สุดจากเรา</h2>
                    </div>
            </div>
        </div>
        <div class="service-item-wrap mt-30 owl-carousel">
            <div class="service-single">
                <div class="service-icon">
                    <i class="flaticon-delivery-man"></i>
                </div>
                <div class="service-content">
                    <h4>TRUCKLOAD</h4>
                    <hr>
                    <p style="height:84px">
                        ขนส่งสินค้าทุกประเภทบนเส้นทางที่คุณต้องการ
                        เราพร้อมให้บริการด้วยโซลูชันที่ดีที่สุด
                    </p>
                </div>
            </div>
            <div class="service-single">
                <div class="service-icon">
                    <i class="flaticon-truck-1"></i>
                </div>
                <div class="service-content">
                    <h4>EXPEDITED</h4>
                    <hr>
                    <p style="height:84px">
                        เมื่อพัสดุของคุณต้องการส่งด่วน
                        เราพร้อมจัดหาโซลูชันที่รวดเร็วและมีประสิทธิภาพ
                    </p>
                </div>
            </div>
            <div class="service-single">
                <div class="service-icon">
                    <i class="flaticon-fast-delivery"></i>
                </div>
                <div class="service-content">
                    <h4>FLATBED</h4>
                    <hr>
                    <p style="height:84px">
                        บริการขนส่งสินค้าขนาดใหญ่ ด้วยรถบรรทุกพื้นเรียบ
                        รองรับทุกความต้องการของคุณ
                    </p>
                </div>
            </div>
            <div class="service-single">
                <div class="service-icon" style="top:-40px">
                    <img src="{{ url('home/assets/img/icon/feature/4.png') }}" alt="" style="width:64px; height:64px; top:-20px">
                </div>
                <div class="service-content">
                    <h4>PARTIAL</h4>
                    <hr>
                    <p style="height:84px">
                        ใช้พื้นที่ขนส่งอย่างคุ้มค่า
                        ร่วมแชร์พื้นที่บรรทุกเพื่อลดต้นทุนในการจัดส่ง
                    </p>
                </div>
            </div>
            <div class="service-single">
                <div class="service-icon">
                    <i class="flaticon-pallet"></i>
                </div>
                <div class="service-content">
                    <h4>LTL</h4>
                    <hr>
                    <p style="height:84px">
                        ราคาขนส่งที่ดีที่สุดจากเครือข่ายผู้ให้บริการ
                        ทั้งระดับภูมิภาคและระดับประเทศ
                    </p>
                </div>
            </div>
            <div class="service-single">
                <div class="service-icon">
                    <i class="flaticon-wholesale"></i>
                </div>
                <div class="service-content">
                    <h4>OCEAN</h4>
                    <hr>
                    <p style="height:84px">
                        บริการขนส่งสินค้าทางเรือ ครอบคลุมทั่วโลก
                        ด้วยมาตรฐานระดับสากล
                    </p>
                </div>
            </div>
            <div class="service-single">
                <div class="service-icon" style="top:-40px">
                    <img src="{{ url('home/assets/img/icon/feature/1.png') }}" alt="" style="width:64px; height:64px; top:-20px">
                </div>
                <div class="service-content">
                    <h4>WAREHOUSING</h4>
                    <hr>
                    <p style="height:84px">
                        บริการคลังสินค้าและจัดเก็บสินค้าสำเร็จรูป
                        รองรับ OEMs, ผู้จัดจำหน่าย และตัวแทนจำหน่าย
                    </p>
                </div>
            </div>
        </div>
        <div class="more-services text-center">
            <p>
                บริการขนส่งที่ปลอดภัย รวดเร็ว และราคาคุ้มค่า
                <a href="{{ url('/') }}">สำรวจบริการของเรา!</a>
            </p>
        </div>
    </div>
</div>


        <!-- Project Section  -->

        <div class="project-area section-padding pt-100 pb-100">
    <div class="container">
        <div class="project-list mt-10">
            <div class="row mt-30">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{ url('/') }}" class="single-project-wrapper">
                        <div class="project-bg">
                            <img src="{{ url('img/service/service-img1.webp') }}" alt="">
                        </div>
                        <div class="project-details">
                            <h5>บริการจัดส่งมาตรฐาน</h5>
                            <span>ขนส่งทางถนน</span>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{ url('/') }}" class="single-project-wrapper">
                        <div class="project-bg">
                            <img src="{{ url('img/service/service-img2.webp') }}" alt="">
                        </div>
                        <div class="project-details">
                            <h5>บริการจัดส่งด่วนพิเศษ</h5>
                            <span>ขนส่งทางทะเล</span>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{ url('/') }}" class="single-project-wrapper">
                        <div class="project-bg">
                            <img src="{{ url('img/service/service-img3.webp') }}" alt="">
                        </div>
                        <div class="project-details">
                            <h5>บริการจัดส่งระหว่างประเทศ</h5>
                            <span>ขนส่งทางอากาศ</span>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{ url('/') }}" class="single-project-wrapper">
                        <div class="project-bg">
                            <img src="{{ url('img/service/service-img4.webp') }}" alt="">
                        </div>
                        <div class="project-details">
                            <h5>บริการคลังสินค้า</h5>
                            <span>ขนส่งทางราง</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{ url('/') }}" class="single-project-wrapper">
                        <div class="project-bg">
                            <img src="{{ url('img/service/service-img5.webp') }}" alt="">
                        </div>
                        <div class="project-details">
                            <h5>บริการจัดส่งพาเลท</h5>
                            <span>ขนส่งทางราง</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{ url('/') }}" class="single-project-wrapper">
                        <div class="project-bg">
                            <img src="{{ url('img/service/service-img6.webp') }}" alt="">
                        </div>
                        <div class="project-details">
                            <h5>บริการจัดส่งภายในวันเดียว</h5>
                            <span>ขนส่งทางถนน</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Feature Section  -->

    <div class="feature-area dark-bg section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-5">
                <div class="section-title">
                    <p>บริการขนส่งที่ปลอดภัย รวดเร็ว และเชื่อถือได้!</p>
                    <h2 class="text-white">
                        ตั้งแต่วันแรกของเรา เรามุ่งมั่นส่งมอบพัสดุที่มีคุณค่าให้ถึงปลายทางอย่างปลอดภัย
                    </h2>
                </div>
            </div>
            <div class="offset-xl-1 col-xl-5 col-lg-6 offset-lg-1">
                <div class="feature-right-content">
                    <p class="text-white">
                        เราให้บริการจัดการขนส่งแบบครบวงจร ทั้งการกระจายพัสดุจากคลังสินค้าไปยังศูนย์กระจายสินค้า และการรับ-ส่งพัสดุโดยตรงจากผู้ขายถึงลูกค้า
                    </p>
                    <p class="text-white">
                        กระบวนการจัดส่งพัสดุอาจแตกต่างกันไป ขึ้นอยู่กับผู้ให้บริการ สัญญาการขนส่ง ตำแหน่งที่ตั้ง และปัจจัยอื่นๆ ที่เกี่ยวข้อง
                    </p>
                </div>
            </div>
        </div>

        <div class="feature-item-wrap">
            <div class="feature-slider owl-carousel">
                <div class="feature-single wow fadeInLeft animated" data-wow-delay="100ms">
                    <div class="feature-icon">
                        <img src="{{ url('home/assets/img/icon/feature/1.png') }}" alt="">
                    </div>
                    <div class="feature-title">
                        <h5>Free Estimate</h5>
                    </div>
                    <div class="feature-desc">
                        <p>บริการประเมินค่าขนส่งล่วงหน้าตามความต้องการของลูกค้า</p>
                    </div>
                    <a href="{{ url('/') }}"><i class="las la-arrow-right"></i></a>
                </div>
                <div class="feature-single wow fadeInLeft animated" data-wow-delay="200ms">
                    <div class="feature-icon">
                        <img src="{{ url('home/assets/img/icon/feature/2.png') }}" alt="">
                    </div>
                    <div class="feature-title">
                        <h5>24/7 Services</h5>
                    </div>
                    <div class="feature-desc">
                        <p>พร้อมจัดส่งพัสดุทุกวัน ทุกเวลา แม้วันหยุดสุดสัปดาห์และวันหยุดนักขัตฤกษ์</p>
                    </div>
                    <a href="{{ url('/') }}"><i class="las la-arrow-right"></i></a>
                </div>
                <div class="feature-single wow fadeInLeft animated" data-wow-delay="300ms">
                    <div class="feature-icon">
                        <img src="{{ url('home/assets/img/icon/feature/3.png') }}" alt="">
                    </div>
                    <div class="feature-title">
                        <h5>Flat Rate Fees</h5>
                    </div>
                    <div class="feature-desc">
                        <p>ค่าบริการขนส่งที่ยืดหยุ่น คุ้มค่า และตอบโจทย์ความเร็วในการจัดส่ง</p>
                    </div>
                    <a href="{{ url('/') }}"><i class="las la-arrow-right"></i></a>
                </div>
                <div class="feature-single wow fadeInLeft animated" data-wow-delay="400ms">
                    <div class="feature-icon">
                        <img src="{{ url('home/assets/img/icon/feature/4.png') }}" alt="">
                    </div>
                    <div class="feature-title">
                        <h5>Fast Delivery</h5>
                    </div>
                    <div class="feature-desc">
                        <p>บริการขนส่งด่วนพิเศษ จัดส่งรวดเร็วทันใจ กว่าบริการทั่วไป</p>
                    </div>
                    <a href="{{ url('/') }}"><i class="las la-arrow-right"></i></a>
                </div>
                <div class="feature-single wow fadeInLeft animated" data-wow-delay="500ms">
                    <div class="feature-icon">
                        <img src="{{ url('home/assets/img/icon/feature/5.png') }}" alt="">
                    </div>
                    <div class="feature-title">
                        <h5>Secured Service</h5>
                    </div>
                    <div class="feature-desc">
                        <p>บริการขนส่งที่ปลอดภัย พร้อมระบบติดตามสถานะพัสดุแบบเรียลไทม์</p>
                    </div>
                    <a href="{{ url('/') }}"><i class="las la-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>




    <!-- Blog Section  -->

    <div class="blog-area gray-bg section-padding">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-7">
                    <div class="section-title">
                        <h2 style="font-size: 50px;">ข่าวประชาสัมพันธ์</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @isset($blog)
                @foreach ($blog as $item)
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="200ms">
                    <div class="blog-wrap">
                        <div class="blog-content">
                            <div class="blog-meta">
                                <div class="blog-date">
                                    <span>{{ formatDateThat($item->startdate) }}</span>
                                </div>
                            </div>
                            <div class="blog-title">
                                <h5>{{ $item->title }}</h5>
                            </div>
                            <div class="blog-img-wrap">
                                <div class="blog-img">
                                    <img src="{{ url('images/loadmaster/news/'.$item->image) }}" alt="">
                                </div>

                            </div>
                            <div class="blog-desc">
                                <p style="min-height: 68px; max-height: 75px; overflow: hidden;"> {{ $item->sub_title }}<</p>
                            </div>
                            <div class="blog-more">
                                <a href="{{ url('blog_detail/'.$item->id) }}" class="main-btn border-btn">Read More <i class="las la-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset

            </div>
        </div>
    </div>

    @endsection

@section('scripts')

@stop('scripts')

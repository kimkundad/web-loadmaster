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
                                <h3 class="promo-heading">Residential & Commercial Fastest Delivery Service!</h3>
                                <p class="promo-desc">Experia offers Parcel & Courier services <br> in your local area.</p>
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
                        <p>Best Solution for Delivery Service!</p>
                        <h2>
                            We provide best in Courier & Delivery Services
                        </h2>
                    </div>
                </div>
            </div>
            <div class="service-item-wrap mt-30 owl-carousel">
                <div class="service-single">
                    <div class="service-icon">
                        <i class="flaticon-delivery-man"></i>
                    </div>
                    <div class="service-content">
                        <h4>
                            <a href="{{ url('/') }}">TRUCKLOAD
                            </a>
                        </h4>
                        <hr >
                        <p style="height:84px">
                            Anything and everything on the
                            road USA Cargo & Courier will help
                            you with the best solution
                        </p>
                        <a class="main-btn primary" href="{{ url('/') }}">Read More <i
                                class="las la-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-single">
                    <div class="service-icon">
                        <i class="flaticon-truck-1"></i>
                    </div>
                    <div class="service-content">
                        <h4>
                            <a href="{{ url('/') }}">EXPEDITED
                            </a>
                        </h4>
                        <hr >
                        <p style="height:84px">
                            When your freight is on a
                            restricted timeline, we're ready and
                            willing to find a solution.
                        </p>
                        <a class="main-btn primary" href="{{ url('/') }}">Read More <i
                                class="las la-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-single">
                    <div class="service-icon">
                        <i class="flaticon-fast-delivery"></i>
                    </div>
                    <div class="service-content">
                        <h4>
                            <a href="{{ url('/') }}">FLATBED
                            </a>
                        </h4>
                        <hr >
                        <p style="height:84px">
                            From standard flatbeds to
                            specialized equipment, there is no
                            load or project we can't handle.
                        </p>
                        <a class="main-btn primary" href="{{ url('/') }}">Read More <i
                                class="las la-arrow-right"></i></a>
                    </div>
                </div>

                <div class="service-single">

                        <div class="service-icon" style=" top:-40px">
                         <img src="{{ url('home/assets/img/icon/feature/4.png') }}" alt="" style="width:64px; height:64px; top:-20px">
                    </div>
                    <div class="service-content">
                        <h4>
                            <a href="{{ url('/') }}">PARTIAL</a>
                        </h4>
                        <hr >
                        <p style="height:84px">
                            Access our network of partial
                            carriers looking to fill their extra
                            capacity with your shipment.
                        </p>

                        <a class="main-btn primary" href="{{ url('/') }}">Read More <i
                                class="las la-arrow-right"></i></a>
                    </div>
                </div>

                <div class="service-single">
                    <div class="service-icon">
                        <i class="flaticon-pallet"></i>
                    </div>
                    <div class="service-content">
                        <h4>
                            <a href="{{ url('/') }}">LTL</a>
                        </h4>
                        <hr >
                        <p style="height:84px">
                            Negotiated pricing with the best
                            regional and national LTL carriers.
                        </p>

                        <a class="main-btn primary" href="{{ url('/') }}">Read More <i
                                class="las la-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-single">
                    <div class="service-icon">
                        <i class="flaticon-wholesale"></i>
                    </div>
                    <div class="service-content">
                        <h4>
                            <a href="{{ url('/') }}">OCEAN</a>
                        </h4>
                        <hr >
                        <p style="height:84px">
                            We provide best ocean freight
                            services all across globe
                        </p>

                        <a class="main-btn primary" href="{{ url('/') }}">Read More <i
                                class="las la-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-single">
                    <div class="service-icon" style=" top:-40px">
                         <img src="{{ url('home/assets/img/icon/feature/1.png') }}" alt="" style="width:64px; height:64px; top:-20px">
                    </div>
                    <div class="service-content">
                        <h4>
                            <a href="{{ url('/') }}">WAREHOUSING</a>
                        </h4>
                        <hr >
                        <p style="height:84px">
                            We manages mother warehouses
                            for OEMs, distributors and dealers
                            for finished goods.
                        </p>

                        <a class="main-btn primary" href="{{ url('/') }}">Read More <i
                                class="las la-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="more-services text-center">
                <p>
                    Secured, Fastest and Affordable Delivery Service,
                    <a href="{{ url('/') }}">Explore Our Services!</a>
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
                                    <img src="{{ url('home/assets/img/project/1-1.jpg') }}" alt="">
                                </div>
                                <div class="project-details">
                                    <h5>Standard Courier</h5>
                                    <span>Road Freight</span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <a href="{{ url('/') }}" class="single-project-wrapper">
                                <div class="project-bg">
                                    <img src="{{ url('home/assets/img/project/1-2.jpg') }}" alt="">
                                </div>
                                <div class="project-details">
                                    <h5>Express Courier</h5>
                                    <span>Sea Freight</span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <a href="{{ url('/') }}" class="single-project-wrapper">
                                <div class="project-bg">
                                    <img src="{{ url('home/assets/img/project/1-3.jpg') }}" alt="">
                                </div>
                                <div class="project-details">
                                    <h5>International Courier</h5>
                                    <span>Air Freight</span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <a href="{{ url('/') }}" class="single-project-wrapper">
                                <div class="project-bg">
                                    <img src="{{ url('home/assets/img/project/1-5.jpg') }}" alt="">
                                </div>
                                <div class="project-details">
                                    <h5>Warehousing</h5>
                                    <span>Rail Freight</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <a href="{{ url('/') }}" class="single-project-wrapper">
                                <div class="project-bg">
                                    <img src="{{ url('home/assets/img/project/1-6.jpg') }}" alt="">
                                </div>
                                <div class="project-details">
                                    <h5>Pallet Courier</h5>
                                    <span>Rail Freight</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <a href="{{ url('/') }}" class="single-project-wrapper">
                                <div class="project-bg">
                                    <img src="{{ url('home/assets/img/project/1-7.jpg') }}" alt="">
                                </div>
                                <div class="project-details">
                                    <h5>Same Day Courier</h5>
                                    <span>Road Freight</span>
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
                        <p>Secured, Fastest & Reliable Delivery Service!</p>
                        <h2 class="text-white">
                            Since during our launch, to deliver high value package.
                        </h2>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-5 col-lg-6 offset-lg-1">
                    <div class="feature-right-content">
                        <p class="text-white">
                            Company providing its own fulfilment to a domestic depot, which is then picked up by the courier and distributed to customers, or couriers pick up packages directly from the vendor.
                        </p>
                        <p class="text-white">
                            The process of courier or parcel delivery depends on the company, contract, location and a variety of other factors.
                        </p>
                    </div>
                </div>
            </div>

            <div class="feature-item-wrap">
                <div class="feature-slider owl-carousel">
                    <div class="feature-single wow fadeInLeft animated" data-wow-delay="100ms">
                        <div class="feature-icon">
                            <img src="{{ url('home/assets/img/icon/feature/1.png') }}" alt="" >
                        </div>
                        <div class="feature-title">
                            <h5>Free Estimate</h5>
                        </div>
                        <div class="feature-desc">
                            <p>Courier services will package according to customers needs.
                            </p>
                        </div>
                        <a href="{{ url('/') }}"><i class="las la-arrow-right"></i></a>
                    </div>
                    <div class="feature-single wow fadeInLeft animated" data-wow-delay="200ms">
                        <div class="feature-icon">
                            <img src="{{ url('home/assets/img/icon/feature/2.png') }}" alt="" >
                        </div>
                        <div class="feature-title">
                            <h5>24/7 Services</h5>
                        </div>
                        <div class="feature-desc">
                            <p>
                                Shipments any day or time, even on weekends and holidays.
                            </p>
                        </div>
                        <a href="{{ url('/') }}"><i class="las la-arrow-right"></i></a>
                    </div>
                    <div class="feature-single wow fadeInLeft animated" data-wow-delay="300ms">
                        <div class="feature-icon">
                            <img src="{{ url('home/assets/img/icon/feature/3.png') }}" alt="" >
                        </div>
                        <div class="feature-title">
                            <h5>Flat Rate Fees</h5>
                        </div>
                        <div class="feature-desc">
                            <p>
                                Parcel Charge depends speedy delivery of flexible price.
                            </p>
                        </div>
                        <a href="{{ url('/') }}"><i class="las la-arrow-right"></i></a>
                    </div>
                    <div class="feature-single wow fadeInLeft animated" data-wow-delay="400ms">
                        <div class="feature-icon">
                            <img src="{{ url('home/assets/img/icon/feature/4.png') }}" alt="" >
                        </div>
                        <div class="feature-title">
                            <h5>Fast Delivery</h5>
                        </div>
                        <div class="feature-desc">
                            <p>
                                Specialty couriers are able to deliver items faster than other services.
                            </p>
                        </div>
                        <a href="{{ url('/') }}"><i class="las la-arrow-right"></i></a>
                    </div>
                    <div class="feature-single wow fadeInLeft animated" data-wow-delay="500ms">
                        <div class="feature-icon">
                            <img src="{{ url('home/assets/img/icon/feature/5.png') }}" alt="" >
                        </div>
                        <div class="feature-title">
                            <h5>Secured Service</h5>
                        </div>
                        <div class="feature-desc">
                            <p>
                                Specialty couriers provide the highest level of security and tracking for packages
                            </p>
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
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="200ms">
                    <div class="blog-wrap">
                        <div class="blog-content">
                            <div class="blog-meta">
                                <div class="blog-date">
                                    <span>Jan 21, 2024</span>
                                </div>
                            </div>
                            <div class="blog-title">
                                <h5>เคอรี่ เอ็กซ์เพรส จัดโครงการส่งเสริมความรู้ด้านกฎหมายให้พนักงาน มุ่งสร้างวัฒนธรรมองค์กรที่มีความรับผิดชอบต่อสังคม</h5>
                            </div>
                            <div class="blog-img-wrap">
                                <div class="blog-img">
                                    <img src="{{ url('img/PRBanner.jpg') }}" alt="">
                                </div>

                            </div>
                            <div class="blog-desc">
                                <p> มุ่งเน้นการบริหารบุคลากรอย่างยั่งยืน เดินหน้าสร้างวัฒนธรรมองค์กรที่มีความรับผิดชอบต่อสังคม จัดโครงการส่งเสริมความรู้ด้านกฎ ระเบียบ และกฎหมาย การกระทำความผิดและโทษทางอาญา</p>
                            </div>
                            <div class="blog-more">
                                <a href="{{ url('/blog_detail') }}" class="main-btn border-btn">Read More <i class="las la-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="200ms">
                    <div class="blog-wrap">
                        <div class="blog-content">
                            <div class="blog-meta">
                                <div class="blog-date">
                                    <span>Jan 07, 2024</span>
                                </div>

                            </div>
                            <div class="blog-title">
                                <h5>เคอรี่ฯ ผนึกกำลัง SF Express รุกหนักบริการส่งของไปต่างประเทศ จัดกิจกรรมการตลาด สร้างการรับรู้ทั่วตลาดนัดจตุจักร</h5>
                            </div>
                            <div class="blog-img-wrap">
                                <div class="blog-img">
                                    <img src="{{ url('img/KAIC7400_01.jpg') }}" alt="">
                                </div>

                            </div>
                            <div class="blog-desc">
                                <p> ผู้นำด้านธุรกิจจัดส่งพัสดุด่วนทั่วไทย เร่งเครื่องกระตุ้นยอดใช้บริการจัดส่งพัสดุด่วนระหว่างประเทศ ผนึกกำลัง SF Express ผู้ให้บริการโลจิสติกส์แบบครบวงจรที่ใหญ่ที่สุดในจีนและเอเชีย</p>
                            </div>
                            <div class="blog-more">
                                <a href="{{ url('/blog_detail') }}" class="main-btn border-btn">Read More <i class="las la-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="200ms">
                    <div class="blog-wrap">
                        <div class="blog-content">
                            <div class="blog-meta">
                                <div class="blog-date">
                                    <span>Dec 16, 2022</span>
                                </div>

                            </div>
                            <div class="blog-title">
                                <h5>SF Express ขึ้นแท่นผู้ถือหุ้นใหญ่ของเคอรี่ เอ็กซ์เพรส ครองสัดส่วน 62.66% พร้อมเดินหน้าขับเคลื่อนเคอรี่ฯ ไปอีกขั้น</h5>
                            </div>
                            <div class="blog-img-wrap">
                                <div class="blog-img">
                                    <img src="{{ url('img/KEX_No1-Brand.jpg') }}" alt="">
                                </div>

                            </div>
                            <div class="blog-desc">
                                <p>บริษัท เคอรี่ เอ็กซ์เพรส (ประเทศไทย) จำกัด (มหาชน) หรือ KEX รายงานผลการยื่นคำเสนอซื้อหลักทรัพย์ทั้งหมด (Mandatory Tender Offer)* ว่า SF Express** </p>
                            </div>
                            <div class="blog-more">
                                <a href="{{ url('/blog_detail') }}" class="main-btn border-btn">Read More <i class="las la-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

@section('scripts')

@stop('scripts')

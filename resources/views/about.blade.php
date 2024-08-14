@extends('layouts.template')

@section('title')
เกี่ยวกับโหลดมาสเตอร์ โลจิสติกส์
@stop

@section('stylesheet')
@stop('stylesheet')

@section('content')


<!-- Breadcrumb Area -->

    <div class="breadcrumb-area about-bg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb-title">
                        <h1>About Us</h1>
                        <p>โหลดมาสเตอร์ เล็งเห็นความสะดวกของลูกค้าเป็นสำคัญ พวกเราจึงไม่หยุดพัฒนาคุณภาพ ในการบริการเพื่อให้ตอบโจทย์ธุรกิจของลูกค้าสูงสุด ความสะดวก สร้างความประทับใจ และประสบการณ์ที่ดีให้แก่ลูกค้า ด้วยวิธีการต่าง ๆ. สรุป. การสร้าง Service Mind นั้นไม่ได้เห็นได้จากการแสดงออกของผู้ให้บริการเพียงเท่านั้น</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="breadcrumb-meta">
        <div class="container">
            <ul class="breadcrumb d-flex">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">เกี่ยวกับเรา</li>
            </ul>
        </div>
    </div>


    <!-- About Section  -->

    <div class="about-area section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="about-img wow fadeInRight animated" data-wow-delay="100ms">
                        <img src="{{ url('home/assets/img/about/1.jpg') }}" alt="">

                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="about-content-wrap">
                        <div class="section-title">
                            <p>Entire Domestic and International Courier Services</p>
                            <h2>
                                We Are Providing best way Of Courier & Parcel Delivery!
                            </h2>
                        </div>
                        <div class="about-content">
                            <div class="row">
                                <div class="col-12 col-lg-7">
                                    <div class="about-content-left">
                                        <p class="highlight mb-30">
                                            We provide the trustworthy to deliver any packages with our latest
                                            technologies, also provide secured & on time service!
                                        </p>
                                        <p>
                                            Courier companies and delivery agency stay on the ground and do most of the authority to ensure that customers get their orders on time, is greatly dependent on the kind of courier company.
                                        </p>

                                    </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="about-content-right">
                                        <p>
                                            What service Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, fugiat!?
                                        </p>
                                        <ul class="list-unstyled feature-list mt-30">
                                            <li>
                                                <i class="las la-check"></i>Reliability and
                                                Trustworthy
                                            </li>
                                            <li>
                                                <i class="las la-check"></i>Fast & Secured Deliveries
                                            </li>
                                            <li><i class="las la-check"></i>World Wide Shipping</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <a href="services.html"><i class="las la-arrow-right"></i></a>
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
                        <a href="services.html"><i class="las la-arrow-right"></i></a>
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
                        <a href="services.html"><i class="las la-arrow-right"></i></a>
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
                        <a href="services.html"><i class="las la-arrow-right"></i></a>
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
                        <a href="services.html"><i class="las la-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>


     <!-- Team Section-->

    <div class="team-area gray-bg section-padding pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 ">
                    <div class="section-title text-center">
                        <p>Expert Proffessional</p>
                        <h2>Meet Our <b>Dedicated</b> Team</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="justify-content: center;">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-team-member wow fadeInLeft" data-wow-delay="100ms">
                        <div class="team-member-bg">
                            <div class="team-content">
                                <div class="team-title">
                                    <a href="#">James Cameron</a>
                                </div>
                                <div class="team-subtitle">
                                    <p>Manager</p>
                                </div>
                            </div>
                            <div class="team-social">
                                <ul>
                                    <li>
                                        <a href="#"><i class="lab la-facebook" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="lab la-twitter" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="lab la-linkedin" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="lab la-instagram" aria-hidden="true"></i> </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-team-member wow fadeInRight" data-wow-delay="300ms">
                        <div class="team-member-bg team-bg-3">
                            <div class="team-content">
                                <div class="team-title">
                                    <a href="#">Josh Batlar</a>
                                </div>
                                <div class="team-subtitle">
                                    <p>Sr. Executive</p>
                                </div>
                            </div>
                            <div class="team-social">
                                <ul>
                                    <li>
                                        <a href="#"><i class="lab la-facebook" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="lab la-twitter" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="lab la-linkedin" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="lab la-instagram" aria-hidden="true"></i> </a>
                                    </li>

                                </ul>
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

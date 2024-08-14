@extends('layouts.template')

@section('title')
    เกี่ยวกับโหลดมาสเตอร์ โลจิสติกส์
@stop

@section('stylesheet')
@stop('stylesheet')

@section('content')


    <div class="row justify-content-center text-center">
        <div class="col-lg-7">
            <div class="section-title">
                <h2>ข่าวประชาสัมพันธ์</h2>
            </div>
        </div>
    </div>


    <div class="blog-area gray-bg section-padding">
        <div class="container">
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
                <div class="pagination-block mb-15 text-center">
                    <a class="page-numbers" href="{{ url('/') }}">1</a>
                    <a class="page-numbers current" href="{{ url('/') }}">2</a>
                    <a class="next page-numbers" href="{{ url('/') }}"><i class="las la-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')

@stop('scripts')

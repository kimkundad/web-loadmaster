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
                        <p>บริการจัดส่งพัสดุทั้งในประเทศและระหว่างประเทศ</p>
                        <h2>เราคือทางเลือกที่ดีที่สุดสำหรับการจัดส่งพัสดุและเอกสารของคุณ</h2>
                    </div>
                    <div class="about-content">
                        <div class="row">
                            <div class="col-12 col-lg-7">
                                <div class="about-content-left">
                                    <p class="highlight mb-30">
                                        เราให้บริการจัดส่งพัสดุด้วยความน่าเชื่อถือ ใช้เทคโนโลยีที่ทันสมัย พร้อมความปลอดภัย และตรงต่อเวลาในทุกการจัดส่ง
                                    </p>
                                    <p>
                                        บริษัทขนส่งและผู้ให้บริการจัดส่งพัสดุเป็นส่วนสำคัญที่ทำให้ลูกค้าได้รับของตรงเวลา
                                        ประสิทธิภาพของบริการขึ้นอยู่กับมาตรฐานของบริษัทขนส่งที่คุณเลือก
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="about-content-right">
                                    <p>
                                        บริการของเราครอบคลุมทุกความต้องการด้านการขนส่งพัสดุ ไม่ว่าจะเป็นเอกสารหรือสินค้า
                                    </p>
                                    <ul class="list-unstyled feature-list mt-30">
                                        <li>
                                            <i class="las la-check"></i> มั่นใจได้ในความน่าเชื่อถือ
                                        </li>
                                        <li>
                                            <i class="las la-check"></i> จัดส่งรวดเร็วและปลอดภัย
                                        </li>
                                        <li>
                                            <i class="las la-check"></i> บริการจัดส่งทั่วโลก
                                        </li>
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


     <!-- Team Section-->



@endsection

@section('scripts')

@stop('scripts')

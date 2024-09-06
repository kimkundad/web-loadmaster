@extends('layouts.template')

@section('title')
    เช็คเลขพัสดุ | โหลดมาสเตอร์ โลจิสติกส์
@stop

@section('stylesheet')

<style>

.terms .thead {
        font-size: 18px;
    color: #0984e3;
    margin-bottom: 2px;
}
.terms p {
    margin-bottom: 2px;
    color: #666
}
.l-25{
    padding-left:25px;
    font-size: 14px
}
</style>

@stop('stylesheet')

@section('content')




<div id="blog-page" class="blog-section section-padding" >
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-12">
                    <div class="single-blog-wrap quotation-page">

                    <div class="quotation-wrap wow fadeInUp  animated" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                    <div class="quotation-inner">
                        <h5 class="quotation-heading">เช็คเลขพัสดุ</h5>

                        <form class="contactForm" method="post" action="assets/php/contact.php" novalidate="novalidate">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <input class="form-control" type="text" placeholder="ตรวจพัสดุได้สูงสุด 30 เลขหมายในคราวเดียว ด้วยการเว้นวรรค หรือใส่เครื่องหมาย &quot;,&quot;" required="">
                                </div>


                                <div class="col-12">
                                    <a href="#" class="main-btn primary">
                                        ติดตาม <i class="las la-arrow-right"></i>
                                    </a>
                                </div>

                            </div>
                        </form>
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


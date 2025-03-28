@extends('layouts.template')

@section('title')
    ติดต่อเรา | โหลดมาสเตอร์ โลจิสติกส์
@stop

@section('stylesheet')
@stop('stylesheet')

@section('content')


<div class="breadcrumb-area contact-bg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb-title">
                        <h1>ติดต่อเรา</h1>
                        <p>โหลดมาสเตอร์ เล็งเห็นความสะดวกของลูกค้าเป็นสำคัญ พวกเราจึงไม่หยุดพัฒนาคุณภาพ ในการบริการเพื่อให้ตอบโจทย์ธุรกิจของลูกค้าสูงสุด ติดตามสถานะพัสดุได้ทุกที่ ทุกเวลา ด้วยแอปพลิเคชันโหลดมาสเตอร์ โลจิสติกส์</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="breadcrumb-meta">
        <div class="container">
            <ul class="breadcrumb d-flex">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">ติดต่อเรา</li>
            </ul>
        </div>
    </div>


    <!-- Google Map Start-->
    <div class="contact-page google-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.684090427582!2d100.4557043!3d13.6769635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2a2bb91f5c4cd%3A0x69fafe114b9ffb47!2zMzA1IOC4nuC4o-C4sOC4o-C4suC4oeC4l-C4teC5iCAyIOC4i-C4reC4oiAzOCDguYHguILguKfguIfguJrguLLguIfguKHguJQg4LmA4LiC4LiV4LiI4Lit4Lih4LiX4Lit4LiHIOC4geC4o-C4uOC4h-C5gOC4l-C4nuC4oeC4q-C4suC4meC4hOC4oyAxMDE1MA!5e0!3m2!1sth!2sth!4v1723667735688!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!-- Contact Section  -->

    <div class="contact-page section-padding pb-50">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5">
                    <div class="contact-wrap">
                        <div class="contact-inner">
                            <div class="contact-headline">
                                <h3>โหลดมาสเตอร์ โลจิสติกส์ สำนักงานใหญ่</h3>
                            </div>
                            <div class="contact-meta-info">
                                <div class="contact-single-info">
                                    <i class="las la-map-marker-alt"></i>
                                    <h6>ที่อยู่</h6>
                                    <p>305 ซอย พระรามที่ 2 ซ.38 แขวงบางมด เขตจอมทอง กรุงเทพมหานคร 10150 </p>
                                </div>
                                <div class="contact-single-info">
                                    <i class="las la-phone"></i>
                                    <h6>Phone</h6>
                                    <p>+668 0591 8159 </p>
                                </div>
                                <div class="contact-single-info">
                                    <i class="las la-envelope"></i>
                                    <h6>Mail</h6>
                                    <p>loadmasterlogisticsth@gmail.com </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title">
                        <h2>ส่งข้อความถึงเรา</h2>
                    </div>
                    <p>โปรดทิ้งข้อความไว้ ทางทีมงานจะติดต่อกลับโดยเร็วที่สุด</p>
                    <div class="contact_form">
                        <form id="contactForm" class="comment-one_form contact-form-validated" novalidate="novalidate">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div>
                                        <input type="text" placeholder="ชื่อ - นามสกุล" name="name" id='name'>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div>
                                        <input type="email" placeholder="อีเมล์" name="email" id='email'>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div>
                                        <input type="text" placeholder="เบอร์ติดต่อ" name="phone" id='phone'>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div>
                                        <input type="email" placeholder="หัวข้อที่ต้องการติดต่อ" name="subject" id='subject'>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div>
                                        <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div>
                                        <textarea name="massage" id='massage' placeholder="รายละเอียดที่ต้องการสอบถาม"></textarea>
                                    </div>
                                    <button id="btnSendData" class="main-btn primary">ยืนยัน<i class="las la-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')


<script>


    $(document).on('click','#btnSendData',function (event) {
      event.preventDefault();

      var form = $('#contactForm')[0];
      var formData = new FormData(form);
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var msg = document.getElementById("massage").value;
      var phone = document.getElementById("phone").value;
      var subject = document.getElementById("subject").value;
        console.log(formData)
    if(name == '' || msg == '' || email == '' || phone == '' || subject == ''){

    swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");
    console.log('กรูณา ป้อนข้อมูลให้ครบถ้วน')

    }else{
      $.LoadingOverlay("show", {
        background  : "rgba(255, 255, 255, 0.4)",
        image       : "{{ url('img/loading-gif.gif') }}",
        fontawesome : ""
      });
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
        }
    });
      $.ajax({
          url: "{{url('/api/add_contact')}}",
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          data: formData,
          processData: false,
          contentType: false,
          cache:false,
          type: 'POST',
          success: function (data) {
          //  console.log(data.data.status)
              if(data.data.status == 200){
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 0);
             //   $('#success_popup').modal('show');


             Swal.fire({
                title: "ส่งข้อความสำเร็จ!",
                icon: "success",
                draggable: true
                });


                $("#name").val('');
                $("#massage").val('');
                $("#email").val('');
                $("#phone").val('');
                $("#subject").val('');
              setTimeout(function(){
                //    window.location.replace("{{url('clients/success_payment/')}}/"+data.data.value);
              }, 3000);
              }else{
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 500);

               swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

              }
          },
          error: function () {
          }
      });
    }
    });


</script>

@stop('scripts')


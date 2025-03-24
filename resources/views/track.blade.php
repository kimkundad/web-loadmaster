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

.tracking-timeline {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    border-left: 4px solid #0984e3;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
}

.tracking-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #dff9fb;
    padding: 10px 15px;
    border-radius: 6px;
    margin-bottom: 20px;
    font-weight: bold;
    color: #2d3436;
}

.tracking-header.delivered {
    background-color: #dfe6e9;
    color: #00b894;
}

.tracking-steps {
    list-style: none;
    margin: 0;
    padding: 0;
}

.tracking-steps li {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
}

.step-icon {
    width: 30px;
    height: 30px;
    background: #dfe6e9;
    border-radius: 50%;
    color: #2d3436;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    flex-shrink: 0;
    font-size: 16px;
}

.step-icon.delivered {
    background-color: #00b894;
    color: #fff;
}
.step-icon.on-delivery {
    background-color: #0984e3;
    color: #fff;
}
.step-icon.in-transit {
    background-color: #fdcb6e;
    color: #fff;
}

.step-content .step-time {
    font-size: 13px;
    color: #636e72;
}
.step-content .step-title {
    font-weight: bold;
    margin-top: 3px;
}
.step-content .step-desc {
    font-size: 14px;
    margin-top: 3px;
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
                                    <input class="form-control" type="text" id="orderCode" placeholder="กรอกหมายเลขออเดอร์เพื่อตรวจพัสดุ" required>
                                </div>

                                <div class="col-12 col-md-12 mt-3">
                                    <div id="stepHear"></div> <!-- ตำแหน่งแสดง Timeline -->
                                </div>

                                <div class="col-12">
                                    <button type="button" class="main-btn primary" id="btnTrack">
                                        ติดตาม <i class="las la-arrow-right"></i>
                                    </button>
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
<script>
document.getElementById('btnTrack').addEventListener('click', function () {
    const orderCode = document.getElementById('orderCode').value;
    const timelineWrapper = document.getElementById('stepHear');

    if (!orderCode) {
        alert("กรุณากรอกหมายเลขออเดอร์");
        return;
    }

    fetch("{{ route('getOrderByID') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ code_order: orderCode })
    })
    .then(res => res.json())
    .then(res => {
        const data = res.timeline;

        if (!data || data.length === 0) {
            timelineWrapper.innerHTML = `<div class="alert alert-warning mt-3">ไม่พบข้อมูลการจัดส่งสำหรับหมายเลขออเดอร์นี้</div>`;
            return;
        }

        let html = `<div class="tracking-timeline">
                        <div class="tracking-header delivered">
                            <span class="status-label">สถานะ</span>
                            <span class="status-id">${res.order.code_order}</span>
                        </div>
                        <ul class="tracking-steps">`;

        data.forEach(item => {
            html += `
                <li>
                    <div class="step-icon ${item.active ? 'delivered' : 'in-transit'}">
                        <i class="material-icons">${item.icon}</i>
                    </div>
                    <div class="step-content">
                        <div class="step-time">${item.date}</div>
                        <div class="step-title">${item.status}</div>
                        <div class="step-desc">${item.description}</div>
                    </div>
                </li>`;
        });

        html += `</ul></div>`;
        timelineWrapper.innerHTML = html;
    })
    .catch(err => {
        timelineWrapper.innerHTML = `<div class="alert alert-danger">เกิดข้อผิดพลาดในการโหลดข้อมูล</div>`;
        console.error(err);
    });
});
</script>
@stop



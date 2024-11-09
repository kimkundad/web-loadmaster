@extends('admin.layouts.template')

@section('title')
    <title>บริษัท โหลดมาสเตอร์ โลจิสติกส์ จำกัด</title>
@stop
@section('stylesheet')

@stop('stylesheet')

@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            ตั้งค่าเว็บไซต์</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">จัดการ</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">ตั้งค่าเว็บไซต์</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->


                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ url('api/post_setting') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card card-xl-stretch mb-5 mb-xl-8">

                            <div class="card-body border-top p-9">



                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ภาษีมูลค่าเพิ่ม ณ ที่จ่าย อัตรา %</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="tax" class="form-control form-control-lg form-control-solid" placeholder="1" value="{{ $objs->tax }}">

                                        @if ($errors->has('tax'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกภาษีมูลค่าเพิ่ม</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>




                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ยกของจัดเรียงชั้น1 ราคาชิ้นละ ? บาท</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="box_service1" class="form-control form-control-lg form-control-solid" placeholder="10" value="{{ $objs->box_service1 }}">

                                        @if ($errors->has('box_service1'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกราคาค่าบริการ</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ยกของจัดเรียงชั้น2 1-20ชิ้น ราคาชิ้นละ ? บาท</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="box_service2" class="form-control form-control-lg form-control-solid" placeholder="5" value="{{ $objs->box_service2 }}">

                                        @if ($errors->has('box_service2'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกราคาค่าบริการ</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>




                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ราคายกของจัดเรียงขึ้นชั้น2 21 ชิ้นขึ้นไป คิดราคาเหมา 300บาทค่ะ🫶🏻🫶🏻</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="box_service3" class="form-control form-control-lg form-control-solid" placeholder="300" value="{{ $objs->box_service3 }}">

                                        @if ($errors->has('box_service3'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกราคาค่าบริการ</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>





                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">บันทึกข้อมูล</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2022&copy;</span>
                    <a href="" target="_blank" class="text-gray-800 text-hover-primary">บริษัท โหลดมาสเตอร์ โลจิสติกส์ จำกัด</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="{{ url('about') }}" target="_blank" class="menu-link px-2">เกี่ยวกับ โหลดมาสเตอร์ โลจิสติกส์</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('contatermct') }}" target="_blank" class="menu-link px-2">นโยบายส่วนบุคคล</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('contact') }}" target="_blank" class="menu-link px-2">ติดต่อเรา</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>

@endsection

@section('scripts')


@stop('scripts')

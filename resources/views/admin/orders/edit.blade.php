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
                            แก้ไข ออเดอร์ขนส่ง</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('dashboard') }}" class="text-muted text-hover-primary">จัดการ</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">แก้ไข ออเดอร์ขนส่ง</li>
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
                    <form id="kt_account_profile_details_form" class="form" method="POST" action="{{$url}}" enctype="multipart/form-data">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="card card-xl-stretch mb-5 mb-xl-8">

                            <div class="card-body border-top p-9">

                            <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">เลือกลูกค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" name="cus_id">
                                            <option value=""> -- เลือกลูกค้า -- </option>
                                            @isset($cus)
                                            @foreach($cus as $u)
                                            <option value="{{$u->id_q}}"
                                            @if( $objs->user_id == $u->id_q)
                                                selected='selected'
                                                @endif
                                                >{{$u->names}} {{$u->phone}}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>



                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">สาขาปลายทาง</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" id="branchSelect" name="branch_id">

                                        <option value="0" @if( $objs->branch_id == 0)
                                                selected='selected'
                                                @endif> ไม่มีสาขา</option>

                                            @isset($branch)
                                            @foreach($branch as $u)

                                                <option value="{{$u->id}}"
                                            data-province="{{$u->province}}"
                                            data-address_branch="{{$u->address_branch}}"
                                            data-phone="{{$u->phone}}"
                                            data-admin_branch="{{$u->admin_branch}}"
                                            data-latitude="{{$u->latitude}}"
                                            data-longitude="{{$u->longitude}}"
                                            @if( $objs->branch_id == $u->id)
                                                selected='selected'
                                                @endif
                                            >{{$u->name_branch}}</option>

                                            @endforeach
                                            @endisset
                                        </select>
                                        @if ($errors->has('branch_id'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกสาขาปลายทาง</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">เลือกจังหวัด</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" id="driverSelect" name="province2">
                                            <option value=""> -- เลือกจังหวัด -- </option>
                                            @isset($logis)
                                            @foreach($logis as $u)
                                            <option value="{{$u->province}}"
                                            @if( $objs->province2 == $u->province)
                                                selected='selected'
                                                @endif
                                                >{{$u->province}}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ที่อยู่ในการจัดส่ง</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <textarea type="text" id="addressTextarea" name="b_address" style="height: 100px" placeholder="ที่อยู่: 299/7 ถ. เคหะร่มเกล้า ..."
                                        class="form-control form-control-lg form-control-solid"
                                        >{{ $objs->b_address }}</textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ชื่อผู้รับสินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" id="b_recive_name" name="b_recive_name"
                                        class="form-control form-control-lg form-control-solid" placeholder="b_recive_name" value="{{ $objs->b_recive_name }}">

                                        @if ($errors->has('b_recive_name'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('b_recive_name') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">เบอร์ติดต่อผู้รับสินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" id="b_phone" name="b_phone" class="form-control form-control-lg form-control-solid" placeholder="b_phone"
                                        value="{{ $objs->b_phone }}"
                                        >

                                        @if ($errors->has('b_phone'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('b_phone') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ข้อมูลเพิ่มเติมผู้รับ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" id="remark_re" name="remark_re" class="form-control form-control-lg form-control-solid" placeholder="remark_re" value="{{ $objs->remark_re }}">
                                    </div>
                                    <!--end::Col-->
                                </div>



                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">เลือกพิกัดของลูกค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <div id="map_canvas" style="width:100%; border:0; height:516px;" frameborder="0">
                                        </div>

                                         <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-lg form-control-solid" id="latitude" name="latitude" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-lg form-control-solid" id="longitude" name="longitude" value="">
                                        </div>
                                        @if ($errors->has('latitude'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('latitude') }} {{ $errors->first('longitude') }}</div>
                                            </div>
                                        @endif
                                    </div>

                                    </div>

                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">เลือกคนขับรถ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" aria-label="Select example" name="driver_id">
                                            <option value="0"
                                            @if( $objs->driver_id == 0)
                                                selected='selected'
                                                @endif
                                                > -- เลือกคนขับรถ -- </option>
                                            @isset($user)
                                            @foreach($user as $u)
                                            <option value="{{$u->id_q}}"
                                            @if( $objs->driver_id == $u->id_q)
                                                selected='selected'
                                                @endif
                                                >{{$u->names}} ( {{$u->phone}} )</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        @if ($errors->has('driver_id'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกคนขับรถ</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">หมายเลขออเดอรร์</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="code_order" class="form-control form-control-lg form-control-solid" value="{{ $objs->code_order }}" readonly>
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ช่วงเวลาที่จะไปถึง</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="dri_time" class="form-control form-control-lg form-control-solid" value="{{ $objs->dri_time }}">
                                    </div>
                                    @if ($errors->has('dri_time'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกช่วงเวลาที่จะไปถึง</div>
                                            </div>
                                        @endif
                                    <!--end::Col-->
                                </div>

                                 <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">จำนวนสินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="amount" class="form-control form-control-lg form-control-solid" value="{{ $objs->amount }}">
                                    </div>
                                    @if ($errors->has('amount'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกจำนวนสินค้า</div>
                                            </div>
                                        @endif
                                    <!--end::Col-->
                                </div>



                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ราคาค่าขอส่ง</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="price" class="form-control form-control-lg form-control-solid" value="{{ $objs->price }}">
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">ประเภทสินค้า</label>
                                    <!--end::Label-->
                                    <?php
                                        $typeArray = explode(',', $objs->type); // แปลง String ให้เป็น Array โดยใช้เครื่องหมาย , เป็นตัวแยก
                                        ?>
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select form-select-sm form-select-solid" name="typeService[]" data-control="select2" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                            <option></option>
                                            <option value="สินค้าทั่วไป"
                                                @if(in_array("สินค้าทั่วไป", $typeArray))
                                                    selected='selected'
                                                @endif
                                            >สินค้าทั่วไป</option>

                                            <option value="เครื่องจักร"
                                                @if(in_array("เครื่องจักร", $typeArray))
                                                    selected='selected'
                                                @endif
                                            >เครื่องจักร</option>

                                            <option value="วาฟเฟิล"
                                                @if(in_array("วาฟเฟิล", $typeArray))
                                                    selected='selected'
                                                @endif
                                            >วาฟเฟิล</option>
                                        </select>
                                        @if ($errors->has('typeService'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกประเภทสินค้า</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                {{-- <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">ประเภทสินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" aria-label="Select example" name="typeService">
                                            <option value="สินค้าทั่วไป"
                                            @if( $objs->type == "สินค้าทั่วไป")
                                                selected='selected'
                                                @endif
                                                >สินค้าทั่วไป</option>
                                            <option value="เครื่องจักร"
                                            @if( $objs->type == "เครื่องจักร")
                                                selected='selected'
                                                @endif
                                                >เครื่องจักร</option>
                                            <option value="วาฟเฟิล"
                                            @if( $objs->type == "วาฟเฟิล")
                                                selected='selected'
                                                @endif
                                                >วาฟเฟิล</option>
                                        </select>
                                        @if ($errors->has('typeService'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกประเภทสินค้า</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div> --}}


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Size สินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" aria-label="Select example" name="sizepro">
                                            <option value="S"
                                            @if( $objs->size == "S")
                                                selected='selected'
                                                @endif
                                            >S</option>
                                            <option value="M"
                                            @if( $objs->size == "M")
                                                selected='selected'
                                                @endif
                                                >M</option>
                                            <option value="L"
                                            @if( $objs->size == "L")
                                                selected='selected'
                                                @endif
                                                >L</option>
                                            <option value="XL"
                                            @if( $objs->size == "XL")
                                                selected='selected'
                                                @endif
                                                >XL</option>
                                        </select>
                                        @if ($errors->has('sizepro'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือก Size สินค้า</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>





                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">ระบุจำนวนวาฟเฟิล **ถ้าไม่มี ไม่ต้องกรอก</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="waffles" placeholder="10" class="form-control form-control-lg form-control-solid" value="{{ $objs->waffles }}">
                                    </div>
                                    <!--end::Col-->

                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">ระบุจำนวนเครื่องจักร **ถ้าไม่มี ไม่ต้องกรอก</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="machinery" placeholder="10" class="form-control form-control-lg form-control-solid" value="{{ $objs->machinery }}">
                                    </div>
                                    <!--end::Col-->

                                </div>


                                <div class="row mb-0">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">บริการยกของจัดเรียงชั้น1</label>
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" name="service"
                                                @if($objs->service == 1)
                                                    checked="checked"
                                                @endif
                                             value="1"/>
                                            <label class="form-check-label" for="allowmarketing"></label>
                                        </div>
                                    </div>
                                    <!--begin::Label-->
                                </div>

                                <div class="row mb-0">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">บริการยกของจัดเรียงชั้น2</label>
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" name="service2"
                                                @if($objs->service2 == 1)
                                                    checked="checked"
                                                @endif
                                             value="1"/>
                                            <label class="form-check-label" for="allowmarketing"></label>
                                        </div>
                                    </div>
                                    <!--begin::Label-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">วันส่งสินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon position-absolute ms-4 mb-1 svg-icon-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input class="form-control form-control-solid ps-12" name="dri_date" placeholder="เนื้อหาจะแสดงภายในวันที่กำหนด" id="kt_datepicker_1" value="{{ $objs->dri_date }}"/>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    @if ($errors->has('dri_date'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือก วันส่งสินค้า</div>
                                            </div>
                                        @endif
                                </div>


                                 <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">สภานะของออเดอร์</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" aria-label="Select example" name="order_status">
                                            <option value="0"
                                            @if( $objs->order_status == 0)
                                                selected='selected'
                                                @endif
                                            >รอดำเนินการ</option>
                                            <option value="1"
                                            @if( $objs->order_status == 1)
                                                selected='selected'
                                                @endif
                                            >กำลังดำเนินงาน</option>
                                            <option value="2"
                                            @if( $objs->order_status == 2)
                                                selected='selected'
                                                @endif
                                            >ส่งสินค้าสำเร็จ</option>
                                            <option value="3"
                                            @if( $objs->order_status == 3)
                                                selected='selected'
                                                @endif
                                            >เกิดอุบัติเหตุ</option>
                                        </select>
                                        @if ($errors->has('sizepro'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือก Size สินค้า</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">สภานะจ่ายงาน</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" aria-label="Select example" name="send_status">
                                            <option value="0"
                                            @if( $objs->send_status == 0)
                                                selected='selected'
                                                @endif
                                                >ยังไม่จ่ายงาน</option>
                                            <option value="1"
                                            @if( $objs->send_status == 1)
                                                selected='selected'
                                                @endif
                                                >จ่ายงานแล้ว</option>
                                        </select>

                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">การชำระเงิน</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" aria-label="Select example" name="pay_status">
                                            <option value="0"
                                            @if( $objs->pay_status == 0)
                                                selected='selected'
                                                @endif
                                                >รอชำระเงิน</option>
                                            <option value="1"
                                            @if( $objs->pay_status == 1)
                                                selected='selected'
                                                @endif
                                                >ชำระเงินแล้ว</option>
                                        </select>

                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ชื่อบริษัทหรือในนามบุคคล (**ที่ใช้รับใบเสร็จ)</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" id="Receiptname" name="Receiptname" class="form-control form-control-lg form-control-solid"
                                        value="{{ $MyUser->Receiptname }}"
                                         readonly>
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">โทรศัพท์ (**ที่ใช้รับใบเสร็จ)</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" id="Receiptphone" name="Receiptphone" class="form-control form-control-lg form-control-solid"
                                        value="{{ $MyUser->Receiptphone }}"
                                         readonly>
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">อีเมล (**ที่ใช้รับใบเสร็จ)</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" id="Receiptemail" name="Receiptemail" class="form-control form-control-lg form-control-solid"
                                        value="{{ $MyUser->Receiptemail }}"
                                         readonly>
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">เลขประจำตัวผู้เสียภาษี</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" id="ReceiptTax" name="ReceiptTax" class="form-control form-control-lg form-control-solid"
                                        value="{{ $MyUser->ReceiptTax }}"
                                         readonly>
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ที่อยู่ รับใบเสร็จ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <textarea type="text" id="addressTextarea" name="Receiptaddress" style="height: 100px" readonly
                                        class="form-control form-control-lg form-control-solid"
                                        >{{ $MyUser->Receiptaddress }}</textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>




                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">รูปโหลดของขึ้นรถ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <div class="row">
															<!--begin::Col-->
                                                            @if($ImgStep1)
                                                            @foreach ($ImgStep1 as $u)


															<div class="col-6">

																<img src="{{ $u->image }}" class="rounded " style="height:450px; wdth:100%">
                                                                <p><b>พิกัด</b> : {{ $u->address }}</p>
                                                                <p><b>วันที่</b> : {{ $u->created_at }}</p>
															</div>

                                                            @endforeach
                                                            @endif
                                                            <p><b>หมายเหตุ</b> : {{ $objs->remark_dri1 }}</p>
                                                            </div>

                                    </div>
                                    <!--end::Col-->
                                </div>



                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">รูปส่งของสำเร็จ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <div class="row">
															<!--begin::Col-->
                                                            @if($ImgStep2)
                                                            @foreach ($ImgStep2 as $u)


															<div class="col-6">

																<img src="{{ $u->image }}" class="rounded " style="height:450px; wdth:100%">
                                                                <p><b>พิกัด</b> : {{ $u->address }}</p>
                                                                <p><b>วันที่</b> : {{ $u->created_at }}</p>
															</div>

                                                            @endforeach
                                                            @endif

                                                            <p><b>หมายเหตุ</b> : {{ $objs->remark_dri2 }}</p>
                                                            </div>

                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">รูปแจ้งอุบัติเหตุ</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">

                                    <div class="row">
															<!--begin::Col-->
                                                            @if($ImgStep3)
                                                            @foreach ($ImgStep3 as $u)


															<div class="col-6">

																<img src="{{ $u->image }}" class="rounded " style="height:450px; wdth:100%">
                                                                <p><b>พิกัด</b> : {{ $u->address }}</p>
                                                                <p><b>วันที่</b> : {{ $u->created_at }}</p>
															</div>

                                                            @endforeach
                                                            @endif
                                                            </div>
                                                            <p><b>หมายเหตุ</b> : {{ $objs->remark_dri3 }}</p>

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
        <!--end::Footer-->
    </div>

@endsection

@section('scripts')

<script src="{{ url('admin/assets/js/custom/apps/projects/settings/settings.js') }}"></script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyDtcFHSNerbvIWPVv5OStj-czBq_6RMbRg&libraries=places&sensor=false'></script>
<script>

let map;
let marker;
let geocoder;


document.getElementById('branchSelect').addEventListener('change', function () {
    const selectedOption = this.options[this.selectedIndex];
    const addressTextarea = document.getElementById('addressTextarea');
    const driverSelect = document.getElementById('driverSelect');
    const b_phone = document.getElementById('b_phone');
    const admin_branch = document.getElementById('b_recive_name');
    const b_latitude = document.getElementById('latitude');
    const b_longitude = document.getElementById('longitude');


    if (selectedOption.value === "0") {
        // Clear the address and reset province selection
        addressTextarea.value = '';
        b_phone.value = '';
        admin_branch.value = '';
        b_latitude.value = '';
        b_longitude.value = '';
        driverSelect.selectedIndex = 0; // Reset the province dropdown to default
        if (marker) marker.setMap(null); // Remove marker from map
    } else {
        // Populate the address and select the appropriate province
        const address = selectedOption.getAttribute('data-address_branch') || '';
        const province = selectedOption.getAttribute('data-province');
        const b_phonev = selectedOption.getAttribute('data-phone');
        const b_admin_branch = selectedOption.getAttribute('data-admin_branch');


        const b_latitudev = selectedOption.getAttribute('data-latitude');
        const b_longitudev = selectedOption.getAttribute('data-longitude');

        b_latitude.value = b_latitudev;
        b_longitude.value = b_longitudev;

        b_phone.value = b_phonev;
        admin_branch.value = b_admin_branch;

        addressTextarea.value = address;

        // Reposition the marker on the map
        const position = new google.maps.LatLng(b_latitudev, b_longitudev);
        if (marker) {
            marker.setPosition(position);
            map.setCenter(position);
        } else {
            marker = new google.maps.Marker({
                position: position,
                map: map,
            });
            map.setCenter(position);
        }

        // Set the province in the driver select dropdown
        Array.from(driverSelect.options).forEach(option => {
            if (option.text === province) {
                option.selected = true;
            }
        });
    }
});


document.getElementById('driverSelect').addEventListener('change', async function () {
    const selectedProvince = this.options[this.selectedIndex].text;
    const priceInput = document.querySelector('input[name="price"]');

    if (selectedProvince) {
        try {
            const response = await fetch('https://api.loadmasterth.com/api/getProvince', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ province2: selectedProvince })
            });

            if (!response.ok) {
                throw new Error('Failed to fetch province data');
            }

            const data = await response.json();
            if (data.success) {
                const tenboxPrice = data.province.tenbox;
                priceInput.value = tenboxPrice; // Set the tenbox price in the input field
            } else {
                alert('ไม่พบข้อมูลสำหรับจังหวัดที่เลือก');
                priceInput.value = ''; // Clear the input field if no data found
            }
        } catch (error) {
            console.error('Error fetching province data:', error);
            alert('เกิดข้อผิดพลาดในการเชื่อมต่อ API');
            priceInput.value = ''; // Clear the input field on error
        }
    }
});


const driverSelect = document.getElementById('driverSelect');
const amountInput = document.querySelector('input[name="amount"]');
const priceInput = document.querySelector('input[name="price"]');

async function fetchProvinceData(provinceName) {
  try {
    const response = await fetch('https://api.loadmasterth.com/api/getProvince', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ province2: provinceName }),
    });

    if (!response.ok) {
      throw new Error('Failed to fetch province data');
    }

    const data = await response.json();
    return data.province;
  } catch (error) {
    console.error('Error fetching province data:', error);
    alert('เกิดข้อผิดพลาดในการเชื่อมต่อ API');
    return null;
  }
}

function calculatePrice(provinceData, amount) {
  let pricePerUnit = 0;
  const parsedWeight = parseInt(amount, 10);

  if (parsedWeight <= 10) {
    pricePerUnit = provinceData.tenbox || 0;
  } else if (parsedWeight <= 20) {
    pricePerUnit = provinceData.twentybox || 0;
  } else if (parsedWeight <= 30) {
    pricePerUnit = provinceData.thirtybox || 0;
  } else if (parsedWeight <= 40) {
    pricePerUnit = provinceData.fortybox || 0;
  } else if (parsedWeight <= 50) {
    pricePerUnit = provinceData.fiftybox || 0;
  } else if (parsedWeight <= 60) {
    pricePerUnit = provinceData.sixtybox || 0;
  } else {
    pricePerUnit = provinceData.sixtybox || 0;
  }

  return pricePerUnit;
}

async function handleInputChange() {
  const selectedProvince = driverSelect.options[driverSelect.selectedIndex].text;
  const amount = amountInput.value;

  if (selectedProvince && amount) {
    const provinceData = await fetchProvinceData(selectedProvince);
    if (provinceData) {
      const price = calculatePrice(provinceData, amount);
      priceInput.value = price*amount;
    }
  }
}

// Attach event listeners to input fields
driverSelect.addEventListener('change', handleInputChange);
amountInput.addEventListener('input', handleInputChange);


const latitude2 = parseFloat("{{ $objs->latitude2 }}") || 13.7563; // Default to Bangkok if not available
const longitude2 = parseFloat("{{ $objs->longitude2 }}") || 100.5018;
const latitude1 = parseFloat("{{ $objs->latitude }}") || 13.7211; // Default starting point
const longitude1 = parseFloat("{{ $objs->longitude }}") || 100.5904;

const d_lat = parseFloat("{{ $objs->d_lat }}") || 13.5116094; // Default truck location
const d_long = parseFloat("{{ $objs->d_long }}") || 100.68715;

(function () {
    let map, geocoder, marker, directionsService, directionsRenderer;

    function initialize() {
        const initialLocation = new google.maps.LatLng(latitude2, longitude2);
        const truckLocation = new google.maps.LatLng(d_lat, d_long);  // Truck location

        const mapOptions = {
            center: initialLocation,
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        geocoder = new google.maps.Geocoder();
        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer();

        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        directionsRenderer.setMap(map);

        // Place the truck marker
        new google.maps.Marker({
            position: truckLocation,
            map: map,
            icon: {
                url: "{{ url('img/icon_truck.png') }}", // Truck icon
                scaledSize: new google.maps.Size(40, 40)  // Adjust size
            },
            title: "Truck Location"
        });

        placeMarker(initialLocation); // Place marker on the initial location

        google.maps.event.addListener(map, 'click', function (event) {
            placeMarker(event.latLng); // Allow users to place marker on click
        });

        // Calculate route if coordinates are available
        if (latitude1 && longitude1 && latitude2 && longitude2) {
            calculateAndDisplayRoute();
        }
    }

    function placeMarker(location) {
        if (marker) {
            marker.setPosition(location); // Update marker position
        } else {
            marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }

        document.getElementById('latitude').value = location.lat();
        document.getElementById('longitude').value = location.lng();
        getAddress(location);
    }

    function calculateAndDisplayRoute() {
        const request = {
            origin: new google.maps.LatLng(latitude1, longitude1),
            destination: new google.maps.LatLng(latitude2, longitude2),
            travelMode: google.maps.TravelMode.DRIVING // Use driving mode
        };

        directionsService.route(request, function (result, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(result);
            } else {
                console.error('Directions request failed due to ' + status);
            }
        });
    }

    function getAddress(latLng) {
        geocoder.geocode({ 'latLng': latLng, 'language': 'th' }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    document.getElementById("addressTextarea").value = results[0].formatted_address;
                } else {
                    document.getElementById("addressTextarea").value = "ไม่พบข้อมูลที่อยู่";
                }
            } else {
                document.getElementById("addressTextarea").value = "เกิดข้อผิดพลาด: " + status;
            }
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
})();

</script>


@stop('scripts')

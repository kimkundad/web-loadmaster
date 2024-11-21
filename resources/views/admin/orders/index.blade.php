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
                            ออเดอร์ขนส่งทั้งหมด</h1>
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
                            <li class="breadcrumb-item text-muted">ออเดอร์ขนส่งทั้งหมด</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="{{ url('admin/myorder/create') }}" class="btn btn-sm fw-bold btn-primary" >
                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/arrows/arr017.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-1hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M11 13H7C6.4 13 6 12.6 6 12C6 11.4 6.4 11 7 11H11V13ZM17 11H13V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor"/>
                            <path d="M21 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22ZM17 11H13V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7V11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z" fill="currentColor"/>
                            </svg>
                            </span>
                            <!--end::Svg Icon-->
                            สร้างออเดอร์ใหม่
                        </a>
                    </div> --}}
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">

                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">ออเดอร์ ทั้งหมด </span>
                                <span class="text-muted mt-1 fw-semibold fs-7"> จำนวน ( {{ count($objs) }} )</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">

                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-3">
                                    <!--begin::Table head superadmin-->
                                    <thead>
                                        <tr>
                                            <th class="p-0 ">เลขออเดอร์</th>
                                            <th class="p-0 ">ปลายทาง</th>
                                            <th class="p-0 ">รถขนส่ง</th>
                                            <th class="p-0 ">เบอร์คนรับของ</th>
                                            <th class="p-0 min-w-100px text-center">ราคา</th>
                                            <th class="p-0 ">สถานะ</th>
                                            <th class="p-0 ">การจ่ายงาน</th>
                                            <th class="p-0 ">ชำระเงิน</th>
                                            <th class="p-0 "></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @isset($objs)
                                            @foreach ($objs as $item)

                                        <tr id="{{$item->id}}">
                                            <td>
                                                #{{ $item->code_order }}
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark text-hover-primary fs-6 fw-bold">{{ $item->b_name }}</a>
                                                    <a href="#" class="text-muted text-hover-primary fw-semibold text-muted d-block fs-7">
                                                        <span class="text-dark">ที่อยู่ </span>: {{ $item->b_address }}
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                @if($item->driver_id == 0)
                                                <span class="badge py-3 px-4 fs-7 badge-light-warning">ยังไม่ระบุคนขับรถ</span>
                                                @else
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark text-hover-primary fs-6 fw-bold">{{ $item->dri_name }}</a>
                                                    <a href="#" class="text-muted text-hover-primary fw-semibold text-muted d-block fs-7">
                                                        <span class="text-dark">ข้อมูลรถ </span>: {{ $item->dri_type }} , {{ $item->dri_no_car }}
                                                    </a>
                                                </div>
                                                @endif

                                            </td>
                                            <td>
                                                {{ $item->b_phone }}
                                            </td>
                                             <td class="text-center">
                                                {{ $item->price }}
                                            </td>

                                            <td>
                                                @if($item->order_status == 0)
                                                <span class="badge py-3 px-4 fs-7 badge-light-warning">รอดำเดินการ</span>
                                                @elseif($item->order_status == 1)
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">กำลังดำเนินงาน</span>
                                                @elseif($item->order_status == 2)
                                                <span class="badge py-3 px-4 fs-7 badge-light-success">ส่งสำเร็จแล้ว</span>
                                                @elseif($item->order_status == 3)
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">เกิดอุบัติเหตุ</span>
                                                @elseif($item->order_status == 4)
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">ยกเลิกงาน</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if($item->send_status == 0)
                                                <span class="badge py-3 px-4 fs-7 badge-light-warning">ยังไม่จ่ายงาน</span>
                                                @elseif($item->send_status == 1)
                                                <span class="badge py-3 px-4 fs-7 badge-light-success">จ่ายงานแล้ว</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if($item->pay_status == 0)
                                                <span class="badge py-3 px-4 fs-7 badge-light-warning">รอชำระเงิน</span>
                                                @elseif($item->pay_status == 1)
                                                <span class="badge py-3 px-4 fs-7 badge-light-success">ชำระเงินแล้ว</span>
                                                @endif
                                            </td>

                                            <td class="text-end">
                                                <div class="d-flex justify-content-end flex-shrink-0">
                                                    <a href="{{url('admin/myorder/'.$item->id.'/edit')}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <a href="{{ url('drigeneratePDF/'.$item->id) }}" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->

                                                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/general/gen005.svg-->
                                                            <span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor"/>
                                                            <rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor"/>
                                                            <rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor"/>
                                                            <rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor"/>
                                                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"/>
                                                            </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                            @endforeach

                                        @endisset

                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            @if(count($objs) > 10)
                            @include('admin.pagination.default', ['paginator' => $objs])
                            @endif
                        </div>
                    </div>

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


<script type="text/javascript">

</script>

@stop('scripts')

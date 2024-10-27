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
                            สร้าง ออเดอร์ขนส่ง</h1>
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
                            <li class="breadcrumb-item text-muted">สร้าง ออเดอร์ขนส่ง</li>
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
                                            <option value="{{$u->id_q}}">{{$u->names}} {{$u->phone}}</option>
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
                                        <option value="0">ไม่มีสาขา</option>
                                            @isset($branch)
                                            @foreach($branch as $u)
                                            <option value="{{$u->id}}"
                                            data-province="{{$u->province}}"
                                            data-address_branch="{{$u->address_branch}}"
                                            data-phone="{{$u->phone}}"
                                            data-admin_branch="{{$u->admin_branch}}"
                                            data-latitude="{{$u->latitude}}"
                                            data-longitude="{{$u->longitude}}"
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
                                            <option value="{{$u->province}}">{{$u->province}}</option>
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
                                        value="{{old('b_address') ? old('b_address') : ''}}">{{old('b_address') ? old('b_address') : ''}}</textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ชื่อผู้รับสินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" id="b_recive_name" name="b_recive_name" class="form-control form-control-lg form-control-solid" placeholder="b_recive_name" value="{{old('b_recive_name') ? old('b_recive_name') : ''}}">

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
                                        <input type="text" id="b_phone" name="b_phone" class="form-control form-control-lg form-control-solid" placeholder="b_phone" value="{{old('b_phone') ? old('b_phone') : ''}}">

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
                                        <input type="text" id="remark_re" name="remark_re" class="form-control form-control-lg form-control-solid" placeholder="remark_re" value="{{old('remark_re') ? old('remark_re') : ''}}">
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
                                            <option value="0"> -- เลือกคนขับรถ -- </option>
                                            @isset($user)
                                            @foreach($user as $u)
                                            <option value="{{$u->id_q}}">{{$u->names}} ( {{$u->phone}} )</option>
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

                                {{-- <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">หมายเลขออเดอร์</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="code_order" placeholder="LMT14566325666" class="form-control form-control-lg form-control-solid" value="{{old('code_order') ? old('code_order') : ''}}">
                                    </div>
                                    <!--end::Col-->
                                </div> --}}

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ช่วงเวลาที่จะไปถึง</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="dri_time" placeholder="ถึง 16.00น. - 18.00น." class="form-control form-control-lg form-control-solid" value="{{old('dri_time') ? old('dri_time') : ''}}">
                                    </div>
                                    <!--end::Col-->
                                </div>

                                 <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">จำนวนสินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="amount" placeholder="10" class="form-control form-control-lg form-control-solid" value="{{old('amount') ? old('amount') : ''}}">
                                    </div>
                                    @if ($errors->has('amount'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกจำนวนสินค้า</div>
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
                                        <input type="text" name="price" placeholder="10" class="form-control form-control-lg form-control-solid" value="{{old('price') ? old('price') : ''}}">
                                    </div>
                                    @if ($errors->has('price'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากรอกราคา</div>
                                            </div>
                                        @endif
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">ประเภทสินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" aria-label="Select example" name="typeService">
                                            <option value="สินค้าทั่วไป">สินค้าทั่วไป</option>
                                            <option value="เครื่องจักร">เครื่องจักร</option>
                                            <option value="วาฟเฟิล">วาฟเฟิล</option>
                                        </select>
                                        @if ($errors->has('typeService'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกประเภทสินค้า</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Size สินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" aria-label="Select example" name="sizepro">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
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
                                        <input type="text" name="waffles" placeholder="10" class="form-control form-control-lg form-control-solid" value="{{old('Waffles') ? old('Waffles') : ''}}">
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">วันส่งสินค้า</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="dri_date" placeholder="2024-10-24" class="form-control form-control-lg form-control-solid" value="{{old('dri_date') ? old('dri_date') : ''}}">
                                    </div>
                                    <!--end::Col-->
                                    @if ($errors->has('dri_date'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือก วันส่งสินค้า</div>
                                            </div>
                                        @endif
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

// Initialize Google Map
function initialize() {
    const defaultLocation = new google.maps.LatLng(13.7563, 100.5018); // Default: Bangkok
    const mapOptions = {
        center: defaultLocation,
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

    // Handle map click to place a marker and update coordinates
    google.maps.event.addListener(map, 'click', function (event) {
        placeMarker(event.latLng);
    });
}

function placeMarker(location) {
    if (marker) {
        marker.setPosition(location);
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

function getAddress(latLng) {
    geocoder.geocode(
        { 'latLng': latLng, 'language': 'th' },  // Request in Thai
        function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    console.log('results[0].formatted_address', results[0].formatted_address)
                    document.getElementById("addressTextarea").value = results[0].formatted_address;
                } else {
                    document.getElementById("addressTextarea").value = "ไม่พบข้อมูลที่อยู่";
                }
            } else {
                document.getElementById("addressTextarea").value = "เกิดข้อผิดพลาด: " + status;
            }
        }
    );
}

google.maps.event.addDomListener(window, 'load', initialize);




</script>


{{-- <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyDtcFHSNerbvIWPVv5OStj-czBq_6RMbRg&libraries=places&sensor=false'></script> --}}
{{-- <script type="text/javascript">
      var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
var myOptions = {
                center: new google.maps.LatLng(13.7211075, 100.5904873 ),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            var marker;
            function placeMarker(location) {
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location,
                        map: map
                    });
                }
                document.getElementById('latitude').value=location.lat();
                document.getElementById('longitude').value=location.lng();
                getAddress(location);
            }

      function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script> --}}

@stop('scripts')

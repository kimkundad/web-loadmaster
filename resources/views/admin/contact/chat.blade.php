@extends('admin.layouts.template')

@section('title')
    <title>บริษัท โหลดมาสเตอร์ โลจิสติกส์ จำกัด</title>
@stop
@section('stylesheet')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                            ข้อมูลติดต่อเราทั้งหมด</h1>
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
                            <li class="breadcrumb-item text-muted">ข้อมูลติดต่อเรา</li>
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

                    <div class="card" id="kt_chat_messenger">
												<!--begin::Card header-->
												<div class="card-header" id="kt_chat_messenger_header">
													<!--begin::Title-->
													<div class="card-title">
														<!--begin::User-->
														<div class="d-flex justify-content-center flex-column me-3">
															<a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $user->name }}</a>
															<!--begin::Info-->
															<div class="mb-0 lh-1">
																<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
																<span class="fs-7 fw-semibold text-muted">Active</span>
															</div>
															<!--end::Info-->
														</div>
														<!--end::User-->
													</div>
													<!--end::Title-->
													<!--begin::Card toolbar-->

													<!--end::Card toolbar-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body" id="kt_chat_messenger_body">
													<!--begin::Messages-->
													<div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px" id="chatMessages">

                                                        @if($objs)
                                                        @foreach($objs as $u)

                                                        @if($user->staff_id == $u->id_q)
                                                        <!--begin::Message(in)-->
														<div class="d-flex justify-content-start mb-10">
															<!--begin::Wrapper-->
															<div class="d-flex flex-column align-items-start">
																<!--begin::User-->
																{{-- <div class="d-flex align-items-center mb-2">
																	<!--begin::Avatar-->
																	<div class="symbol symbol-35px symbol-circle">
																		<img alt="Pic" src="{{ $u->avatar }}" />
																	</div>
																	<!--end::Avatar-->
																	<!--begin::Details-->
																	<div class="ms-3">
																		<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
																		<span class="text-muted fs-7 mb-1">2 mins</span>
																	</div>
																	<!--end::Details-->
																</div> --}}
																<!--end::User-->
																<!--begin::Text-->
																<div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">{{ $u->message }}<</div>
																<!--end::Text-->
															</div>
															<!--end::Wrapper-->
														</div>
														<!--end::Message(in)-->
                                                        @else
                                                        <!--begin::Message(out)-->
														<div class="d-flex justify-content-end mb-10">
															<!--begin::Wrapper-->
															<div class="d-flex flex-column align-items-end">
																{{-- <div class="d-flex align-items-center mb-2">
																	<div class="me-3">
																		<span class="text-muted fs-7 mb-1">5 mins</span>
																		<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
																	</div>
																	<div class="symbol symbol-35px symbol-circle">
																		<img alt="Pic" src="{{ url('admin/assets/media/avatars/300-10.jpg') }}" />
																	</div>
																</div> --}}
																<div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">{{ $u->message }}</div>
																<!--end::Text-->
															</div>
															<!--end::Wrapper-->
														</div>
														<!--end::Message(out)-->
                                                        @endif

                                                        @endforeach
                                                        @endif



													<!--end::Messages-->
												</div>
												<!--end::Card body-->
												<!--begin::Card footer-->
												<div class="card-footer pt-4" id="kt_chat_messenger_footer">
													<textarea class="form-control form-control-flush mb-3" rows="1" id="messageInput"  placeholder="Type a message"></textarea>
													<div class="d-flex flex-stack">
														<button class="btn btn-primary" id="sendMessageButton"  type="button" >Send</button>
													</div>
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
                        <a href="{{ url('about') }}" target="_blank" class="menu-link px-2">เกี่ยวกับโหลดมาสเตอร์ โลจิสติกส์</a>
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


<script src="https://cdn.socket.io/4.5.1/socket.io.min.js"></script>
<script type="text/javascript">


function scrollToBottom() {
    const chatMessages = document.getElementById('chatMessages');
    chatMessages.scrollTop = chatMessages.scrollHeight;
}


    $(document).ready(function () {

        scrollToBottom();
        // เชื่อมต่อ Socket.IO
        const socket = io('https://chat.loadmasterth.com');

        // เข้าร่วมห้อง
        const roomId = {{ $user->id_r }};
        socket.emit('join-room', roomId);

        // ฟัง event เมื่อมีข้อความใหม่
        socket.on('new-message', function (data) {
            console.log('Received new message:', data);

            // แสดงข้อความใหม่ในหน้าจอ
            if (data) {
                const isMine = data.sender_id == {{ Auth::user()->id }};
                const messageHtml = `
                    <div class="d-flex justify-content-${isMine ? 'end' : 'start'} mb-10">
                        <div class="d-flex flex-column align-items-${isMine ? 'end' : 'start'}">
                            <div class="p-5 rounded bg-light-${isMine ? 'primary' : 'info'} text-dark fw-semibold mw-lg-400px text-${isMine ? 'end' : 'start'}" data-kt-element="message-text">
                                ${data.message}
                            </div>
                        </div>
                    </div>
                `;
                $('#chatMessages').append(messageHtml);
                scrollToBottom();
            }
        });

        // ส่งข้อความใหม่ผ่าน AJAX
        $('#sendMessageButton').on('click', function () {
            const message = $('#messageInput').val();

            $.ajax({
                url: '{{ url('/admin/storeMessage') }}',
                type: 'POST',
                data: {
                    room_id: roomId,
                    sender_id: {{ Auth::user()->id }},
                    message: message,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        console.log('Message sent:', response.message);
                        $('#messageInput').val(''); // ล้างข้อความใน input
                    }
                },
                error: function (xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        });
    });
</script>


@stop('scripts')

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

                @isset($objs)
                    @foreach ($objs as $item)

                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="200ms">
                    <div class="blog-wrap">
                        <div class="blog-content">
                            <div class="blog-meta">
                                <div class="blog-date">
                                    <span>{{ formatDateThat($item->startdate) }}</span>
                                </div>
                            </div>
                            <div class="blog-title">
                                <h5>{{ $item->title }}</h5>
                            </div>
                            <div class="blog-img-wrap">
                                <div class="blog-img">
                                    <img src="{{ url('images/loadmaster/news/'.$item->image) }}" alt="{{ $item->title }}">
                                </div>

                            </div>
                            <div class="blog-desc">
                                <p> {{ $item->sub_title }}</p>
                            </div>
                            <div class="blog-more">
                                <a href="{{ url('blog_detail/'.$item->id) }}" class="main-btn border-btn">Read More <i class="las la-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                @endisset



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

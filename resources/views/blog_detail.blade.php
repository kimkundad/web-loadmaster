@extends('layouts.template')

@section('title')
    เกี่ยวกับโหลดมาสเตอร์ โลจิสติกส์
@stop

@section('stylesheet')
@stop('stylesheet')

@section('content')




<div id="blog-page" class="blog-section section-padding">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-8">
                    <div class="single-blog-wrap">
                        <img style="width: 100%" src="{{ url('images/loadmaster/news/'.$objs->image) }}" alt="">
                        <div class="blog-meta mt-20">
                            <span>{{ formatDateThat($objs->startdate) }}4</span>
                        </div>
                        <h3>{{ $objs->title }}</h3>
                        <p> {!! $objs->detail !!}</p>


                    </div>

                </div>


            </div>
        </div>
    </div>




@endsection

@section('scripts')

@stop('scripts')


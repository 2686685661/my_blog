@extends('frontCommon.fronttemplate')



@section('style')



    <link rel="stylesheet" href="{{ asset('css/hero-slider-style.css') }}">


    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">

    <script type="text/javascript" src="{{ asset('static/jquery/jquery-3.1.1.min.js') }}"></script>


    <script type="text/javascript" src="{{ asset('static/layer/layer.js') }}"></script>




@stop


@section('connect')

    <div class="cd-hero-slider small-screen" style="min-height: 650px;z-index: 1" >
        <div class="selected from-left">
            <div class="cd-full-width">
                <div class="container-fluid js-tm-page-content" data-page-no="4">
                    <div class="cd-bg-video-wrapper" data-video="video/night-light-blur">
                        <video autoplay="autoplay" loop="loop" style="z-index: 1">
                            <source style="z-index: 1" src="{{ asset('video/sunset-loop.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="tm-img-gallery-container">
                        <div id="layer-photos-demo" class="tm-img-gallery gallery-two">

                            @foreach($files as $file)
                                <div class="grid-item">
                                        <img src="{{ asset('upload/'.$file->filename) }}" alt="" class="img-fluid tm-img">
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-right: 45%;" style="z-index: 100">
        <div class="pull-right" style="z-index: 100">
            {{ $files->render() }}
        </div>
    </div>
@stop

@section('footstyle')

    <script type="text/javascript">
        $(document).ready(function () {
            layer.photos({
                photos: '#layer-photos-demo'
                ,anim: 5, //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
            });
        })
    </script>

@stop
@extends('frontCommon.fronttemplate')


@section('style')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">

    <link rel="stylesheet" href="{{ asset('css/jquery.filer.css') }}">

    <link rel="stylesheet" href="{{ asset('css/jquery.filer-dragdropbox-theme.css') }}">

    <link rel="stylesheet" href="{{ asset('css/custom-2.css') }}">

    <link rel="stylesheet" href="{{ asset('css/fr_pic.css') }}">

    <link rel="stylesheet" href="{{ asset('css/uploads.css') }}">



@stop


@section('connect')

    <div class="panel-group" id="accordion">


        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseOne">
                        文件下载
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    @include('files.docCenter')

                </div>
            </div>
        </div>



        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseTwo">
                       视频教程
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">

                    @foreach($videos as $video)

                        <figure class="effect-zoe" onclick="videoBlock({{ $video->id }})">
                            <video src="{{ asset('upload/'.$video->filename) }}"></video>
                            <figcaption>
                                <h2>
                                    <span>@if($video->introduce != null){{ $video->introduce->v_title }}@else 暂无标题 @endif</span>
                                </h2>
                                <p>@if($video->introduce != null){{ $video->introduce->v_letter }}@else 该视频暂无简介@endif</p>
                            </figcaption>
                        </figure>

                        @include('files.videoplay')


                    @endforeach
                </div>
            </div>
        </div>


    </div>


@stop


@section('footstyle')

    <script type="text/javascript" src="{{ asset('js/Method.js') }}"></script>


@stop
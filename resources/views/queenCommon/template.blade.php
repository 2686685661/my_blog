{{--
    后台模板
--}}

<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my personage - @yield('title')</title>
    <link href="{{ asset('static/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @section('style')

    @show
</head>
<body>

@php
    echo 'hello';
@endphp
<div id="wrapper">
    @section('header')
    {{--//上边导航栏--}}
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;My Blog Backstage</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><span class="glyphicon glyphicon-refresh"></span></a></li>
                    <li><a href="{{ url('front/frarticalview') }}"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-remove"></span></a></li>
                </ul>
            </div>

        </div>
    </div>
    @show

    @section('leftmenu')
    @include('queenCommon.leftMenu')
    @show

    {{--//右侧内容区域--}}
    <div id="page-wrapper">
        <div id="page-inner">

            @include('queenCommon.message')

            @yield('connect')
        </div>
    </div>
</div>

<script src="{{ asset('static/jquery/jquery-1.10.2.js') }}"></script>

<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/jquery.metisMenu.js') }}"></script>

<script src="{{ asset('js/custom.js') }}"></script>

@section('javascript')

@show
</body>
</html>

@extends('frontCommon.fronttemplate')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style-02.css') }}">
@stop


@section('connect')

    <div id="contents">
        <div id="mainheader">
            <h1>Life <span>Book</span></h1>
        </div>

        <div id="main">
            @foreach($diarys as $diary)
                <div class="post">
                    <div>
                        <h2><a>{{date('d,m,Y',$diary->created_at) }}</a></h2>
                    </div>
                    <div class="entry">
                       {{ $diary->diaryContent }}
                    </div>
                </div>
            @endforeach
        </div>




    </div>

    @include('frontCommon.rightmenu')

    <div style="margin-right: 45%;">
        <div class="pull-right">
            {{ $diarys->render() }}
        </div>
    </div>






@stop
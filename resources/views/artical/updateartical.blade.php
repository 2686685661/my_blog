@extends('queenCommon.template')


@section('style')

    <script type="text/javascript" src="{{ asset('static/utf8-php/ueditor.config.js') }}"></script>

    <script type="text/javascript" src="{{ asset('static/utf8-php/ueditor.all.js') }}"></script>

    <style type="text/css">
        #editor {
            height: auto;
        }
    </style>

@stop


@section('connect')

    <div class="col-lg-11 col-md-11 col-sm-11 alert alert-info">
        <h3 class=" text-center">Compose New Notification</h3>

        @include('queenCommon.validator')

        <div class="hr-div"> <hr></div>

        <div class="col-md-10">
            <h3>Basic Form Examples</h3>

            @include('artical._form')

        </div>

    </div>


@stop


@section('javascript')


    <script type="text/javascript" src="{{ asset('js/verify.js') }}"></script>

    <script>
        var ue = UE.getEditor('editor');
    </script>

    <script type="text/javascript">
        var a = document.getElementById('editor');
        a.style.height ='10px';
    </script>



@stop
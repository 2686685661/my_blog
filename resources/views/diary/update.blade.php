@extends('queenCommon.template')

@section('connect')

    <div class="col-lg-11 col-md-11 col-sm-11 alert alert-info">
        <h3 class=" text-center">Compose New Notification</h3>

        @include('queenCommon.validator')

        <div class="hr-div"> <hr></div>

        @include('diary._form')
    </div>

@stop
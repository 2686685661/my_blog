@extends('frontCommon.fronttemplate')

@section('style')

    <link rel="stylesheet" href="{{ asset('css/frontage.css') }}">

    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/hero-slider-style.css') }}">

    <script type="text/javascript" src="{{ asset('static/jquery/jquery-3.1.1.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('static/jquery/jquery-3.1.1.js') }}"></script>

    {{--<link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}">--}}
{{----}}
    {{--<script type="text/javascript" src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>--}}

    <style type="text/css">

    </style>

@stop


@section('connect')

    <div class="cd-hero-slider small-screen" style="min-height: 650px;" >
        <div class="selected from-left">
            <div class="cd-full-width">
                <div class="container-fluid js-tm-page-content" data-page-no="4">
                    <div class="cd-bg-video-wrapper" data-video="video/night-light-blur">
                        <video autoplay="autoplay" loop="loop" style="z-index: 1">
                            <source src="{{ asset('video/sunset-cloud.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="tm-img-gallery-container" style="margin-top: -200px;">
                        <div class="tm-img-gallery gallery-two">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="tm-flex tm-contact-container">

                                        <div class="tm-bg-white-translucent text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-textbox-padding-contact">
                                            <p class="tm-text">Praesent tempus dapibus odio nec elementum. Sed elementum est quis tortor faucibus, et molestie nibh finibus. Mauris condimentum ex vestibulum fringilla consectetur.</p>

                                            <!-- contact form -->
                                            <form action="" method="post" class="tm-contact-form">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                                                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm-form-group-left">
                                                    <input type="text" id="contact_name" name="message[name]" class="form-control" placeholder="Please fill in you name " required="" value="{{ \Illuminate\Support\Facades\Cookie::get('message')['name'] }}">
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm-form-group-right">
                                                    <input type="email" id="contact_email" name="message[email]" class="form-control" placeholder="Fill in you mailbox" required="" value="{{ \Illuminate\Support\Facades\Cookie::get('message')['email'] }}">
                                                </div>

                                                {{--<div class="form-group">--}}
                                                    {{--<input type="text" id="contact_subject" name="contact_subject" class="form-control" placeholder=" Fill in your blog or personal homepage" required="">--}}
                                                {{--</div>--}}

                                                <div class="form-group">
                                                    <textarea id="contact_message" name="message[meageContent]" class="form-control" rows="5" placeholder="Fill Your message" required=""></textarea>
                                                </div>

                                                <button type="submit" class="pull-xs-right tm-submit-btn" onclick="clickmessage(this,event)">Send</button>

                                            </form>

                                        </div>

                                        <div id="rightmenu" style="max-height: 516px;overflow: hidden" class="tm-bg-white-translucent text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-textbox-padding-contact">

                                            {{--<hr>--}}
                                            <!-- google map goes here -->
                                            <div class="fh5co-post">
                                                <h2 class="tm-contact-info">Message Board</h2>
                                                <hr>
                                                @foreach($messages as $message)

                                                    <div class="fh5co-entry padding">
                                                        <img src="{{ asset('img/none.png') }}" alt="">
                                                        <div>
                                                            <span style="color: #0A0A0A" class="fh5co-post-date">{{ $message->name }}</span>
                                                            <h2 style="font-size: 1.0em;text-align: right;color: #0A0A0A">
                                                                OCTOBER  {{ date('d,m,Y',$message->created_at) }}
                                                            </h2>
                                                            <p style="color:#000000">{{ $message->meageContent }}</p>
                                                        </div>
                                                    </div>
                                                    @if($message->reply!='')
                                                        <div class="fh5co-entry padding">
                                                            <img style="float: left" src="{{ asset('img/none.png') }}" alt="">

                                                            <div>
                                                                <span class="fh5co-post-date" style="color: red;text-align: left;" >博主</span>
                                                                <h2 style="font-size: 1.0em;text-align: left;color: #0A0A0A">
                                                                    OCTOBER  {{ date('d,m,Y',$message->updated_at) }}
                                                                </h2>
                                                                <p style="color:#000000;text-align: left">{{ $message->reply }}</p>
                                                            </div>

                                                        </div>

                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop


@section('footstyle')

    <script type="text/javascript">
        function clickmessage(btn,event) {
            var messagetext = $("#contact_message").val();
            if(messagetext.length > 160) {
                alert('留言过长');
                var event = event || window.event;
                event.preventDefault(); // 兼容标准浏览器
                window.event.returnValue = false; // 兼容IE6~8
                return false;
            }

        }
    </script>

    <script type="text/javascript" src="{{ asset('js/frontage.js') }}"></script>
@stop
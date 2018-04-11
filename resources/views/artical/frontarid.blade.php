@extends('frontCommon.fronttemplate')

@section('style')

    <link rel="stylesheet" href="{{ asset('css/frarid.css') }}">

    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}">

    <script type="text/javascript" href="{{ asset('static/jquery/jquery-3.1.1.js') }}"></script>

    <script type="text/javascript" href="{{ asset('static/jquery/jquery-3.1.1.min.js') }}"></script>





@stop

@section('connect')

    <section>
        <div class="row">
            {{--leftMenu--}}
            <div class="col-md-8">
                <article class="blog-post">
                    <div class="blog-post-image">
                        <a href=""><img style="width: 750px;max-height: 500px;" src="{{ asset('upload/'.$artical->picture) }}" alt=""></a>
                    </div>
                    <div class="blog-post-body">
                        <h2><a href="">{{ $artical->headline }}</a></h2>
                        <div class="post-meta"><span>by <a href="#">{{ $artical->publishperson }}</a></span>/<span><i class="fa fa-clock-o"></i>March {{ date('d,m,Y',$artical->created_at) }}</span>/<span><i class="fa fa-comment-o"></i> <a href="#">{{ $artical->readnumber }}</a></span></div>
                        <div class="blog-post-text">

                            {!! $artical->articalcontent !!}

                        </div>
                    </div>
                </article>

                <hr>

                <div class="content-form-box">
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="col-md-10">
                            <div style="display: none" class="form-group">
                                <input name="Ment[articalid]" id="name" value={{ $artical->id  }} class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>姓名</label>
                                <input name="Ment[comname]" id="names" class="form-control" type="text" value="{{ \Illuminate\Support\Facades\Cookie::get('cookie')['comname'] }}">
                            </div>
                            <div class="form-group">
                                <label>邮箱</label>
                                <input id="mailbox" class="form-control" type="text" name="Ment[comemail]" value="{{ \Illuminate\Support\Facades\Cookie::get('cookie')['comemail'] }}">
                            </div>
                        </div>
                        <div class="form-group col-lg-10 col-md-10 col-sm-10">
                            <label>在此评论</label>
                            <textarea class="form-control" name="Ment[comtext]" id="text" cols="30" rows="5" placeholder="再次评论"></textarea>
                        </div>
                        <div class="col-md-6 determineRegister">
                            <input id="btn" class="message-sub" type="button" value="提交" onclick="cilikPost(this)">
                        </div>
                    </form>
                </div>
                <div id="contow-box">
                    <div class="content-comment-box">

                        {{--{!! $artiments !!}--}}

                        @foreach($artiments as $key=>$ment)

                            @if($ment->comid == 0)

                                <div>
                                    <img class="img" src="{{ asset('img/none.png') }}">
                                    <p> {{ $ment->comname  }} :</p>

                             @else
                                <div style="margin-left: 20px;">
                                    <img style=" width: 5%;" class="img" src="{{ asset('img/none.png') }}">
                                    <p>{{ $ment->comname }} 对 {{ explode('/',$key)[0] }} 说</p>

                            @endif

                                    <p>{{ $ment->comtext }}</p>
                                    <div>
                                        <span style="margin-left:60px;margin-right:20px;" class="ds-time">DATE {{ date('d,m,Y', $ment->created_at) }} </span>
                                        <a ondblclick="nonement({{$ment->id}})" onclick="keyment({{ $ment->id }})" class="aaa">
                                            回复
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </div>


                                    @if($ment->reply != '')
                                        <div>
                                            <img style="float: right" class="img" src="{{ asset('img/none.png') }}">
                                            <p style="text-align: right"> : 博主 </p>
                                            <p style="text-align: right">{{ $ment->reply }}</p>
                                            <div>
                                                <span style="margin-left:65%;margin-right:20px;" class="ds-time">DATE {{ date('d,m,Y', $ment->updated_at) }} </span>
                                            </div>
                                        </div>
                                    @endif




                                    <div id="{{ $ment->id }}" class="ds-replybox ds-inline-replybox" style="display:none;">
                                        <form action="" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                            <div style="display:none;">
                                                <input type="text" name="Ment[comid]" value="{{$ment->id}}"/>
                                                <input type="text" name="Ment[articalid]" value="{{ $artical->id }}"/>
                                            </div>
                                            <div class="ds-textarea-wrapper ds-rounded-top">
                                                <div class="form-input">
                                                    姓名：
                                                    <input id="name{{ $ment->id }}" name="Ment[comname]" type="text" value="{{\Illuminate\Support\Facades\Cookie::get("cookie")["comname"]}}">
                                                </div>
                                                <div class="form-input">
                                                    邮箱：
                                                    <input name="Ment[comemail]" id="email{{ $ment->id }}" type="text" value="{{ \Illuminate\Support\Facades\Cookie::get("cookie")["comemail"] }}">
                                                </div>
                                                <textarea name="Ment[comtext]" id="text{{ $ment->id }}" cols="30" rows="10"></textarea>
                                                <input type="button" value="提交" onclick="cilckReplyid(this,{{ $ment->id }})">
                                            </div>
                                        </form>
                                    </div>

                               </div>
                                <hr>

                        @endforeach







                    </div>
                </div>
            </div>


            {{--rightMenu--}}
            @include('frontCommon.rightmenu')
        </div>
    </section>

@stop


@section('footstyle')


    <script type="text/javascript" src="{{ asset('js/picturelist.js') }}"></script>


    <script type="text/javascript">
        function keyment(id) {
            var divform = document.getElementById(id);

            divform.style.display = "block";
        }

        function nonement(id) {
            var divform = document.getElementById(id);
            divform.style.display = "none";
        }
    </script>

    <script type="text/javascript">

        function cilikPost(btn) {
            var names = $("#names").val();
            var email = $("#mailbox").val();
            var text = $("#text").val();


            if(names != '' && email != '' && text != '') {
                var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                if(myreg.test(email)) {
                   if(text.length <160) {
                        $(btn).prop("type","submit");

                   }else {
                       alert('评论内容过长');
                       return false;
                   }
                }else {
                    alert('邮箱格式不正确');
                    return false;
                }
            }else {
                alert('请填写完整！');
                return false;
            }
        }
    </script>




@stop
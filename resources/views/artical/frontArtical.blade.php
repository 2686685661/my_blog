@extends('frontCommon.fronttemplate')

@section('connect')

    <section class="main-slider">
        <ul class="bxslider">
            @foreach($hotArtical as $artical)
                <li>
                    <div class="slider-item">
                        <img src="{{ asset('upload/'.$artical->picture) }}" title="{{ $artical->picture }}" />
                        <h2>
                            <a href="{{ url('front/frarticid',['id'=>$artical->id]) }}" title="{{ $artical->headline }}">
                                {{ $artical->headline }}
                            </a>
                        </h2>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    <section>
        <div class="row">
            {{--leftMenu--}}
            <div class="col-md-8">

                @foreach($articals as $artical)
                    <article class="blog-post">
                        <div class="blog-post-image">
                            <a href="{{ url('front/frarticid',['id'=>$artical->id]) }}"><img style="width: 750px;max-height: 500px" src="{{ asset('upload/'.$artical->picture) }}" alt=""></a>
                        </div>
                        <div class="blog-post-body">
                            <h2><a href="{{ url('front/frarticid',['id'=>$artical->id]) }}">{{ $artical->headline }}</a></h2>
                            <div class="post-meta">
                                <span>by <a href="#">{{ $artical->publishperson }}</a></span>/<span>
                                    <i class="fa fa-clock-o"></i>March {{ date('d,m,Y',$artical->created_at) }}</span>/<span>
                                    <i class="fa fa-comment-o"></i>
                                    <a href="#">Reading  {{ $artical->readnumber }}</a>
                                </span>
                            </div>
                            <p style="width: 750px;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">{{ str_limit(strip_tags($artical->articalcontent),210,'...') }}</p>
                            <div class="read-more"><a href="{{ url('front/frarticid',['id'=>$artical->id]) }}">Continue Reading</a></div>
                        </div>
                    </article>
                @endforeach
            </div>
            {{--rightMenu--}}
            @include('frontCommon.rightmenu')
        </div>
    </section>

    <div>
        <div class="pull-right" style="margin-right: 44%;">
            {{ $articals->render() }}
        </div>
    </div>

@stop
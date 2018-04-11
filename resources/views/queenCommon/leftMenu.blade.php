<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center user-image-back">
                <img src="{{ asset('img/find_user.png') }}" class="img-responsive" />
            </li>


            <li @if($arr['name']=='articallist'||$arr['name']=='newartical') class="active" @else class="" @endif>
                <a><i class="fa fa-edit"></i>文章管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level" aria-expanded="false" @if($arr['name']=='articallist'||'newartical') class="nav nav-second-level collapse in" aria-expanded="true" @elseif($arr['name']!='articallist'&&'newartical') class="nav nav-second-level" aria-expanded="false" @endif>
                    <li >
                        <a @if($arr['name']=='newartical') style="background-color: lightgray;" @endif href="{{ url('artical/newartical') }}">新增文章</a>
                    </li>
                    <li>
                        <a @if($arr['name']=='articallist') style="background-color: lightgray;" @endif href="{{ url('artical/list') }}">文章列表</a>
                    </li>
                </ul>
            </li>


            <li @if($arr['name']=='diarylist'||$arr['name']=='newdiary') class="active" @else class="" @endif class="">
                <a><i class="fa fa-edit "></i>日记管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level" aria-expanded="false" @if($arr['name']=='diarylist'||'newdiary') class="nav nav-second-level collapse in" aria-expanded="true" @elseif($arr['name']!='diarylist'&&'newdiary')  class="nav nav-second-level" aria-expanded="false" @endif>
                    <li>
                        <a @if($arr['name']=='newdiary') style="background-color: lightgray;" @endif href="{{ url('diary/newdiary') }}">写日记</a>
                    </li>
                    <li>
                        <a @if($arr['name']=='diarylist') style="background-color: lightgray;" @endif href="{{ url('diary/list') }}">日记列表</a>
                    </li>
                </ul>
            </li>

            <li @if($arr['name']=='messagelist'||$arr['name']=='artimentlist'||$arr['name']=='adoptlist') class="active" @else class="" @endif class="">
                <a ><i class="fa fa-edit "></i>留言管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level" aria-expanded="false"  @if($arr['name']=='messagelist'||'artimentlist'||'adoptlist') class="nav nav-second-level collapse in" aria-expanded="true" @elseif($arr['name']!='messagelist'&&'artimentlist'&&'adoptlist')  class="nav nav-second-level" aria-expanded="false" @endif>
                    <li>
                        <a @if($arr['name']=='messagelist') style="background-color: lightgray;" @endif href="{{ url('message/messagelist') }}">留言列表</a>
                    </li>

                    <li>
                        <a @if($arr['name']=='artimentlist') style="background-color: lightgray;" @endif href="{{ url('artiment/artimentlist') }}">文章评论</a>
                    </li>
                    <li>
                        <a  @if($arr['name']=='adoptlist') style="background-color: lightgray;" @endif href="{{ url('message/adoptlist') }}">待审核</a>
                    </li>
                </ul>
            </li>



            <li  @if($arr['name']=='picturelist'||$arr['name']=='doclist' || $arr['name']=='videolist') class="active" @else class="" @endif class="">
                <a><i class="fa fa-edit "></i>文件管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level" aria-expanded="false" @if($arr['name']=='picturelist'||'doclist' || 'videolist') class="nav nav-second-level collapse in" aria-expanded="true" @elseif($arr['name']!='picturelist'&&'doclist')  class="nav nav-second-level" aria-expanded="false" @endif>
                    <li>
                        <a  @if($arr['name']=='picturelist') style="background-color: lightgray;" @endif href="{{ url('files/picturelist') }}">图片</a>
                    </li>
                    <li>
                        <a  @if($arr['name']=='doclist') style="background-color: lightgray;" @endif href="{{ url('files/doclist') }}">文件</a>
                    </li>

                    <li>
                        <a  @if($arr['name']=='videolist') style="background-color: lightgray;" @endif href="{{ url('files/videolist') }}">视频</a>
                    </li>
                </ul>
            </li>


            <li @if($arr['name']=='artylist'||$arr['name']=='dialist'||$arr['name']=='meagelist'||$arr['name']=='fileslist') class="active" @else class="" @endif class="">
                <a> <span style="margin-right: 10px;" class="glyphicon glyphicon-trash"></span>回收站<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level" aria-expanded="false" @if($arr['name']=='artylist'||'dialist'||'meagelist'||'fileslist') class="nav nav-second-level collapse in" aria-expanded="true" @elseif($arr['name']!='artylist'&&'dialist'&&'meagelist')  class="nav nav-second-level" aria-expanded="false" @endif>
                    <li>
                        <a @if($arr['name']=='artylist') style="background-color: lightgray;" @endif href="{{ url('recovery/artylist') }}">文章</a>
                    </li>
                    <li>
                        <a @if($arr['name']=='dialist') style="background-color: lightgray;" @endif href="{{ url('recovery/dialist') }}">日记</a>
                    </li>
                    <li>
                        <a @if($arr['name']=='meagelist') style="background-color: lightgray;" @endif href="{{ url('recovery/meagelist') }}">留言</a>
                    </li>

                    <li>
                        <a @if($arr['name']=='fileslist') style="background-color: lightgray;" @endif href="{{ url('recovery/fileslist') }}">文件</a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</nav>
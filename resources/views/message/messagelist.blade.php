@extends('queenCommon.template')

@section('style')

    <script type="text/javascript" src="{{ asset('static/jquery/jquery-3.1.1.min.js') }}"></script>


    <script type="text/javascript" src="{{ asset('static/layer/layer.js') }}"></script>

@stop

@section('connect')

    <div class="col-md-12">

        <!-- 自定义内容区域 -->

        <form action="" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="panel panel-default">
                <div class="panel-heading"> 留言列表</div>
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>

                        <th>ID</th>
                        <th>姓名</th>
                        <th id="th">email</th>
                        <th>留言时间</th>
                        {{--<th>修改时间</th>--}}
                        <th>审核状态</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td scope="row">{{ $message->id }}</td>
                            <td>{{ $message->name }}</td>
                            <td><a href="{{ url('message/newemail',['id'=>$message->id]) }}" style="cursor: pointer">{{ $message->email }}</a></td>
                            <td>{{ date('Y-m-d',$message->created_at) }}</td>
                            {{--<td>{{ date('Y-m-d',$message->updated_at) }}</td>--}}
                            <td>{{ $message->getadopt($message->adopt_id) }}</td>
                            <td>

                                <a onclick="clickmessage({{ $message->id }})" ondblclick="odbmessage({{ $message->id }})">  <span class="glyphicon glyphicon-envelope"></span></a>

                                <a href="{{ url('message/noadopt',['id'=>$message->id]) }}"> <span class="glyphicon glyphicon-eye-close"></span></a>

                                <a href="{{ url('message/delete',['id'=>$message->id]) }}"
                                   onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                                > <span class="glyphicon glyphicon-trash"></span></a>

                                @if($message->reply!='')
                                    <a style="margin-left: 10px;"> <span class="glyphicon glyphicon-ok"></span></a>
                                @endif
                            </td>

                        </tr>
                        <tr>
                            <td colspan="8" style="padding: 3px 5px 0 5px;">

                                <div id="{{ $message->id }}" style="display: none;">
                                    <form action="" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                        <input style="display: none" type="text" name="Reply[id]" value="{{ $message->id }}">
                                        <label>回复时间：{{ date('Y-m-d',$message->updated_at) }}</label>

                                        <textarea style="width: 92%;"  class="form-control" id="repage_{{ $message->id }}"  name="Reply[reply]"  cols="" rows="">@if($message->reply!='')
                                            {{ $message->reply }}@endif</textarea>
                                        <button style="margin-left: 82.9%;" class="btn btn-primary" type="button" onclick="reply({{ $message->id }},this)">回复</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
    
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--<div class="form-group">--}}
                {{--<button type="submit" class="btn btn-primary">Submit Button</button>--}}
                {{--<button type="submit" class="btn btn-danger">Submit Button</button>--}}
            {{--</div>--}}
        </form>

        <!-- 分页  -->
        <div>
            <div class="pull-right">
                {{ $messages->render() }}
            </div>
        </div>

    </div>



@stop


@section('javascript')

    <script type="text/javascript">
        function clickmessage(id) {
            document.getElementById(id).style.display='block';
        }
        
        function odbmessage(id) {
            document.getElementById(id).style.display='none';
        }
        
        function reply(id,btn) {
            var text = document.getElementById("repage_"+id).value;

            if(text != '') {
                if(text.length<200) {
                    $(btn).prop("type","submit");
                }else {
                    alert('留言回复内容过长！');
                }
            }else {
                alert('留言回复不能为空！');
            }

            
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            layer.open({
                type: 4,
                time:4000,
                id: 'aaa',
                shadeClose:true,
                content: ['点击email即可发送邮件', '#th'] //数组第二项即吸附元素选择器或者DOM
            });
        });
    </script>

@stop
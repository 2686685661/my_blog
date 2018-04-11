@extends('queenCommon.template')

@section('connect')

    <div class="col-md-12">
        <!-- 自定义内容区域 -->
        <div class="panel panel-default">
            <div class="panel-heading">文章评论</div>
            <table class="table table-striped table-hover table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>评论时间</th>
                    <th>Email</th>
                    <th>所留文章</th>
                    <th>被评论人</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($artiments as $artiment)
                    <tr>
                        <th scope="row">{{ $artiment->id }}</th>
                        <td>{{ $artiment->comname }}</td>
                        <td>{{ date('Y-m-d',$artiment->created_at) }}</td>
                        <td>{{ $artiment->comemail }}</td>
                        <td>{{ $artiment->posts->headline ? $artiment->posts->headline:"该文章已删除" }}</td>
                        <td>{{ $artiment->getMent($artiment->comid)?$artiment->getMent($artiment->comid):'评论已删除' }}</td>
                        <td>

                            <a onclick="clickmessage({{ $artiment->id }})" ondblclick="odbmessage({{ $artiment->id }})"><span class="glyphicon glyphicon-envelope"></span></a>

                            <a href="{{ url('artiment/mentdelete',['id'=>$artiment->id]) }}"
                               onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                            ><span class="glyphicon glyphicon-trash"></span></a>

                            @if($artiment->reply!='')
                                <a><span class="glyphicon glyphicon-ok"></span></a>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7" style="padding: 3px 5px 0 5px;">
                            <div id="{{ $artiment->id }}" style="display: none;">
                                <form action="" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input style="display: none" type="text" name="Reply[id]" value="{{ $artiment->id }}">
                                    <label>回复时间：{{ date('Y-m-d',$artiment->updated_at) }}</label>

                                    <textarea style="width: 88%;"  class="form-control" id="repage_{{ $artiment->id }}"  name="Reply[reply]"  cols="" rows="">@if($artiment->reply!='')
                                            {{ $artiment->reply }}@endif</textarea>
                                    <button style="margin-left: 79%;" class="btn btn-primary" type="button" onclick="reply({{ $artiment->id }},this)">回复</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- 分页  -->
        <div>
            <div class="pull-right">
                {{ $artiments->render() }}
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
@stop




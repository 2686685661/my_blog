@extends('queenCommon.template')

@section('connect')
    <div class="col-md-12">

        <!-- 自定义内容区域 -->
        <div class="panel panel-default">
            <div class="panel-heading">文章列表</div>
            <table class="table table-striped table-hover table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>文章标题</th>
                    <th>发布人</th>
                    <th>新增时间</th>
                    <th>修改时间</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articals as $artical)
                    <tr>
                        <th scope="row">{{ $artical->id }}</th>
                        <td>{{ $artical->headline }}</td>
                        <td>{{ $artical->publishperson }}</td>
                        <td>{{ date('Y-m-d',$artical->created_at) }}</td>
                        <td>{{ date('Y-m-d',$artical->updated_at) }}</td>
                        <td>
                            <a href="{{ url('artical/updateartical?id='.$artical->id) }}"> <span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ url('artical/deleteartical',['id'=>$artical->id]) }}"
                               onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                            ><span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- 分页  -->
        <div>
            <div class="pull-right">
                {{ $articals->render() }}
            </div>
        </div>

    </div>
@stop
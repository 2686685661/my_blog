@extends('queenCommon.template')


@section('connect')

    <div class="col-md-12">


        <!-- 自定义内容区域 -->
        <div class="panel panel-default">
            <div class="panel-heading">学生列表</div>
            <table class="table table-striped table-hover table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>内容</th>
                    <th>书写时间</th>
                    <th>修改时间</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diarys as $diary)
                <tr>
                    <th scope="row">{{ $diary->id }}</th>
                    <td>{{ $diary->diaryContent }}</td>
                    <td>{{ date('Y-m-d',$diary->created_at) }}</td>
                    <td>{{ date('Y-m-d',$diary->updated_at) }}</td>
                    <td>
                        <a href="{{ url('diary/updatediary?id='.$diary->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ url('diary/deletediary',['id'=>$diary->id]) }}"
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
                {{ $diarys->render() }}
            </div>
        </div>

    </div>
@stop

@section('javascript')


@stop
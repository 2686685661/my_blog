@extends('queenCommon.template')

@section('connect')


    <div class="col-md-12">

        <!-- 自定义内容区域 -->

        <form action="" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    待审核
                </div>
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>email</th>
                        <th>留言时间</th>
                        <th>修改时间</th>
                        <th>审核状态</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td scope="row">{{ $message->id }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ date('Y-m-d',$message->created_at) }}</td>
                                <td>{{ date('Y-m-d',$message->updated_at) }}</td>
                                <td>{{ $message->getadopt($message->adopt_id) }}</td>
                                <td>
                                    <a href="{{ url('message/isadopt',['id'=>$message->id]) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a href="{{ url('message/delete',['id'=>$message->id]) }}"
                                       onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                                    ><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </form>

        <!-- 分页  -->
        <div>
            <div class="pull-right">
                {{ $messages->render() }}
            </div>
        </div>

    </div>

@stop
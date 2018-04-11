@extends('queenCommon.template')


@section('connect')

    <div class="col-md-12 container">


        <!-- 自定义内容区域 -->
        <div class="panel panel-primary">
            <div class="panel-heading">回收站--留言</div>


            <div class="panel-body">
                @include('recovery._form')

                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>Email</th>
                        <th>内容</th>
                        <th>状态</th>
                        <th>删除时间</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($meages as $meage)
                        <tr>
                            <th scope="row">{{ $meage->id }}</th>
                            <td>{{ $meage->name }}</td>
                            <td>{{ $meage->email }}</td>
                            <td>{{ $meage->meageContent }}</td>
                            <td>{{ $meage->getadopt($meage->adopt_id) }}</td>
                            <td>{{ date('Y-m-d',$meage->updated_at) }}</td>
                            <td>
                                <a href="{{ url('recovery/meageReduction',['id'=>$meage->id]) }}"><span class="glyphicon glyphicon-send"></span></a>
                                <a href="{{ url('recovery/meagedelete',['id'=>$meage->id]) }}"
                                   onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                                ><span style="color:red" class="glyphicon glyphicon-remove-sign"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 分页  -->
        <div>
            <div class="pull-right">
                {{ $meages->render() }}
            </div>
        </div>

    </div>


@stop
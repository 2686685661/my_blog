@extends('queenCommon.template')


@section('connect')

    <div class="col-md-12 container">


        <!-- 自定义内容区域 -->
        <div class="panel panel-primary">
            <div class="panel-heading">回收站--文章</div>


            <div class="panel-body">
                @include('recovery._form')
                {{--<form method="POST" action="">--}}
                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<input type="text" name="item" class="form-control" placeholder="Enter Title For Search" value="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<button class="btn btn-success" type="submit">Search</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}


                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>删除时间</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articals as $artical)
                        <tr>
                            <th scope="row">{{ $artical->id }}</th>
                            <td>{{ $artical->headline }}</td>
                            <td>{{ $artical->publishperson }}</td>
                            <td>{{ date('Y-m-d',$artical->updated_at) }}</td>
                            <td>
                                <a href="{{ url('recovery/artyReduction',['id'=>$artical->id]) }}"> <span class="glyphicon glyphicon-send"></span></a>
                                <a href="{{ url('recovery/artydelete',['id'=>$artical->id]) }}"
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
                {{ $articals->render() }}
            </div>
        </div>

    </div>


@stop
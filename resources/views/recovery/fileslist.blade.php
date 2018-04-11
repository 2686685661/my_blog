@extends('queenCommon.template')


@section('connect')




    <div class="col-md-12 container">


        <!-- 自定义内容区域 -->
        <div class="panel panel-primary">
            <div class="panel-heading">回收站--文件</div>


            <div class="panel-body">

                @include('recovery._form')

                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>文件名称</th>
                        <th>文件类型</th>
                        <th>删除时间</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $file)
                        <tr>
                            <th scope="row">{{ $file->id }}</th>
                            <td>
                                <p style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="{{ $file->filename }}"> {{ str_limit(strip_tags($file->filename),30,'...') }}</p>
                            </td>
                            <td>{{ $file->filetype }}</td>
                            <td>{{ date('Y-m-d',$file->updated_at) }}</td>
                            <td>
                                <a href="{{ url('recovery/fileReduction',['id'=>$file->id]) }}"> <span class="glyphicon glyphicon-send"></span></a>
                                <a href="{{ url('recovery/filedelete',['id'=>$file->id]) }}"
                                   onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                                ><span style="color:red" class="glyphicon glyphicon-remove-sign"></span></a>
                            </td>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop


@section('javascript')
    <script>
        $(function () { $("[data-toggle='tooltip']").tooltip(); });
    </script>
@stop


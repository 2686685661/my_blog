<ul class="jFiler-items-list jFiler-items-grid">
    @foreach($files as $file)
        <li class="jFiler-item jFiler-no-thumbnail" style="width: 30%;" data-jfiler-index="0">
            <div class="jFiler-item-container">
                <div class="jFiler-item-inner">
                    <div class="jFiler-item-thumb">
                        <div class="jFiler-item-status"></div>
                        <div class="jFiler-item-info">
                                                <span class="jFiler-item-title">
                                                    <b title="">{{ $file->filename }}</b>
                                                </span>
                            <span class="jFiler-item-others">上传时间：{{ date('Y-m-d',$file->created_at) }}</span>
                        </div>
                        <div class="jFiler-item-thumb-image">
                            @if($file->filetype == 'doc')
                                <span class="jFiler-icon-file f-file f-file-ext-doc" style="-webkit-box-shadow: #384e53 42px -55px 0px 0px inset; -moz-box-shadow: #384e53 42px -55px 0px 0px inset; box-shadow: #384e53 42px -55px 0px 0px inset;">.{{ $file->filetype }}</span>
                            @elseif($file->filetype == 'css')
                                <span class="jFiler-icon-file f-file f-file-ext-css" style="-webkit-box-shadow: #038020 42px -55px 0px 0px inset; -moz-box-shadow: #038020 42px -55px 0px 0px inset; box-shadow: #038020 42px -55px 0px 0px inset;">.{{ $file->filetype }}</span>
                            @elseif($file->filetype == 'html')
                                <span class="jFiler-icon-file f-file f-file-ext-html" style="-webkit-box-shadow: #abea7a 42px -55px 0px 0px inset; -moz-box-shadow: #abea7a 42px -55px 0px 0px inset; box-shadow: #abea7a 42px -55px 0px 0px inset;">.{{ $file->filetype }}</span>
                            @elseif($file->filetype == 'txt')
                                <span class="jFiler-icon-file f-file f-file-ext-txt" style="-webkit-box-shadow: #709c27 42px -55px 0px 0px inset; -moz-box-shadow: #709c27 42px -55px 0px 0px inset; box-shadow: #709c27 42px -55px 0px 0px inset;">.{{ $file->filetype }}</span>
                            @elseif($file->filetype == 'zip')
                                <span class="jFiler-icon-file f-file f-file-ext-txt" style="-webkit-box-shadow: #9cb945 42px -55px 0px 0px inset; -moz-box-shadow: #9cb945 42px -55px 0px 0px inset; box-shadow: #9cb945 42px -55px 0px 0px inset;">.{{ $file->filetype }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="jFiler-item-assets jFiler-row">
                        @if($_SERVER['REDIRECT_URL'] == '/laravel/laravel/public/front/frfidown')

                            <ul class="list-inline pull-right">
                                <li>
                                    <a href="{{ url('download',['name'=>$file->filename]) }}"  onclick="if (confirm('你确定要下载吗？？') == false) return false;">
                                        <span class="glyphicon glyphicon-download-alt"></span>
                                    </a>
                                </li>
                            </ul>

                        @elseif($_SERVER['REDIRECT_URL'] == '/laravel/laravel/public/files/doclist')

                            <ul class="list-inline pull-left">
                                <li></li>
                            </ul>
                            <ul class="list-inline pull-right">
                                <li>
                                    <a href="{{ url('files/deletepic',['id'=>$file->id]) }}" class="icon-jfi-trash jFiler-item-trash-action"  onclick="if (confirm('你确定要删除吗？？') == false) return false;"></a>
                                </li>
                            </ul>
                        @endif

                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
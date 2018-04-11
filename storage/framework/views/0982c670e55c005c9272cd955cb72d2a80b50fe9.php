<ul class="jFiler-items-list jFiler-items-grid">
    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="jFiler-item jFiler-no-thumbnail" style="width: 30%;" data-jfiler-index="0">
            <div class="jFiler-item-container">
                <div class="jFiler-item-inner">
                    <div class="jFiler-item-thumb">
                        <div class="jFiler-item-status"></div>
                        <div class="jFiler-item-info">
                                                <span class="jFiler-item-title">
                                                    <b title=""><?php echo e($file->filename); ?></b>
                                                </span>
                            <span class="jFiler-item-others">上传时间：<?php echo e(date('Y-m-d',$file->created_at)); ?></span>
                        </div>
                        <div class="jFiler-item-thumb-image">
                            <?php if($file->filetype == 'doc'): ?>
                                <span class="jFiler-icon-file f-file f-file-ext-doc" style="-webkit-box-shadow: #384e53 42px -55px 0px 0px inset; -moz-box-shadow: #384e53 42px -55px 0px 0px inset; box-shadow: #384e53 42px -55px 0px 0px inset;">.<?php echo e($file->filetype); ?></span>
                            <?php elseif($file->filetype == 'css'): ?>
                                <span class="jFiler-icon-file f-file f-file-ext-css" style="-webkit-box-shadow: #038020 42px -55px 0px 0px inset; -moz-box-shadow: #038020 42px -55px 0px 0px inset; box-shadow: #038020 42px -55px 0px 0px inset;">.<?php echo e($file->filetype); ?></span>
                            <?php elseif($file->filetype == 'html'): ?>
                                <span class="jFiler-icon-file f-file f-file-ext-html" style="-webkit-box-shadow: #abea7a 42px -55px 0px 0px inset; -moz-box-shadow: #abea7a 42px -55px 0px 0px inset; box-shadow: #abea7a 42px -55px 0px 0px inset;">.<?php echo e($file->filetype); ?></span>
                            <?php elseif($file->filetype == 'txt'): ?>
                                <span class="jFiler-icon-file f-file f-file-ext-txt" style="-webkit-box-shadow: #709c27 42px -55px 0px 0px inset; -moz-box-shadow: #709c27 42px -55px 0px 0px inset; box-shadow: #709c27 42px -55px 0px 0px inset;">.<?php echo e($file->filetype); ?></span>
                            <?php elseif($file->filetype == 'zip'): ?>
                                <span class="jFiler-icon-file f-file f-file-ext-txt" style="-webkit-box-shadow: #9cb945 42px -55px 0px 0px inset; -moz-box-shadow: #9cb945 42px -55px 0px 0px inset; box-shadow: #9cb945 42px -55px 0px 0px inset;">.<?php echo e($file->filetype); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="jFiler-item-assets jFiler-row">
                        <?php if($_SERVER['REDIRECT_URL'] == '/laravel/laravel/public/front/frfidown'): ?>

                            <ul class="list-inline pull-right">
                                <li>
                                    <a href="<?php echo e(url('download',['name'=>$file->filename])); ?>"  onclick="if (confirm('你确定要下载吗？？') == false) return false;">
                                        <span class="glyphicon glyphicon-download-alt"></span>
                                    </a>
                                </li>
                            </ul>

                        <?php elseif($_SERVER['REDIRECT_URL'] == '/laravel/laravel/public/files/doclist'): ?>

                            <ul class="list-inline pull-left">
                                <li></li>
                            </ul>
                            <ul class="list-inline pull-right">
                                <li>
                                    <a href="<?php echo e(url('files/deletepic',['id'=>$file->id])); ?>" class="icon-jfi-trash jFiler-item-trash-action"  onclick="if (confirm('你确定要删除吗？？') == false) return false;"></a>
                                </li>
                            </ul>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
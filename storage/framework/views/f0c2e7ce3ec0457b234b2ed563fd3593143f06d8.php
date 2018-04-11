<?php $__env->startSection('style'); ?>


    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('static/css/bootstrap.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.filer.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.filer-dragdropbox-theme.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/tomorrow.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/custom-2.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/uploads.css')); ?>">


    <script type="text/javascript" src="<?php echo e(asset('static/jquery/jquery-3.1.1.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('static/jquery/jquery-3.1.1.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('connect'); ?>




    <div style="margin: auto;">
        <b>Result:</b>
        <br>
        <br>
        <form action="" method="post" enctype="multipart/form-data" class="text-center">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <div class="jFiler jFiler-theme-dragdropbox">
                <input type="file" name="files[]" id="demo-fileInput-4"  style="position: absolute; left: -9999px; top: -9999px; z-index: -9999;"
                       onchange="getImgURL(this)" accept="application/msword">
                <div class="jFiler-input-dragDrop">
                    <div class="jFiler-input-inner">
                        <div class="jFiler-input-icon">
                            <i class="icon-jfi-folder"></i>
                        </div>
                        <div class="jFiler-input-text">
                            <h3>Click on this box</h3>
                            <span style="display:inline-block; margin: 15px 0">or</span>
                        </div>
                        <a class="jFiler-input-choose-btn blue-light">Browse Files</a>
                    </div>
                </div>
                <div class="jFiler-items jFiler-row">
                    <ul id="listone" class="jFiler-items-list jFiler-items-grid"></ul>
                </div>
            </div>
            <input type="submit" class="btn-custom green" value="Submit">
        </form>
    </div>

    <hr>
    <hr>

    <div class="col-md-12">
        <ul class="jFiler-items-list jFiler-items-grid">
            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li class="jFiler-item jFiler-no-thumbnail" style="width: 30%;" data-jfiler-index="0">
                    <div class="jFiler-item-container">
                        <div class="jFiler-item-inner">
                            <div class="jFiler-item-thumb">
                                <div class="jFiler-item-status"></div>
                                <div class="jFiler-item-info">
                                            <span class="jFiler-item-title">
                                                <b title=""><?php echo e($video->filename); ?></b>
                                            </span>
                                    <span class="jFiler-item-others">上传时间：<?php echo e(date('Y-m-d',$video->created_at)); ?></span>
                                </div>
                                <div class="jFiler-item-thumb-image">
                                    <?php if($video->filetype == 'mp4'): ?>
                                        <span class="jFiler-icon-file f-file f-file-ext-doc" style="-webkit-box-shadow: #384e53 42px -55px 0px 0px inset; -moz-box-shadow: #384e53 42px -55px 0px 0px inset; box-shadow: #384e53 42px -55px 0px 0px inset;">.<?php echo e($video->filetype); ?></span>
                                    <?php elseif($video->filetype == 'ogg'): ?>
                                        <span class="jFiler-icon-file f-file f-file-ext-css" style="-webkit-box-shadow: #038020 42px -55px 0px 0px inset; -moz-box-shadow: #038020 42px -55px 0px 0px inset; box-shadow: #038020 42px -55px 0px 0px inset;">.<?php echo e($video->filetype); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="jFiler-item-assets jFiler-row">
                                <ul class="list-inline pull-left">
                                    <li>
                                        <?php if($video->introduce != null): ?>
                                            <a onclick="block(<?php echo e($video->id); ?>)">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                        <?php else: ?>
                                            <span onclick="block(<?php echo e($video->id); ?>)" class="glyphicon glyphicon-pencil"></span>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                                <ul class="list-inline  pull-left" style="margin-left: 25%;">
                                    <li>
                                        <a onclick="videoBlock(<?php echo e($video->id); ?>)">
                                            <span class="glyphicon glyphicon-film"></span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="list-inline pull-right">
                                    <li>
                                        <a href="<?php echo e(url('files/deletepic',['id'=>$video->id])); ?>" class="icon-jfi-trash jFiler-item-trash-action"  onclick="if (confirm('你确定要删除吗？？') == false) return false;"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php echo $__env->make('files.videoplay', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div id="<?php echo e($video->id); ?>" class="zhao">
                        <div class="ui-5447790657 npl-win npl-aau" style="top: 4.5px; left: 27%;">
                            <div class="zwrp">
                                <a href="javascript:;" class="zcls zflg" title="关闭" onclick="overs(<?php echo e($video->id); ?>)"></a>
                                <div class="ztbr noselect zmov">
                                    <div class="zttl thide fc1 zflg"> 视频描述</div>
                                </div>
                                <div class="zcnt fc2 zflg">
                                    <div class="">
                                        <form class="fom js-au-0" method="post" action="<?php echo e(url('files/videoDescribe')); ?>" enctype="multipart/form-data" >
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                                            <table class="ftb">
                                                <tbody>
                                                <tr>
                                                    <td class="cl0 wd1">视频名称：</td>
                                                    <td class="idnum" style="display:none;">
                                                        <input id="idnum" type="text" name="Video[vi_id]" value="<?php echo e($video->id); ?>">
                                                    </td>
                                                    <td class="cl1">
                                                        <input id="title_<?php echo e($video->id); ?>" type="text" name="Video[v_title]" class="t-x wd0" minlength="1" maxlength="15" <?php if($video->introduce != null): ?>  value="<?php echo e($video->introduce->v_title); ?>" <?php endif; ?>>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="cl0 wd1" valign="top">视频简介：</td>
                                                    <td class="cl1">
                               <textarea id="intro_<?php echo e($video->id); ?>" class="wd0 txt" name="Video[v_letter]" maxlength="140"  onkeyup="if(this.value.length>140) this.value=this.value.substring(0, 140)" >
                                   <?php if($video->introduce != null): ?> <?php echo e($video->introduce->v_letter); ?> <?php endif; ?>
                               </textarea>

                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="act">
                                                <button class=" btn btn-primary" type="button" name="fm-a"
                                                onclick="Verification(<?php echo e($video->id); ?>,this)">确定</button>
                                                <button class="btn btn-warning" type="button" name="fm-b" onclick="overs(<?php echo e($video->id); ?>)">取消</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

    <script type="text/javascript" src="<?php echo e(asset('js/picturelist.js')); ?>"></script>


    <script type="text/javascript" src="<?php echo e(asset('js/Method.js')); ?>"></script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('queenCommon.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
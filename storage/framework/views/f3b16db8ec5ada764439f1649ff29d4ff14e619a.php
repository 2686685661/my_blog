<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.filer.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.filer-dragdropbox-theme.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/custom-2.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/fr_pic.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/uploads.css')); ?>">



<?php $__env->stopSection(); ?>


<?php $__env->startSection('connect'); ?>

    <div class="panel-group" id="accordion">


        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseOne">
                        文件下载
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php echo $__env->make('files.docCenter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>
            </div>
        </div>



        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseTwo">
                       视频教程
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">

                    <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <figure class="effect-zoe" onclick="videoBlock(<?php echo e($video->id); ?>)">
                            <video src="<?php echo e(asset('upload/'.$video->filename)); ?>"></video>
                            <figcaption>
                                <h2>
                                    <span><?php if($video->introduce != null): ?><?php echo e($video->introduce->v_title); ?><?php else: ?> 暂无标题 <?php endif; ?></span>
                                </h2>
                                <p><?php if($video->introduce != null): ?><?php echo e($video->introduce->v_letter); ?><?php else: ?> 该视频暂无简介<?php endif; ?></p>
                            </figcaption>
                        </figure>

                        <?php echo $__env->make('files.videoplay', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>


    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('footstyle'); ?>

    <script type="text/javascript" src="<?php echo e(asset('js/Method.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontCommon.fronttemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
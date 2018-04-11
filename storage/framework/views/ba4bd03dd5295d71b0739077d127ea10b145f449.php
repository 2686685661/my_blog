<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/style-02.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('connect'); ?>

    <div id="contents">
        <div id="mainheader">
            <h1>Life <span>Book</span></h1>
        </div>

        <div id="main">
            <?php $__currentLoopData = $diarys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="post">
                    <div>
                        <h2><a><?php echo e(date('d,m,Y',$diary->created_at)); ?></a></h2>
                    </div>
                    <div class="entry">
                       <?php echo e($diary->diaryContent); ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>




    </div>

    <?php echo $__env->make('frontCommon.rightmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div style="margin-right: 45%;">
        <div class="pull-right">
            <?php echo e($diarys->render()); ?>

        </div>
    </div>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontCommon.fronttemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
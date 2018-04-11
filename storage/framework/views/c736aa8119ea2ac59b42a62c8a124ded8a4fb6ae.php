<?php $__env->startSection('connect'); ?>

    <section class="main-slider">
        <ul class="bxslider">
            <?php $__currentLoopData = $hotArtical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="slider-item">
                        <img src="<?php echo e(asset('upload/'.$artical->picture)); ?>" title="<?php echo e($artical->picture); ?>" />
                        <h2>
                            <a href="<?php echo e(url('front/frarticid',['id'=>$artical->id])); ?>" title="<?php echo e($artical->headline); ?>">
                                <?php echo e($artical->headline); ?>

                            </a>
                        </h2>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </section>

    <section>
        <div class="row">
            
            <div class="col-md-8">

                <?php $__currentLoopData = $articals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="blog-post">
                        <div class="blog-post-image">
                            <a href="<?php echo e(url('front/frarticid',['id'=>$artical->id])); ?>"><img style="width: 750px;max-height: 500px" src="<?php echo e(asset('upload/'.$artical->picture)); ?>" alt=""></a>
                        </div>
                        <div class="blog-post-body">
                            <h2><a href="<?php echo e(url('front/frarticid',['id'=>$artical->id])); ?>"><?php echo e($artical->headline); ?></a></h2>
                            <div class="post-meta">
                                <span>by <a href="#"><?php echo e($artical->publishperson); ?></a></span>/<span>
                                    <i class="fa fa-clock-o"></i>March <?php echo e(date('d,m,Y',$artical->created_at)); ?></span>/<span>
                                    <i class="fa fa-comment-o"></i>
                                    <a href="#">Reading  <?php echo e($artical->readnumber); ?></a>
                                </span>
                            </div>
                            <p style="width: 750px;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;"><?php echo e(str_limit(strip_tags($artical->articalcontent),210,'...')); ?></p>
                            <div class="read-more"><a href="<?php echo e(url('front/frarticid',['id'=>$artical->id])); ?>">Continue Reading</a></div>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <?php echo $__env->make('frontCommon.rightmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </section>

    <div>
        <div class="pull-right" style="margin-right: 44%;">
            <?php echo e($articals->render()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontCommon.fronttemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my personage - <?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(asset('static/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('static/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet" />
    <?php $__env->startSection('style'); ?>

    <?php echo $__env->yieldSection(); ?>
</head>
<body>

<?php 
    echo 'hello';
 ?>
<div id="wrapper">
    <?php $__env->startSection('header'); ?>
    
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;My Blog Backstage</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><span class="glyphicon glyphicon-refresh"></span></a></li>
                    <li><a href="<?php echo e(url('front/frarticalview')); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="<?php echo e(url('/home')); ?>"><span class="glyphicon glyphicon-remove"></span></a></li>
                </ul>
            </div>

        </div>
    </div>
    <?php echo $__env->yieldSection(); ?>

    <?php $__env->startSection('leftmenu'); ?>
    <?php echo $__env->make('queenCommon.leftMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>

    
    <div id="page-wrapper">
        <div id="page-inner">

            <?php echo $__env->make('queenCommon.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->yieldContent('connect'); ?>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('static/jquery/jquery-1.10.2.js')); ?>"></script>

<script src="<?php echo e(asset('static/bootstrap/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/jquery.metisMenu.js')); ?>"></script>

<script src="<?php echo e(asset('js/custom.js')); ?>"></script>

<?php $__env->startSection('javascript'); ?>

<?php echo $__env->yieldSection(); ?>
</body>
</html>

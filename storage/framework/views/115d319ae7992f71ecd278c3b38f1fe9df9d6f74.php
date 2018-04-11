<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>my blog --<?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(asset('static/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/coopymy.css')); ?>">
    <link href="<?php echo e(asset('css/jquery.bxslider.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/rightmessage.css')); ?>">

       
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <?php $__env->startSection('style'); ?>

    <?php echo $__env->yieldSection(); ?>
</head>
<body class="loaded">
<!-- 导航栏 -->
<?php $__env->startSection('header'); ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" style="font-size: 18px;font-weight: 100;line-height: 20px;color: #fff">
                <li class="active"><a href="<?php echo e(url('front/frarticalview')); ?>">Home</a></li>
                <li><a href="<?php echo e(url('front/frontdiary')); ?>">Lifediary</a></li>
                <li><a href="<?php echo e(url('front/frontmeage')); ?>">Friendmessage</a></li>
                <li><a href="<?php echo e(url('front/frontpicture')); ?>">Livepicture</a></li>
                <li><a href="<?php echo e(url('front/frfidown')); ?>">Filedown</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="https://user.qzone.qq.com/2686685661/infocenter"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-reddit"></i></a></li>
            </ul>

        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<?php echo $__env->yieldSection(); ?>


<div class="container">

    <header>
        <a href=""><img src="<?php echo e(asset('img/logo.png')); ?>"></a>
    </header>

    <?php echo $__env->yieldContent('connect'); ?>

</div>


<?php $__env->startSection('footer'); ?>
<footer class="footer">

    <div class="footer-socials">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-reddit"></i></a>
    </div>

    <div class="footer-bottom">
        <i class="fa fa-copyright"></i> Copyright 2015. All rights reserved.<br>
        More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
    </div>
</footer>
<?php echo $__env->yieldSection(); ?>


<script src="<?php echo e(asset('static/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('static/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.bxslider.js')); ?>"></script>
<script src="<?php echo e(asset('js/mooz.scripts.min.js')); ?>"></script>

<?php $__env->startSection('footstyle'); ?>

<?php echo $__env->yieldSection(); ?>
</body>
</html>
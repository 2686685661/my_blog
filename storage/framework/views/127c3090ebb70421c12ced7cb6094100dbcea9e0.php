<?php $__env->startSection('style'); ?>

        <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('static/css/bootstrap.css')); ?>">

        <link rel="stylesheet" href="<?php echo e(asset('css/jquery.filer.css')); ?>">

        <link rel="stylesheet" href="<?php echo e(asset('css/jquery.filer-dragdropbox-theme.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/tomorrow.css')); ?>">

        <link rel="stylesheet" href="<?php echo e(asset('css/custom-2.css')); ?>">


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
                <input type="file" name="files[]" id="demo-fileInput-4" multiple="multiple" style="position: absolute; left: -9999px; top: -9999px; z-index: -9999;"
                       onchange="getImgURL(this)" accept="application/msword, aplication/zip">
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

        <?php echo $__env->make('files.docCenter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>


    <div>
        <div class="pull-right">
            <?php echo e($files->render()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>



    <script type="text/javascript" src="<?php echo e(asset('js/picturelist.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('queenCommon.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
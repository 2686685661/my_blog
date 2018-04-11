<?php $__env->startSection('style'); ?>

    <script type="text/javascript" src="<?php echo e(asset('static/utf8-php/ueditor.config.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('static/utf8-php/ueditor.all.js')); ?>"></script>

    <style type="text/css">
        #editor {
            height: auto;
        }
    </style>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('connect'); ?>

    <div class="col-lg-11 col-md-11 col-sm-11 alert alert-info">
        <h3 class=" text-center">Compose New Notification</h3>

        <?php echo $__env->make('queenCommon.validator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="hr-div"> <hr></div>

        <div class="col-md-10">
            <h3>Basic Form Examples</h3>

            <?php echo $__env->make('artical._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>

    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>


    <script type="text/javascript" src="<?php echo e(asset('js/verify.js')); ?>"></script>

    <script>
        var ue = UE.getEditor('editor');
    </script>

    <script type="text/javascript">
        var a = document.getElementById('editor');
        a.style.height ='10px';
    </script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('queenCommon.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
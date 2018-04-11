<?php $__env->startSection('connect'); ?>

    <div class="col-lg-11 col-md-11 col-sm-11 alert alert-info">
        <h3 class=" text-center">Compose New Notification</h3>

        <?php echo $__env->make('queenCommon.validator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="hr-div"> <hr></div>

        <form method="post" action="">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <div class="form-group col-lg-10 col-md-12 col-sm-10">
                <div class="form-group">
                    <label>邮件主题</label>
                    <input class="form-control" type="text" name="Email[subject]">
                </div>
                <div class="form-group">
                    <label>Please Enter Notification Text</label>
                    <textarea class="form-control" rows="14" name="Email[content]" placeholder="PLease Enter Keyword"> </textarea>
                </div>
            </div>
            <div class="form-group col-lg-11 col-md-11 col-sm-11">
                <button type="submit" class="btn btn-primary">Compose &amp; Send Ticket</button>
            </div>
        </form>
    </div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('queenCommon.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- 成功提示框 -->
<?php if(Session::has('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>成功!</strong> <?php echo e(Session::get('success')); ?>

    </div>
<?php endif; ?>

<!-- 失败提示框 -->
<?php if(Session::has('error')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>失败!</strong> <?php echo e(Session::get('error')); ?>

    </div>
<?php endif; ?>
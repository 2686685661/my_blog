<?php $__env->startSection('connect'); ?>


    <div class="col-md-12">

        <!-- 自定义内容区域 -->

        <form action="" method="post">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    待审核
                </div>
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>email</th>
                        <th>留言时间</th>
                        <th>修改时间</th>
                        <th>审核状态</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="row"><?php echo e($message->id); ?></td>
                                <td><?php echo e($message->name); ?></td>
                                <td><?php echo e($message->email); ?></td>
                                <td><?php echo e(date('Y-m-d',$message->created_at)); ?></td>
                                <td><?php echo e(date('Y-m-d',$message->updated_at)); ?></td>
                                <td><?php echo e($message->getadopt($message->adopt_id)); ?></td>
                                <td>
                                    <a href="<?php echo e(url('message/isadopt',['id'=>$message->id])); ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a href="<?php echo e(url('message/delete',['id'=>$message->id])); ?>"
                                       onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                                    ><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </form>

        <!-- 分页  -->
        <div>
            <div class="pull-right">
                <?php echo e($messages->render()); ?>

            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('queenCommon.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
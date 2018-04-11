<?php $__env->startSection('connect'); ?>
    <div class="col-md-12">

        <!-- 自定义内容区域 -->
        <div class="panel panel-default">
            <div class="panel-heading">文章列表</div>
            <table class="table table-striped table-hover table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>文章标题</th>
                    <th>发布人</th>
                    <th>新增时间</th>
                    <th>修改时间</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $articals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($artical->id); ?></th>
                        <td><?php echo e($artical->headline); ?></td>
                        <td><?php echo e($artical->publishperson); ?></td>
                        <td><?php echo e(date('Y-m-d',$artical->created_at)); ?></td>
                        <td><?php echo e(date('Y-m-d',$artical->updated_at)); ?></td>
                        <td>
                            <a href="<?php echo e(url('artical/updateartical?id='.$artical->id)); ?>"> <span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="<?php echo e(url('artical/deleteartical',['id'=>$artical->id])); ?>"
                               onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                            ><span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <!-- 分页  -->
        <div>
            <div class="pull-right">
                <?php echo e($articals->render()); ?>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('queenCommon.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
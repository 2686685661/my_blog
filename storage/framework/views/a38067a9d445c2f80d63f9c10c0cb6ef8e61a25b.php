<?php $__env->startSection('connect'); ?>

    <div class="col-md-12 container">


        <!-- 自定义内容区域 -->
        <div class="panel panel-primary">
            <div class="panel-heading">回收站--日记</div>


            <div class="panel-body">
                <?php echo $__env->make('recovery._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                


                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>内容</th>
                        <th>删除时间</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $diarys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($diary->id); ?></th>
                            <td><?php echo e($diary->diaryContent); ?></td>
                            <td><?php echo e(date('Y-m-d',$diary->updated_at)); ?></td>
                            <td>
                                <a href="<?php echo e(url('recovery/diaReduction',['id'=>$diary->id])); ?>"><span class="glyphicon glyphicon-send"></span></a>
                                <a href="<?php echo e(url('recovery/diadelete',['id'=>$diary->id])); ?>"
                                   onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                                ><span style="color:red" class="glyphicon glyphicon-remove-sign"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 分页  -->
        <div>
            <div class="pull-right">
                <?php echo e($diarys->render()); ?>

            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('queenCommon.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
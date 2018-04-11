<?php $__env->startSection('connect'); ?>




    <div class="col-md-12 container">


        <!-- 自定义内容区域 -->
        <div class="panel panel-primary">
            <div class="panel-heading">回收站--文件</div>


            <div class="panel-body">

                <?php echo $__env->make('recovery._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>文件名称</th>
                        <th>文件类型</th>
                        <th>删除时间</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($file->id); ?></th>
                            <td>
                                <p style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="<?php echo e($file->filename); ?>"> <?php echo e(str_limit(strip_tags($file->filename),30,'...')); ?></p>
                            </td>
                            <td><?php echo e($file->filetype); ?></td>
                            <td><?php echo e(date('Y-m-d',$file->updated_at)); ?></td>
                            <td>
                                <a href="<?php echo e(url('recovery/fileReduction',['id'=>$file->id])); ?>"> <span class="glyphicon glyphicon-send"></span></a>
                                <a href="<?php echo e(url('recovery/filedelete',['id'=>$file->id])); ?>"
                                   onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                                ><span style="color:red" class="glyphicon glyphicon-remove-sign"></span></a>
                            </td>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <script>
        $(function () { $("[data-toggle='tooltip']").tooltip(); });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('queenCommon.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
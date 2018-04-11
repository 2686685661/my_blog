<?php $__env->startSection('style'); ?>

    <script type="text/javascript" src="<?php echo e(asset('static/jquery/jquery-3.1.1.min.js')); ?>"></script>


    <script type="text/javascript" src="<?php echo e(asset('static/layer/layer.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('connect'); ?>

    <div class="col-md-12">

        <!-- 自定义内容区域 -->

        <form action="" method="post" >
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <div class="panel panel-default">
                <div class="panel-heading"> 留言列表</div>
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>

                        <th>ID</th>
                        <th>姓名</th>
                        <th id="th">email</th>
                        <th>留言时间</th>
                        
                        <th>审核状态</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td scope="row"><?php echo e($message->id); ?></td>
                            <td><?php echo e($message->name); ?></td>
                            <td><a href="<?php echo e(url('message/newemail',['id'=>$message->id])); ?>" style="cursor: pointer"><?php echo e($message->email); ?></a></td>
                            <td><?php echo e(date('Y-m-d',$message->created_at)); ?></td>
                            
                            <td><?php echo e($message->getadopt($message->adopt_id)); ?></td>
                            <td>

                                <a onclick="clickmessage(<?php echo e($message->id); ?>)" ondblclick="odbmessage(<?php echo e($message->id); ?>)">  <span class="glyphicon glyphicon-envelope"></span></a>

                                <a href="<?php echo e(url('message/noadopt',['id'=>$message->id])); ?>"> <span class="glyphicon glyphicon-eye-close"></span></a>

                                <a href="<?php echo e(url('message/delete',['id'=>$message->id])); ?>"
                                   onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                                > <span class="glyphicon glyphicon-trash"></span></a>

                                <?php if($message->reply!=''): ?>
                                    <a style="margin-left: 10px;"> <span class="glyphicon glyphicon-ok"></span></a>
                                <?php endif; ?>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="8" style="padding: 3px 5px 0 5px;">

                                <div id="<?php echo e($message->id); ?>" style="display: none;">
                                    <form action="" method="post">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                                        <input style="display: none" type="text" name="Reply[id]" value="<?php echo e($message->id); ?>">
                                        <label>回复时间：<?php echo e(date('Y-m-d',$message->updated_at)); ?></label>

                                        <textarea style="width: 92%;"  class="form-control" id="repage_<?php echo e($message->id); ?>"  name="Reply[reply]"  cols="" rows=""><?php if($message->reply!=''): ?>
                                            <?php echo e($message->reply); ?><?php endif; ?></textarea>
                                        <button style="margin-left: 82.9%;" class="btn btn-primary" type="button" onclick="reply(<?php echo e($message->id); ?>,this)">回复</button>
                                    </form>
                                </div>
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


<?php $__env->startSection('javascript'); ?>

    <script type="text/javascript">
        function clickmessage(id) {
            document.getElementById(id).style.display='block';
        }
        
        function odbmessage(id) {
            document.getElementById(id).style.display='none';
        }
        
        function reply(id,btn) {
            var text = document.getElementById("repage_"+id).value;

            if(text != '') {
                if(text.length<200) {
                    $(btn).prop("type","submit");
                }else {
                    alert('留言回复内容过长！');
                }
            }else {
                alert('留言回复不能为空！');
            }

            
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            layer.open({
                type: 4,
                time:4000,
                id: 'aaa',
                shadeClose:true,
                content: ['点击email即可发送邮件', '#th'] //数组第二项即吸附元素选择器或者DOM
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('queenCommon.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
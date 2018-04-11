<?php $__env->startSection('style'); ?>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>

<link rel="stylesheet" href="<?php echo e(asset('css/zyUpload.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('css/picturemy.css')); ?>">

<script type="text/javascript" src="<?php echo e(asset('static/jquery/jquery-3.1.1.js')); ?>"></script>



<script type="text/javascript" src="<?php echo e(asset('js/picturelist.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('static/jquery/jquery-3.1.1.min.js')); ?>"></script>


<script type="text/javascript" src="<?php echo e(asset('static/layer/layer.js')); ?>"></script>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('connect'); ?>


    <div id="demo" class="demo">
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <div class="upload_box">
                <div class="upload_main">
                    <div class="upload_choose">
                        <div class="convent_choice">
                            <div id="andarea" class="andArea">
                                <div class="filePicker">点击选择文件</div>
                                <input id="fileImage" type="file" value="上传文件" size="10000000000" accept="image/png,image/jpeg" name="fileselect[]" multiple="multiple" onchange="getImgURL(this)">
                                <div class="mark">
                                    <input type="file" multiple="multiple" id="onloadfile" style="display: none">
                                </div>
                            </div>
                        </div>
                        <span id="fileDragArea" class="upload_drag_area">或者将文件拖到此处</span>
                    </div>
                    <div class="status_bar">
                        <div class="btns">
                            <div class="webuploader_pick">继续选择</div>
                            <button id="sub" type="submit" class="upload_btn" >开始上传</button>

                        </div>
                    </div>
                    <div id="preview" class="upload_preview">
                    </div>
                </div>
            </div>
        </form>
    </div>


    <hr>


    <div class="col-md-12">
            <div id="layer-photos-demo" class="picture-Exhibition">
                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="body-img">
                        <img id="test1" class="img" src="<?php echo e(asset('upload/'.$file->filename)); ?>"/>

                            <a style="margin-right: 200px;margin-top:20px" href="<?php echo e(url('files/deletepic',['id'=>$file->id])); ?>" onclick="if (confirm('你确定要删除吗？？') == false) return false;"><span class="glyphicon glyphicon-remove"></span></a>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    </div>


    <!-- 分页  -->
    <div>
        <div class="pull-right">
            <?php echo e($files->render()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>

    <script type="text/javascript">

//        var index = layer.load(2, {
//            shade: false,
//            time:400,
//        }); //0代表加载的风格，支持0-2
        $(document).ready(function(){

            layer.photos({
                photos: '#layer-photos-demo'
                ,anim: 5, //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）

            });

//            layer.open({
//                type: 4,
//                time:4000,
//                shadeClose:true,
//                content: ['拖拽图片当前不可用', '#fileDragArea'] //数组第二项即吸附元素选择器或者DOM
//            });


        });


    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('queenCommon.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
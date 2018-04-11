<?php $__env->startSection('style'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/frarid.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('static/bootstrap/css/bootstrap.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('static/bootstrap/css/bootstrap.min.css')); ?>">

    <script type="text/javascript" href="<?php echo e(asset('static/jquery/jquery-3.1.1.js')); ?>"></script>

    <script type="text/javascript" href="<?php echo e(asset('static/jquery/jquery-3.1.1.min.js')); ?>"></script>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('connect'); ?>

    <section>
        <div class="row">
            
            <div class="col-md-8">
                <article class="blog-post">
                    <div class="blog-post-image">
                        <a href=""><img style="width: 750px;max-height: 500px;" src="<?php echo e(asset('upload/'.$artical->picture)); ?>" alt=""></a>
                    </div>
                    <div class="blog-post-body">
                        <h2><a href=""><?php echo e($artical->headline); ?></a></h2>
                        <div class="post-meta"><span>by <a href="#"><?php echo e($artical->publishperson); ?></a></span>/<span><i class="fa fa-clock-o"></i>March <?php echo e(date('d,m,Y',$artical->created_at)); ?></span>/<span><i class="fa fa-comment-o"></i> <a href="#"><?php echo e($artical->readnumber); ?></a></span></div>
                        <div class="blog-post-text">

                            <?php echo $artical->articalcontent; ?>


                        </div>
                    </div>
                </article>

                <hr>

                <div class="content-form-box">
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                        <div class="col-md-10">
                            <div style="display: none" class="form-group">
                                <input name="Ment[articalid]" id="name" value=<?php echo e($artical->id); ?> class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>姓名</label>
                                <input name="Ment[comname]" id="names" class="form-control" type="text" value="<?php echo e(\Illuminate\Support\Facades\Cookie::get('cookie')['comname']); ?>">
                            </div>
                            <div class="form-group">
                                <label>邮箱</label>
                                <input id="mailbox" class="form-control" type="text" name="Ment[comemail]" value="<?php echo e(\Illuminate\Support\Facades\Cookie::get('cookie')['comemail']); ?>">
                            </div>
                        </div>
                        <div class="form-group col-lg-10 col-md-10 col-sm-10">
                            <label>在此评论</label>
                            <textarea class="form-control" name="Ment[comtext]" id="text" cols="30" rows="5" placeholder="再次评论"></textarea>
                        </div>
                        <div class="col-md-6 determineRegister">
                            <input id="btn" class="message-sub" type="button" value="提交" onclick="cilikPost(this)">
                        </div>
                    </form>
                </div>
                <div id="contow-box">
                    <div class="content-comment-box">

                        

                        <?php $__currentLoopData = $artiments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$ment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($ment->comid == 0): ?>

                                <div>
                                    <img class="img" src="<?php echo e(asset('img/none.png')); ?>">
                                    <p> <?php echo e($ment->comname); ?> :</p>

                             <?php else: ?>
                                <div style="margin-left: 20px;">
                                    <img style=" width: 5%;" class="img" src="<?php echo e(asset('img/none.png')); ?>">
                                    <p><?php echo e($ment->comname); ?> 对 <?php echo e(explode('/',$key)[0]); ?> 说</p>

                            <?php endif; ?>

                                    <p><?php echo e($ment->comtext); ?></p>
                                    <div>
                                        <span style="margin-left:60px;margin-right:20px;" class="ds-time">DATE <?php echo e(date('d,m,Y', $ment->created_at)); ?> </span>
                                        <a ondblclick="nonement(<?php echo e($ment->id); ?>)" onclick="keyment(<?php echo e($ment->id); ?>)" class="aaa">
                                            回复
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </div>


                                    <?php if($ment->reply != ''): ?>
                                        <div>
                                            <img style="float: right" class="img" src="<?php echo e(asset('img/none.png')); ?>">
                                            <p style="text-align: right"> : 博主 </p>
                                            <p style="text-align: right"><?php echo e($ment->reply); ?></p>
                                            <div>
                                                <span style="margin-left:65%;margin-right:20px;" class="ds-time">DATE <?php echo e(date('d,m,Y', $ment->updated_at)); ?> </span>
                                            </div>
                                        </div>
                                    <?php endif; ?>




                                    <div id="<?php echo e($ment->id); ?>" class="ds-replybox ds-inline-replybox" style="display:none;">
                                        <form action="" method="post">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                                            <div style="display:none;">
                                                <input type="text" name="Ment[comid]" value="<?php echo e($ment->id); ?>"/>
                                                <input type="text" name="Ment[articalid]" value="<?php echo e($artical->id); ?>"/>
                                            </div>
                                            <div class="ds-textarea-wrapper ds-rounded-top">
                                                <div class="form-input">
                                                    姓名：
                                                    <input id="name<?php echo e($ment->id); ?>" name="Ment[comname]" type="text" value="<?php echo e(\Illuminate\Support\Facades\Cookie::get("cookie")["comname"]); ?>">
                                                </div>
                                                <div class="form-input">
                                                    邮箱：
                                                    <input name="Ment[comemail]" id="email<?php echo e($ment->id); ?>" type="text" value="<?php echo e(\Illuminate\Support\Facades\Cookie::get("cookie")["comemail"]); ?>">
                                                </div>
                                                <textarea name="Ment[comtext]" id="text<?php echo e($ment->id); ?>" cols="30" rows="10"></textarea>
                                                <input type="button" value="提交" onclick="cilckReplyid(this,<?php echo e($ment->id); ?>)">
                                            </div>
                                        </form>
                                    </div>

                               </div>
                                <hr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







                    </div>
                </div>
            </div>


            
            <?php echo $__env->make('frontCommon.rightmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footstyle'); ?>


    <script type="text/javascript" src="<?php echo e(asset('js/picturelist.js')); ?>"></script>


    <script type="text/javascript">
        function keyment(id) {
            var divform = document.getElementById(id);

            divform.style.display = "block";
        }

        function nonement(id) {
            var divform = document.getElementById(id);
            divform.style.display = "none";
        }
    </script>

    <script type="text/javascript">

        function cilikPost(btn) {
            var names = $("#names").val();
            var email = $("#mailbox").val();
            var text = $("#text").val();


            if(names != '' && email != '' && text != '') {
                var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                if(myreg.test(email)) {
                   if(text.length <160) {
                        $(btn).prop("type","submit");

                   }else {
                       alert('评论内容过长');
                       return false;
                   }
                }else {
                    alert('邮箱格式不正确');
                    return false;
                }
            }else {
                alert('请填写完整！');
                return false;
            }
        }
    </script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontCommon.fronttemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
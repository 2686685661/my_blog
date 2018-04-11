<div id="video_<?php echo e($video->id); ?>" class="zhao" style="display: none">
    <div class="ui-5447790657 npl-win npl-aau" style="top: 4.5px; left: 27%;">
        <div class="zwrp">
            <a href="javascript:;" class="zcls zflg" title="关闭" onclick="videoOver(<?php echo e($video->id); ?>)"></a>
            <div class="ztbr noselect zmov">
                <div class="zttl thide fc1 zflg"> 视频播放</div>
            </div>
            <div class="zcnt fc2 zflg">
                <div class="">
                    <video id="vid<?php echo e($video->id); ?>" width="398px" height="293px" controls autoplay>
                        <source src="<?php echo e(asset('upload/'.$video->filename)); ?>" type="video/ogg">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
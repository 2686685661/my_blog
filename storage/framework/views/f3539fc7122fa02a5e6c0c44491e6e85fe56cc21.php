<form  method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
    <div class="form-group">
        <label>Text Input</label>
        <input class="form-control" name="Artical[headline]" value="<?php echo e(old('Artical')['headline'] ? old('Artical')['headline'] : $artical->headline); ?>">
        <p class="help-block">Help text here.</p>
    </div>
    <div class="form-group">
        <label>Text Input with Placeholder</label>
        <input class="form-control" name="Artical[publishperson]" placeholder="PLease Enter Keyword"
        value="<?php echo e(old('Artical')['publishperson'] ? old('Artical')['publishperson'] : $artical->publishperson); ?>"
        >
    </div>
    
    
    
    
    
    
    
    
    <div class="form-group">
        <label>Just A Label Control</label>
        <p class="form-control-static">info@yourdomain.com</p>
    </div>

    <div class="form-group">
        <label for="file" class="col-md-4 control-label">请选择文件</label>
        <input id="file" type="file" for="file" class="form-control" name="source"
        value="<?php echo e(old('source') ? old('source') : $artical->picture); ?>" onchange="PreviewImage(this)">

        <div id="imgPreview" style=" margin:10px 0 0 315px; ">
            <img style="height: 100px;width: 120px" <?php if($artical->picture!=''): ?> src="<?php echo e(asset('upload/'.$artical->picture)); ?>" <?php else: ?> display="none" <?php endif; ?> alt="文章封面预览">
        </div>
    </div>

    <div id="groups" class="form-group">
        <label>Text area</label>
        <textarea id="editor" class="form-control" style="padding:0;" name="Artical[articalcontent]"  ><?php echo e(old('Artical')['articalcontent'] ? old('Artical')['articalcontent'] : $artical->articalcontent); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Button</button>

</form>
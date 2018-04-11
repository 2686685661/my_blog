<form method="POST" action="">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="item" class="form-control" placeholder="Enter Title For Search" value="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <button class="btn btn-success" type="submit">Search</button>
            </div>
        </div>
    </div>
</form>
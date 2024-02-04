<div class="pos-tab-content active">
    <div class="row">
        <div class="col-sm-6">
                <div class="form-group">
                    <?php echo Form::label('image', __('Add Login Image') . ':'); ?>

                    <?php echo Form::file('login_image', ['id' => 'upload_image', 'accept' => 'image/*']); ?>

                    <small>
                        <p class="help-block"><?php echo app('translator')->getFromJson('purchase.max_file_size', ['size' => config('constants.document_size_limit') / 1000000]); ?> <br> <?php echo app('translator')->getFromJson('lang_v1.aspect_ratio_should_be_1_1'); ?></p>
                    </small>
                </div>
        </div>
        <div class="col-sm-6">
            <?php echo Form::label('image', __('Current Login Image') . ':'); ?>

            <div class="thumbnail">
                <img src="<?php echo e($business->login_image_url, false); ?>" alt="Product image">
            </div>
        </div>
    </div>  
</div><?php /**PATH D:\Laravel Project\Clicky Pos 4.7.8\POS-V4.7.8\resources\views/super_admin/partials/login_image.blade.php ENDPATH**/ ?>
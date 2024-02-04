<div class="pos-tab-content">
    <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>
                        <?php echo Form::checkbox('common_settings[show_product_second_name]', true, $business->show_product_second_name == 1 ? 1 : 0,

                        [ 'class' => 'input-icheck']);; ?> Enable Product Second Name
                    </label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>
                        <?php echo Form::checkbox('common_settings[product_variation_on_purchase]', true, $business->product_variation_on_purchase == 1 ? 1 : 0,

                        [ 'class' => 'input-icheck']);; ?> Enable Auto Variation Products On Purchase
                    </label>
                </div>
            </div>    
    </div>
</div><?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/super_admin/partials/settings_product.blade.php ENDPATH**/ ?>
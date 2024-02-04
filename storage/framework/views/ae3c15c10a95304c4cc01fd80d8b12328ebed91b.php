<div class="pos-tab-content">
    <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <label>
                        <?php echo Form::checkbox('super_admin[enable_multiple_payment_methods]', true, $super_admin->enable_multiple_payment_methods == 1 ? 1 : 0,

                        [ 'class' => 'input-icheck']);; ?> Enable Muliple Payment Method Search
                    </label>
                </div>
            </div>
    </div>
</div><?php /**PATH D:\Laravel Project\Clicky Pos 4.7.8\POS-V4.7.8\resources\views/super_admin/partials/settings_payment.blade.php ENDPATH**/ ?>
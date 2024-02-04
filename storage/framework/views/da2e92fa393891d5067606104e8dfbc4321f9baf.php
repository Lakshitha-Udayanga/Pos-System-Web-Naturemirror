<div class="modal fade" id ="woocommerce_sync_modal" tabindex="-1" role="dialog">
    <?php echo Form::open(['url' => action('ProductController@toggleWooCommerceSync'), 'method' => 'post', 'id' => 'toggle_woocommerce_sync_form' ]); ?>

        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <?php echo app('translator')->getFromJson('lang_v1.woocommerce_sync'); ?>
                </h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="woocommerce_products_sync" name="woocommerce_products_sync" value="">
                <div class="row">
                    <div class="col-md-12">
                        <label for="woocommerce_disable_sync">
                            <?php echo app('translator')->getFromJson('lang_v1.woocommerce_sync'); ?>
                        </label>
                        <select name="woocommerce_disable_sync" class="form-control" id="woocommerce_disable_sync">
                            <option value="0">
                                <?php echo app('translator')->getFromJson('lang_v1.enable'); ?>
                            </option>
                            <option value="1">
                                <?php echo app('translator')->getFromJson('lang_v1.disable'); ?>
                            </option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <?php echo app('translator')->getFromJson('messages.close'); ?>
                </button>
                <button type="submit" class="btn btn-primary ladda-button">
                    <?php echo app('translator')->getFromJson('messages.save'); ?>
                </button>
              </div>
            </div>
        </div>
    <?php echo Form::close(); ?>

</div><?php /**PATH F:\My Project\Thand\free-isses-item\New folder\resources\views/product/partials/toggle_woocommerce_sync_modal.blade.php ENDPATH**/ ?>
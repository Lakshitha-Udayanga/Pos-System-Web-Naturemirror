<table class="table table-bordered table-striped ajax_view" id="purchase_table" style="width: 100%;">
    <thead>
        <tr>
            <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
            <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
            <th><?php echo app('translator')->getFromJson('purchase.ref_no'); ?></th>
            <th><?php echo app('translator')->getFromJson('purchase.location'); ?></th>
            <th><?php echo app('translator')->getFromJson('purchase.supplier'); ?></th>
            <th><?php echo app('translator')->getFromJson('purchase.purchase_status'); ?></th>
            <th><?php echo app('translator')->getFromJson('purchase.payment_status'); ?></th>
            <th><?php echo app('translator')->getFromJson('purchase.grand_total'); ?></th>
            <th><?php echo app('translator')->getFromJson('purchase.payment_due'); ?> &nbsp;&nbsp;<i class="fa fa-info-circle text-info no-print" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="<?php echo e(__('messages.purchase_due_tooltip'), false); ?>" aria-hidden="true"></i></th>
            <th><?php echo app('translator')->getFromJson('lang_v1.added_by'); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-gray font-17 text-center footer-total">
            <td colspan="5"><strong><?php echo app('translator')->getFromJson('sale.total'); ?>:</strong></td>
            <td class="footer_status_count"></td>
            <td class="footer_payment_status_count"></td>
            <td class="footer_purchase_total"></td>
            <td class="text-left"><small><?php echo app('translator')->getFromJson('report.purchase_due'); ?> - <span class="footer_total_due"></span><br>
            <?php echo app('translator')->getFromJson('lang_v1.purchase_return'); ?> - <span class="footer_total_purchase_return_due"></span>
            </small></td>
            <td></td>
        </tr>
    </tfoot>
</table><?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/purchase/partials/purchase_table.blade.php ENDPATH**/ ?>
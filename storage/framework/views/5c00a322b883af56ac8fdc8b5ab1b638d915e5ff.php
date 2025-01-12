<div class="table-responsive">
<table class="table table-bordered table-striped" id="sr_sales_with_commission_table" style="width: 100%;">
    <thead>
        <tr>
            <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.invoice_no'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.customer_name'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.location'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.payment_status'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.total_amount'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.total_paid'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.total_remaining'); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-gray font-17 footer-total text-center">
            <td colspan="4"><strong><?php echo app('translator')->getFromJson('sale.total'); ?>:</strong></td>
            <td id="footer_payment_status_count"></td>
            <td><span class="display_currency" id="footer_sale_total" data-currency_symbol ="true"></span></td>
            <td><span class="display_currency" id="footer_total_paid" data-currency_symbol ="true"></span></td>
            <td class="text-left"><small><?php echo app('translator')->getFromJson('lang_v1.sell_due'); ?> - <span class="display_currency" id="footer_total_remaining" data-currency_symbol ="true"></span><br><?php echo app('translator')->getFromJson('lang_v1.sell_return_due'); ?> - <span class="display_currency" id="footer_total_sell_return_due" data-currency_symbol ="true"></span></small></td>
        </tr>
    </tfoot>
</table>
</div><?php /**PATH D:\Laravel Project\Clicky Pos 4.7.8\POS-V4.7.8\resources\views/report/partials/sales_representative_commission.blade.php ENDPATH**/ ?>
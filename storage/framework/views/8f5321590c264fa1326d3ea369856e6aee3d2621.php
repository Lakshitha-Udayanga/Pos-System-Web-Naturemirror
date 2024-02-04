<div class="table-responsive">
<table class="table table-bordered table-striped" id="sr_expenses_report" style="width: 100%;">
    <thead>
        <tr>
            <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
            <th><?php echo app('translator')->getFromJson('purchase.ref_no'); ?></th>
            <th><?php echo app('translator')->getFromJson('expense.expense_category'); ?></th>
            <th><?php echo app('translator')->getFromJson('business.location'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.payment_status'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.total_amount'); ?></th>
            <th><?php echo app('translator')->getFromJson('expense.expense_for'); ?></th>
            <th><?php echo app('translator')->getFromJson('expense.expense_note'); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-gray font-17 text-center footer-total">
            <td colspan="4"><strong><?php echo app('translator')->getFromJson('sale.total'); ?>:</strong></td>
            <td id="er_footer_payment_status_count"></td>
            <td><span class="display_currency" id="footer_expense_total" data-currency_symbol ="true"></span></td>
            <td colspan="2"></td>
        </tr>
    </tfoot>
</table>
</div><?php /**PATH D:\Laravel Project\Clicky Pos 4.7.8\POS-V4.7.8\resources\views/report/partials/sales_representative_expenses.blade.php ENDPATH**/ ?>
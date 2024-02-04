<div class="table-responsive">
    <table class="table table-bordered table-striped table-text-center" id="profit_by_date_table">
        <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('lang_v1.date'); ?></th>
                <th><?php echo app('translator')->getFromJson('lang_v1.gross_profit'); ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr class="bg-gray font-17 footer-total">
                <td><strong><?php echo app('translator')->getFromJson('sale.total'); ?>:</strong></td>
                <td class="footer_total"></td>
            </tr>
        </tfoot>
    </table>
</div><?php /**PATH F:\My Project\Thand\free-isses-item\New folder\resources\views/report/partials/profit_by_date.blade.php ENDPATH**/ ?>
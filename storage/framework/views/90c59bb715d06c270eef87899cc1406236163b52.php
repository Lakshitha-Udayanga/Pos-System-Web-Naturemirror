<div class="tab-pane" id="psr_by_cat_tab">
    <div class="table-responsive">
        <table class="table table-bordered table-striped" 
        id="product_sell_report_by_category" style="width: 100%;">
            <thead>
                <tr>
                    <th><?php echo app('translator')->getFromJson('category.category'); ?></th>
                    <th><?php echo app('translator')->getFromJson('report.current_stock'); ?></th>
                    <th><?php echo app('translator')->getFromJson('report.total_unit_sold'); ?></th>
                    <th><?php echo app('translator')->getFromJson('sale.total'); ?></th>
                </tr>
            </thead>
            <tfoot>
                <tr class="bg-gray font-17 footer-total text-center">
                    <td><strong><?php echo app('translator')->getFromJson('sale.total'); ?>:</strong></td>
                    <td id="footer_psr_by_cat_total_stock"></td>
                    <td id="footer_psr_by_cat_total_sold"></td>
                    <td><span class="display_currency" id="footer_psr_by_cat_total_sell" data-currency_symbol ="true"></span></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div><?php /**PATH D:\Laravel Project\Clicky Pos 4.7.8\POS-V4.7.8\resources\views/report/partials/product_sell_report_by_category.blade.php ENDPATH**/ ?>